<?php
// src/Router.php

class Router {
    private $routes = [];

    public function add($method, $path, $controller, $action) {
        $this->routes[] = [
            'method' => $method,
            'path' => $path,
            'controller' => $controller,
            'action' => $action
        ];
    }

    public function dispatch($uri, $method) {
        // Remove query string
        $uri = parse_url($uri, PHP_URL_PATH);

        foreach ($this->routes as $route) {
            // Simple exact match for now. Could add regex for params later.
            if ($route['path'] === $uri && $route['method'] === $method) {
                require_once __DIR__ . "/Controllers/" . $route['controller'] . ".php";
                $controllerClass = $route['controller'];
                $controller = new $controllerClass();
                $action = $route['action'];
                $controller->$action();
                return;
            }
        }

        // 404 Not Found
        http_response_code(404);
        require_once __DIR__ . "/Views/404.php";
    }
}
