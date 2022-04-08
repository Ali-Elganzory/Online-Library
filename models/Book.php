<?php


class Book
{

    public function __construct(
        public int    $id,
        public string $title,
        public string $author,
        public string $description,
        public string $imageUrl,
        public bool   $favourite,
        public int    $views,
    )
    {
    }


    public static function fromPDO(stdClass $object): Book
    {
        return new Book(
            $object['id'],
            $object['title'],
            $object['author'],
            $object['description'],
            $object['imageUrl'],
            $object['favourite'],
            $object['views'],
        );
    }

}