<?php

require_once "core/init.php";

if( isset($_POST['submit']) ){
  $nama = $_POST['username'];
  $pass = $_POST['password'];
  $mail = $_POST['email'];
  $name = $_POST['name'];

  if (!empty(trim($nama)) && !empty(trim($pass))  && !empty(trim($name)) && !empty(trim($mail)) ){

  if(register_cek_nama($nama)){
    //memasukan ke database
        if(register_user($nama, $pass, $name, $mail)){
          header('Location: berhasil.html');
        }else{
          echo header ('Location: gagal.html');
        }
      }else{
        echo header ('Location: adauser.html');
      }



  }else{
    echo header ('Location: gagal-daftar.html');
  }
}