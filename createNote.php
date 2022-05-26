<?php
require_once("Connections/project_con.php");

?>
<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <title>Новая заметка</title>
    <link rel="stylesheet" type="text/css" href="Styles/style.css">
    <link rel="stylesheet" type="text/css" href="Styles/font.css">
</head>
<body>
<!-- Menu -->
<div class="menu">
    <button type="button" title="Аккаунт" onclick="location.href='account.php';">
        <img alt="#" src="Photos/user.png">
    </button>
    <div>
        <button type="button" title="Хуйня.пнг">
            <img alt="#" src="Photos/house.png" onclick="location.href='main.php';">
        </button>
        <button type="button" title="Новая заметка" onclick="location.href='createNote.php';">
            <img alt="#" src="Photos/new-note.png">
        </button>
        <button type="button" title="Все заметки" onclick="location.href='main.php';">
            <img alt="#" src="Photos/menu.png">
        </button>
    </div>
    <button type="button" title="Выйти" onclick="location.href='logout.php';">
        <img alt="#" src="Photos/logout.png">
    </button>
</div>

<!-- Main Content -->
<div class="content_wrapper">
    <div class="content" style="padding-top: 25vh">
        <div class="block">
            <form name="new_note" autocomplete="on" method="post" action="">
                <div class="block_c">
                    <input type="text" name="title" id="title" value="title">
                </div>
                <div class="block_c">
                    <textarea style="height: 10em; margin: 1.2em 0;" name="article" id="article"></textarea>
                </div>
                <div class="block_b">
                    <button type="button" onclick="location.href='main.php';">
                        <img alt="#" src="Photos/back.png">
                    </button>
                    <button type="submit" name="submit"
                            onclick="location.href='editNote.php?note=<?php echo $note["id"]; ?>;'">
                        <img alt="#" src="Photos/check.png">
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>
</body>
</html>