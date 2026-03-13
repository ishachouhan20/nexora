<?php
class Router {
    public static function handle() {
        $method = $_SERVER['REQUEST_METHOD'];
        $uri = $_SERVER['REQUEST_URI'];

        $controller = new ProductController();

        if ($method === 'GET' && strpos($uri, 'category') !== false) {
            $controller->getCategory();
            return;
        }

        if ($method === 'GET' && strpos($uri, 'products') !== false) {
            $controller->getProducts();
            return;
        }
        

        if ($method === 'POST') {
            $controller->store();
            return;
        }

        Response::json(["error" => "Method Not Allowed"], 405);
    }
}
  
