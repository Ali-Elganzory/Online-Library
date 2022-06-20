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

    /************
     * back button
     ************/

    $('#back-button').on(
        'click',
        function () {
            window.history.back();
        }
    )

    /************
     * favourite button
     ************/

    let favBtn = $('#favourite-btn');
    favBtn.click(function () {
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
        );
    });

    /************
     * review
     ************/

    let rating = parseInt($('#last-rating').text());
    let ratedBefore = rating === -1;
    rating = Math.max(rating, 0);
    let rateBar = $('#rate-bar');

    let activateStars = (n) => {
        for (let i = 1; i <= n; i++) {
            $(`#rate-star-${i}`).addClass('active');
        }
        for (let i = n + 1; i <= 5; i++) {
            $(`#rate-star-${i}`).removeClass('active');
        }
    };

    activateStars(rating);

    for (let i = 1; i <= 5; i++) {
        $(`#rate-star-${i}`)
            .on(
                'mouseenter',
                function (e) {
                    activateStars(i);
                },
            ).on(
            'mouseleave',
            function (e) {
                activateStars(rating);
            },
        ).on(
            'click',
            function (e) {
                rating = i;
                activateStars(rating);
            },
        );
    }

    let reviewBtn = $('#review-btn');
    let reviewBtnLoader = $('#review-btn-loader');
    reviewBtn.on(
        'click',
        async function (e) {
            // show loader
            reviewBtn.attr('disabled');
            reviewBtnLoader.show();

            // update remote
            try {
                await $.ajax(
                    '/api/update_review',
                    {
                        method: 'PUT',
                        data: JSON.stringify({
                            book_id: bookId,
                            rating: rating,
                            text: $('#review-text').val().trim(),
                        }),
                        headers: headers,
                        success: res => {
                            $('#review-failed-msg').hide()
                            $('#review-success-msg').show()
                        },
                        error: res => {
                            $('#review-success-msg').hide()
                            $('#review-failed-msg').show()
                        },
                    }
                );
            } catch (e) {
            }

            // hide loader
            reviewBtn.attr('enabled');
            reviewBtnLoader.hide();
        },
    );

});
