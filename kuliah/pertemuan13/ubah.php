<?php
require 'functions.php';
$name = 'Ubah data mahasiswa';

$id = htmlspecialchars($_GET['id']);
$student = query("SELECT * FROM mahasiswa WHERE id = $id")[0];

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

require 'views/ubah.view.php';