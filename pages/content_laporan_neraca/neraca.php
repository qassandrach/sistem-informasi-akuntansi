<nav aria-label="breadcrumb">
  <ol class="breadcrumb">
    <li class="breadcrumb-item"><a href="?content=home">Home</a></li>
    <li class="breadcrumb-item">Laporan Neraca</li>
  </ol>
</nav>
 <div class="col-md-10" style="min-height:656px">
 <br>
 <center><p style="font-size:160%;font-weight: bold">Laporan Neraca </p></center>

            <table class="table table-bordered">
               <tr>
				<th  colspan="2" class="info">Aset Lancar</th>
               </tr>
			   <?php
    include '../config/configuration.php';
    $product = mysqli_query($conn, "SELECT * FROM `tb_coa` WHERE kode_akun LIKE '10%' AND NOT saldo=0");
    foreach ($product as $result){
		echo "<tr>
				<td>".$result['nama']."</td>
				<td>RP. ".number_format($result['saldo'])."</td> 
				</tr>";
	}
		?>
         <tr>
				<th  colspan="2" class="info">Aset Tetap</th>
               </tr>
	<?php
	$harga_total = 0;	
	$sql = mysqli_query($conn,"SELECT * FROM `tb_coa` WHERE kode_akun LIKE '10%' AND NOT saldo=0");
	while($data=mysqli_fetch_assoc($sql)) {
	$harga_total += $data['saldo'];
	}
	?>
		<tr>
		 <td colspan="2" style="text-align: left; font-size: 17px;"><b>Total Aset :</b></td>
		<td style="font-size: 17px; text-align: left; "><?php echo " Rp." . number_format($harga_total).",-"; ?></td>
		</tr>

            </table>

            <table class="table table-bordered">
               <tr>
				<th colspan="2" class="info">Liabilitas</th>
               </tr>
			   <?php
    include '../config/configuration.php';
    $product = mysqli_query($conn, "SELECT * FROM `tb_coa` WHERE kode_akun LIKE '2%' AND NOT saldo=0");
    foreach ($product as $result){
		echo "<tr>
				<td>".$result['kode_akun']."</td>
				<td>".$result['nama']."</td>
				<td>RP. ".number_format($result['saldo'])."</td> 
				</tr>";
	}
		?>
        <tr>
				<th colspan="2" class="info">Ekuitas</th>
               </tr>
               <?php
    include '../config/configuration.php';
    $product = mysqli_query($conn, "SELECT * FROM `tb_coa` WHERE kode_akun LIKE '3%' AND NOT saldo=0");
    foreach ($product as $result){
		echo "<tr>
				<td>".$result['nama']."</td>
				<td>RP. ".number_format($result['saldo'])."</td> 
				</tr>";
	}
		?>
	<?php
	$jml = 0;	
	$sql = mysqli_query($conn,"SELECT * FROM `tb_coa` WHERE kode_akun LIKE '2%' OR kode_akun LIKE '3%' AND NOT saldo=0");
	while($data=mysqli_fetch_assoc($sql)) {
	$jml=$jml+$data['saldo'];
	}
	?>
		<tr>
		 <td colspan="2" style="text-align: left; font-size: 17px;"><b>Total Liabilitas & Ekuitas :</b></td>
		<td style="font-size: 17px; text-align: left; "><?php echo " Rp." . number_format($jml).",-"; ?></td>
		</tr>

            </table>
			

   </div>