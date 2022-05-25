<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <title>Новая заметка</title>
    <link rel="stylesheet" type="text/css" href="style.css">
</head>
<body>
<!-- Menu -->
<div class="menu">
    <button type="button" class="submenu" onclick="javascript:location.href='account.php';">
        <img alt="#" src="Photos/user.png">
    </button>
    <div>
        <button type="button" class="submenu">
            <img alt="#" src="Photos/house.png" onclick="javascript:location.href='main.php';">
        </button>
        <button type="button" class="submenu" onclick="javascript:location.href='createNote.php';">
            <img alt="#" src="Photos/new-note.png">
        </button>
        <button type="button" class="submenu" onclick="javascript:location.href='main.php';">
            <img alt="#" src="Photos/menu.png">
        </button>
    </div>
    <button type="button" class="submenu" onclick="location.href='logout.php';">
        <img alt="#" src="Photos/logout.png">
    </button>
</div>
<div class="content_wrapper">
    <div class="content" style="padding-top: 30vh">
        <div class="block">
            <form name="new_note" autocomplete="on" method="post" action="">
                <div class="block_c">
                    <input type="text" name="title" id="title" value="title">
                </div>
                <div class="block_c">
                    <textarea style="height: 10em; margin: 1.2em 0;" name="article" id="article"></textarea>
                </div>
                <div class="block_b">
                    <a href="main.php" class="button">Отменить</a>
                    <input type="submit" name="create" id="create" value="Создать" class="button">
                </div>
            </form>
        </div>
    </div>
</div>
</body>
</html>