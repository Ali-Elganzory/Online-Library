<?php

class Favourites
{

    public
    function toggleFavourite()
    {
        $userId = 2;
        $bookId = 2;

        $result = User::find($userId)->toggleFavourite($bookId);

        $data =
            [
                'succeeded' => $result
            ];

        return json($data);
    }

}