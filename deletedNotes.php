<?php
require_once("Connections/project_con.php");

$user = $_SESSION['user_id'][0];
if (isset($_POST['but1'])) {
    $note_id = $_POST['n_note'];
    mysqli_query($link, "DELETE FROM notes WHERE id=$note_id");
}
if (isset($_POST['but2'])) {
    $note_id = $_POST['n_note'];
    mysqli_query($link, "UPDATE notes SET deleted=0 WHERE id=$note_id");
}
if (isset($_POST['delAll'])) {
    mysqli_query($link, "DELETE FROM notes WHERE folder_id in (SELECT id FROM folders WHERE user_id='$user') and deleted=1");
}
if (isset($_POST['recoverAll'])) {
    mysqli_query($link, "UPDATE notes SET deleted=0 WHERE folder_id in (SELECT id FROM folders WHERE user_id='$user') and deleted=1");
}
$select_note = mysqli_query($link, "SELECT * FROM notes WHERE folder_id in (SELECT id FROM folders WHERE user_id = '$user') ORDER BY created DESC ");
$user_search = str_replace(',', ' ', $_GET['user_search']);
$search_words = explode(' ', $user_search);

$final_search_words = array();
if (count($search_words) > 0) {
    foreach ($search_words as $word) {
        if (!empty($word)) {
            $final_search_words[] = $word;
        }
    }
}

$where_list = "SELECT * FROM notes WHERE";
foreach ($final_search_words as $word) {
    $where_list .= " article LIKE '%$word%' OR";
}
$where_list = substr($where_list, 0, -3);
if (!empty($where_list)) {
    $res_query = mysqli_query($link, $where_list);
}
?>
<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
    <link rel="stylesheet" type="text/css" href="Styles/style.css">
    <link rel="stylesheet" type="text/css" href="Styles/font.css">
    <title>Заметки</title>
</head>
<body>

<!-- Menu -->
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
    <!-- Search-->
    <div class="content">
        <div class="search">
            <form name="search" method="get" action="">
                <label for="search">
                    <input type="text" name="user_search" id="search" placeholder="Search">
                </label>
                <button type="submit">
                    <img alt="#" src="Photos/search.png">
                </button>
            </form>
        </div>
        <form class="search sort" action='' method="post">
            <input type='submit' value="Восстановить все" name='recoverAll' id='recoverAll'>
            <input type='submit' value="Удалить все" name='delAll' id='delAll'>
        </form>
    </div>
    <!-- Note boxes-->
    <div class="content">
        <h1>Удаленные заметки</h1>
    </div>
    <div class="content">
        <?php if ($final_search_words[0] != "") { ?>
            <?php while ($res_array = mysqli_fetch_array($res_query))
                if ($res_array['deleted']) { ?>
                    <!-- Search notes-->
                    <div class="block note" title="Редактировать заметку"
                         style="background: <?php echo $res_array['color']; ?>"
                         onclick="location.href='editNote.php?note=<?php echo $res_array["id"]; ?>;'">
                        <div>
                            <div class="note_head">
                                <h2><?php echo $res_array['title']; ?></h2>
                            </div>
                            <div class="note_text">
                                <h3><?php echo $res_array['article']; ?></h3>
                            </div>
                        </div>
                        <div class="note_date">
                            <p><?php echo $res_array['created']; ?></p>
                        </div>
                    </div>
                <?php }
        } else {
            while ($note = mysqli_fetch_array($select_note)) {
                if ($note['deleted']) { ?>
                    <!-- Notes -->
                    <form action="" method="post">
                        <div class="block note" title="Редактировать заметку"
                             style="background: <?php echo $note['color']; ?>">
                            <div>
                                <div class="note_head">
                                    <h2><?php echo $note['title']; ?></h2>
                                </div>
                                <div class="note_text">
                                    <h3><?php echo $note['article']; ?></h3>
                                </div>
                            </div>
                            <input type="hidden" name='n_note' value='<?php echo $note['id']; ?>'>
                            <div class="del_b">
                                <button type="submit" name="but1">
                                    <img alt="#" src="Photos/x-mark.png">
                                </button>
                                <button type="submit" name='but2'>
                                    <img alt="#" src="Photos/check.png">
                                </button>
                            </div>
                        </div>
                    </form>
                <?php }
            }
        } ?>
    </div>
</div>
</body>
</html>