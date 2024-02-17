<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Registrasi Karyawan</title>
    <link href="bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="style.css">
</head>
<body>
    <div class="row">
        <div class="col-md-6">
            <h3 class="text-center">Registrasi Karyawan</h3>
        </div>
        <div class="col-md-12">
            <form method="post" action="register_proses.php">
                <div class="form-group">
                    <label>NIK</label>
                    <input type="text" name="nik" class="form-control" placeholder="Masukkan NIK" required>
                </div>
                <div class="form-group">
                    <label>Nama Karyawan</label>
                    <input type="text" name="nama" class="form-control" placeholder="Masukkan Nama" required>
                </div>
                <div class="form-group">
                    <label>Password</label>
                    <input type="password" name="password" class="form-control" placeholder="Masukkan Password" required>
                </div>
                <div class="form-group">
                    <button type="submit" class="btn-btn-primary">Register</button>
                    <p>Sudah punya akun? <a href="index.php">Login disini</a></p>
                </div>
            </form>
        </div>
    </div>
    <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
    <script src="bootstrap/js/bootstrap.min.js"></script>
</body>
</html>
