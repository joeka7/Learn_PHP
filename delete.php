<?php
session_start();
if (!isset($_SESSION['login']) || $_SESSION['login']['admin'] == 0) {
    header("location: login.php");
}
$id = $_GET['id'];
$connection = mysqli_connect(hostname: "localhost", username: "root", password: "", database: "backend2026");
mysqli_query($connection, query: "DELETE FROM `users` WHERE `id` = $id");
if (mysqli_affected_rows($connection) > 0 ) {
    header("location: index.php");
}
