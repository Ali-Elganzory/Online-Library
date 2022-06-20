function fav(id) {
    $.post(
        '/api/toggle_favourites',
        {
            'book_id': id,
        },
        (res) => {
            console.log(res);
        }
    );

    let heart = document.getElementById(id);
    if (heart.style.fill === "red") {
        heart.style.fill = "white";
        heart.style.stroke = "gray";
    } else {
        heart.style.fill = "red";
        heart.style.stroke = "white";
    }
}