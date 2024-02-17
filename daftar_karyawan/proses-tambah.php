<?php
include "../koneksi.php";
?>

<?php

$nik			= $_POST['nik'];
$nama_karyawan	= $_POST['nama_karyawan'];
$kode_jabatan		= $_POST['kode_jabatan'];
$tgl_masuk		= $_POST['tgl_masuk'];
$kode_divisi			= $_POST['kode_divisi'];

$query_insert= "INSERT INTO tb_karyawan
            (nik,nama_karyawan,kode_jabatan,tgl_masuk,kode_divisi)VALUES ('$nik',
        '$nama_karyawan',
        '$kode_jabatan',
        '$tgl_masuk',
        '$kode_divisi')";


$query_insert_ok =mysqli_query($connect,$query_insert);


if ($query_insert_ok){
	
	header("location:home.php?pesan=SuksesTambah");
}else{
	header("location:home.php?pesan=GagalTambah");
}

?> 