<?php
require_once("Connections/project_con.php");

$id = $_SESSION['user_id'];
$folder = $_GET['folder'];

$color_query = mysqli_query($link, "SELECT color FROM folders WHERE id = '$folder'");
$color_array = mysqli_fetch_array($color_query);
$color = $color_array['color'];

$title = $_POST['title'];
$article = $_POST['article'];
$created = $_POST['created'];
if (($title) && ($article)) 
{
    $query = mysqli_query($link, "INSERT INTO notes (title, article, created, deleted, folder_id, color) VALUES ('$title', '$article', '$created', 0, '$folder', '$color')");
	header('Location: ' . 'folder.php?folder=' . $folder);
}?>
<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
    <script type="text/javascript" src="Scripts/script.js"></script>
    <link rel="stylesheet" type="text/css" href="Styles/style.css">
    <link rel="stylesheet" type="text/css" href="Styles/font.css">
    <title>Новая заметка</title>
</head>
<body>
<!-- Menu Left -->
<div class="menu nav">
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
    <div class="content" style="padding-top: 23vh">
        <div class="block" id="block">
            <form name="new_note" autocomplete="on" method="post" action="">
                <input type="hidden" name="created" id="created" value="<?php echo date('Y-m-d'); ?>">
                <div class="block_c">
                    <input type="text" name="title" id="title" value="title">
                </div>
                <div class="block_c">
                    <textarea style="height: 10em; margin: 1.2em 0;" name="article" id="article"></textarea>
                </div>
                <div class="block_b">
                    <button type="button" onclick="location.href='folder.php?folder=<?php echo $folder; ?>';">
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
</body>
</html>