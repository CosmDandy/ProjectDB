<?php
require_once("Connections/project_con.php");
$user = $_SESSION['user_id'][0];

if (isset($_POST["deleteFolder"])) {
    $folder = $_POST["folder"];
    $delete_folder = mysqli_query($link, "DELETE FROM folders WHERE id = '$folder'");
    $delete_notes = mysqli_query($link, "DELETE FROM notes WHERE folder_id = '$folder'");
    header('Location: ' . 'main.php');
}
?>