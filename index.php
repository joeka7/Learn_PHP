<?php
session_start();
if (!isset($_SESSION['login'])) {
    header("location: login.php");
}
$connection = mysqli_connect(hostname: "localhost", username: "root", password: "", database: "backend2026");
$query = mysqli_query($connection, query: "SELECT * FROM `users`");
$result = mysqli_fetch_all($query, MYSQLI_ASSOC);
?>

<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@anyblades/blades@2/css/blades.min.css">
    <title>Users Table Page</title>
</head>
<body>
    <h1>USERS TABLE</h1>
    <table border="1">
        <tr>
            <th><b>ID</b></th>
            <th><b>NAME</b></th>
            <th><b>EMAIL</b></th>
            <th><b>PASSWORD</b></th>
            <th><b>EDIT</b></th>
            <th><b>DELETE</b></th>
        </tr>
        <?php
        for ($i = 0; $i < count($result); $i++) {?>
        <tr>
            <td><?= $result[$i]['id'] ?></td>
            <td><?= $result[$i]['name'] ?></td>
            <td><?= $result[$i]['email'] ?></td>
            <td><?= $result[$i]['password'] ?></td>
            <td><a href="edit.php?id=<?= $result[$i]['id'] ?>">Edit</a></td>
            <td><a href="delete.php?id=<?= $result[$i]['id'] ?>">Delete</a></td>
        </tr>
        <?php } ?>
    </table>
    <a class="btn" href="add.php">ADD USER</a>
    <a href="logout.php">LOG OUT</a>
</body>
</html>