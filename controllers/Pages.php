<?php

class Pages
{

    public
    function bookDetails()
    {
        $book = Book::find(1);

        return view('book_details', compact('book'));
    }

    public
    function notFound()
    {
        return view('not_found');
    }

}