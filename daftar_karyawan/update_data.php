<?php
include "../koneksi.php";
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>EDIT DATA KARYAWAN</title>
    <link href="../bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <meta charset="utf-8">
</head>
<body>
    <div class="container">
        <div class="row">
            <div class="col-md-6">
                <h3 class="text-center">Edit Data Karyawan</h3>
                <a class="btn btn-primary" href="home.php" role="button">Kembali</a>

                <?php
                $id_db_karyawan = $_GET['id'];

                $query_nilai ="select * from tb_karyawan where no='$id_db_karyawan'";
                $query_nilai_ok = mysqli_query($connect, $query_nilai);
                if (!$query_nilai_ok){
                    printf("eror: %s\n",mysqli_error($connect));
                    exit();
                }

                while ($query_result = mysqli_fetch_array($query_nilai_ok)) { 
                    $nik_ok = $query_result['nik'];
                    $nama_karyawan_ok = $query_result['nama_karyawan'];
                    $jabatan_ok = $query_result['kode_jabatan'];
                    $tgl_masuk_ok = $query_result['tgl_masuk'];
                    $divisi_ok = $query_result['kode_divisi'];
                ?>
                <form method="POST" action="">
                    <div class="form-group">
                        <label for="nik">NIK</label>
                        <input type="text" class="form-control" name="nik" id="nik_ok" value="<?php echo $nik_ok;?>">
                    </div>

                    <div class="form-group">
                        <label for="nama_karyawan">Nama Karyawan</label>
                        <input type="text" class="form-control" name="nama_karyawan" id="nama_karyawan_ok" value="<?php echo $nama_karyawan_ok;?>">
                    </div>

                    <div class="form-group">
                        <label for="kode_jabatan">Jabatan</label>
                        <select class="form-control" name="kode_jabatan" id="jabatan_ok">
                            <option value="1" <?php if($jabatan_ok == 1) echo "selected"; ?>>1 - Technical Support</option>
                            <option value="2" <?php if($jabatan_ok == 2) echo "selected"; ?>>2 - Accounting</option>
                        </select>
                    </div>

                    <div class="form-group">
                        <label for="tgl_masuk">Tgl Masuk</label>
                        <input type="date" class="form-control" name="tgl_masuk" id="tgl_masuk_ok" value="<?php echo $tgl_masuk_ok;?>">
                    </div>

                    <div class="form-group">
                        <label for="kode_divisi">Kode Divisi</label>
                        <select class="form-control" name="kode_divisi" id="divisi_ok">
                            <option value="1" <?php if($divisi_ok == 1) echo "selected"; ?>>1 - Staff</option>
                            <option value="2" <?php if($divisi_ok == 2) echo "selected"; ?>>2 - Umum</option>
                        </select>
                    </div>

                    <button type="submit" class="btn btn-default">Submit</button>
                </form>
                <?php } ?>

                <?php
                if (isset($_POST['nik'])){
                    $nik            = $_POST['nik'];
                    $nama_karyawan  = $_POST['nama_karyawan'];
                    $kode_jabatan       = $_POST['kode_jabatan'];
                    $tgl_masuk          = $_POST['tgl_masuk'];
                    $kode_divisi        = $_POST['kode_divisi'];

                    $query_update= "
                    UPDATE tb_karyawan
                    SET
                        nik             = '$nik',
                        nama_karyawan   = '$nama_karyawan',
                        kode_jabatan    = '$kode_jabatan',
                        tgl_masuk       = '$tgl_masuk',
                        kode_divisi     = '$kode_divisi'
                    WHERE no ='$id_db_karyawan'
                    ";

                    $query_update_ok = mysqli_query($connect, $query_update);
                    
                    if ($query_update_ok){
                        header("Location: home.php?status=SuksesUpdate");
                        exit(); // Menghentikan eksekusi skrip PHP lebih lanjut
                    } else {
                        header("Location: home.php?status=GagalUpdate");
                        exit(); // Menghentikan eksekusi skrip PHP lebih lanjut
                    }
                }
                ?>
            </div>
        </div>
    </div>
</body>
</html>
