<?php

$book = new Book(
    id: 1,
    title: "1984",
    author: "George Orwell",
    description: "Black black black black black black black black black black black",
    imageUrl: "https://mir-s3-cdn-cf.behance.net/project_modules/disp/8bc21955316461.59b89b39bc96d.jpg",
    favourite: false,
    views: 12,
);

require 'views/book_details/book_details.view.php';
