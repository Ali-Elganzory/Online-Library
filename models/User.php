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

    public function toggleFavourite(mixed $bookId): bool
    {
        if ($this->isFavourite($bookId)) {
            return UserFavourite::where('user_id', '=', $this->id)
                ->where('book_id', '=', $bookId)
                ->get()[0]
                ->delete();
        }

        return (new UserFavourite(0, $this->id, $bookId))->insert();
    }

    public function isFavourite(mixed $bookId): bool
    {
        return UserFavourite::where('user_id', '=', $this->id)
            ->where('book_id', '=', $bookId)
            ->exists();
    }

}