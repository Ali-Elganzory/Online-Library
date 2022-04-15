<?php

class Review extends Model
{

    public
    function __construct(
        public int     $id,
        public int     $user_id,
        public int     $book_id,
        public int     $rating,
        public string  $text,
        public string  $updated_at,
        public ?string $user_image_url = null,
        public ?string $user_name = null,
    )
    {
    }

    protected static ?array $columns = [
        'user_id',
        'book_id',
        'rating',
        'text',
        'updated_at',
    ];

}