<?php

class Reviews
{

    public
    function userReview()
    {
        $book_id = Request::payload()->book_id;
        $result = Authentication::$user->bookReview($book->id);

        $data =
            [
                'succeeded' => $result
            ];

        return json($data, $result ? 200 : 500);
    }

    public
    function updateReview(): bool
    {
        $user = Authentication::$user;
        $payload = Request::payload();
        $bookId = Request::payload()->book_id;

        $payload->id = 0;
        $payload->user_id = $user->id;
        $payload->updated_at = date('Y-m-d H-i-s');

        $review = new Review(...(array)$payload);

        $result = false;
        if (!$user->hasReviewed($bookId)) {
            $result = $review->insert();
        } else {
            $review->id = Authentication::$user->bookReview($bookId)->id;
            $result = $review->update();
        }

        $data =
            [
                'succeeded' => $result
            ];

        return json($data, $result ? 200 : 500);
    }

}