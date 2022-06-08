<?php
require_once("Connections/project_con.php");

$user = $_SESSION['user_id'][0];
$select_folder = mysqli_query($link, "SELECT * FROM folders WHERE user_id = '$user'");
$select_note = mysqli_query($link, "SELECT * FROM notes");
?>

<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
    <link rel="stylesheet" type="text/css" href="Styles/style.css">
    <link rel="stylesheet" type="text/css" href="Styles/font.css">
    <title>Каталоги</title>
</head>
<body>

<!-- Menu -->
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
<div class="content_wrapper" style="width: calc(100% - 30em);">
    <!-- Search-->
    <div class="content">
        <div class="search">
            <form name="search" method="get" action="">
                <label for="search">
                    <input type="text" name="user_search" id="search" placeholder="Поиск">
                </label>
                <button type="submit">
                    <img alt="#" src="Photos/search.png">
                </button>
            </form>
        </div>
    </div>
    <!-- Note boxes-->
    <div class="content">
        <h1>Каталоги</h1>
    </div>
    <div class="content">
        <?php while ($note = mysqli_fetch_array($select_note)) {
            if (!($note['deleted'])) { ?>
                <!-- Notes -->
                <div class="block note" title="Редактировать заметку" style="background: <?php echo $note['color']; ?>"
                     onclick="location.href='editNote.php?note=<?php echo $note["id"]; ?>;'">
                    <div>
                        <div class="note_head">
                            <h2><?php echo $note['title']; ?></h2>
                        </div>
                        <div class="note_text">
                            <h3><?php echo $note['article']; ?></h3>
                        </div>
                    </div>
                    <div class="note_date">
                        <p><?php echo $note['created']; ?></p>
                    </div>
                </div>
            <?php }
        } ?>
    </div>
</div>
<div class="menu folders_m">
    <h1 style="margin: 0 1em 1em">Пространства</h1>
    <?php while ($folder = mysqli_fetch_array($select_folder)) { ?>
        <!-- Notes -->
        <div class="folders" style="background: <?php echo $folder['color']; ?>"
             onclick="location.href='folder.php?folder=<?php echo $folder["id"]; ?>'">
            <h2><?php echo $folder['title']; ?></h2>
        </div>
    <?php } ?>
</div>
</body>
</html>