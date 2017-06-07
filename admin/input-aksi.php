<?php 
include 'core/db.php';
global $link;
$nama = $_POST['nama'];
$lat = $_POST['lat'];
$long = $_POST['long'];
$type = $_POST['type'];
 
mysqli_query($link, "INSERT INTO wifi_public VALUES('','$nama','$lat','$long', '$type')");
 
header("location:data-wifi.php?pesan=input");
?>