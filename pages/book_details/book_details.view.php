<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Test</title>

    <link rel="stylesheet" href="book_details.css">

</head>

<body>

<div id="full-size" class="grid-container">

    <div class="left-column">
        <svg id="back-button" xmlns="http://www.w3.org/2000/svg" width="48" height="48" viewBox="0 0 50.483 50.483">
            <title>Back</title>
            <path id="Icon_awesome-arrow-alt-circle-left" data-name="Icon awesome-arrow-alt-circle-left"
                  d="M25.8,51.045A25.241,25.241,0,1,1,51.045,25.8,25.237,25.237,0,0,1,25.8,51.045ZM37.61,21.326H25.8V14.109a1.222,1.222,0,0,0-2.086-.865L12.084,24.939a1.21,1.21,0,0,0,0,1.72L23.717,38.353a1.221,1.221,0,0,0,2.086-.865V30.282H37.61a1.225,1.225,0,0,0,1.221-1.221V22.547A1.225,1.225,0,0,0,37.61,21.326Z"
                  transform="translate(-0.563 -0.563)" fill="#fff"/>
        </svg>
    </div>

    <div class="right-column">
        <div id="book-column">
            jfdsbcjsdfb
        </div>
    </div>

    <img id="book-cover" src="<?= $book->imageUrl ?>" alt="No image">

</div>


</body>

</html>