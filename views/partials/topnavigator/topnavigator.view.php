<!DOCTYPE html>
<html>

<head>
    <title>Book Search</title>
    <link rel="stylesheet" href="topnavigator.css">
</head>

<body>
<div class="topnav">
    <a href="#books">Books</a>
    <a href="#favourites">Favourites</a>
    <a class="active" href="#favourites">Find Book</a>

    <div style="width: 30px; height: 30px;float: right; padding: 5px">
        <input class="icons" type="image" src="../../../assets/png-clipart-computer-icons-hamburger-button-dots-kebab-menu-text-rectangle-thumbnail.png" alt="Search">
    </div>
    <div style="width: 30px; height: 30px;float: right; padding: 5px">
        <input class="icons" type="image" src="../../../assets/index.png" alt="Search">
    </div>

    <form action="search_books.php">
        <input type="search" placeholder="Find Book..." name="book-search" id="bsearch">
        <input type="image" src="../../../assets/search-icon-svg-28.png" alt="Search">
    </form>
</div>


</body>

</html>