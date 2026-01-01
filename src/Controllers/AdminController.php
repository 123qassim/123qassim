<?php
// src/Controllers/AdminController.php

class AdminController {

    public function __construct() {
        if (!isset($_SESSION['user_id']) || $_SESSION['user_role'] !== 'admin') {
            $_SESSION['error'] = "Access denied. Admin only.";
            header('Location: /login');
            exit;
        }
    }

    public function index() {
        $db = Database::getInstance()->getConnection();

        // Get total users
        $stmt = $db->query("SELECT COUNT(*) as count FROM users");
        $totalUsers = $stmt->fetch()['count'];

        // Get total transactions
        $stmt = $db->query("SELECT SUM(amount) as total FROM transactions WHERE status = 'COMPLETED'");
        $totalRevenue = $stmt->fetch()['total'] ?? 0;

        // Recent users
        $stmt = $db->query("SELECT * FROM users ORDER BY created_at DESC LIMIT 5");
        $users = $stmt->fetchAll();

        // Recent transactions
        $stmt = $db->query("SELECT t.*, u.name FROM transactions t LEFT JOIN users u ON t.user_id = u.id ORDER BY t.created_at DESC LIMIT 10");
        $transactions = $stmt->fetchAll();

        $title = "Admin Panel - MUMBSO Connect";
        $viewPath = __DIR__ . '/../Views/admin/index.php';
        require_once __DIR__ . '/../Views/layout.php';
    }
}
