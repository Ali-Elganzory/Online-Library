<?php


function view(string $name, array $data = [])
{
    extract($data);

    return require "views/{$name}/{$name}.view.php";
}

function redirect(string $path)
{
    header("Location: /{$path}");
}

function json(mixed $data): bool|string
{
    return json_encode(match (gettype($data)) {
        'array', 'string' => $data,
        'boolean' => var_export($data, true),
        default => (array)$data,
    });
}

function dd(mixed $data)
{
    var_dump($data);
    die();
}