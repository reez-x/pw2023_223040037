<?php
require 'navbar.php';
require 'functions.php';
session_start();

if(isset($_POST["submit"])){
    $kategori = htmlspecialchars($_POST["kategori"]);
    $judul = htmlspecialchars($_POST["judul"]);
    $konten = htmlspecialchars($_POST["konten"]);
    $alamat = htmlspecialchars($_POST["alamat"]);
    $tanggal = htmlspecialchars($_POST["tanggal"]);
    $userid = $_SESSION['user_id'];

    $upload_dir = "uploads/user/lapor/";
    $gambar = $upload_dir.basename($_FILES["imageUpload"]["name"]);
    $gambar_name = basename($_FILES["imageUpload"]["name"]);
    $upload_dir.$_FILES["imageUpload"]["name"];
    $upload_file = $upload_dir.basename($_FILES["imageUpload"]["name"]);
    $imageType = strtolower(pathinfo($upload_file,PATHINFO_EXTENSION));
    $check = $_FILES["imageUpload"]["size"];
    $upload_ok = 0;

    if(file_exists($upload_file)){
        echo "<script>alert('The file already exist')</script>";
        $upload_ok = 0;
    }else{
            if($imageType ==  'jpg' || $imageType == 'png' || $imageType == 'jpeg'){
                $upload_ok = 1;
            }else{
                echo "<script>alert('ini bukan gambar')</script>";
            }
    

    if($upload_ok == 0){
        echo "<script>alert('gagal')</script>";
    }else{
        if($judul != ""){
            move_uploaded_file($_FILES["imageUpload"]["tmp_name"],$gambar);
            $sql = "INSERT INTO lapor(id_user,kategori,judul,konten,alamat,tanggal,gambar)
            VALUES('$userid','$kategori','$judul','$konten','$alamat','$tanggal','$gambar_name')";

            if($conn->query($sql) === TRUE){
                echo "<script>alert('sukses');
                document.location.href = 'userscopy.php';
                </script>";
                exit;
            }
        }   
    }
}
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Lapor</title>
    <link rel="stylesheet" href="css/lapor.css">
</head>
<body>
<div class="container" id="container">
    <h1>Halaman Lapor</h1>
    <form action="lapor.php" method="POST" enctype="multipart/form-data">
    <div class="input-box">
    <label for="kategori">Kategori :</label>
        <select name="kategori" id="kategori" required>
            <option value="">Pilih Kategori</option>
            <option value="Banjir">Banjir</option>
            <option value="Kehilangan">Kehilangan</option>
            <option value="Kecurian">Kecurian</option>
            <!-- Tambahkan opsi kategori lainnya sesuai kebutuhan -->
        </select>
    </div>
    <div class="input-box">
        <label for="title">Judul :</label>
        <input type="text" name="judul" id="judul" placeholder="Masukkan Judul" required>
    </div>
    <div class="input-box">
        <label>Konten :</label>
        <textarea type="text" name="konten" id="konten" placeholder="Masukkan Konten" required></textarea>
        <p id="limit-konten"></p>
    </div>
    <div class="input-box">
        <label>Alamat :</label>
        <textarea type="text" name="alamat" id="alamat" placeholder="Masukkan Alamat" required></textarea>
        <p id="limit-konten"></p>
    </div>
    <div class="input-box">
        <input type="file" name="imageUpload" id="imageUpload" required>
        <button id="choose">Choose Image</button>
    </div>
    <div class="input-box">
        <label>Tanggal :</label>
        <input type="date" name="tanggal" id="tanggal" required>
    </div>
    <div class="input-box">
        <input type="submit" value="Upload" name="submit" class="submit">
    </div>  
    </form>  
</div>
<script>
        var judul = document.getElementById("judul");
        var choose = document.getElementById("choose");
        var uploadImage = document.getElementById("imageUpload");

        function upload(){
            uploadImage.click();
        }

        uploadImage.addEventListener("change",function(){
            var file = this.file[0];
            if(judul.value == ""){
                judul.value = file.name;
            }
            choose.innerHTML = "You can change("+file.name+") picture";
            });
</script>
</body>
<script>
        //    Auto Expand Text area
        const textarea = document.querySelector("textarea");
        textarea.addEventListener("keyup", e =>{
        textarea.style.height = "63px";
        let scHeight = e.target.scrollHeight;
        textarea.style.height = `${scHeight}px`;
      });
</script>
