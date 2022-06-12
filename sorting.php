<?php
require_once("Connections/project_con.php");

$user = $_SESSION['user_id'][0];
$ord = $_POST['orderBy'];
$dat1 = $_POST['dat1'];
$dat2 = $_POST['dat2'];
$search = $_POST['search'];
if ($search != ""){
$search = "(". $search . ") and ";
}
$fold_q = '';
if (isset($_POST['folder'])){
	$folder = $_POST['folder'];
	$fold_q = 'folder_id = ' . $folder . ' and';
	echo '<div class="block note" title="Создать заметку" onclick="location.href=`createNote.php?folder=' .  $folder  . '`">
            <img src="Photos/plus.png" style="width: 5em; margin: 3em; opacity: 0.5;">
        </div>';
}
else {
	$fold_q = "folder_id in (SELECT id FROM folders WHERE user_id = '" . $user . "') and";
}
$select_note = mysqli_query($link, "SELECT * FROM notes WHERE " . $search . $fold_q . " created BETWEEN '$dat1' and '$dat2' ORDER BY created DESC ");
if ($ord == "By name asc") {
    $select_note = mysqli_query($link, "SELECT * FROM notes WHERE ". $search . $fold_q . " created BETWEEN '$dat1' and '$dat2' ORDER BY title ASC");
}
if ($ord == "By name desc") {
    $select_note = mysqli_query($link, "SELECT * FROM notes WHERE ". $search . $fold_q . " created BETWEEN '$dat1' and '$dat2' ORDER BY title DESC");
}
if ($ord == "By date asc") {
    $select_note = mysqli_query($link, "SELECT * FROM notes WHERE ". $search . $fold_q . " created BETWEEN '$dat1' and '$dat2' ORDER BY created ASC");
}
while ($note = mysqli_fetch_array($select_note)) {
    if (!($note['deleted'])) {
        echo '<div class="block note" title="Редактировать заметку"
                         style="background:' . $note['color'] . '"' .
            'onclick="location.href=`readNote.php?note=' . $note["id"] . '`">
                        <div>
                            <div class="note_head">
                                <h2>' . $note['title'] . '</h2>
                            </div>
                            <div class="note_text">
                                <h3>' . $note['article'] . '</h3>
                            </div>
                        </div>
                        <div class="note_date">
                            <p>' . $note['created'] . '</p>
                        </div>
                    </div>';
    }
}
