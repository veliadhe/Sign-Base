<?php

require_once "core/init.php";

if( !isset($_SESSION['user'])){
  header('Location: user/login.php');
}

?>

<h1>Halaman Profil <?php echo $_SESSION['user']; ?> </h1>

<br>
<a href="user/logout.php">logout</a>
