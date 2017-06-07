<?php
	include "core/init.php";
	global $link;
	
	$id = $_GET['id'];
	$nama = $_POST['nama'];
	$lat = $_POST['lat'];
	$long = $_POST['long'];
	$type = $_POST['type'];

if(isset($_POST['update'])){
	if (empty($nama) || empty($lat) || empty($long) || empty($type))  //cek jika ada texfield yang Kosong
		{
			echo "Form ada yang kosong, silahkan isi ulang";
		}
	else
		{
			$queriku = mysqli_query($link, "UPDATE wifi_public set 
				nama='$nama', 
				lat='$lat', 
				long='$long', 
				type='$type' 
				where id_wifi='$id'");
			if ($queriku == TRUE)
				{
				header('location=read.php');
				}
			else
			{
				echo "error";
			}
	}
}

?>