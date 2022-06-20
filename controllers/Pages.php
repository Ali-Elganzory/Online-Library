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
        # If user is admin, redirect to dashboard.
        if (Request::$user->is_admin) {
            return $this->dashboardItems();
        }

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

    public
    function dashboardItems()
    {
        # If user is not admin, redirect to home.
        if (!Request::$user->is_admin) {
            return $this->home();
        }

        $books = Book::all();
        $users = User::all();
        return view("admin_panel", compact('books', 'users'));
    }

    public
    function searchDashboard()
    {
        # If user is not admin, redirect to home.
        if (!Request::$user->is_admin) {
            return $this->home();
        }

        $title = $_GET["searchtitle"];
        $books = Book::where('title', 'like', "%{$title}%")
            ->get();

        return view('admin_panel', compact('books'));
    }

    public
    function testt()
    {
        echo '<script>console.log("henlo")</script>';
        dd("hello");
    }

    public
    function changeBookPic(int $id)
    {

        $error = $_FILES["image"]["error"];
        if ($error == UPLOAD_ERR_OK) {
            $name = $_FILES["image"]["name"][$key];
            $name = explode("_", $name);
            $imagename = '';
            foreach ($name as $letter) {
                $imagename .= $letter;
            }

            move_uploaded_file($_FILES["image"]["tmp_name"][$key], "public/book_images/" . $imagename);

            return json([
                    'image_url' => $_SERVER['HTTP_REFERER'] . "/public/book_images/" . $imagename]
            );
        }
    }

    public
    function changeProfilePic(int $id)
    {
        $image_url = Request::payload()->image_url;
        $user = User::find($id);
        $user->image_url = $image_url;
        $user->update();
    }


}