<?php
require 'functions.php';
$keyword = $_GET['keyword'];
$query = "SELECT * FROM 
            news   
        WHERE  
            judul LIKE '%$keyword%' OR 
            deskripsi LIKE '%$keyword%'

        ";

$news = query($query);
?>
<!-- // dropdown.php

// Koneksi ke database

// Lakukan pencarian berdasarkan keyword

// Contoh hasil pencarian, Anda dapat menggantinya dengan kode yang sesuai dengan kebutuhan Anda

// Tampilkan hasil pencarian -->

<?php foreach ($news as $item) { ?>
    <div class="search-item"><p><?= $item["judul"]; ?></p></div>

<?php } ?>


