<?php
// src/Controllers/HomeController.php

class HomeController {
    public function index() {
        $title = "MUMBSO Connect - Home";
        $viewPath = __DIR__ . '/../Views/home.php';
        require_once __DIR__ . '/../Views/layout.php';
    }
}
