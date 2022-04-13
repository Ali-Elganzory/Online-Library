<?php

$router->get('', 'Pages@home');

$router->get('book_details/{id}', 'Pages@bookDetails');

$router->get('search_results', 'Pages@search');

$router->post('api/login', 'Authentication@login');

$router->post('api/register', 'Authentication@register');

$router->get('login', 'Pages@login');