<?php 



?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body style="margin-left: 5VW;margin-right: 5VW;">
<?php foreach($wikis as $wiki) : ?>
    <h1>
        <?php echo $wiki->getTitle(); ?>
    </h1>

    <p>
    <?php echo $wiki->getContent(); ?>
    </p>
    <?php endforeach; ?>
</body>
</html>