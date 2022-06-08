<?php
require_once("Connections/project_con.php");
$user = $_SESSION['user_id'][0];
$folder = $_GET['folder'];
if (isset($_POST['delNote'])) {
    $note_id = $_POST['n_note'];
    mysqli_query($link, "UPDATE notes Set deleted = 1 WHERE id=$note_id");
}
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

$where_list = "SELECT * FROM notes WHERE folder_id = $folder AND";
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
<div class="menu menu_left">
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

<!-- Main Content -->
<div class="content_wrapper">
    <!-- Search-->
    <div class="content">
        <div class="search">
            <form name="search" method="get" action="">
                <label for="search">
                    <input type="text" name="user_search" id="search" placeholder="Поиск">
                </label>
                <button type="submit">
                    <img alt="#" src="Photos/search.png">
                </button>
                <input type="hidden" value="<?php echo $folder; ?>" name="folder">
            </form>
        </div>
    </div>
    <!-- Note boxes-->
    <div class="content">
        <h1>Заметки</h1>
        <form>
            <input id="dat1" class="cont_row n_date" type="date" value="2003-10-05">
            <input id="dat2" class="cont_row n_date" type="date" value=<?php echo date("Y-m-d") ?>>
            <select class="item_sorting" id="n_sort">
                <option class="notes_sorting">By date desc</option>
                <option class="notes_sorting">By date asc</option>
                <option class="notes_sorting">By name asc</option>
                <option class="notes_sorting">By name desc</option>
            </select>
        </form>
        <h1><a href="createNote.php?folder=<?php echo $folder ?>">Создать заметку</a></h1>
    </div>
    <div class="content">
        <?php if ($final_search_words[0] != "") { ?>
            <?php while ($res_array = mysqli_fetch_array($res_query)) { ?>
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
                if (!($note['deleted'])) { ?>
                    <!-- Notes -->
                    <div class="block note" title="Редактировать заметку"
                         style="background: <?php echo $note['color']; ?>"
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
<div class="menu menu_right">
    <button type="button" title="Сменить цветовую тему">
        <img alt="#" src="Photos/contrast.png">
    </button>
    <button type="button" title="Помощь">
        <img alt="#" src="Photos/question.png">
    </button>
</div>
<script>
    $(document).ready(function () {
        $('#n_sort').change(function () {
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
        $('.n_date').change(function () {
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

