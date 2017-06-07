<?php 
include 'core/db.php';
global $link;
$id = $_GET['id'];
mysqli_query($link, "DELETE FROM wifi_public WHERE id_wifi='$id'")or die(mysqli_error());

header("location:data-wifi.php?pesan=hapus");
?>