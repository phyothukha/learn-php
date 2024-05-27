<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    
<h3>Testing server is running</h3>


<?php
$products=[
    [
        "id"=>1,
        "name"=>"apple",
        "price"=>300
    ],
    [
        "id"=>2,
        "name"=>"orange",
        "price"=>400
    ],
    [
        "id"=>3,
        "name"=>"grape",
        "price"=>200
]

]


?>

<?php foreach($products as $product): ?>
    <div>
        <h1><?= $product["name"]; ?></h1>
        
        <span><?=$product["price"]; ?></span>
        <hr>
    </div>

    <?php endforeach; ?>


</body>
</html>