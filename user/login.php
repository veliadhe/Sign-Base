<?php

require_once ('../core/init.php');

if( isset($_POST['submit']) ){
    $unama = $_POST['username'];
    $pass = $_POST['password'];

    if(!empty(trim($unama)) && !empty(trim($pass)))
    {
      if(login_cek_nama($unama))
        {
          if(cek_data($unama, $pass)){
            $_SESSION['user'] = $unama;
            header('Location: ../tampilan_isp.php');
          }
          else{
            echo 'Data ada yang salah';
          }
        }
        else{
            echo 'Namanya belum terdaftar di database';
        }
      }
      else{
            echo 'Tidak Boleh Kosong';
        }
  }

  require_once "../view/header.php";
?>

<form action="login.php" method="post">
  <label for="">Username</label> <br>
  <input type="text" name="username"> <br><br>

  <label for="">Password</label> <br>
  <input type="password" name="password"> <br><br>

  <input type="submit" name="submit" value="Masuk">
</form>
