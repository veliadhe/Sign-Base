<?php 
error_reporting(E_ALL ^ E_NOTICE); 
include 'core/db.php';
global $link;
$id = $_POST['id'];
$nama = $_POST['nama'];
$lat = $_POST['lat'];
$long = $_POST['long'];
$type = $_POST['type'];
 
$yo = "UPDATE wifi_public SET nama='$nama', lat='$lat', long='$long' WHERE id_wifi='$id'";
if(mysqli_query($link, $yo)){
header("location:data-user.php?pesan=update");
}
else{
	echo "yau";
}
?>