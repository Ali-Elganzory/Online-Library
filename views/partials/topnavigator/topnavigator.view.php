<link rel="stylesheet" href="components/topnavigator/topnavigator.css">
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

    <form action="/search_results" method="get">
        <input type="search" placeholder="Find Book..." name="searchtitle" id="bsearch">
        <input type="image" src="../../assets/search-icon-svg-28.png" alt="Search">
    </form>
</div>
