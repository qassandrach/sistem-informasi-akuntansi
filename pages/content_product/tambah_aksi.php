<?php
include '../config/configuration.php';
// include './content_laporan/labarugi.php';
$nama_transaksi       	= $_POST['nama_transaksi'];
$nominal      			= $_POST['nominal'];
$nama_akun_debit       	= $_POST['debet'];
$nama_akun_kredit		= $_POST['kredit'];
$date					= $_POST['date'];

$sql= "INSERT INTO `transaksi` (`tgl`, `nama_transaksi`, `debet`, `kredit`, `nominal`) VALUES ('$date','$nama_transaksi','$nama_akun_debit', '$nama_akun_kredit', '$nominal')";

$sql_akun_debit = mysqli_query($conn, "SELECT * FROM tb_coa where nama='$nama_akun_debit'");
while ($data_akun_debit = mysqli_fetch_assoc($sql_akun_debit)){
    
    $kode_akun_debit = $data_akun_debit["kode_akun"];
    $saldo_akun_debit = $data_akun_debit["saldo"];
    $nama_akun_debit = $data_akun_debit["nama"];
    $gol_akun_debit = $data_akun_debit["gol"];

    if ($gol_akun_debit == "Debet"){
        $sql_akun = mysqli_query($conn, "UPDATE tb_coa SET saldo = saldo + '$nominal' WHERE nama ='$nama_akun_debit'");
       
    } else {
        $sql_akun = mysqli_query($conn, "UPDATE tb_coa SET saldo = saldo - '$nominal' WHERE nama ='$nama_akun_debit'");
     }

}

$sql_akun_kredit = mysqli_query($conn, "SELECT * FROM tb_coa where nama='$nama_akun_kredit'");
while ($data_akun_kredit = mysqli_fetch_assoc($sql_akun_kredit)){

    $kode_akun_kredit = $data_akun_kredit["kode_akun"];
    $saldo_akun_kredit = $data_akun_kredit["saldo"];
    $nama_akun_kredit = $data_akun_kredit["nama"];
    $gol_akun_kredit = $data_akun_kredit["gol"];
    
    
    if ($gol_akun_kredit == "Kredit"){
        $sql_akun = mysqli_query($conn, "UPDATE tb_coa SET saldo = saldo + '$nominal' WHERE nama ='$nama_akun_kredit'");
        
    } else {
        $sql_akun = mysqli_query($conn, "UPDATE tb_coa SET saldo = saldo - '$nominal' WHERE nama ='$nama_akun_kredit'");
       
            
    }
    
}
// update SHU
$pendapatan_total = 0;	
$sql_pendapatan = mysqli_query($conn,"SELECT * FROM `tb_coa` WHERE kode_akun LIKE '4%' AND NOT saldo=0");
while($data=mysqli_fetch_assoc($sql_pendapatan)) {
	$pendapatan_total += $data['saldo'];
}
$biaya_total = 0;	
$sql_biaya = mysqli_query($conn,"SELECT * FROM `tb_coa` WHERE kode_akun LIKE '5%' AND NOT saldo=0");
while($data=mysqli_fetch_assoc($sql_biaya)) {
	$biaya_total=$biaya_total+$data['saldo'];
}
$laba = 0;	
$sql_laba = mysqli_query($conn,"SELECT * FROM `tb_coa`");
while($data=mysqli_fetch_assoc($sql_laba)) {
	$laba=$pendapatan_total-$biaya_total;
}
$sql_update_shu = mysqli_query($conn, "UPDATE tb_coa SET saldo = $laba WHERE nama = 'SHU'");
if($conn->query($sql) === false) {
    trigger_error('Perintah SQL Salah: ' . $sql . ' Error: ' . $conn->error, E_USER_ERROR);
} else {
    ?>
     <script language="javascript">
            alert('Berhasil Disimpan');
            document.location.href="?content=product";
         </script>
 <?php  
 }


?> 
