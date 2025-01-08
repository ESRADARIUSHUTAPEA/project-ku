<?php
  session_start();
  if (empty($_SESSION['pesanan_id'])){
    header("location:../login.php");
  }
?>
<?php

include "../koneksi.php";

$id=$_POST['pesanan_id'];
$NP=$_POST['NP'];
$Nama=$_POST['Nama'];
$Alamat=$_POST['Alamat'];
$No_HP=$_POST['No_HP'];
$Nama_Baju=$_POST['Nama_Baju'];
$Ukuran=$_POST['Ukuran'];

$ubah=$koneksi->query("update pesanan set NP='$NP', Nama='$Nama', Alamat'$Alamat', No_HP='$No_HP', Nama_Baju'$Nama_Baju', Ukuran'$Ukuran' where pesanan_id='$id'");

if($ubah==true){

    header("location:tampilan-pesanan.php?pesan=editBerhasil");
} else{
    echo "Error";
}

?>