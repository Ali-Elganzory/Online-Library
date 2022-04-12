<?php

$router->get('', 'Pages@bookDetails');

$router->get('book_details', 'Pages@bookDetails');

$router->post('api/login', 'Authentication@login');
