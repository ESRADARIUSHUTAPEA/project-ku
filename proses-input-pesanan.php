
<?php


$Nama=$_POST['Nama'];
$Alamat=$_POST['Alamat'];
$No_HP=$_POST['No_HP'];
$Nama_Baju=$_POST['Nama_Baju'];
$Ukuran=$_POST['Ukuran'];

include "koneksi.php";

$simpan=$koneksi->query(" insert into pesanan(Nama,Alamat,No_HP,Nama_Baju,Ukuran)
                        values ('$Nama','$Alamat','$No_HP','$Nama_Baju','$Ukuran')");

if($simpan==true){

    header("location:input-pesanan.php?pesan=inputBerhasil");
} else{
    echo "Error";
}




?>