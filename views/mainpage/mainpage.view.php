<!DOCTYPE html>
<html>
<head>
    <link rel="stylesheet" href="booklist.css">
</head>
<body>
<?php require 'partials/topnavigator.view.php';?>
<div>
    <?php foreach ($books as $book):
        require 'partials/bookcard/bookcard.view.php';
    endforeach;?>
</div>
</body>
</html>