<?php

class Book
{
    public function __construct(
        public string $title,
        public string $description,
        public string $imageUrl,
        public bool   $favourite,
        public int    $views,
    )
    {
    }
}