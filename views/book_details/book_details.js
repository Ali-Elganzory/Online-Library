$(document).ready(function () {
    const bookId = window.location.pathname.split('/').at(-1);

    // favourite button
    let fav_btn = $('#favourite-btn');
    fav_btn.click(function () {
        // animate icon
        $(this).toggleClass('active');
        // update remote
        $.post(
            '/api/toggle_favourite',
            {
                'book_id': bookId,
            },
            r => {
                console.log(r);
            }
        )
    });

});