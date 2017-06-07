<?php
require_once "core/init.php";
global $link; //memanggil file connect.php supaya terkoneksi dengan database

//mengambil data isian dari textfield yang bersesuaian dan menyimpannya dalam variabel
$nama = $_POST['nama'];
$lat = $_POST['lat'];
$long = $_POST['long'];
$type = $_POST['type'];

if (empty($nama) || empty($lat) || empty($long) || empty($type))  //cek jika ada texfield yang Kosong
	{
		echo "Form ada yang kosong, silahkan isi ulang";
	}
else
	{
		$queriku = mysqli_query($link, "insert into wifi_public(nama, lat, long, type) values('$nama','$lat','$long','$type')");
		if ($queriku == TRUE)
			{
				echo "Data Berhasil ditambah, silahkan lihat daftar ?><a href='read.php'>wifi</a><?php";
			}
		else
			{
				echo "error";
			}
	}
?>

