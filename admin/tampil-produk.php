<?php
  session_start();
  if (empty($_SESSION['user_id'])){
    header("location:../login.php");
  }
?>
<?php include "header.php"; ?>
<div class="container">
    <div class="row">
        <div class="col-md-12">
        <h1>DATA PESANAN</h1>
            <?php 

            if(@$_GET['pesan']=="inputBerhasil"){

            ?>
                    <div class="alert alert-success">
                    Penyimpanan Berhasil!
                    </div>
            <?php

            }

            ?>


            <?php 

            if(@$_GET['pesan']=="hapusBerhasil"){

            ?>
                    <div class="alert alert-success">
                    Data Berhasil Dihapus!
                    </div>
            <?php

            }

            ?>

  


        <table  class="table table-bordered table-hover" id="data-table">
        <thead>
            <tr>
                <th>Nama</th><th>Harga</th><th>Gambar</th>
            </tr> 
        </thead> 
        <tbody>
        <?php

        include "../koneksi.php";
        $sql=$koneksi->query("SELECT * FROM produk ORDER BY id");
        while($row= $sql->fetch_assoc()){
        ?>

            <tr>
                <td><?php echo $row['nama']?></td>
                <td><?php echo $row['harga']?></td>
                <td><img src="../images/<?php echo $row['gambar']; ?>" width="100px"
height="100px" class="img-responsive"></td>



                <td>
                <a href="hapus-produk.php?id=<?php echo $row['id']?>" onclick=" return confirm('Anda yakin menghapus produk?')">
                    <button class="btn btn-xs btn-warning glyphicon glyphicon-remove"></button>
                </a>
                </td>
            </tr>

        <?php    
        }
        ?>
        </tbody>
        </table>
        </div>
    </div>
</div>


<?php include "footer.php";?>