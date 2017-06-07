<?php 
 
include 'core/db.php';
global $link;
$id = $_POST['id'];
$nama = $_POST['nama'];
$lat = $_POST['lat'];
$long = $_POST['long'];
$type = $_POST['type'];
 
mysqli_query($link, "UPDATE wifi_public SET nama='$nama', lat='$lat', long='$long' WHERE id_wifi='$id'");
 
header("location:data-wifi.php?pesan=update");
?>