<?php

class UserFavourite extends Model
{

    public
    function __construct(
        public int $id,
        public int $user_id,
        public int $book_id,
    )
    {
    }

}