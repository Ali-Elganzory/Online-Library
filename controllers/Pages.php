<?php

class Pages
{

    public
    function login()
    {
        return view('loginpage');
    }

    public
    function home()
    {
        $books = Book::all();
        $recommendedBooks = Authentication::$user->recommendedBooks();

        return view('mainpage', compact('books', 'recommendedBooks'));
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

}