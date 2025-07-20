<?php
class Router
{
    private $routes = [];

    public function get($uri, $callback)
    {
        $this->routes['GET'][$uri] = $callback;
    }

    public function post($uri, $callback)
    {
        $this->routes['POST'][$uri] = $callback;
    }

    public function dispatch($method, $uri)
    {
        // Remove query string from URI, keep path only
        $uri = parse_url($uri, PHP_URL_PATH);

        if (isset($this->routes[$method][$uri])) {
            $callback = $this->routes[$method][$uri];

            if (is_callable($callback)) {
                call_user_func($callback);
            } else {
                require $callback;
            }
        } else {
            http_response_code(404);
            echo "404 Not Found";
            // or require 'Views/404.php';
        }
    }
}
