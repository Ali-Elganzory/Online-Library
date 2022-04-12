<!DOCTYPE html>
<html>
    <head>
        <link rel="stylesheet" href="booklist.css">
    </head>
    <body>
        <div>
            <?php foreach ($books as $book):
                require '../bookcard/bookcard.view.php';
            endforeach;?>
        </div>
    </body>
</html>
