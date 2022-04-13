<!DOCTYPE html>
<html>
<head>

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>

</head>
<body>
<?php require 'views/partials/topnavigator/topnavigator.view.php'; ?>
<div style="padding: 100px">
    <?php foreach ($books as $book):
        require 'views/partials/bookcard/bookcard.view.php';
    endforeach; ?>
</div>
</body>
</html>