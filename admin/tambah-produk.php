<?php
session_start();
if (empty($_SESSION['user_id'])) {
    header("location:../login.php");
}
include "header.php";
include "../koneksi.php";

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $nama = $koneksi->real_escape_string($_POST['nama']);
    $harga = $koneksi->real_escape_string($_POST['harga']);
    $gambar = $_FILES['gambar']['name'];
    $target = "../images/" . basename($gambar);

    if (move_uploaded_file($_FILES['gambar']['tmp_name'], $target)) {
        $query = "INSERT INTO produk (nama, harga, gambar) VALUES ('$nama', '$harga', '$gambar')";
        if ($koneksi->query($query) === TRUE) {
            header("location:tampil-produk.php?pesan=inputBerhasil");
        } else {
            echo "Error: " . $query . "<br>" . $koneksi->error;
        }
    } else {
        echo "Gagal mengupload gambar.";
    }
}
?>

<div class="container">
    <div class="row">
        <div class="col-md-6 col-md-offset-3">
            <h2>Tambah Produk</h2>
            <form action="" method="POST" enctype="multipart/form-data">
                <div class="form-group">
                    <label for="nama">Nama Produk</label>
                    <input type="text" name="nama" class="form-control" required>
                </div>
                <div class="form-group">
                    <label for="harga">Harga</label>
                    <input type="number" name="harga" class="form-control" required>
                </div>
                <div class="form-group">
                    <label for="gambar">Gambar</label>
                    <input type="file" name="gambar" class="form-control" required>
                </div>
                <button type="submit" class="btn btn-primary">Tambah Produk</button>
            </form>
        </div>
    </div>
</div>
<?php include "footer.php"; ?>
