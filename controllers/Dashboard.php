<?php

class Dashboard
{

    public
    function nextBooks(int $loaded){
        $loaded = $loaded + 21;
        $upperLimit = $loaded + 21;
        $books = Book::where('id','>', "{$loaded}")->get()
        and Book::where('id','<', "{$upperLimit}")->get();

        return view("admin_panel", compact('books'));
    }
    public
    function prevBooks(int $loaded){
        $lowerLimit = $loaded - 21;
        $books = Book::where('id','>', "{$lowerLimit}")->get()
        and Book::where('id','<', "{$loaded}")->get();
        $loaded = $lowerLimit;
        return view("admin_panel", compact('books'));
    }
}