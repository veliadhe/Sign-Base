<?php 
 
include 'core/db.php';
global $link;
$id = $_POST['id'];
$nama = $_POST['nama'];
$lat = $_POST['lat'];
$long = $_POST['long'];
 
mysqli_query($link, "UPDATE isp SET nama='$nama', lat='$lat', long='$long' WHERE id_isp='$id'");
 
header("location:edit-isp.php?pesan=update");
?>