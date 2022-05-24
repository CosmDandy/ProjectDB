<!doctype html>
<html>
<head>
    <meta charset="windows-1251">
    <title>Регистрация</title>
    <script src="script.js"></script>
</head>

<body>
<form id="register" name="register" method="POST">
    <input name="login" type="text" autofocus="autofocus" required="required" id="login" placeholder="Имя пользователя" size="30" maxlength="30"><br>
    <input name="password" type="text" required="required" id="password" placeholder="Пароль" size="30" maxlength="30"><br>
    <input name="email" type="text" id="email" placeholder="Электронная почта" size="30" maxlength="30">
    <input type="hidden" value="u" name="rights" id="rights">
    <input name="submit" type="submit" id="submit" value="Регистрация">
    <input type="hidden" name="MM_insert" value="register">
</form>

<?php
require_once("Connections/project_con.php");

$submit = $_POST["submit"];
$login = $_POST["login"];
$password = $_POST["password"];
$privileges = $_POST["rights"];
$email = $_POST["email"];
if($submit)
{
    $insert_query = "INSERT INTO users (login, password, privileges, email)
    VALUES('$login', '$password', '$privileges', '$email')";
    $key = 111;
    mail($email, "Код подтверждения", $key);
    $new_user = mysqli_query($link, $insert_query);
}
?>


</body>
</html>