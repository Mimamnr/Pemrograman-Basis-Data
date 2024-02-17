<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tambah Data Karyawan</title>
    <link href="../bootstrap/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>

<div class="container">
    <div class="row">
        <div class="col-md-6">
            <h3 class="text-center">TAMBAH DATA KARYAWAN</h3>

            <a class="btn btn-primary" href="home.php" role="button">Kembali</a>

            <form action="proses-tambah.php" method="post">
                <div class="form-group">
                    <label for="nik">NIK</label>
                    <input type="text" class="form-control" name="nik" id="nik">
                </div>

                <div class="form-group">
                    <label for="nama_karyawan">Nama Karyawan</label>
                    <input type="text" class="form-control" name="nama_karyawan" id="nama_karyawan">
                </div>

                <div class="form-group">
                    <label for="kode_jabatan">Kode Jabatan</label>
                    <select class="form-control" name="kode_jabatan" id="kode_jabatan">
                        <option value="1">1 - Technical Support</option>
                        <option value="2">2 - Accounting</option>
                    </select>
                </div>

                <div class="form-group">
                    <label for="tgl_masuk">Tgl Masuk</label>
                    <input type="date" class="form-control" name="tgl_masuk" id="tgl_masuk">
                </div>

                <div class="form-group">
                    <label for="kode_divisi">Kode Divisi</label>
                    <select class="form-control" name="kode_divisi" id="kode_divisi">
                        <option value="1">1 - Staff</option>
                        <option value="2">2 - Umum</option>
                    </select>
                </div>

                <button type="submit" class="btn btn-default">Submit</button>
            </form>

        </div>
    </div>
</div>

</body>
</html>
