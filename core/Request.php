<?php

class Request
{

    public
    static function uri(): string
    {
        $request_url = parse_url($_SERVER['REQUEST_URI']);
        return trim($request_url['path'], '/');
    }

    public
    static function method(): string
    {
        return $_SERVER['REQUEST_METHOD'];
    }

    public
    static function header(string $name)
    {
        return $_SERVER[$name];
    }

    public
    static function payload()
    {
        return file_get_contents('php://input');
    }
}
