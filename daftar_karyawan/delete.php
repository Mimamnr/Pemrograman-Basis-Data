<?php
include "home.php";

$id_db_karyawan = $_GET['id'];

$query_delete = "delete from tb_karyawan where no= '$id_db_karyawan'";

$query_delete_ok = mysqli_query($connect,$query_delete);

if ($query_update_ok){
	header("Location: home.php?status=SuksesUpdate");
	exit(); // Menghentikan eksekusi skrip PHP lebih lanjut
} else {
	header("Location: home.php?status=GagalUpdate");
	exit(); // Menghentikan eksekusi skrip PHP lebih lanjut
}

?>