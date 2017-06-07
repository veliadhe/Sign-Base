<?php 
include 'core/db.php';
global $link;
$id = $_GET['id'];
mysqli_query($link, "DELETE FROM isp WHERE id_user='$id'")or die(mysqli_error());

header("location:data-isp.php?pesan=hapus");
?>