<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <title>Новая заметка</title>
    <link rel="stylesheet" type="text/css" href="style.css">
</head>
<body>
<div class="menu">
    <div class="menu_logo">
        <img alt="#" src="Photos/house.png" onclick="javascript:location.href='main.php';">
    </div>
    <div>
        <div class="submenu" onclick="javascript:location.href='main.php';">
            <img alt="#" src="Photos/menu.png">
        </div>
        <div class="submenu" onclick="javascript:location.href='new_note.php';">
            <img alt="#" src="Photos/writing.png">
        </div>
        <div class="submenu" onclick="javascript:location.href='acc.php';">
            <img alt="#" src="Photos/user.png">
        </div>
    </div>
    <div class="menu_logout" onclick="javascript:location.href='logout.php';">
        <img alt="#" src="Photos/logout.png">
    </div>
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