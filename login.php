<?php
session_start();
if (isset($_POST['email'])) {
    $email = $_POST['email'];
    $password = $_POST['password'];
    $connection = mysqli_connect(hostname: "localhost", username: "root", password: "", database: "backend2026");
    $query = mysqli_query($connection, query: "SELECT * FROM `users` WHERE `email` = '$email'AND `password` = '$password'");
    $result = mysqli_fetch_assoc($query);
    if ($_POST['email'] !== '' && $_POST['password'] !== '') {
        if (!empty($result)) {
            $_SESSION['login'] = $result;
            header("location: index.php");
        } else {
            echo 'TRY AGAIN';
        }
    } else {
        echo "PLEASE ADD VALUE";
    }
};
?>

<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@anyblades/blades@2/css/blades.min.css">
    <title>Login Page</title>
</head>
<body>
    <h1>LOGIN PAGE</h1>
    <form action="login.php" method="post">
        <input type="text" name="email" placeholder="Email">
        <input type="text" name="password" placeholder="Password">
        <button type="submit" value="login">LOGIN</button>
    </form>
</body>
</html>