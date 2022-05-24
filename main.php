<!doctype html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" type="text/css" href="style.css">
    <title>Заметки</title>
</head>
<body>
<?php
session_start();
$user = $_SESSION['user_id'][0];
$link = mysqli_connect('localhost', 'root', 'root');
$select_db = mysqli_query($link, "USE project");
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

<!-- Menu -->
<div class="menu">
    <div class="menu_logo">
        <img alt="#" src="photos/house.png" onclick="javascript:location.href='main.php';">
    </div>
    <div>
        <div class="submenu" onclick="javascript:location.href='main.php';">
            <img alt="#" src="photos/menu.png">
        </div>
        <div class="submenu" onclick="javascript:location.href='new_note.php';">
            <img alt="#" src="photos/writing.png">
        </div>
        <div class="submenu" onclick="javascript:location.href='acc.php';">
            <img alt="#" src="photos/user.png">
        </div>
    </div>
    <div class="menu_logout" onclick="javascript:location.href='logout.php';">
        <img alt="#" src="photos/logout.png">
    </div>
</div>

<!-- Main Content -->
<div class="content_wrapper">
    <?php if ($_SESSION['auth'] and ($_SESSION['status'] >= 1)) { ?>
        <div class="content">
            <div class="search">
                <form name="search" method="get" action="">
                    <label for="user_search">
                        <input type="text" name="user_search" id="user_search">
                    </label>
                    <button type="submit">
                        <img alt="#" src="photos/search.png">
                    </button>
                </form>
            </div>
        </div>
        <?php if ($final_search_words[0] != "") {
            while ($res_array = mysqli_fetch_array($res_query)) { ?>
                <div class="content">
                    <div class="block">
                        <div class="">
                            <h2><?php echo $res_array['id'], "<br>"; ?></h2>
                        </div>
                        <div class="">
                            <h2><?php echo $res_array['title'], "<br>"; ?></h2>
                        </div>
                        <div class="">
                            <h2><?php echo $res_array['article'], "<br>", "<hr>", "<br>"; ?></h2>
                        </div>
                    </div>
                </div>
            <?php }
        } else { ?>
            <?php while ($note = mysqli_fetch_array($select_note)) { ?>
                <div class="content">
                    <div class="block">
                        <div class="">
                            <h2><?php echo $note['title']; ?></h2>
                        </div>
                        <div class="">
                            <p>Дата: <?php echo $note['created']; ?></p>
                        </div>
                        <div class="">
                            <p><?php echo $note['article']; ?></p>
                        </div>
                    </div>
                </div>
            <?php }
        }
    } else {
        header('Location: ' . 'login.php');
    }
    ?>
</div>
</body>
</html>