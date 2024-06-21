<?php
$conn = mysqli_connect("localhost", "ptk", "21934576", "phyrous_shop");

if (!$conn) {
    die(mysqli_connect_errno());
}

$sql = "SELECT * FROM products";
$query = mysqli_query($conn, $sql);

?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <h1>Create Product</h1>
    <form action="./save.php" method="post">
        <input type="text" name="name" placeholder="Enter Name" required>
        <input type="text" name="price" placeholder="Enter Price" required>
        <input type="number" name="stock" required placeholder="Enter Stock">
        <button>Create</button>

    </form>
    <br>
    <br>
    <br>

    <table>

        <thead>
            <tr>
                <th>#</th>
                <th>name</th>
                <th>price</th>
                <th>stock</th>
                <th>Date</th>
                <th>action</th>
            </tr>
        </thead>
        <tbody>
            <?php while ($row = mysqli_fetch_assoc($query)) : ?>
                <tr>
                    <td><?= $row['id'] ?></td>
                    <td><?= $row['name'] ?></td>
                    <td><?= $row['price'] ?></td>
                    <td><?= $row['stock'] ?></td>
                    <td><?= $row['created_at'] ?></td>
                    <td>
                        <a href="./edit.php?row_id=<?= $row["id"] ?>">
                            Update
                        </a>
                        |
                        <a onclick="return confirm('are u sure u want to delete this row?')" href="./delete.php?row_id=<?= $row['id'] ?>">
                            Delete
                        </a>
                    </td>
                </tr>
            <?php endwhile; ?>
        </tbody>
    </table>

</body>

</html>