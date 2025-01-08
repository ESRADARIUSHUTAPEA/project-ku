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
                <th>NP</th><th>Nama</th><th>ALAMAT</th><th>NO_HP</th><th>NAMA BAJU</th><th>UKURAN</th>
                <th>aksi</th>
            </tr> 
        </thead> 
        <tbody>
        <?php

        include "../koneksi.php";
        $sql=$koneksi->query("SELECT * FROM pesanan ORDER BY NP");
        while($row= $sql->fetch_assoc()){
        ?>

            <tr>
                <td><?php echo $row['NP']?></td>
                <td><?php echo $row['Nama']?></td>
                <td><?php echo $row['Alamat']?></td>
                <td><?php echo $row['No_HP']?></td>
                <td><?php echo $row['Nama_Baju']?></td>
                <td><?php echo $row['Ukuran']?></td>

                <td>
                <a href="hapus-pesanan.php?NP=<?php echo $row['NP']?>" onclick=" return confirm('Anda yakin menghapus data?')">
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