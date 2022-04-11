<?php

class App
{

    protected static array $registry = [];

    public static function bind(string $key, $value)
    {
        self::$registry[$key] = $value;
    }


    public static function get(string $key)
    {
        if (!array_key_exists($key, self::$registry)) {
            throw new Exception("No \"{$key}\" is bound in the container.");
        }

        return self::$registry[$key];
    }
}
