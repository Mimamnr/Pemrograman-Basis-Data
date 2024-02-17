<?php 
include "../koneksi.php";
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>DAFTAR KARYAWAN</title>
    <link href="../bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <meta charset="utf-8">
</head>
<body>

<div class="container">
    <div class="row">
        <div class="col-md-12">
            <h3 class="text-center">Halaman Daftar Karyawan</h3>
            <a class="btn btn-primary" href="tambah_data.php" role="button">Tambah</a>
            <a class="btn btn-success" href="gaji_karyawan.php" role="button">Gaji Karyawan</a>
            <a class="btn btn-danger" href="../logout.php" role="button">Logout</a>
            <!--INSERT TABLE-->
            <table class="table table-striped">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>NIK</th>
                        <th>Nama Karyawan</th>
                        <th>Jabatan</th>
                        <th>Tgl Masuk</th>
                        <th>Divisi</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    $no=1;
                    $query="select * from tb_karyawan";
                    $query_r = mysqli_query($connect, $query);
                    if (!$query_r){
                        printf("eror: %s\n", mysqli_error($connect));
                        exit();
                    }
                    while ($result = mysqli_fetch_array($query_r)) {
                    ?>
                    <tr>
                        <td><?php echo $no;?></td>
                        <td><?php echo $result['nik'];?></td>
                        <td><?php echo $result['nama_karyawan'];?></td>
                        <td><?php echo $result['jabatan'];?></td>
                        <td><?php echo $result['tgl_masuk'];?></td>
                        <td><?php echo $result['divisi'];?></td>
                        <td>    
                            <a class="btn btn-success" href="update_data.php?id=<?php echo $result['no'];?>">Update</a>
                            |<a class="btn btn-danger" href="delete.php?id=<?php echo $result['no'];?>">Delete</a>
                        </td>
                    </tr>
                    <?php
                    $no++;
                    }
                    ?>
                </tbody>
            </table>
        </div>
    </div>
</div>

<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
<script src="../bootstrap/js/bootstrap.min.js"></script>
</body>
</html>
