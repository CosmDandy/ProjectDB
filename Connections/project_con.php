<?php
session_start();
$localhost = "localhost";
$db = "project";
$user = "admin";
$password = "admin";
$link = mysqli_connect($localhost, $user, $password) or trigger_error(mysql_error(), E_USER_ERROR);
$select = mysqli_select_db($link, $db);
mysqli_report(MYSQLI_REPORT_ERROR | MYSQLI_REPORT_STRICT);
mysqli_query($link, "SET NAMES utf8mb4;") or die(mysqli_error());
mysqli_query($link, "SET CHARACTER SET utf8mb4;") or die(mysqli_error());
header("Content-Type: text/html; charset=utf-8");
mb_internal_encoding('UTF-8');
if (!$_SESSION['auth']) {
    header('Location: ' . 'login.php');
}
?>