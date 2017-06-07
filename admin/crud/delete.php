<?php 
		require_once "core/init.php";
		global $link;
		
		$id = $_GET['id'];
		$queriku = mysqli_query($link, "DELETE from wifi_public where id='$id'");
		
		if($queriku == TRUE){
			echo "Data berhasil di hapus silahkan lihat daftar <a href='read.php'>komentar</a>";
		}
		else{
				echo "error";
		}
?>