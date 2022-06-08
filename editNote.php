<?php
require_once("Connections/project_con.php");

$note_id = $_GET['note'];
$title = $_POST['title'];
$article = $_POST['article'];
$color = $_POST['color'];
if (($title) && ($article) && ($color)) {
    $update_query = mysqli_query($link, "UPDATE notes SET title = '$title', article = '$article', color = '$color' WHERE id = $note_id");
}
$result = mysqli_query($link, "SELECT * FROM notes WHERE id = $note_id");
$edit_note = mysqli_fetch_array($result);
?>
<!doctype html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
    <link rel="stylesheet" type="text/css" href="Styles/style.css">
    <link rel="stylesheet" type="text/css" href="Styles/font.css">
    <script type="text/javascript" src="Scripts/script.js"></script>
    <title><?php echo $edit_note['title']; ?></title>
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
    <div class="content" style="margin-top: 20vh;">
        <div class="block" id="block" style="background: <?php echo $edit_note['color']; ?>;">
            <form name="edit_note" autocomplete="on" method="post" action="">
                <input type="hidden" name="color" id="color" value="<?php echo $edit_note['color']; ?>">
                <div class="block_c">
                    <input type="text" name="title" id="title" value="<?php echo $edit_note['title']; ?>">
                </div>
                <div class="block_c">
                    <textarea name="article" id="article"
                              style="height: 20em"><?php echo $edit_note['article']; ?></textarea>
                </div>
                <div class="block_b">
                    <button type="button" title="К заметкам" onclick="location.href='main.php';">
                        <img alt="#" src="Photos/back.png">
                    </button>
                    <button type="button" title="Удалить заметку">
                        <img alt="#" src="Photos/trash.png">
                    </button>
                    <button type="submit" title="Сохранить изменения" name="submit">
                        <img alt="#" src="Photos/check.png">
                    </button>
                </div>
            </form>
			<form method="post" action="folder.php?folder=<?php echo $edit_note["folder_id"]; ?>">
     				<input type="hidden" value="<?php echo $note_id?>" name="n_note">
                    <button type="submit" title="Удалить заметку" name="delNote">
                        <img alt="#" src="Photos/trash.png">
                    </button>
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