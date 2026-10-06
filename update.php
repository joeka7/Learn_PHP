<?php
session_start();
if (!isset($_SESSION['login'])) {
    header("location: login.php");
}
$id = $_POST['id'];
$name = $_POST['name'];
$email = $_POST['email'];
if ($_POST['name'] !== '' && $_POST['email'] !== '' && $_POST['password'] !== '') {
    $password = $_POST['password'];
    $connection = mysqli_connect(hostname: "localhost", username: "root", password: "", database: "backend2026");
    $oldQuery = mysqli_query($connection, query: "SELECT * FROM `users` WHERE `id` = $id");
    $oldDATA = mysqli_fetch_assoc($oldQuery);
    if ($oldDATA['name'] === $name && $oldDATA['email'] === $email  && $oldDATA['password'] === $password) {
        header("location:edit.php?id=$id");
        
    } else {
    mysqli_query($connection, query: "UPDATE `users` SET `name` = '$name',  `email` = '$email', `password` = '$password' WHERE `id` = '$id'");
    if (mysqli_affected_rows($connection) > 0) {
        header("location: index.php");
        } 
    }
} else {
    $_SESSION['error'] = 'PLEASE ADD VALUE';
    header("location: edit.php?id=$id");
}
