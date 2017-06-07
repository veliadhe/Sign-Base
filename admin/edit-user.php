<!DOCTYPE html>
<html>
<head>
	<title>Membuat CRUD Dengan PHP Dan MySQL - Menampilkan data dari database</title>
	<link rel="stylesheet" type="text/css" href="style.css">
</head>
<body>
	<div class="judul">		
		<h1>Membuat CRUD Dengan PHP Dan MySQL</h1>
		<h2>Menampilkan data dari database</h2>
		<h3>www.malasngoding.com</h3>
	</div>
	
	<br/>
	
	<a href="index.php">Lihat Semua Data</a>

	<br/>
	<h3>Edit data</h3>

	<?php 
	include "core/db.php";
	global $link;
	$id = $_GET['id'];
	$query_mysql = mysqli_query($link, "SELECT * FROM isp WHERE id_isp='$id'")or die(mysqli_error());
	$nomor = 1;
	while($data = mysqli_fetch_array($query_mysql)){
	?>
	<form action="update-isp.php" method="post">		
		<table>
			<tr>
				<input type="hidden" name="id" value="<?php echo $data['id_isp'] ?>">
				<td>Name</td>
				<td>
					<input type="text" name="nama" value="<?php echo $data['nama'] ?>">
				</td>					
			</tr>	
			<tr>
				<td></td>
				<td><input type="text" name="username" value="<?php echo $data['username'] ?>"></td>					
			</tr>	
			<tr>
				<td>Username</td>
				<td><input type="text" name="username" value="<?php echo $data['username'] ?>"></td>					
			</tr>
			<tr>
				<td></td>
				<td><input type="email" name="email" value="<?php echo $data['email'] ?>"></td>					
			</tr>	
			<tr>
				<td>Email</td>
				<td><input type="email" name="email" value="<?php echo $data['email'] ?>"></td>					
			</tr>
			<tr>
				<td></td>
				<td><input type="submit" value="Simpan"></td>					
			</tr>				
		</table>
	</form>
	<?php } ?>
</body>
</html>