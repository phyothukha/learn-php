<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <?php // if(true): ?>
        <h1>It is true</h1>
    <?php //else:?>
    <h1>It is not true</h1>
    <?php // endif;?>
<pre>
    <?php
    $fruits=array("apple","orange","grape","banana","mango");

    ?>

    <ul>
<?php foreach($fruits as $fruit ):?>
    <li><?= $fruit ?></li>
    <?php endforeach ?>

    </ul>
</pre>

</body>
</html>