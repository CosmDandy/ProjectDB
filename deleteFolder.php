<?php
require_once("Connections/project_con.php");

$user = $_SESSION['user_id'][0];






?>



<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
    <link rel="stylesheet" type="text/css" href="Styles/style.css">
    <link rel="stylesheet" type="text/css" href="Styles/font.css">
    <title>Удалено!</title>
</head>
<body>

<!-- Menu -->
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
    
</div>
    
<div class="menu menu_right">
    <button type="button" title="Сменить цветовую тему">
        <img alt="#" src="Photos/contrast.png">
    </button>
    <button type="button" title="Помощь">
        <img alt="#" src="Photos/question.png">
    </button>
</div>
    
    <?php
    if(isset($_POST["deleteFolder"]))
    {
        $folder = $_POST["folder"];
        $delete_folder = mysqli_query($link, "DELETE FROM folders WHERE id = '$folder'");
        $delete_notes = mysqli_query($link, "DELETE FROM notes WHERE folder_id = '$folder'");
        echo "Каталог удален. Вы будете перенаправлены на главную страницу через 5 секунд.";
    }
    ?>
    
    <script>
        setTimeout(function () 
            {
                window.location.href= 'main.php'; // the redirect goes here
            },5000);
    </script>
    
    
    
</body>
</html>