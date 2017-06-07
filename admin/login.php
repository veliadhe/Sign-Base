<?php

require_once "core/init.php";

  if( isset($_POST['submit']) ){
    $nama = $_POST['username'];
    $pass = $_POST['password'];

    if(!empty(trim($nama)) && !empty(trim($pass)))
    {
      if(login_cek_nama($nama))
        {
          if(cek_data($nama, $pass)){
            $_SESSION['admin'] = $nama;
            header('Location: index.php');
          }
          else{
            echo header ('Location: login-gagal.html');
          }
        }
        else{
            echo header ('Location: belum-terdaftar.html');
        }
      }
      else{
            echo header ('Location: tidak-kosong.html');
        }
  }
