<!DOCTYPE html>
<html>
<head>
    <link rel="stylesheet" href="search_results.css">
</head>
<body>
<div>

    <?php foreach ($books as $book):
        require 'components/bookcard/bookcard.view.php';
    endforeach;?>
</div>
</body>
</html>