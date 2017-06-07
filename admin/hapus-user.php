<?php 
include 'core/db.php';
global $link;
$id = $_GET['id'];
mysqli_query($link, "DELETE FROM user_table WHERE id_user='$id'")or die(mysqli_error());

header("location:data-user.php?pesan=hapus");
?>