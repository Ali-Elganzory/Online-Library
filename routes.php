<?php

// Pages
$router->get('', 'Pages@home');
$router->get('login', 'Pages@login');
$router->get('search_results', 'Pages@search');
$router->get('book_details/{id}', 'Pages@bookDetails');
$router->get('dashboard', 'Pages@dashboardItems');

// API
$router->post('api/login', 'Authentication@login');
$router->post('api/register', 'Authentication@register');
$router->post('api/toggle_favourite', 'Favourites@toggleFavourite');
$router->put('api/update_review', 'Reviews@updateReview');
$router->post('api/changeBookPic/{id}', 'Pages@changeBookPic');
$router->post('api/testt', 'Pages@testt');
