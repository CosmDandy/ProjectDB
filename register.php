<?php
require_once("Connections/log_reg_con.php");

$_SESSION["submit"] = $submit = $_POST["submit"];
$_SESSION['login'] = $login = $_POST["login"];
$_SESSION['password'] = $password = $_POST["password"];
$_SESSION['privileges'] = $privileges = $_POST["rights"];
$_SESSION['email'] = $email = $_POST["email"];
if ($submit) {
    $new_user = mysqli_query($link, "INSERT INTO users (login, password, privileges, email) VALUES('$login', '$password', '$privileges', '$email')");
    $_SESSION['auth'] = 1;
    header('Location: ' . 'main.php');
} ?>
<!DOCTYPE html>
<html lang="ru">
<head>
    <title>Регистрация</title>
    <meta charset="windows-1251">
    <link rel="stylesheet" type="text/css" href="Styles/style.css">
    <script type="text/javascript" src="Scripts/script.js"></script>
</head>
<body>
<div class="content" style="width: 25em; margin-top: 30vh">
    <div class="block">
        <form id="register" name="register" method="POST" action="">
            <div class="block_c">
                <h3>Username</h3>
                <input type="text" name="username" value="New_user_username" placeholder="Username" required>
            </div>
            <div class="block_c">
                <h3>Email address</h3>
                <input type="email" name="login" value="New_user@huya.tv" placeholder="Login" required>
            </div>
            <div class="block_c" style="position: relative">
                <h3>Password</h3>
                <input type="password" name="password" id="password" value="New_user_ahueni_parol"
                       placeholder="Password" required>
                <div class="pass" onclick="return show_hide_password(this);">
                    <img alt="#" src="Photos/search.png">
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
        <p>Уже есть аккаунт в заметках ? <a href="login.php">Войти.</a></p>
    </div>
</div>
</body>
</html>