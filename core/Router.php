<?php

class Router
{

    protected string $not_found_route = 'controllers/404.php';
    protected array $routes = [
        "GET" => [],
        "POST" => [],
    ];

    public static function load(string $routes): Router
    {
        $router = new static;

        require $routes;

        return $router;
    }

    public function get(string $uri, string $controller): void
    {
        $this->routes["GET"][$uri] = $controller;
    }

    public function post(string $uri, string $controller): void
    {
        $this->routes["POST"][$uri] = $controller;
    }

    public function direct(string $uri, string $method): string
    {
        if (!array_key_exists($uri, $this->routes[$method])) {
            return $this->not_found_route;
        }
        return $this->routes[$method][$uri];
    }
}
