<?php
// src/Database.php

class Database {
    private static $instance = null;
    private $pdo;

    private function __construct() {
        $config = require __DIR__ . '/../config/config.php';
        $db = $config['db'];

        $dsn = "mysql:host={$db['host']};dbname={$db['name']};charset={$db['charset']}";
        $options = [
            PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
            PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
            PDO::ATTR_EMULATE_PREPARES => false,
        ];

        try {
            $this->pdo = new PDO($dsn, $db['user'], $db['pass'], $options);
        } catch (PDOException $e) {
            // For development, we might just try to connect without dbname to create it
            // checking if the error is "Unknown database"
            if ($e->getCode() == 1049) {
                 $dsn_no_db = "mysql:host={$db['host']};charset={$db['charset']}";
                 $temp_pdo = new PDO($dsn_no_db, $db['user'], $db['pass'], $options);
                 $temp_pdo->exec("CREATE DATABASE IF NOT EXISTS `{$db['name']}`");
                 // Retry connection
                 $this->pdo = new PDO($dsn, $db['user'], $db['pass'], $options);
            } else {
                 die("Database Connection Failed: " . $e->getMessage());
            }
        }
    }

    public static function getInstance() {
        if (self::$instance === null) {
            self::$instance = new self();
        }
        return self::$instance;
    }

    public function getConnection() {
        return $this->pdo;
    }
}
