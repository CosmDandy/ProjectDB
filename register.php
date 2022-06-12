<?php
require_once("Connections/log_reg_con.php");

$_SESSION["submit"] = $submit = $_POST["submit"];
$_SESSION['password'] = $password = $_POST["password1"];
$_SESSION['privileges'] = $privileges = $_POST["rights"];
$_SESSION['login'] = $login = $_POST["login"];
if ($submit) {
    $new_user = mysqli_query($link, "INSERT INTO users (login, password, privileges) VALUES('$login', '$password', '$privileges')");
    $_SESSION['auth'] = 1;
    header('Location: ' . 'main.php');
} ?>
<!DOCTYPE html>
<html lang="ru">
<head>
    <title>Регистрация</title>
    <meta charset="UTF-8">
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
    <script type="text/javascript" src="Scripts/script.js"></script>
    <link rel="stylesheet" type="text/css" href="Styles/style.css">
    <link rel="stylesheet" type="text/css" href="Styles/font.css">
	<link rel="stylesheet" type="text/css" href="Styles/log_style.css">
    <script type="text/javascript" src="Scripts/script.js"></script>
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
	<script>
        CheckCorrect()
    </script>
</head>
<body>
<div class="content" style="width: 25em; margin-top: 20vh">
    <div class="block">
        <form id="register" name="register" method="POST" action="">
            <div class="block_c">
                <h3>Username</h3>
                <input type="text" name="username" value="New_user_username" placeholder="Username" required>
            </div>
            <div class="block_c">
                <h3>Email address</h3>
                <input type="email" name="login" id='login' value="New_user@huya.tv" placeholder="Login" required>
            </div>
            <div class="block_c" style="position: relative">
                <h3>Password</h3>
                <input type="password" name="password1" id="password1" value="New_user_parol"
                       placeholder="Password" required>
                <div class="pass" onclick="return show_hide_password_1(this);">
                    <img id="pass1" alt="#" src="Photos/show.png">
                </div>
            </div>
			<div class="block_c" style="position: relative">
                <h3>Repeat Password</h3>
                <input type="password" name="password2" id="password2" value="New_user_parol"
                       placeholder="Password" required>
                <div class="pass" onclick="return show_hide_password_2(this);">
                    <img id="pass2" alt="#" src="Photos/show.png">
                </div>
            </div>
            <div>
                <input type="hidden" value="u" name="rights" id="rights">
                <input type="submit" name="submit" id="submit" value="Регистрация" class="button"
                       style="width: 100%; background-color: #2da44e;">
            </div>
        </form>
    </div>
    <div class="block block_q">
        <p>Уже есть аккаунт в заметках ? <a href="login.php">Войти</a></p>
    </div>
</div>
</body>
</html>