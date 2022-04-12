<?php

// Autoload.
require_once 'vendor/autoload.php';


// Bootstrap.
require_once 'core/bootstrap.php';


// Direct request.
Router::load('routes.php')
    ->direct(
        Request::uri(),
        Request::method()
    );


/**
 *-----------
 * Examples
 *-----------
 *
 * [Database]
 *
 * Book::all();
 * Book::find(2);
 * Book::where('views', '>=', '5')->limit(2)->get();
 *
 * $book->title = 'Hakuna Matata';
 * $book->update();
 * $book->delete();
 *
 * $book->insert();
 *
 * User::find(1)->favourites();
 *
 */

/**
 * ----------------
 * Password Hashes
 * ----------------
 *
 * 123456 => $2y$10$7KzIHMKsqMXdfrbBZtSLyutcBAUMSxmTe/GhYWbLDr3DyioOq9FmG
 * 111111 => $2y$10$fYN3/Wa9GAjTOCTs5vHPKuT8f5.Be6F.qmpUOB0Pp/92HTjz8mlBi
 */