<!doctype html>
<html lang="ru">
<head>
    <meta charset="UTF-8">

    <link rel="stylesheet" type="text/css" href="../style.css">
    <title>Document</title>
</head>
<body>
<?php
$link = mysqli_connect('127.0.0.1', 'admin', 'admin');
$select_db = mysqli_query($link, "USE MySiteDB");
$select_note = mysqli_query($link, "SELECT * FROM notes ORDER BY created DESC");

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
<div class="menu">
    <div class="menu_logo">
        <img alt="#" src="house.png">
    </div>
    <div>
        <div class="submenu">
            <img  alt="#" src="menu.png">
        </div>
        <div class="submenu">
            <img  alt="#" src="writing.png">
        </div>
        <div class="submenu">
            <img  alt="#" src="user.png">
        </div>
    </div>
    <div class="menu_logout">
        <img  alt="#" src="logout.png">
    </div>
</div>
<div class="content">
    <div class="notes">
        <div class="search">
            <form name="search" method="get" action="">
                <label for="user_search">
                    <input type="text" name="user_search" id="user_search">
                </label>
                <button type="submit">
                    <img  alt="#" src="search.png">
                </button>
            </form>
        </div>
    </div>
    <?php while ($note = mysqli_fetch_array($select_note)) { ?>
    <div class="notes">
        <div class="block">
            <div class="">
                <h2><?php echo $note ['title']; ?></h2>
            </div>
            <div class="">
                <p>Дата: <?php echo $note ['created']; ?></p>
            </div>
            <div class="">
                <p><?php echo $note ['article']; ?></p>
            </div>
        </div>
    </div>
    <?php } ?>
</div>
</body>
</html>