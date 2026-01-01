<?php
// public/index.php

session_start();

require_once __DIR__ . '/../src/Router.php';
require_once __DIR__ . '/../src/Database.php';

// Load Config
$config = require __DIR__ . '/../config/config.php';

// Initialize Router
$router = new Router();

// Define Routes
$router->add('GET', '/', 'HomeController', 'index');
$router->add('GET', '/login', 'AuthController', 'login');
$router->add('POST', '/login', 'AuthController', 'loginPost');
$router->add('GET', '/register', 'AuthController', 'register');
$router->add('POST', '/register', 'AuthController', 'registerPost');
$router->add('GET', '/logout', 'AuthController', 'logout');

$router->add('GET', '/dashboard', 'DashboardController', 'index');
$router->add('GET', '/events', 'PageController', 'events');
$router->add('GET', '/research', 'PageController', 'research');
$router->add('GET', '/ai', 'PageController', 'ai');
$router->add('POST', '/ai/chat', 'PageController', 'aiChat');

$router->add('GET', '/donate', 'PaymentController', 'index');
$router->add('POST', '/donate/process', 'PaymentController', 'process');
$router->add('POST', '/payment/callback', 'PaymentController', 'callback'); // For Daraja

$router->add('GET', '/admin', 'AdminController', 'index');

// Dispatch
$router->dispatch($_SERVER['REQUEST_URI'], $_SERVER['REQUEST_METHOD']);
