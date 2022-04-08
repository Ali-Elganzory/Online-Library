<?php


class Connection
{

    public static function make(array $config): PDO
    {
        try {
            return new PDO(
                $config["connection"] . ";dbname=" . $config["name"],
                $config["username"],
                $config["password"],
                $config["options"],
            );
        } catch (PDOException $e) {
            die("Couldn't connect to db. :::: {$e->getMessage()}");
        }
    }

}