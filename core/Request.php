<?php

class Request
{

    public static function uri(): string
    {
        $request_url = parse_url($_SERVER['REQUEST_URI']);
        return trim($request_url['path'], '/');
    }

    public static function method(): string
    {
        return $_SERVER['REQUEST_METHOD'];
    }
}
