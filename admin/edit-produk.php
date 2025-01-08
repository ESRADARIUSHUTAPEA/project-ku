<?php
session_start();
if (empty($_SESSION['user_id'])) {
    header("location:../login.php");
}
include "header.php";
include "../koneksi.php";

// Dapatkan ID produk dari URL
$id = isset($_GET['id']) ? (int)$_GET['id'] : 0;

// Ambil data produk berdasarkan ID
$result = $koneksi->query("SELECT * FROM produk WHERE id = $id");
$produk = $result->fetch_assoc();

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $nama = $koneksi->real_escape_string($_POST['nama']);
    $harga = $koneksi->real_escape_string($_POST['harga']);
    $gambar = $_FILES['gambar']['name'];
    $target = "../image/" . basename($gambar);

    if (!empty($gambar) && move_uploaded_file($_FILES['gambar']['tmp_name'], $target)) {
        $query = "UPDATE produk SET nama = '$nama', harga = '$harga', gambar = '$gambar' WHERE id = $id";
    } else {
        $query = "UPDATE produk SET nama = '$nama', harga = '$harga' WHERE id = $id";
    }

    if ($koneksi->query($query) === TRUE) {
        header("location:tampil-produk.php?pesan=editBerhasil");
    } else {
        echo "Error: " . $query . "<br>" . $koneksi->error;
    }
}
?>

<div class="container" style="margin-top: 100px;">
    <div class="row">
        <div class="col-md-6 col-md-offset-3">
            <h2>Edit Produk</h2>
            <form action="" method="POST" enctype="multipart/form-data">
                <div class="form-group">
                    <label for="nama">Nama Produk</label>
                    <input type="text" name="nama" class="form-control" value="<?php echo htmlspecialchars($produk['nama']); ?>" required>
                </div>
                <div class="form-group">
                    <label for="harga">Harga</label>
                    <input type="number" name="harga" class="form-control" value="<?php echo $produk['harga']; ?>" required>
                </div>
                <div class="form-group">
                    <label for="gambar">Gambar</label>
                    <input type="file" name="gambar" class="form-control">
                    <img src="../image/<?php echo htmlspecialchars($produk['gambar']); ?>" width="100" alt="<?php echo htmlspecialchars($produk['nama']); ?>">
                </div>
                <button type="submit" class="btn btn-primary">Simpan Perubahan</button>
            </form>
        </div>
    </div>
</div>

<?php include "footer.php"; ?>