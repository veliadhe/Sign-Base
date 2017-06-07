<html>
	<head>
		<title>WiFi</title>
	</head>
	<body>
		<h2>Daftar WiFi</h2>
		<table border="1px" width="59%">
			<tr>
				<td width="36%">Nama</td>
				<td width="27%">Lat</td>
				<td width="37%">Long</td>
				<td width="37%">Type</td>
			</tr>

		<?php
		require_once "core/init.php";
		global $link;  //memanggil file connect.php supaya terkoneksi dengan database
       	$query = mysqli_query($link, "SELECT * from wifi_public");   //melakukan query pada database
	    while ( $data = mysqli_fetch_array($query) ) //melooping pada setiap data hasil query
		{
				?>
				<tr>
					<td><?php echo $data['nama'];?></td>   
					<td><?php echo $data['lat'];?></td>
					<td><?php echo $data['long'];?></td>
					<td><?php echo $data['type'];?></td>
					<td><a href="delete.php?id=<?php echo $data['id_wifi']; ?>"> delete </a></td>
					<td><a href="edit.php?id=<?php echo $data['id_wifi']; ?>"> edit </a></td>
				</tr>
				
		<?php } ?>
		</table>
	</body>
</html>