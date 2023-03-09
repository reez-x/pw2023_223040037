<?php
//ARRAY
//ARRAY adalah variable yang bisa menampung banyak nilai

$hari = ['senin','selasa','rabu','kamis','jumat','sabtu','minggu'];
$bulan = array('januari','februari','maret');
$myArray = ['Rizky',10, false];
$binatang = ['ayam','ular'];

var_dump($hari);
print_r($bulan);

var_dump($hari[1]);

echo "<hr>";

//Manipulasi Array
//Menambah elemen di akhir array
$bulan[] = 'april';
print_r($bulan);

echo "<hr>";
array_push($bulan, 'juni','juli','agustus');
print_r($bulan);
echo "<hr>";

//Menambah elemen di awal Array
array_unshift($binatang, 'ikan');
print_r($binatang);
echo "<hr>";

//Menghapus elemen di akhir array
array_pop($hari);
print_r($hari);

//Menghapus elemen di awal array
echo "<hr>";
array_shift($hari);
print_r($hari);
?>