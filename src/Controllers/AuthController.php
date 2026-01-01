<?php
// src/Controllers/AuthController.php

class AuthController {

    public function login() {
        if (isset($_SESSION['user_id'])) {
            header('Location: /dashboard');
            exit;
        }
        $title = "Login - MUMBSO Connect";
        $viewPath = __DIR__ . '/../Views/auth/login.php';
        require_once __DIR__ . '/../Views/layout.php';
    }

    public function loginPost() {
        $email = $_POST['email'] ?? '';
        $password = $_POST['password'] ?? '';

        $db = Database::getInstance()->getConnection();
        $stmt = $db->prepare("SELECT * FROM users WHERE email = ?");
        $stmt->execute([$email]);
        $user = $stmt->fetch();

        if ($user && password_verify($password, $user['password'])) {
            $_SESSION['user_id'] = $user['id'];
            $_SESSION['user_name'] = $user['name'];
            $_SESSION['user_role'] = $user['role'];
            header('Location: /dashboard');
            exit;
        } else {
            $_SESSION['error'] = "Invalid email or password.";
            header('Location: /login');
            exit;
        }
    }

    public function register() {
        if (isset($_SESSION['user_id'])) {
            header('Location: /dashboard');
            exit;
        }
        $title = "Register - MUMBSO Connect";
        $viewPath = __DIR__ . '/../Views/auth/register.php';
        require_once __DIR__ . '/../Views/layout.php';
    }

    public function registerPost() {
        $name = $_POST['name'] ?? '';
        $email = $_POST['email'] ?? '';
        $password = $_POST['password'] ?? '';
        $phone = $_POST['phone'] ?? '';

        if (empty($name) || empty($email) || empty($password)) {
             $_SESSION['error'] = "All fields are required.";
             header('Location: /register');
             exit;
        }

        $hashedPassword = password_hash($password, PASSWORD_BCRYPT);

        $db = Database::getInstance()->getConnection();

        // Check if email exists
        $stmt = $db->prepare("SELECT id FROM users WHERE email = ?");
        $stmt->execute([$email]);
        if ($stmt->fetch()) {
            $_SESSION['error'] = "Email already registered.";
            header('Location: /register');
            exit;
        }

        try {
            $stmt = $db->prepare("INSERT INTO users (name, email, password, phone) VALUES (?, ?, ?, ?)");
            $stmt->execute([$name, $email, $hashedPassword, $phone]);

            $_SESSION['success'] = "Registration successful! Please login.";
            header('Location: /login');
            exit;
        } catch (Exception $e) {
            $_SESSION['error'] = "Registration failed: " . $e->getMessage();
            header('Location: /register');
            exit;
        }
    }

    public function logout() {
        session_destroy();
        header('Location: /');
        exit;
    }
}
