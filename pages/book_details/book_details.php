<?php

require_once '../../models/Book.php';

$book = new Book(
    title: "1984",
    description: "Black black black black black black black black black black black",
    imageUrl: "https://mir-s3-cdn-cf.behance.net/project_modules/disp/8bc21955316461.59b89b39bc96d.jpg",
    favourite: false,
);

require 'book_details.view.php';