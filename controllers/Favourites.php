<?php

class Favourites
{

    public
    function toggleFavourite(): bool|string
    {
        $payload = Request::payload();
        $bookId = $payload->book_id;

        $result = User::find(Authentication::$user->id)->toggleFavourite($bookId);

        $data =
            [
                'succeeded' => $result
            ];

        return json($data, $result ? 200 : 500);
    }

}