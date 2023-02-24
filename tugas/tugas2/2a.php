<?php
$depan="Rizky";
$belakang="Abdurrahman";
$jml_angka = 100;
$angkot_rusak = 4;


$no_angka =1;
while ($no_angka <= $jml_angka ){
    
    if ($no_angka %3 == 0)
    echo "$depan ";
    if ($no_angka %5 == 0)
    echo "$belakang <br>";
    elseif ($no_angka %3 == 0)
    echo "<br>";
    
    else 
    echo "$no_angka  <br>";
    $no_angka++;
}

?>