<?php

require_once "../core/init.php";

if( isset($_POST['submit']) ){
  $unama = $_POST['username'];
  $pass = $_POST['password'];
  $email = $_POST['email'];
  $nama = $_POST['name'];

  if (!empty(trim($unama)) && !empty(trim($pass)) ){

  if(register_cek_nama($unama)){
    //memasukan ke database
        if(register_user($unama, $pass)){
          echo 'berhasil';
        }else{
          echo 'gagal daftar';
        }
      }else{
        echo 'nama sudah ada, tidak bisa daftar';
      }



  }else{
    echo 'tidak boleh kosong';
  }
}

require_once "../view/header.php";
?>


<form action ="signup.php" method="post">
  <label for="">Nama</label> <br>
  <input type="text" name="name"> <br><br>

  <label for="">Email</label> <br>
  <input type="email" name="email"> <br><br>

  <label for="">Usernama</label> <br>
  <input type="text" name="username"> <br><br>

  <label for="">Password</label> <br>
  <input type="password" name="password"> <br><br>

  <input type="submit" name="submit" value="daftar">
</form>
