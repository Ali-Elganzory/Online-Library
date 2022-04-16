<!DOCTYPE html>
<htm>
    <head>
        <link rel="stylesheet" href="views/partials/bookcard/bookcard.css">
    </head>
    <body>
    <div class="book-card">
        <div class="card-btn" onclick="location.href='/book_details/<?= $book->id ?>'">
        </div>
        <div class="book-interface">
            <div class="book-image">
                <img src=<?=$book->image_url?>>
            </div>
            <div class="book-info">
                <div class="book-title"><?= $book->title ?></div>
                <div class="book-description"><?php
                    $data = $book->description;
                    if (strlen($data) > 132) {
                        $data = substr($data, 0, 132) . '...';
                    }
                    echo $data;
                    ?>
                </div>
            </div>
        </div>
    </div>

    </body>
</htm>