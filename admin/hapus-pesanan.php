<?php
  session_start();
  if (empty($_SESSION['pesanan_id'])){
    header("location:../login.php");
  }
?>
<?php

include "../koneksi.php";
$NP=$_GET['NP'];


$hapus=$koneksi->query("delete from pesanan where NP='$NP'");

if($hapus==true){

    header("location:tampilan-pesanan.php?pesan=hapusBerhasil");

} else{
    echo "Error";
}


?>