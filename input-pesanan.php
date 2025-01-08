
<?php include 'navbar.php'?>
    <div class="container">
        <div class="row">
            <div class="col-md-12">

            <?php 

if(@$_GET['pesan']=="inputBerhasil"){

?>
    <div class="alert alert-success">
    Terima kasih, pesanan anda sudah terkirim!
    </div>
<?php

}

    ?>
                <form action="proses-input-pesanan.php" method="POST">
                    <div class="form-group">
                        <label for="Nama">NAMA</label>
                        <input type="text" name="Nama" class="form-control">
                    </div>
                    <div class="form-group">
                        <label for="Alamat">ALAMAT</label>
                        <input type="text" name="Alamat" class="form-control">
                    </div>

                    <div class="form-group">
                        <label for="No_HP">NO HP</label>
                        <textarea name="No_HP" class="form-control"></textarea>
                    </div>

                    <div class="form-group">
                        <label for="Nama_Baju">NAMA BAJU</label>
                        <textarea name="Nama_Baju" class="form-control"></textarea>
                    </div>

                    <div class="form-group">
                        <label for="Ukuran">UKURAN</label>
                        <textarea name="Ukuran" class="form-control"></textarea>
                    </div>

                    <input type="submit" name="kirim" value="SIMPAN" class="btn btn-info">
                    <input type="reset" name="kosongkan" value="Kosongkan" class="btn btn-danger">
                </form>
            </div>
        </div>
    </div>
<?php include "footer.php";?>