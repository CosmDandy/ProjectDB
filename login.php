<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <title>Войти</title>
    <link rel="stylesheet" type="text/css" href="style.css">
</head>
<body>
<? php
session_start();
$link = mysqli_connect('127.0.0.1', 'admin', 'admin');
$select_db = mysqli_query($link, "USE project");

$login = $_POST['login'];
$pass = $_POST['pass'];
$_SESSION['login'] = $login;
$_SESSION['pass'] = $pass;
$_SESSION['auth'] = 0;
$_SESSION['status'] = 0;
?>
<div class="content" style="width: 25em; margin-top: 30vh">
    <div class="block">
        <form name="login" autocomplete="on" method="post" action="">
            <div class="block_c">
                <input type="text" name="login" id="login" value="login">
            </div>
            <div class="block_c" style="margin: 1.2em 0;">
                <input type="password" name="pass" id="pass" value="password">
            </div>
            <div class="block_b">
                <a href="reg.html" class="button">Зарегистрироваться</a>
                <input type="submit" name="login" id="login_b" value="Войти" class="button">
            </div>
        </form>
    </div>
</body>
</html>