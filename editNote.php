<?php
require_once("Connections/project_con.php");

if (!$_SESSION['auth']) {
    header('Location: ' . 'login.php');
}

$note_id = $_GET['note'];
$title = $_POST['title'];
$article = $_POST['article'];
if (($title) && ($article)) {
    $update_query = mysqli_query($link, "UPDATE notes SET title = '$title', article = '$article' WHERE id = $note_id");
}
$result = mysqli_query($link, "SELECT * FROM notes WHERE id = $note_id");
$edit_note = mysqli_fetch_array($result);
?>
<!doctype html>
<html lang="ru">
<head>
    <meta charset="windows-1251">
    <link rel="stylesheet" type="text/css" href="Styles/style.css">
    <link rel="stylesheet" type="text/css" href="Styles/font.css">
    <title><?php echo $edit_note['title'];?></title>
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
    <div class="content" style="margin-top: 20vh;">
        <div class="block">
            <form name="edit_note" autocomplete="on" method="post" action="">
                <div class="block_c">
                    <input type="text" name="title" id="title" value="<?php echo $edit_note['title']; ?>">
                </div>
                <div class="block_c">
                    <textarea name="article" id=" article"
                              style="height: 20em"><?php echo $edit_note['article']; ?></textarea>
                </div>
                <input type="hidden" name="note" id="note" value="<?php echo $edit_note['id'] ?>">
                <div class="block_b">
                    <button type="button" onclick="javascript:location.href='main.php';">
                        <img alt="#" src="Photos/back.png">
                    </button>
                    <button type="button" onclick="javascript:location.href='main.php';">
                        <img alt="#" src="Photos/trash.png">
                    </button>
                    <button type="submit" name="submit"
                            onclick="javascript:location.href='editNote.php?note=<?php echo $note["id"]; ?>;'">
                        <img alt="#" src="Photos/check.png">
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>
</body>
</html>