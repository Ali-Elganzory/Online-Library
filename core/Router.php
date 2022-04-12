<?php

class Router
{

    protected array $routes = [
        "GET" => [],
        "POST" => [],
    ];

    public
    static function load(string $routes): Router
    {
        $router = new static;

        require $routes;

        return $router;
    }

    public
    function get(string $uri, string $controller): void
    {
        $this->routes["GET"][$uri] = $controller;
    }

    public
    function post(string $uri, string $controller): void
    {
        $this->routes["POST"][$uri] = $controller;
    }

    /**
     * @throws Exception
     */
    public
    function direct(string $uri, string $method)
    {
        if (!array_key_exists($uri, $this->routes[$method])) {
            return (new Pages)->notFound();
        }

        list($controller, $action) = explode("@", $this->routes[$method][$uri]);

        return $this->callAction($controller, $action);
    }

    /**
     * @throws Exception
     */
    protected
    function callAction(string $controller, string $action)
    {
        $controller = new $controller;

        if (!method_exists($controller, $action)) {
            $class = $controller::class;
            throw new Exception("{$class} doesn't respond to {$action} action.");
        }

        return $controller->$action();
    }
}
