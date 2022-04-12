<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title><?= $book->title ?></title>

    <link rel="stylesheet" href="/views/book_details/book_details.css">

</head>

<body>

<div id="book_details_page">
    <div class="height-max width-max row cross-stretch">
        <div class="bg-primary-color flex-4">
            <svg class="mt-4 ml-4" xmlns="http://www.w3.org/2000/svg" width="50.483" height="50.483"
                 viewBox="0 0 50.483 50.483">
                <path id="Icon_awesome-arrow-alt-circle-left" data-name="Icon awesome-arrow-alt-circle-left"
                      d="M25.8,51.045A25.241,25.241,0,1,1,51.045,25.8,25.237,25.237,0,0,1,25.8,51.045ZM37.61,21.326H25.8V14.109a1.222,1.222,0,0,0-2.086-.865L12.084,24.939a1.21,1.21,0,0,0,0,1.72L23.717,38.353a1.221,1.221,0,0,0,2.086-.865V30.282H37.61a1.225,1.225,0,0,0,1.221-1.221V22.547A1.225,1.225,0,0,0,37.61,21.326Z"
                      transform="translate(-0.563 -0.563)" fill="#fff"/>
            </svg>
        </div>
        <div class="flex-7"></div>
    </div>

    <div class="absolute height-max-finite width-max row cross-stretch mv-6">
        <div class="flex-1"></div>
        <div class="flex-3">
            <img class="width-max height-max box-fit-cover" style="width: 100%"
                 src="<?= $book->image_url ?>"
                 alt="Sorry, no cover at the time 😊.">
        </div>
        <div class="flex-6">
            <div class="column cross-stretch ph-6">
                <div class="row cross-center">
                    <div>
                        <svg xmlns="http://www.w3.org/2000/svg" width="31.5" height="36" viewBox="0 0 31.5 36">
                            <path id="Icon_awesome-share-alt" data-name="Icon awesome-share-alt"
                                  d="M24.75,22.5a6.721,6.721,0,0,0-4.2,1.469l-7.206-4.5a6.789,6.789,0,0,0,0-2.931l7.206-4.5A6.738,6.738,0,1,0,18.16,8.215l-7.206,4.5a6.75,6.75,0,1,0,0,10.562l7.206,4.5A6.751,6.751,0,1,0,24.75,22.5Z"
                                  fill="#6c63ff"/>
                        </svg>
                    </div>
                    <div class="w-4 content-center">
                        <svg xmlns="http://www.w3.org/2000/svg" width="2" height="40" viewBox="0 0 2 40">
                            <line id="Line_4" data-name="Line 4" y2="40" transform="translate(1)" fill="none"
                                  stroke="#707070" stroke-width="2"/>
                        </svg>
                    </div>
                    <div class="text-center">
                        <p>views</p>
                        <p><?= $book->views ?></p>
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
                <h3 class="pt-2">Description</h3>
                <p><?= $book->description ?></p>
            </div>
        </div>
    </div>

</div>


</body>

</html>