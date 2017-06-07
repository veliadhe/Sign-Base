<?php 
include 'core/db.php';
global $link;
$nama = $_POST['nama'];
$lat = $_POST['lat'];
$long = $_POST['long'];
 
mysqli_query($link, "INSERT INTO isp VALUES('','$nama','$lat','$long')");
 
header("location:data-isp.php?pesan=input");
?>