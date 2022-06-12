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
<div class="menu nav">
    <button type="button" title="О нас" onclick="location.href='developers.html';">
        <img alt="#" src="Photos/info.png">
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
            <div class="block_c">
                <input type="text" name="title" id="title" value="<?php echo $edit_note['title']; ?>" disabled>
            </div>
            <div class="block_c">
                <textarea name="article" id="article" style="height: 20em"
                          disabled><?php echo $edit_note['article']; ?>
                </textarea>
            </div>
            <div class="block_b">
                <button type="button" title="К заметкам" onclick="location.href='main.php';">
                    <img alt="#" src="Photos/back.png">
                </button>
                <button type="button" title="Редактировать заметку"
                        onclick="location.href='editNote.php?note=<?php echo $edit_note["id"]; ?>;'">
                    <img alt="#" src="Photos/edit-note.png">
                </button>
            </div>
        </div>
    </div>
</div>
</body>
</html>