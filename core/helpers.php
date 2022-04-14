<?php


function view(string $name, array $data = [])
{
    extract($data);

    return require "views/{$name}/{$name}.view.php";
}

function redirect(string $path, bool $permanent = false)
{
    $responseCode = $permanent ? 301 : 302;
    $host = $_SERVER['HTTP_HOST'];
    header("Location: http://{$host}{$path}", true, $responseCode);
    exit;
}

function json(mixed $data, int $statusCode = 200): bool|string
{
    http_response_code($statusCode);
    header('Content-Type: application/json');
    $encoded = json_encode(match (gettype($data)) {
        'array', 'string' => $data,
        'boolean' => var_export($data, true),
        default => (array)$data,
    });

    echo $encoded;

    return $encoded;
}

function dd(mixed $data)
{
    var_dump($data);
    die();
}