<?php
require_once("Connections/project_con.php");

$user = $_SESSION['user_id'][0];
$select_note = mysqli_query($link, "SELECT * FROM notes WHERE user_id = '$user' ORDER BY created DESC ");
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
    <meta charset="windows-1251">
    <link rel="stylesheet" type="text/css" href="Styles/style.css">
    <link rel="stylesheet" type="text/css" href="Styles/font.css">
    <title>Заметки</title>
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
    <!-- Search-->
    <div class="content">
        <div class="search">
            <form name="search" method="get" action="">
                <label for="user_search">
                    <input type="text" name="user_search" id="user_search" placeholder="Search">
                </label>
                <button type="submit">
                    <img alt="#" src="Photos/search.png">
                </button>
            </form>
        </div>
    </div>
    <!-- Note boxes-->
    <div class="content">
        <?php if ($final_search_words[0] != "") { ?>
            <?php while ($res_array = mysqli_fetch_array($res_query)) { ?>
                <!-- Search notes-->
                <div class="block note" title="Редактировать заметку" style="background: #<?php echo $res_array['color']; ?>"
                     onclick="location.href='editNote.php?note=<?php echo $res_array["id"]; ?>;'">
                    <div>
                        <div class="note_head">
                            <h2><?php echo $res_array['title']; ?></h2>
                        </div>
                        <div class="note_text">
                            <h3><?php echo $res_array['article']; ?></h3>
                        </div>
                    </div>
                    <div class="block_b">
                        <div class="note_date">
                            <p><?php echo $res_array['created']; ?></p>
                        </div>
                    </div>
                </div>
            <?php }
        } else {
            while ($note = mysqli_fetch_array($select_note)) {
                if (!($note['deleted'])) { ?>
                    <!-- Notes -->
                    <div class="block note" title="Редактировать заметку" style="background: #<?php echo $note['color']; ?>"
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
            }
        } ?>
    </div>
</div>
</body>
</html>