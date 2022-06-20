<!DOCTYPE html>
<html>
<head>

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>

    <link rel="stylesheet" href="/public/css/styles.css">

</head>
<body>

<?php require 'views/partials/topnavigator/topnavigator.view.php'; ?>

<div class="column mh-3 mb-2">

    <h3 class="mv-2">Recommended for you</h3>
    <div class="row main-space-4">
        <?php foreach ($recommendedBooks as $book):
            require 'views/partials/bookcard/bookcard.view.php';
        endforeach; ?>
    </div>

    <div class="h-2"></div>

    <h3 class="mv-2">All books</h3>
    <div class="row main-space-4">
        <?php foreach ($books as $book):
            require 'views/partials/bookcard/bookcard.view.php';
        endforeach; ?>
    </div>

</div>

</body>
</html>