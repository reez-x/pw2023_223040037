<?php
echo "<h4>Menghitung Luas Lingkaran</h4>";

function hitungLuasLingkaran($r){
    echo "Jari-jari = $r cm.<br>";
    echo "Luas lingkaran = ";
    echo 3.14*$r ;
    echo " cm<br>";
}
echo hitungLuasLingkaran("10");

echo "<hr />";

echo "<h4>Menghitung Keliling Lingkaran</h4>";

function hitungKelilingLingkaran($r){
    echo "Jari-jari = $r cm.<br>";
    echo "Keliling lingkaran = ";
    echo 3.14*$r*2 ;
    echo " cm<br>";
}

echo hitungKelilingLingkaran("20");

echo "<hr />";
?>