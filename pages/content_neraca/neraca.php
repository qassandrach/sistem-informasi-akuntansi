
<nav aria-label="breadcrumb">
  <ol class="breadcrumb">
    <li class="breadcrumb-item"><a href="?content=home">Home</a></li>
    <li class="breadcrumb-item">Neraca Saldo</li>
  </ol>
</nav>
<div class="col-md-10" style="min-height:600px">
            <table class="table table-bordered">
               <tr>
                  <th class="info">Kode Akun</th>
                  <th class="info">Nama Akun</th>	
				  <th class="info">Debit</th>
                  <th class="info">Kredit</th>
                  
               </tr>
     
	
			   <?php
    include '../config/configuration.php';
    $product = mysqli_query($conn, "SELECT kode_akun, nama, CASE WHEN gol='Debet' THEN saldo END AS debit, CASE WHEN gol='Kredit' THEN saldo END AS kredit FROM `tb_coa`");
    foreach ($product as $result){
		echo "<tr>
				<td>".$result['kode_akun']."</td>
				<td>".$result['nama']."</td> 
				<td>RP. ".number_format($result['debit'])."</td> 
                <td>RP. ".number_format($result['kredit'])."</td> 
        </tr>";
   
  }
    ?>
    	<?php
  $total_debit = 0;	
  $total_kredit = 0;
	$sql = mysqli_query($conn,"SELECT CASE WHEN gol='Debet' THEN saldo END AS debit, CASE WHEN gol='Kredit' THEN saldo END AS kredit FROM `tb_coa`");
	while($data=mysqli_fetch_assoc($sql)) {
  $total_debit += $data['debit'];
  $total_kredit += $data['kredit'];
	}
	?>
    	<tr>
		 <td colspan="2" style="text-align: left; font-size: 17px;"><b>Total Nominal :</b></td>
		<td style="font-size: 17px; text-align: left; ">Rp. <?php echo $total_debit?></td>
    <td style="font-size: 17px; text-align: left; ">Rp. <?php echo $total_kredit?></td>
		</tr>
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