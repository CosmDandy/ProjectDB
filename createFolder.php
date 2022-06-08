<?php
require_once("Connections/project_con.php");

$id = $_SESSION['user_id'][0];
$title = $_POST['title'];
$color = $_POST['color'];
if ($title) 
{
    $query = mysqli_query($link, "INSERT INTO folders (title, color, user_id) VALUES ('$title', '$color', '$id')");
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
    <title>Новая каталог</title>
</head>
<body>
<!-- Menu Left -->
<div class="menu menu_left">
    <button type="button" title="Аккаунт" onclick="location.href='account.php';">
        <img alt="#" src="Photos/user.png">
    </button>
    <div>
        <button type="button" title="Главная" onclick="location.href='main.php';">
            <img alt="#" src="Photos/menu.png">
        </button>
        <button type="button" title="Новый каталог" onclick="location.href='createFolder.php';">
            <img alt="#" src="Photos/new-note.png">
        </button>
        <button type="button" title="Корзина">
            <img alt="#" src="Photos/trash.png" onclick="location.href='deletedNotes.php';">
        </button>
    </div>
    <button type="button" title="Выйти" onclick="location.href='logout.php';">
        <img alt="#" src="Photos/logout.png">
    </button>
</div>
<!-- Main Content -->
<div class="content_wrapper">
    <div class="content">
        <h1>Создать каталог</h1>
    </div>
    <div class="content" style="padding-top: 25vh">
        <div class="block" id="block">
            <form name="new_folder" autocomplete="on" method="post" action="">
                <input type="hidden" name="color" id="color" value="#F6F8FA">
                <div class="block_c">
                    <input type="text" name="title" id="title" value="title">
                </div>
                <div class="block_b">
                    <button type="button" onclick="location.href='main.php';">
                        <img alt="#" src="Photos/back.png">
                    </button>
                    <button type="submit" name="submit">
                        <img alt="#" src="Photos/check.png">
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>
<!-- Right Menu -->
<div class="menu menu_right">
    <button type="button" title="Сменить цветовую тему">
        <img alt="#" src="Photos/contrast.png">
    </button>
    <div>
        <button type="button" title="Цвет" onclick="Change_bg_Color(1)">
            <img alt="#" src="Photos/add.png">
        </button>
        <button type="button" title="Цвет" onclick="Change_bg_Color(2)">
            <img alt="#" src="Photos/add.png">
        </button>
        <button type="button" title="Цвет" onclick="Change_bg_Color(3)">
            <img alt="#" src="Photos/add.png">
        </button>
        <button type="button" title="Цвет" onclick="Change_bg_Color(4)">
            <img alt="#" src="Photos/add.png">
        </button>
        <button type="button" title="Цвет" onclick="Change_bg_Color(5)">
            <img alt="#" src="Photos/add.png">
        </button>
        <button type="button" title="Цвет" onclick="Change_bg_Color(6)">
            <img alt="#" src="Photos/add.png">
        </button>
    </div>
    <button type="button" title="Помощь">
        <img alt="#" src="Photos/question.png">
    </button>
</div>
</body>
</html>