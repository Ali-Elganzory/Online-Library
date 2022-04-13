<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title><?= $book->title ?></title>

    <link rel="stylesheet" href="/views/book_details/book_details.css">
    <script type="application/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <script type="application/javascript" src="/views/book_details/book_details.js"></script>

</head>

<body>

<div id="book_details_page">

    <div class="height-max width-max row cross-stretch">

        <!-- Reviews column -->
        <div class="bg-primary flex-3 column cross-center">

            <div class="mt-2 mb-1 text-md text-white">Your voice shall be heard</div>

            <div class="rounded-1 w-20 mb-1 p-1 bg-light-primary">
                <div class="column">
                    <div class="row">
                        <div class="flex-1"></div>
                        <div>
                            <?php foreach ([1, 2, 3, 4] as $i): ?>
                                <svg class="pr-0-5" xmlns="http://www.w3.org/2000/svg" width="22.615" height="25.474"
                                     viewBox="0 0 26.615 25.474">
                                    <path id="Icon_awesome-star" data-name="Icon awesome-star"
                                          d="M13.321.885,10.073,7.472,2.8,8.532a1.593,1.593,0,0,0-.881,2.716l5.258,5.124L5.939,23.61a1.591,1.591,0,0,0,2.308,1.677l6.5-3.418,6.5,3.418A1.592,1.592,0,0,0,23.56,23.61l-1.244-7.238,5.258-5.124a1.593,1.593,0,0,0-.881-2.716l-7.268-1.06L16.177.885a1.593,1.593,0,0,0-2.856,0Z"
                                          transform="translate(-1.441 0.001)" fill="#ffc02d"/>
                                </svg>
                            <?php endforeach; ?>
                            <?php foreach ([5] as $i): ?>
                                <svg xmlns="http://www.w3.org/2000/svg" width="22.583" height="24.231"
                                     viewBox="0 0 30.583 29.231">
                                    <path id="Icon_feather-star" data-name="Icon feather-star"
                                          d="M16.791,3l4.262,8.633,9.53,1.393-6.9,6.716,1.627,9.488-8.523-4.482L8.268,29.231,9.9,19.743,3,13.026l9.53-1.393Z"
                                          transform="translate(-1.5 -1.5)" fill="none" stroke="#ffc02d"
                                          stroke-linecap="round" stroke-linejoin="round" stroke-width="3"/>
                                </svg>
                            <?php endforeach; ?>
                        </div>
                        <div class="flex-1"></div>
                    </div>

                    <textarea placeholder="What do you think?" rows="4" class="p-1 mv-1 text-sm rounded-0-5 bg-white no-resize border-0 text-color"></textarea>

                    <button class="h-3 rounded-0-5 border-0 bg-primary elevation-1 text-white">review</button>
                </div>
            </div>

            <?php require 'views/partials/review_card/review_card.view.php' ?>
            <?php require 'views/partials/review_card/review_card.view.php' ?>
            <?php require 'views/partials/review_card/review_card.view.php' ?>

        </div>

        <!-- Book details -->
        <div class="flex-7">

            <div class="column cross-stretch ph-6 mt-1">
                <div class="row cross-center">
                    <svg xmlns="http://www.w3.org/2000/svg" width="40" height="40"
                         viewBox="0 0 50.483 50.483">
                        <path id="Icon_awesome-arrow-alt-circle-left" data-name="Icon awesome-arrow-alt-circle-left"
                              d="M25.8,51.045A25.241,25.241,0,1,1,51.045,25.8,25.237,25.237,0,0,1,25.8,51.045ZM37.61,21.326H25.8V14.109a1.222,1.222,0,0,0-2.086-.865L12.084,24.939a1.21,1.21,0,0,0,0,1.72L23.717,38.353a1.221,1.221,0,0,0,2.086-.865V30.282H37.61a1.225,1.225,0,0,0,1.221-1.221V22.547A1.225,1.225,0,0,0,37.61,21.326Z"
                              transform="translate(-0.563 -0.563)" fill="#6C63FF"/>
                    </svg>
                    <div class="w-4"></div>
                    <div>
                        <svg xmlns="http://www.w3.org/2000/svg" width="31.5" height="36" viewBox="0 0 31.5 36">
                            <path id="Icon_awesome-share-alt" data-name="Icon awesome-share-alt"
                                  d="M24.75,22.5a6.721,6.721,0,0,0-4.2,1.469l-7.206-4.5a6.789,6.789,0,0,0,0-2.931l7.206-4.5A6.738,6.738,0,1,0,18.16,8.215l-7.206,4.5a6.75,6.75,0,1,0,0,10.562l7.206,4.5A6.751,6.751,0,1,0,24.75,22.5Z"
                                  fill="#6c63ff"/>
                        </svg>
                    </div>
                    <div class="w-2 content-center">
                        <svg xmlns="http://www.w3.org/2000/svg" width="1.5" height="40" viewBox="0 0 1.5 40">
                            <line id="Line_4" data-name="Line 4" y2="40" transform="translate(1)" fill="none"
                                  stroke="#707070" stroke-width="2"/>
                        </svg>
                    </div>
                    <div class="text-center">
                        views
                        <br>
                        <?= $book->views ?>
                    </div>
                    <h1 class="flex-1 content-center"><?= $book->title ?></h1>
                    <div>
                        <svg xmlns="http://www.w3.org/2000/svg" width="40.944" height="39.369"
                             viewBox="0 0 40.944 39.369">
                            <path id="Icon_ionic-ios-heart" data-name="Icon ionic-ios-heart"
                                  d="M33.3,3.937h-.1a11.2,11.2,0,0,0-9.35,5.118A11.2,11.2,0,0,0,14.5,3.937h-.1A11.128,11.128,0,0,0,3.375,15.059,23.958,23.958,0,0,0,8.08,28.12C14,36.22,23.847,43.306,23.847,43.306S33.689,36.22,39.614,28.12a23.958,23.958,0,0,0,4.7-13.061A11.128,11.128,0,0,0,33.3,3.937Z"
                                  transform="translate(-3.375 -3.938)" fill="#fe7676"/>
                        </svg>
                    </div>
                </div>

                <div class="h-2"></div>

                <div class="flex-1 row">
                    <div>
                        <img class="w-16 box-fit-cover rounded-2" src=<?= $book->image_url ?> alt="">
                    </div>
                    <div class="w-2"></div>
                    <div class="flex-1 cross-start column">
                        <p class="m-0 text-md text-color text-bold">Description</p>
                        <p><?= $book->description ?></p>
                    </div>
                </div>

            </div>
        </div>

    </div>


</div>


</body>

</html>