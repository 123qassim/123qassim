<?php
// src/Controllers/DashboardController.php

class DashboardController {
    public function index() {
        if (!isset($_SESSION['user_id'])) {
            header('Location: /login');
            exit;
        }

        $userId = $_SESSION['user_id'];
        $db = Database::getInstance()->getConnection();

        // Fetch recent transactions
        $stmt = $db->prepare("SELECT * FROM transactions WHERE user_id = ? ORDER BY created_at DESC LIMIT 5");
        $stmt->execute([$userId]);
        $transactions = $stmt->fetchAll();

        // Mock stats for now
        $stats = [
            'events_attended' => 3,
            'research_papers' => 1,
            'donations' => count($transactions)
        ];

        $title = "Dashboard - MUMBSO Connect";
        $viewPath = __DIR__ . '/../Views/dashboard/index.php';
        require_once __DIR__ . '/../Views/layout.php';
    }
}
