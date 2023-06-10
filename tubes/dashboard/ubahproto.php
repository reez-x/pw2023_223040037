<?php
require '../functions.php';
$id = htmlspecialchars($_GET['id']);
$student = query("SELECT * FROM news WHERE id = $id")[0];

// Ketika submit:clicked
if(isset($_POST['ubah'])){


// Ambil data dari form lalu tambah ke tabel mahasiswa
// Cek apakah ubah data berhasil
    if(ubah($_POST) > 0){
        echo "<script>
        alert('ubah data berhasil');
        document.location.href = 'index.php';
        </script>";
    }
}
?>
<!doctype html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Pemrograman Web | <?= $name; ?></title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">
</head>

<body>

<div class="container mt-3">
    <h1>Tambah Data Mahasiswa</h1>

    <div class="row">
        <div class="col-md-8">
            <form method="post">
                <input type="hidden" name="id" value="<?php echo $student['id']?>">
                <div class="mb-3 w-25">
                    <label for="kategori" class="form-label">NIM</label>
                    <input type="text" class="form-control" name="kategori" id="nim" maxlength="9" autofocus required value="<?php echo $student['kategori']?>">
                </div>
                <div class="mb-3">
                    <label for="judul" class="form-label">Nama</label>
                    <input type="text" class="form-control" name="judul" id="nama" value="<?php echo $student['judul']?>">
                </div>
                <div class="mb-3">
                    <label for="deskripsi" class="form-label">Email</label>
                    <input type="text" class="form-control" name="deskripsi" id="email" value="<?php echo $student['deskripsi']?>">
                </div>
                <div class="mb-3">
                    <label for="konten" class="form-label">Jurusan</label>
                    <input type="text" class="form-control" name="konten" id="jurusan" value="<?php echo $student['konten']?>">
                </div>
                <div class="mb-3">
                    <label for="tanggal" class="form-label">Jurusan</label>
                    <input type="text" class="form-control" name="tanggal" id="jurusan" value="<?php echo $student['tanggal']?>">
                </div>
                <div class="mb-3">
                    <label for="gambar" class="form-label">Gambar</label>
                    <input type="text" class="form-control" name="gambar" id="gambar" value="<?php echo $student['gambar']?>">
                </div>
                <button class="btn btn-primary" type="submit" name="ubah">Ubah Data</button>
            </form>
        </div>
    </div>

</div>