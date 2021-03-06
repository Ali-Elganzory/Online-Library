<?php

class User extends Model
{

    public
    function __construct(
        public int    $id,
        public string $username,
        public string $password,
        public string $image_url,
        public bool   $is_admin,
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

    public
    function toggleFavourite(mixed $bookId): bool
    {
        if ($this->isFavourite($bookId)) {
            return UserFavourite::where('user_id', '=', $this->id)
                ->where('book_id', '=', $bookId)
                ->get()[0]
                ->delete();
        }

        return (new UserFavourite(0, $this->id, $bookId))->insert();
    }

    public
    function isFavourite(mixed $bookId): bool
    {
        return UserFavourite::where('user_id', '=', $this->id)
            ->where('book_id', '=', $bookId)
            ->exists();
    }

    public
    function hasReviewed(mixed $bookId): bool
    {
        return Review::where('user_id', '=', $this->id)
            ->where('book_id', '=', $bookId)
            ->exists();
    }

    public
    function bookReview(mixed $bookId): false|Review
    {
        $result = Review::where('user_id', '=', $this->id)
            ->where('book_id', '=', $bookId)
            ->get();

        if ($result == false) {
            return false;
        }

        return $result[0];
    }


    /**
     * @return Book[]
     * @throws Exception
     */
    public
    function recommendedBooks()
    {
        $result = QueryBuilder::table('books')
            ->select('SELECT books.*')
            ->join('recommendations AS r', 'r.book_id', '=', 'books.id')
            ->where('r.user_id', '=', "{$this->id}")
            ->get();

        if ($result == false) {
            return [];
        }

        return $result;
    }

}