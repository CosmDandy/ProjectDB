<?php
require_once("Connections/project_con.php");
$user = $_SESSION['user_id'][0];
$folder_id = $_GET['folder'];
if (isset($_POST['delNote'])) {
    $note_id = $_POST['n_note'];
    mysqli_query($link, "UPDATE notes Set deleted = 1 WHERE id=$note_id");
}
$select_note = mysqli_query($link, "SELECT * FROM notes WHERE folder_id = '$folder_id' ORDER BY created DESC ");
$select_folder = mysqli_query($link, "SELECT * FROM folders WHERE user_id = '$user'");

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

$where_list = "SELECT * FROM notes WHERE folder_id = $folder_id AND";
foreach ($final_search_words as $word) {
    $where_list .= " title LIKE '%$word%' OR";
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
<div class="content_wrapper" style="width: calc(100% - 30em);">
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
                <input type="hidden" value="<?php echo $folder_id; ?>" name="folder">
            </form>
        </div>
       	<form class="search sort">
            <input id="dat1" class="cont_row n_date" type="date" value="2003-10-05">
            <select class="item_sorting" id="n_sort">
                <option class="notes_sorting" selected>By date desc</option>
                <option class="notes_sorting">By date asc</option>
                <option class="notes_sorting">By name asc</option>
                <option class="notes_sorting">By name desc</option>
            </select>
            <input id="dat2" class="cont_row n_date" type="date" value=<?php echo date("Y-m-d") ?>>
        </form>
        <form method="post" action="deleteFolder.php" style="width: 100%; margin: 1em 2em">
            <input type="hidden" value="<?php echo $folder_id?>" name="folder">
            <button type="submit" title="Удалить заметку" name="deleteFolder" style="border-radius: 20px; width: 100%; background-color: rgba(255,0,0,0.85);">
                <h2>Удалить каталог</h2>
            </button>
        </form>
    </div>
    <!-- Note boxes-->
    <div class="content">
        <h1>Заметки</h1>
    </div>
    <div class="content notes">
        <div class="block note" title="Создать заметку" onclick="location.href='createNote.php?folder=<?php echo $folder_id ?>'">
            <img src="Photos/plus.png" style="width: 5em; margin: 3em; opacity: 0.5;">
        </div>
        <?php if ($final_search_words[0] != "") { ?>
            <?php while ($res_array = mysqli_fetch_array($res_query)) {
				if (!($res_array['deleted'])) {?>
                <!-- Search notes-->
                <div class="block note" title="Редактировать заметку"
                     style="background: <?php echo $res_array['color']; ?>"
                     onclick="location.href='readNote.php?note=<?php echo $res_array["id"]; ?>;'">
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
        }} else {
            while ($note = mysqli_fetch_array($select_note)) {
                if (!($note['deleted'])) { ?>
                    <!-- Notes -->
                    <div class="block note" title="Редактировать заметку"
                         style="background: <?php echo $note['color']; ?>"
                         onclick="location.href='readNote.php?note=<?php echo $note["id"]; ?>;'">
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
<div class="menu folders_m">
    <h1 style="margin: 0.5em auto 1em; width: 5em;">Каталоги</h1>
    <?php while ($folder = mysqli_fetch_array($select_folder)) { ?>
        <!-- Notes -->
        <div class="folders" style="background: <?php echo $folder['color']; ?>"
             onclick="location.href='folder.php?folder=<?php echo $folder["id"]; ?>'">
            <h2><?php echo $folder['title']; ?></h2>
        </div>
    <?php } ?>
</div>
<script>
    $(document).ready(function () {
        $('#n_sort').change(function () {
            let orderBy = $(this).val()
            let dat1 = $('#dat1').val()
            let dat2 = $('#dat2').val()
            let folder = "<?php echo $folder_id; ?>"
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
					console.log(data);
                    $('.notes').html(data);
                },

            })
        });
        $('.n_date').change(function () {
            let orderBy = $('.n_date').val()
            let dat1 = $('#dat1').val()
            let dat2 = $('#dat2').val()
            let folder = "<?php echo $folder_id?>"
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

