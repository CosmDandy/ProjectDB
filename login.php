<?php
require_once("Connections/log_reg_con.php");

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
?>
<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
    <script type="text/javascript" src="Scripts/script.js"></script>
    <link rel="stylesheet" type="text/css" href="Styles/style.css">
    <link rel="stylesheet" type="text/css" href="Styles/font.css">
    <title>Авторизация</title>
</head>
<body style="animation: change-background 12s ease infinite;">
<div class="content" style="width: 22em; margin-top: 25vh">
    <div class="block">
        <form name="login" autocomplete="on" method="post" action="">
            <div class="block_c">
                <h3>Email address</h3>
                <input type="text" name="login" value="uknow@gh.ru" placeholder="login" required>
            </div>
            <div class="block_c" style="position: relative">
                <h3>Password</h3>
                <input type="password" name="pass" id="password" value="testpass"
                       placeholder="Password" required>
                <div class="pass" onclick="return show_hide_password(this);">
                    <img id="pass" alt="#" src="Photos/show.png">
                </div>
            </div>
            <div>
                <input type="submit" name="login_b" id="login_b" value="Войти" class="button"
                       style="width: 100%; background-color: #2da44e;">
            </div>
        </form>
    </div>
    <div class="block block_q">
        <p>Нет аккаунта в заметках? <a href="register.php">Создать аккаунт</a></p>
    </div>
</div>
</body>
</html>