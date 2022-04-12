<?php

class User extends Model
{

    public
    function __construct(
        public int    $id,
        public string $username,
        public string $password,
        public string $image_url,
    )
    {
    }

    public
    function favourites(): array
    {
        return $this
            ->hasMany(Book::class, UserFavourite::class)
            ->get();
    }

}