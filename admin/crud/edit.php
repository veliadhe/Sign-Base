<?php
	require_once "core/init.php";
	global $link;
	$id = $_GET['id'];
	$queriku = mysqli_query($link, "SELECT * FROM wifi_public WHERE id_wifi='$id'");
	$data = mysqli_fetch_array($queriku);
?>

<h1 align="center">Edit Wifi</h1>
<fieldset style="width: 50%; margin: auto;">
    
	<form method="post" action="edit_post.php?id=<?php echo $data['id_wifi']; ?>">
			<table>
				<tr>
					<td>Nama</td>
					<td><input type="text" name="nama"></td>
				</tr>
				<tr>
					<td>Lat</td>
					<td><input type="text" name="lat"></td>
				</tr>
				<tr>
					<td>Long</td>
					<td><input type="text" name="long"></td>
				</tr>
				<tr>
					<td>Type</td>
					<td><input type="type" name="type"></td>
				</tr>
				<tr>
					<td></td>
					<td><input type="submit" value="submit">
					<input type="reset" value="Reset" onclick="return confirm('hapus data yang telah diinput?')"></td>
				</tr>
			</table>
		</form>