<?php

$router->get('', 'Pages@home');

$router->get('book_details', 'Pages@bookDetails');

$router->get('search_results', 'Pages@search');
$router->post('api/login', 'Authentication@login');
