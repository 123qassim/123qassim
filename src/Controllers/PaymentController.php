<?php
// src/Controllers/PaymentController.php

class PaymentController {

    public function index() {
        if (!isset($_SESSION['user_id'])) {
            $_SESSION['error'] = "Please login to donate.";
            header('Location: /login');
            exit;
        }
        $title = "Donate - MUMBSO Connect";
        $viewPath = __DIR__ . '/../Views/payment/donate.php';
        require_once __DIR__ . '/../Views/layout.php';
    }

    public function process() {
        header('Content-Type: application/json');

        if (!isset($_SESSION['user_id'])) {
            echo json_encode(['success' => false, 'message' => 'Unauthorized']);
            exit;
        }

        $amount = $_POST['amount'] ?? 0;
        $phone = $_POST['phone'] ?? '';

        // Basic validation
        if ($amount <= 0 || empty($phone)) {
            echo json_encode(['success' => false, 'message' => 'Invalid amount or phone number']);
            exit;
        }

        // Format phone (Ensure 254...)
        $phone = preg_replace('/^0/', '254', $phone);
        $phone = preg_replace('/^\+254/', '254', $phone);

        // Load Config
        $config = require __DIR__ . '/../../config/config.php';
        $mpesa = $config['daraja'];

        // Generate Access Token
        $accessToken = $this->getAccessToken($mpesa);
        if (!$accessToken) {
             echo json_encode(['success' => false, 'message' => 'Failed to generate access token']);
             exit;
        }

        // Initiate STK Push
        $timestamp = date('YmdHis');
        $password = base64_encode($mpesa['shortcode'] . $mpesa['passkey'] . $timestamp);

        $curl_post_data = [
            'BusinessShortCode' => $mpesa['shortcode'],
            'Password' => $password,
            'Timestamp' => $timestamp,
            'TransactionType' => 'CustomerPayBillOnline',
            'Amount' => (int)$amount,
            'PartyA' => $phone,
            'PartyB' => $mpesa['shortcode'],
            'PhoneNumber' => $phone,
            'CallBackURL' => $mpesa['callback_url'],
            'AccountReference' => 'MUMBSO Donation',
            'TransactionDesc' => 'Donation via Website'
        ];

        $url = ($mpesa['env'] === 'sandbox')
            ? 'https://sandbox.safaricom.co.ke/mpesa/stkpush/v1/processrequest'
            : 'https://api.safaricom.co.ke/mpesa/stkpush/v1/processrequest';

        $curl = curl_init();
        curl_setopt($curl, CURLOPT_URL, $url);
        curl_setopt($curl, CURLOPT_HTTPHEADER, array('Content-Type:application/json', 'Authorization:Bearer ' . $accessToken));
        curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($curl, CURLOPT_POST, true);
        curl_setopt($curl, CURLOPT_POSTFIELDS, json_encode($curl_post_data));

        $response = curl_exec($curl);
        curl_close($curl);

        $data = json_decode($response);

        if (isset($data->ResponseCode) && $data->ResponseCode == "0") {
            // Save initial transaction to DB as PENDING
            $db = Database::getInstance()->getConnection();
            $stmt = $db->prepare("INSERT INTO transactions (user_id, amount, phone, checkout_request_id, status) VALUES (?, ?, ?, ?, 'PENDING')");
            $stmt->execute([$_SESSION['user_id'], $amount, $phone, $data->CheckoutRequestID]);

            echo json_encode(['success' => true, 'message' => 'STK Push initiated. Check your phone.']);
        } else {
            $error = $data->errorMessage ?? 'Unknown error';
            echo json_encode(['success' => false, 'message' => 'M-Pesa Error: ' . $error]);
        }
    }

    private function getAccessToken($mpesa) {
        $url = ($mpesa['env'] === 'sandbox')
            ? 'https://sandbox.safaricom.co.ke/oauth/v1/generate?grant_type=client_credentials'
            : 'https://api.safaricom.co.ke/oauth/v1/generate?grant_type=client_credentials';

        $curl = curl_init();
        curl_setopt($curl, CURLOPT_URL, $url);
        $credentials = base64_encode($mpesa['consumer_key'] . ':' . $mpesa['consumer_secret']);
        curl_setopt($curl, CURLOPT_HTTPHEADER, array('Authorization: Basic ' . $credentials));
        curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);

        $response = curl_exec($curl);
        curl_close($curl);

        $data = json_decode($response);
        return $data->access_token ?? null;
    }

    public function callback() {
        // This receives the JSON from Safaricom
        $content = file_get_contents('php://input');
        $data = json_decode($content, true);

        // Log the callback for debugging (optional)
        // file_put_contents('callback_log.txt', $content . PHP_EOL, FILE_APPEND);

        if (!isset($data['Body']['stkCallback'])) {
            return;
        }

        $callbackData = $data['Body']['stkCallback'];
        $checkoutRequestId = $callbackData['CheckoutRequestID'];
        $resultCode = $callbackData['ResultCode'];

        $db = Database::getInstance()->getConnection();

        if ($resultCode == 0) {
            // Success
            $meta = $callbackData['CallbackMetadata']['Item'];
            $receipt = '';
            foreach ($meta as $item) {
                if ($item['Name'] == 'MpesaReceiptNumber') {
                    $receipt = $item['Value'];
                    break;
                }
            }

            $stmt = $db->prepare("UPDATE transactions SET status = 'COMPLETED', mpesa_receipt_number = ? WHERE checkout_request_id = ?");
            $stmt->execute([$receipt, $checkoutRequestId]);
        } else {
            // Failed / Cancelled
            $stmt = $db->prepare("UPDATE transactions SET status = 'FAILED' WHERE checkout_request_id = ?");
            $stmt->execute([$checkoutRequestId]);
        }
    }
}
