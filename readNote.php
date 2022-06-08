<?php
require_once("Connections/project_con.php");

$note_id = $_GET['note'];
$title = $_POST['title'];
$article = $_POST['article'];
$color = $_POST['color'];
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
        <button type="button" title="Все заметки" onclick="location.href='main.php';">
            <img alt="#" src="Photos/menu.png">
        </button>
        <button type="button" title="Новая заметка" onclick="location.href='createNote.php';">
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
            <form method="post" action="">
                <input type="hidden" name="color" id="color" value="<?php echo $edit_note['color']; ?>">
                <div class="block_c">
                   <h2 align="center"><?php echo $edit_note['title']; ?></h2>
                </div>
                <div class="block_c">
                        <h2><?php echo $edit_note['article']; ?></h2>
                </div>
                <div class="block_b">
                    <button type="button" title="К заметкам" onclick="location.href='main.php';">
                        <img alt="#" src="Photos/back.png">
                    </button>
                    <button type="button" title="Удалить заметку">
                        <img alt="#" src="Photos/trash.png">
                    </button>
                    <button type="button" title="Редактировать заметку" onclick="location.href='editNote.php?note=<?php echo $edit_note["id"];?>;'">
                        <img alt="#" src="Photos/edit-note.png">
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
    <button type="button" title="Помощь">
        <img alt="#" src="Photos/question.png">
    </button>
</div>
</body>
</html>