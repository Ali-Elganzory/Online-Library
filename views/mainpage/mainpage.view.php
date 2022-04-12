<!DOCTYPE html>
<html>
<head>
    <link rel="stylesheet" href="booklist.css">
</head>
<body>
<?php require 'views/partials/topnavigator/topnavigator.view.php';?>
<div style="padding: 100px">
    <?php foreach ($books as $book):
        require 'views/partials/bookcard/bookcard.view.php';
    endforeach;?>
</div>
</body>
</html>