<?php
include "../koneksi.php";

// Panggil stored procedure gaji_pegawai
$query = "CALL gaji_pegawai()";
$result = mysqli_query($connect, $query);

if (!$result) {
    printf("Error: %s\n", mysqli_error($connect));
    exit();
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Gaji Karyawan</title>
    <link href="../bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <meta charset="utf-8">
</head>
<body>

<div class="container">
    <div class="row">
        <div class="col-md-12">
            <h3 class="text-center">Gaji Karyawan</h3>
            <a class="btn btn-primary" href="home.php" role="button">Kembali</a>
            <!--INSERT TABLE-->
            <table class="table table-striped">
                <thead>
                    <tr>
                        <th>NIK</th>
                        <th>Nama Karyawan</th>
                        <th>Gaji</th>
                        <th>Gaji Bersih</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    while ($row = mysqli_fetch_assoc($result)) {
                        ?>
                        <tr>
                            <td><?php echo $row['nik']; ?></td>
                            <td><?php echo $row['nama_karyawan']; ?></td>
                            <td><?php echo $row['gaji']; ?></td>
                            <td><?php echo $row['gaji_bersih']; ?></td>
                        </tr>
                        <?php
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