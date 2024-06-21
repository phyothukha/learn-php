<?php
$conn = mysqli_connect("localhost", "ptk", "21934576", "phyrous_shop");

if (!$conn) {
    die(mysqli_connect_errno());
}

$id = $_GET['row_id'];

$sql = "SELECT * FROM products where id= $id";
$query = mysqli_query($conn, $sql);
$row = mysqli_fetch_assoc($query);
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>

    <form action="./update.php" method="post">
        <input type="hidden" name="row_id" value="<?= $row['id'] ?>">
        <input type="text" name="name" value="<?= $row["name"] ?>" required placeholder="Enter name">
        <input type="text" name="price" value="<?= $row["price"] ?>" required placeholder="Enter price">
        <input type="number" name="stock" required value="<?= $row['stock'] ?>" placeholder="Enter stock">
        <button type="submit">update</button>

    </form>

</body>

</html>