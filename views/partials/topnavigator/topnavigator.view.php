<link rel="stylesheet" href="views/partials/topnavigator/topnavigator.css">
<div class="topnav">
    <a href="">Books</a>
    <a href="#favourites">Favourites</a>
    <a class="active" href="#favourites">Find Book</a>
    <div style="height: 100%; margin-top: 10px">

        <input class="icons" type="image" src="../../../assets/png-clipart-computer-icons-hamburger-button-dots-kebab-menu-text-rectangle-thumbnail.png" alt="Search">
        <input class="icons" type="image" src="../../../assets/index.png" alt="Search">
        <form action="/search_results" method="get">
            <div style="position: relative; display: flex;">
                <input type="search" placeholder="Find Book..." name="searchtitle" id="bsearch">

                <input id="search-icon" type="image" src="../../assets/search-icon-svg-28.png" alt="Search">
            </div>
        </form>
    </div>

</div>