<?php


$book = Book::selectById(1);


require 'views/book_details/book_details.view.php';
