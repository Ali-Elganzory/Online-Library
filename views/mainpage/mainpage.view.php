<!DOCTYPE html>
<html>
<head>
    <link rel="stylesheet" href="booklist.css">
</head>
<body>
<?php require 'components/topnavigator.view.php';?>
<div>
    <?php foreach ($books as $book):
        require 'components/bookcard/bookcard.view.php';
    endforeach;?>
</div>
</body>
</html>