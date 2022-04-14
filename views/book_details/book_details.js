$(document).ready(function () {

    // get token
    const token = Cookies.get('token');
    const headers = {
        "Authorization": `Bearer ${token}`,
        "Content-Type": "application/json",
        "Accept": "application/json",
    }

    // get book id
    const bookId = $(location).attr('href').split('/').at(-1);

    // favourite button
    let fav_btn = $('#favourite-btn');
    fav_btn.click(function () {
        // animate icon
        $(this).toggleClass('active');
        // update remote
        $.ajax(
            '/api/toggle_favourite',
            {
                method: 'POST',
                data: JSON.stringify({
                    'book_id': bookId,
                }),
                headers: headers,
                success: res => {
                    console.log(res);
                },
            }
        )
    });

});