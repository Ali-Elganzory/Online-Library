<div class="rounded-1 w-20 mb-1 p-1 bg-light-primary column">

    <div class="row">

        <img class="circle w-2 h-2 box-fit-cover"
             src=<?= $review->user_image_url ?> alt="">
        <div class="w-1"></div>

        <div class="column flex-1">
            <div class="row cross-center">
                <p class="m-0 p-0 text-compact"><?= $review->user_name ?></p>
                <div class="flex-1"></div>
                <p class="m-0 p-0 text-compact text-tiny"><?= date("F j, Y, g:i a", strtotime($review->updated_at)) ?></p>
            </div>

            <div class="row">
                <?php for ($i = 1; $i <= $review->rating; ++$i): ?>
                    <svg class="pr-0-5" xmlns="http://www.w3.org/2000/svg" width="16.615" height="25.474"
                         viewBox="0 0 26.615 25.474">
                        <path id="Icon_awesome-star" data-name="Icon awesome-star"
                              d="M13.321.885,10.073,7.472,2.8,8.532a1.593,1.593,0,0,0-.881,2.716l5.258,5.124L5.939,23.61a1.591,1.591,0,0,0,2.308,1.677l6.5-3.418,6.5,3.418A1.592,1.592,0,0,0,23.56,23.61l-1.244-7.238,5.258-5.124a1.593,1.593,0,0,0-.881-2.716l-7.268-1.06L16.177.885a1.593,1.593,0,0,0-2.856,0Z"
                              transform="translate(-1.441 0.001)" fill="#ffc02d"/>
                    </svg>
                <?php endfor; ?>
                <?php for ($i = $review->rating + 1; $i <= 5; ++$i): ?>
                    <svg xmlns="http://www.w3.org/2000/svg" width="16.583" height="26.0"
                         viewBox="0 0 30.583 29.231">
                        <path id="Icon_feather-star" data-name="Icon feather-star"
                              d="M16.791,3l4.262,8.633,9.53,1.393-6.9,6.716,1.627,9.488-8.523-4.482L8.268,29.231,9.9,19.743,3,13.026l9.53-1.393Z"
                              transform="translate(-1.5 -1.5)" fill="none" stroke="#ffc02d"
                              stroke-linecap="round" stroke-linejoin="round" stroke-width="3"/>
                    </svg>
                <?php endfor; ?>
            </div>
        </div>

    </div>
    <p class="mt-0-5 mb-0 text-sm">
        The story is out of this world. Really enjoyed reading every page of it.
    </p>

</div>