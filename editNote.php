<?php
require_once("Connections/project_con.php");

if (!$_SESSION['auth']) {
    header('Location: ' . 'login.php');
}

$note_id = $_GET['note'];
$title = $_POST['title'];
$article = $_POST['article'];
if (($title)&&($article)) {
    $update_query = mysqli_query($link, "UPDATE notes SET title = '$title', article = '$article' WHERE id = $note_id");
}
$result = mysqli_query ($link, "SELECT * FROM notes WHERE id = $note_id");
$edit_note = mysqli_fetch_array ($result);
?>
<!doctype html>
<html lang="ru">
<head>
    <meta charset="windows-1251">
    <link rel="stylesheet" type="text/css" href="style.css">
    <title>Document</title>
</head>
<body>
<!-- Menu -->
<div class="menu">
    <div class="menu_logo">
        <img alt="#" src="photos/house.png" onclick="javascript:location.href='main.php';">
    </div>
    <div>
        <div class="submenu" onclick="javascript:location.href='main.php';">
            <img alt="#" src="photos/menu.png">
        </div>
        <div class="submenu" onclick="javascript:location.href='createNote.php';">
            <img alt="#" src="photos/new-note.png">
        </div>
        <div class="submenu" onclick="javascript:location.href='account.php';">
            <img alt="#" src="photos/user.png">
        </div>
    </div>
    <div class="menu_logout" onclick="javascript:location.href='logout.php';">
        <img alt="#" src="photos/logout.png">
    </div>
</div>

<div class="content_wrapper">
    <div class="content" style="margin-top: 30vh">
        <div class="block">
            <form name="edit_note" autocomplete="on" method="post" action="">
                <div class="block_c">
                    <input type="text" name="title" id="title" value = "<?php echo $edit_note['title'];?>">
                </div>
                <div class="block_c" style="margin: 1.2em 0;">
                    <textarea name="article" id=" article"><?php echo $edit_note['article'];?></textarea>
                </div>
                <input type="hidden" name = "note" id = "note" value="<?php echo $edit_note['id']?>">
                <div class="block_b">
                    <button type="button" onclick="javascript:location.href='main.php';">
                        <img alt="#" src="photos/back.png">
                    </button>
                    <button type="button" onclick="javascript:location.href='main.php';">
                        <img alt="#" src="photos/trash.png">
                    </button>
                    <button type="submit" name="submit" onclick="javascript:location.href='editNote.php?note=<?php echo $note["id"]; ?>;'">
                        <img alt="#" src="photos/check.png">
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>
</body>
</html>