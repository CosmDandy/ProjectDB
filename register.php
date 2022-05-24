<?php
require_once("Connections/project_con.php");

$_SESSION["submit"] = $submit = $_POST["submit"];
$_SESSION['login'] = $login = $_POST["login"];
$_SESSION['password'] = $password = $_POST["password"];
$_SESSION['privileges'] = $privileges = $_POST["rights"];
$_SESSION['email'] = $email = $_POST["email"];
if ($submit) {
    $insert_query = "INSERT INTO users (login, password, privileges, email)
    VALUES('$login', '$password', '$privileges', '$email')";
    $key = 111;
    mail($email, "Код подтверждения", $key);
    $new_user = mysqli_query($link, $insert_query);
    $_SESSION['auth'] = 1;
    header('Location: ' . 'main.php');
} ?>
<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="windows-1251">
    <title>Регистрация</title>
    <link rel="stylesheet" type="text/css" href="style.css">
</head>
<body>
<div class="content" style="width: 25em; margin-top: 30vh">
    <div class="block">
        <form id="register" name="register" method="POST" action="">
            <div class="block_c">
                <input type="text" name="login" id="login" value="1" placeholder="Login">
            </div>
            <div class="block_c" style="margin: 1.2em 0;">
                <input type="password" name="password" id="password" value="1" placeholder="Password">
            </div>
            <div class="block_c" style="margin-bottom: 2em;">
                <input type="email" name="email" id="email" placeholder="Email">
            </div>
            <div class="block_b">
                <a href="login.php" class="button">Войти</a>
                <input type="hidden" value="u" name="rights" id="rights">
                <input type="submit" name="submit" id="submit" value="Регистрация" class="button">
            </div>
        </form>
    </div>
</div>
</body>
</html>