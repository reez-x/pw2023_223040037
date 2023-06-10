<?php
require '../functions.php';
$id = $_GET['id'] ?? '';

$news = query("SELECT * FROM news WHERE id = $id")[0];
if(isset($_POST['ubah'])){


    // Ambil data dari form lalu tambah ke tabel mahasiswa
    // Cek apakah ubah data berhasil
        if(ubah($_POST) > 0){
            echo "<script>
            alert('ubah data berhasil');
            document.location.href = 'userscopy.php';
            </script>";
            
        }
    }
?>
<?php include 'partials/dashboard-top.php';?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit</title>

    <!-- Link -->
    <link rel="stylesheet" href="../css/ubah.css">
</head>
<body>
    <div class="form">
        <form action="ubah.php?id=<?php echo $id; ?>" method="POST" enctype="multipart/form-data">
        <input type="hidden" name="id" value="<?php echo $news['id']?>">
        <select name="kategori">
            <option value="nasional">Nasional</option>
            <option value="ragam">Ragam</option>
            <option value="layanan">Layanan</option>
            <option value="olahraga">Olahraga</option>
        </select>
        <div class="input-box">
          <label>Judul</label>
          <input type="text" name="judul" id="judul" placeholder="Masukkan Judul" required value="<?php echo $news['judul']?>">
          <p id="result"></p>
        </div>
        <div class="input-box">
          <label>Deskripsi</label>
          <input type="text" name="deskripsi" id="deskripsi" placeholder="Masukkan Deskripsi" required value="<?php echo $news['deskripsi']?>">
        </div>
        <div class="input-box">
          <label>Konten</label>
          <input type="text" name="konten" id="konten" placeholder="Masukkan Konten" required value="<?php echo $news['konten']?>">
        </div>
        <div class="input-box">
        <label>Tanggal:</label>
        <input type="date" name="tanggal" id="tanggal" required value="<?php echo $news['tanggal']; ?>">
        </div>
        <div class="gambar-awal">
            <img class="gambar" src="../uploads/<?php echo $news['gambar']?>">
        </div>
            <input type="file" name="imageUpload" id="imageUpload" >
            <button id="choose">Choose Image</button>
            <input type="submit" value="Upload" name="ubah">
        </form>
    </div>
    
    
</body>
</html>
<?php include 'partials/dashboard-bottom.php';?>