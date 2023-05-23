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

// Connect Database
$conn = mysqli_connect('localhost', 'root', '', 'pw2023_223040037') or die('Koneksi ke database gagal');

// Query ke tabel mahasiswa
$result = mysqli_query($conn, "SELECT * FROM mahasiswa");

$rows = [];
while($row = mysqli_fetch_assoc($result)){


$rows[] = $row;
};

// dd($rows);


// Siapkan data $students
$students = $rows;

// dd(BASE_URL === $_SERVER["REQUEST_URI"]);
require('views/index.view.php');
