<?php
require 'functions.php';
$name = 'Tambah data mahasiswa';

// Ketika submit:clicked
if(isset($_POST['tambah'])){

    
// Ambil data dari form lalu tambah ke tabel mahasiswa
// Cek apakah tambah data berhasil
    if(tambah($_POST) > 0){
        echo "<script>
        alert('tambah data berhasil');
        document.location.href = 'index.php';
        </script>";
    }
}

require 'views/tambah.view.php';