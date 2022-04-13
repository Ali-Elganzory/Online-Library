<?php

class Pages
{

    public
    function bookDetails(int $id)
    {
        $book = Book::find($id);

        return view('book_details', compact('book'));
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
        $title=$_GET["searchtitle"];
        $books = Book::where('title','like',"%{$title}%")
        ->get();

        return view('search_results', compact('books'));
    }
}