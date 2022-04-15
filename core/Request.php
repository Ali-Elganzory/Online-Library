<?php

class Request
{
    public
    static User $user;

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
        return $_SERVER[strtoupper("HTTP_{$name}")];
    }

    public
    static function payload()
    {
        return json_decode(file_get_contents('php://input'));
    }

    public
    static function token(): false|string
    {
        $uri = static::uri();

        // API
        if (str_starts_with($uri, 'api/')) {
            $authHeader = Request::header('Authorization');

            if ($authHeader == null) {
                return false;
            }

            return preg_split("/^( *bearer +)/i", $authHeader)[1] ?? false;
        }

        // Pages
        return $_COOKIE["token"] ?? false;
    }

    public
    static function isSelfReferred(): bool
    {
        if (!array_key_exists("HTTP_REFERER", $_SERVER)) {
            return false;
        }

        $refererUrl = parse_url($_SERVER["HTTP_REFERER"]);
        return $refererUrl != null && "{$refererUrl['host']}:{$refererUrl['port']}" == $_SERVER["HTTP_HOST"];
    }
}
