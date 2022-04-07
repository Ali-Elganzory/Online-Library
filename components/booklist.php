<!DOCTYPE html>
<html>
<body>
    <div class="grid-container">
        <?php foreach ($books as $book): ?>
            <div class="grid-image">
                <img src="<?php echo $book->imageUrl; ?>" />
            </div>
            <div class="grid-text">
                <p>
                    <strong> <?php echo $book->title ?></strong>
                    <br>
                    <?php echo $book->description?>
                </p>
            </div>
        <?php endforeach;?>
    </div>


</body>
</html>
