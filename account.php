<?php
require_once("Connections/project_con.php");
$user = $_SESSION['user_id'][0];
$folder = $_GET['folder'];
$select_note = mysqli_query($link, "SELECT * FROM notes WHERE folder_id = '$folder' ORDER BY created DESC ");

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
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
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
<div class="content_wrapper">
    <img>
    <div class="password сontent">
        <form>
            <h3>Пароль</h3><button>Изменить</button><br>
            <label>Текущий пароль<input type="password"></label> <div class="pass" onclick="return show_hide_password(this);">
                <img id="pass" alt="#" src="Photos/show.png">
            </div>
            <label>Новый пароль<input type="password"></label> <div class="pass" onclick="return show_hide_password(this);">
                <img id="pass" alt="#" src="Photos/show.png">
            </div>
        </form>
    </div>
</div>
<script>
    $(document).ready(function () {
        $('#n_sort').change(function (){
            let orderBy = $(this).val()
            let dat1 = $('#dat1').val()
            let dat2 = $('#dat2').val()
            let folder = '<?php echo $folder?>'
            console.log(orderBy);
            $.ajax({
                url: 'sorting.php',
                type: "POST",
                data: {
                    orderBy: orderBy,
                    dat1: dat1,
                    dat2: dat2,
                    folder: folder,
                },
                success: (data) => {
                    console.log(1);
                    console.log(data);
                    $('.notes').html(data);
                },

            })
        });
        $('.n_date').change(function (){
            let orderBy = $('.n_date').val()
            let dat1 = $('#dat1').val()
            let dat2 = $('#dat2').val()
            let folder = '<?php echo $folder?>'
            $.ajax({
                url: 'sorting.php',
                type: "POST",
                data: {
                    orderBy: orderBy,
                    dat1: dat1,
                    dat2: dat2,
                    folder: folder,
                },
                success: (data) => {
                    $('.notes').html(data);
                },

            })
        })
    })
</script>
</body>
</html>

