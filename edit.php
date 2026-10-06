<?php
session_start();
if (!isset($_SESSION['login']) || $_SESSION['login']['admin'] == 0) {
    header("location: login.php");
}
if (isset($_SESSION['error'])) {
    echo $_SESSION['error'];
}
$id = $_GET['id'];
$connection = mysqli_connect(hostname: "localhost", username: "root", password: "", database: "backend2026");
$query = mysqli_query($connection, query: "SELECT * FROM `users` WHERE `id` = $id");
$result = mysqli_fetch_assoc($query);
?>

<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@anyblades/blades@2/css/blades.min.css">
    <title>Edit User Page</title>
</head>
<body>
    <h1>EDIT USER</h1>
    <form action="update.php" method="post">
        <input type="hidden" name="id" value="<?= $result['id'] ?>">
        <input type="text" name="name" value="<?= $result['name'] ?>">
        <input type="text" name="email" value="<?= $result['email'] ?>">
        <input type="text" name="password" value="<?= $result['password'] ?>">
        <button value="submit">UPDATE USER</button>
    </form>
    <a href="index.php">BACK</a>
</body>
</html>