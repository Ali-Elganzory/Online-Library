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