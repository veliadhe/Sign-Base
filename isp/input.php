<?php
require_once "../core/db.php";
global $link;
if( isset( $_POST['nama'] ) ){
  $query = "SELECT id_kota from kota where nama_kota LIKE '$input' ";
  $result = mysqli_query($link, $query);

  $tampil = mysqli_query($link, "SELECT nama FROM isp WHERE id_kota = '$query'");
  while($row = mysql_fetch_array($tampil)){
    echo "<p>".$row['age']."</p>";
    echo "<p>".$row['course']."</p>";
  }
}
?>
