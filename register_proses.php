<?php
session_start();
include 'koneksi.php';

$nik = $_POST['nik'];
$nama = $_POST['nama'];
$password = $_POST['password'];

$query = "INSERT INTO tb_user (nik, nama_karyawan, password, level) VALUES ('$nik', '$nama', '$password', '2')";

if ($connect->query($query) === TRUE) {
    header("location:index.php");
} else {
    header("location:register.php");
}

$connect->close();
?>
