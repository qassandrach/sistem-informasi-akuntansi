<nav aria-label="breadcrumb">
  <ol class="breadcrumb">
    <li class="breadcrumb-item"><a href="?content=home">Home</a></li>
    <li class="breadcrumb-item">Code of Account</li>
  </ol>
</nav>
<div class="col-12">
  <center>
    <p style="font-size:160%;font-weight: bold">Code of Account</p>
  </center>
  <div class="col-md-12" style="padding:10px; padding-left:0;padding-right:0;">
    <a href="?content=coa_tambah" class="btn btn-info">Tambah</a>
  </div>

  <div class="card">
    <div class="table-responsive">
      <table class="table">
        <thead class="thead-light">
          <tr>
            <th class="info">Kode Akun</th>
            <th class="info">Nama Akun</th>
            <th class="info">Golongan</th>
            <th class="info">Klasifikasi</th>
            <th class="info">Saldo</th>
            <th class="info" colspan="2">Action</th>
          </tr>
        </thead>
        <tbody>
          <?php
          include '../config/configuration.php';
          $product = mysqli_query($conn, "SELECT * from tb_coa");
          foreach ($product as $result) {
            echo "<tr>
				<td>" . $result['kode_akun'] . "</td>
				<td>" . $result['nama'] . "</td> 
				<td>" . $result['gol'] . "</td> 
				<td>" . $result['klas'] . "</td> 
				<td>RP. " . number_format($result['saldo']) . "</td> 
				<td><a href='?content=coa_edit&kode_akun=$result[kode_akun]'>edit</a></td>
                <td><a href='?content=coa_delete&kode_akun=$result[kode_akun]'>delete</a></td>
				</tr>";
          }

          ?>
        </tbody>
      </table>
    </div>
  </div>
</div>