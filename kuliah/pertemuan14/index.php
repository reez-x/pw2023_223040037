<?php
require('functions.php');
$name = 'Home';
// $students = [
//   [
//     "nama" => "Sandhika Galih",
//     "npm" => "043040023",
//     "email" => "sandhikagalih@unpas.ac.id"
//   ],
//   [
//     "nama" => "Doddy Ferdiansyah",
//     "npm" => "133040003",
//     "email" => "doddy@gmail.com"
//   ]
// ];

$students = query("SELECT * FROM mahasiswa");

// Cari Mhasiswa w/ Search clicked
if(isset($_GET['search'])){
$keyword = $_GET['keyword'];
$query = "SELECT * FROM mahasiswa 
WHERE nama LIKE '%$keyword%' OR
        jurusan LIKE '%$keyword%' OR
        email LIKE '%$keyword%'
";
$students = query($query);
}
// dd(BASE_URL === $_SERVER["REQUEST_URI"]);
require('views/index.view.php');
