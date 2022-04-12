<?php


class Book extends Model
{

    public function __construct(
        public int    $id,
        public string $title,
        public string $author,
        public string $description,
        public string $image_url,
        public int    $views,
        public bool   $favourite = false,
    )
    {
    }

    public static array $columns = [
        'title',
        'author',
        'description',
        'image_url',
        'views',
    ];

}
