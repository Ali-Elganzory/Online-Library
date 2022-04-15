<?php

class Router
{

    protected array $routes = [
        "GET" => [],
        "POST" => [],
        "PUT" => [],
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

    public
    function put(string $uri, string $controller): void
    {
        $this->routes["PUT"][$uri] = $controller;
    }

    /**
     * @throws Exception
     */
    public
    function direct(string $uri, string $method)
    {
        if (!in_array($uri, ['login', 'register', 'api/login', 'api/register'])) {
            $token = Request::token();
            if (!$token) {
                redirect("/login");
            }

            Authentication::authenticate($token);
        }

        $routes = $this->routes[$method];
        $regexpToAction = [];

        $regexps = array_map(
            function ($route) use (&$routes, &$regexpToAction) {
                $regexp = '#^'
                    . preg_replace("/\{(.*?)\}/", '(?<$1>[^/]+?)', $route)
                    . '$#';

                $regexpToAction[$regexp] = $routes[$route];

                return $regexp;
            },
            array_keys($routes),
        );

        $nonMatches = 0;
        $matchedRegexp = '';
        $matches = [];
        foreach ($regexps as $i => $re) {
            $route = array_keys($routes)[$i];
            if (preg_match_all($re, $uri, $matches)) {
                $matchedRegexp = $re;
                break;
            } else {
                ++$nonMatches;
            }
        }

        if ($nonMatches == count($regexps)) {
            return (new Pages)->notFound();
        }

        list($controller, $action) = explode("@", $regexpToAction[$matchedRegexp]);

        $parameters = [];
        foreach ($matches as $name => $value) {
            if (gettype($name) != 'integer') {
                $parameters[$name] = $value[0];
            }
        }

        return $this->callAction($controller, $action, $parameters);
    }

    /**
     * @throws Exception
     */
    protected
    function callAction(string $controller, string $action, array $parameters = [])
    {
        $controller = new $controller;

        if (!method_exists($controller, $action)) {
            $class = $controller::class;
            throw new Exception("{$class} doesn't respond to {$action} action.");
        }

        return $controller->$action(...$parameters);
    }

}
