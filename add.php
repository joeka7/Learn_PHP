<?php
session_start();
if (!isset($_SESSION['login'])) {
    header("location: login.php");
}
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    if ($_POST['name'] !== '' && $_POST['email'] !== 'email' && $_POST['password']) {
        $name = $_POST['name'];
        $email = $_POST['email'];
        $password = $_POST['password'];
        $connection = mysqli_connect(hostname: "localhost", username: "root", password: "", database: "backend2026");
        mysqli_query($connection, query: "INSERT INTO `users` (`name`, `email`, `password`) VALUES ('$name', '$email', '$password')");
        if (mysqli_affected_rows($connection) > 0) {
            header("location: index.php");
        };
    } else {
        echo 'PLEASE ADD VALUE';
    }
}
?>

<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Create User Page</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@anyblades/blades@2/css/blades.min.css">
</head>
<body>
    <h1>CREATE USER</h1>
    <form action="add.php" method="post">
        <input type="text" name="name" placeholder="Add The Name">
        <input type="text" name="email" placeholder="Add The Email">
        <input type="text" name="password" placeholder="Add The Password">
        <button type="submit">ADD USER</button>
    </form>
</body>
</html>