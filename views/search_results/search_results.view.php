<!DOCTYPE html>
<html>
<head>
    <link rel="stylesheet" href="/public/css/search_results.css">
</head>
<body>
<p> These are search results for "<?=$title?>"</p>
<div style="padding: 100px">
    <?php foreach ($books as $book):
        require 'views/partials/bookcard/bookcard.view.php';
    endforeach;?>
</div>
</body>
</html>