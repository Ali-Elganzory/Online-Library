<?php

class Router
{

    protected array $routes = [];
    protected string $not_found_route = 'controllers/404.php';

    public function define(array $routes): void
    {
        $this->routes = array_merge($this->routes, $routes);
    }

    public function direct(string $uri): string
    {
        if (array_key_exists($uri, $this->routes)) {

            return $this->routes[$uri];
        }

        return $this->not_found_route;
    }

}