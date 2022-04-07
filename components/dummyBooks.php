<?php

require '../models/Book.php';

$books = [
    new Book('Lorem Ipsum', 'Is Lorem Ipsum real?', '../assets/Image 1.png', false),
    new Book('Lorem Ipsum', 'Is Lorem Ipsum real?', '../assets/Image 1.png', false),
    new Book('Lorem Ipsum', 'Is Lorem Ipsum real?', '../assets/Image 1.png', false),
    new Book('Lorem Ipsum', 'Is Lorem Ipsum real?', '../assets/Image 1.png', false),
    new Book('Lorem Ipsum', 'Is Lorem Ipsum real?', '../assets/Image 1.png', false)
];

require 'booklist.php';