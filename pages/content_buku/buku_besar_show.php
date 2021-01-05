<?php 
include '../config/configuration.php';

$nama_akun = $_POST['nama_akun'];
?>
<nav aria-label="breadcrumb">
  <ol class="breadcrumb">
    <li class="breadcrumb-item"><a href="?content=home">Home</a></li>
    <li class="breadcrumb-item"><a href="?content=buku_besar">Buku Besar</a></li>
    <li class="breadcrumb-item">Buku Besar <?php echo $nama_akun?></li>
  </ol>
 <br>
 <center><p style="font-size:160%;font-weight: bold">Buku Besar <?php echo "$nama_akun"?> </p></center>
 <div class="col-md-10" style="min-height:600px">

            <table class="table table-bordered">
              <tr>
                <th class="info">Tanggal Transaksi</th>
                <th class="info">Nama Transaksi</th>
                <th class="info">Debit</th>
                <th class="info">Kredit</th>
                <th class="info">Saldo</th>
              </tr>
              <?php
              include '../config/configuration.php';
                $saldo = 0;
                $gol = '';
                $sql_akun = mysqli_query($conn, "SELECT * FROM tb_coa where nama='$nama_akun'");
                while ($data_akun = mysqli_fetch_assoc($sql_akun)) {
                  $gol = $data_akun['gol'];
                }
                $transaksi = mysqli_query($conn, "SELECT tgl, nama_transaksi, CASE WHEN debet='$nama_akun' THEN nominal END AS debit, CASE WHEN kredit='$nama_akun' THEN nominal END AS kredit FROM transaksi WHERE debet='$nama_akun' OR kredit='$nama_akun'");
                while($data_transaksi = mysqli_fetch_assoc($transaksi)) {
                  $tgl = $data_transaksi['tgl'];
                  $nama_transaksi = $data_transaksi['nama_transaksi'];
                  $saldo_debit = $data_transaksi['debit'];
                  $saldo_kredit = $data_transaksi['kredit'];
                  
                  if ($gol == 'Debet') {
                    if ($saldo_kredit == 0){
                      $saldo = $saldo + $saldo_debit;
                    } else {
                      $saldo = $saldo - $saldo_kredit;
                    }
                  } else {
                    if ($saldo_kredit == 0){
                      $saldo = $saldo - $saldo_debit;
                    } else {
                      $saldo = $saldo + $saldo_kredit;
                    }
                  }
                 
                  ?>
                  <tr>
                    <td> <?php echo $tgl?></th>
                    <td> <?php echo $nama_transaksi?></th>
                    <td> <?php echo number_format($saldo_debit)?></th>
                    <td> <?php echo number_format($saldo_kredit)?></th>
                    <td> <?php echo number_format($saldo)?></th>
                  </tr><?php

                }
              ?>
            </table>
            <div class="col-md-12">
               <nav align="center">
                 <ul class="pagination">
                   <li>
                     <a href="#" aria-label="Previous">
                       <span aria-hidden="true">&laquo;</span>
                     </a>
                   </li>
                   <li><a href="#">1</a></li>
                   <li>
                     <a href="#" aria-label="Next">
                       <span aria-hidden="true">&raquo;</span>
                     </a>
                   </li>
                 </ul>
               </nav>

            </div>
   </div>