<?php
require_once("Connections/project_con.php");

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
<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="windows-1251">
    <title>Войти</title>
    <link rel="stylesheet" type="text/css" href="style.css">
</head>
<body>
<div class="content" style="width: 22em; margin-top: 28vh">
    <div class="block">
        <form name="login" autocomplete="on" method="post" action="">
            <div class="block_c">
                <h3>Email address</h3>
                <input type="text" name="login" id="login" value="1" placeholder="Login">
            </div>
            <div class="block_c" style="margin: 1.2em 0;">
                <h3>Password</h3>
                <input type="password" name="pass" id="pass" value="1" placeholder="Password">
            </div>
            <div>
                <input type="submit" name="login_b" id="login_b" value="Войти" class="button" style="width: 100%; background-color: #2da44e;">
            </div>
        </form>
    </div>
    <div class="block">
       <p>Нет аккаунта в заметках ?   <a href="register.php">Создать аккаунт</a></p>
    </div>
</div>
</body>
</html>