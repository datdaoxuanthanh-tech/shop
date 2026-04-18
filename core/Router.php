<?php

class Router {
    private $routes = [];

    public function get($url, $action, $middleware = null) {
        $this->routes['GET'][$url] = [
            'action' => $action,
            'middleware' => $middleware
        ];
    }

    public function post($url, $action, $middleware = null) {
        $this->routes['POST'][$url] = [
            'action' => $action,
            'middleware' => $middleware
        ];
    }

    public function dispatch() {
        $method = $_SERVER['REQUEST_METHOD'];
        $uri = parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH);

        $uri = str_replace('/shop/public', '', $uri);

        if(isset($this->routes[$method][$uri])) {

            $route = $this->routes[$method][$uri];

            // 🔐 xử lý middleware
            if($route['middleware']) {
                if($route['middleware'] == 'auth' && !isset($_SESSION['user'])) {
                    header("Location: /shop/public/login");
                    exit;
                }

                if($route['middleware'] == 'admin') {
                    if(!isset($_SESSION['user']) || $_SESSION['user']['role'] != 'admin') {
                        echo "Không có quyền truy cập";
                        exit;
                    }
                }
            }

            $action = $route['action'];

            list($controller, $methodAction) = explode('@', $action);

            require_once __DIR__ . "/../app/controllers/$controller.php";

            $obj = new $controller();
            $obj->$methodAction();

        } else {
            echo "404 NOT FOUND";
        }
    }
}