<nav aria-label="breadcrumb">
  <ol class="breadcrumb">
    <li class="breadcrumb-item"><a href="?content=home">Home</a></li>
    <li class="breadcrumb-item">Transaksi</li>

  </ol>
</nav>
<div class="col-12">
<div class="col-md-12" style="padding:10px; padding-left:0;padding-right:0;">
            <a href="?content=product_tambah" class="btn btn-info">Tambah</a>
         </div>
                        <div class="card">
                            <div class="card-body">
                               <center> <h4 class="card-title" style="font-size:160%;font-weight: bold">Transaksi</h4></center>
                            </div>
                            <div class="table-responsive">
                                <table class="table">
                                    <thead class="thead-light">
                                        <tr>
                                        <th class="info">Nomor Transaksi</th>
				<th class="info">Tanggal Transaksi</th>
				  <th class="info">Nama Transaksi</th>
                  <th class="info">Nomor Akun Debit</th>
				  <th class="info">Nomor Akun Kredit</th>
				   <th class="info">Nominal (Rp.)</th>
                  <th class="info" colspan="2">Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                    <?php
    include '../config/configuration.php';
    // include './content_laporan/labarugi.php';
    // echo var_dump($laba);
    $product = mysqli_query($conn, "SELECT * from transaksi");
    foreach ($product as $result){
		echo "<tr>
				<td>".$result['no_trx']."</td>
				<td>".$result['tgl']."</td>
				<td>".$result['nama_transaksi']."</td> 
				<td>".$result['debet']."</td> 
				<td>".$result['kredit']."</td> 
				<td>RP. ".number_format($result['nominal'])."</td> 
	
				<td><a href='?content=product_edit&no_trx=$result[no_trx]'>edit</a></td>
                <td><a href='?content=product_delete&no_trx=$result[no_trx]'>delete</a></td>
				</tr>";
	}
	
		
		?>

                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                    
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