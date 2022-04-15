<?php

class Book extends Model
{

    public
    function __construct(
        public int    $id,
        public string $title,
        public string $author,
        public string $description,
        public string $image_url,
        public int    $views,
    )
    {
    }

    public
    function incrementViews()
    {
        $this->views += 1;
        $this->update();
    }

    public
    function reviews()
    {
        $reviewsTable = Review::getTableName();
        $usersTable = User::getTableName();
        $usersPrimaryKey = User::primaryKey;

        return static::hasMany(Review::class)
            ->join($usersTable, "{$usersTable}.{$usersPrimaryKey}", '=', "{$reviewsTable}.user_id")
            ->select("SELECT {$reviewsTable}.*, {$usersTable}.username AS user_name, {$usersTable}.image_url AS user_image_url")
            ->get();
    }

}
