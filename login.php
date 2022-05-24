<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <title>Войти</title>
    <link rel="stylesheet" type="text/css" href="style.css">
</head>
<body>
<?php
session_start();
$link = mysqli_connect('localhost', 'root', 'root');
$select_db = mysqli_query($link, "USE project");

$login = $_POST['login'];
$pass = $_POST['pass'];
$_SESSION['user_id'] = 0;
$_SESSION['login'] = $login;
$_SESSION['pass'] = $pass;
$_SESSION['auth'] = 0;
$_SESSION['status'] = 0;

$login_arr_q = mysqli_query($link, "SELECT login FROM users");
$pass_arr_q = mysqli_query($link, "SELECT password FROM users");
while ($login_arr = mysqli_fetch_array($login_arr_q) and $pass_arr = mysqli_fetch_array($pass_arr_q)) {
    if ($login_arr[0] == $login and $pass_arr[0] == $pass) {
        $_SESSION['user_id'] = mysqli_fetch_array(mysqli_query($link, "SELECT id FROM users WHERE login = '$login_arr[0]' and password = '$pass_arr[0]'"));
        $_SESSION['status'] = mysqli_fetch_array(mysqli_query($link, "SELECT privileges FROM users WHERE login = '$login_arr[0]' and password = '$pass_arr[0]'"));
        $_SESSION['auth'] = 1;
        header('Location: ' . 'main.php');
        break;
    }
}
if (!$_SESSION['auth'] and !$_SESSION['status'] and $_SESSION['pass'] != '' and $_SESSION['login'] != '') {
    header('Location: ' . 'main.php');
}
?>
<div class="content" style="width: 25em; margin-top: 30vh">
    <div class="block">
        <form name="login" autocomplete="on" method="post" action="">
            <div class="block_c">
                <input type="text" name="login" id="login" value="test_log">
            </div>
            <div class="block_c" style="margin: 1.2em 0;">
                <input type="password" name="pass" id="pass" value="test_pass">
            </div>
            <div class="block_b">
                <a href="reg.php" class="button">Зарегистрироваться</a>
                <input type="submit" name="login_b" id="login_b" value="Войти" class="button">
            </div>
        </form>
    </div>
</div>
</body>
</html>