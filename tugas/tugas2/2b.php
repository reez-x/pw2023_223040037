<?php
$jml_angkot = 10;
$angkot_rusak = 1;

$no_angkot =1;
for($jml_angkot=1; $jml_angkot<=10; $jml_angkot++){
    for($angkot_rusak=1; $angkot_rusak<=$jml_angkot; $angkot_rusak++){
        echo "$angkot_rusak ";
    }
    echo "<br>";
}


