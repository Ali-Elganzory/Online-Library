<?php

class Pages
{

    public
    function bookDetails(int $id)
    {
        $user = Authentication::$user;
        $book = Book::find($id);
        $isFavourite = $user->isFavourite($book->id);
        $userReview = $user->bookReview($book->id);
        $bookReviews = array_filter($book->reviews(), fn($e) => $e->user_id != $user->id);
        $isSelfReferred = Request::isSelfReferred();

        $book->incrementViews();

        return view(
            'book_details',
            compact(
                'book',
                'isFavourite',
                'userReview',
                'bookReviews',
                'isSelfReferred',
            ));
    }

    public
    function notFound()
    {
        return view('not_found');
    }

    public
    function home()
    {
        $books = Book::all();

        return view('mainpage', compact('books'));
    }

    public
    function search()
    {
        $title = $_GET["searchtitle"];
        $books = Book::where('title', 'like', "%{$title}%")
            ->get();

        return view('search_results', compact('books'));
    }

    public
    function login()
    {
        return view('loginpage');
    }
}