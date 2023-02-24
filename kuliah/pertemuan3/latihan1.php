<?php 
echo "Mulai. <br>";
//1. 
//2. kondisi terminasi / kapan pengulangan berhenti
//3. increment / decrement
$nilai_awal = 1;
while($nilai_awal <= 10) { //kondisi terminasi
    echo "Hello World $nilai_awal x<br>";
    $nilai_awal = $nilai_awal + 1; // increment
}


    echo "<hr>";
    echo "Mulai. <br>";
    for($nilai_awal = 1; $nilai_awal <= 5; $nilai_awal++){
        echo "Hello world $nilai_awal x. <br>";
    }
    echo "Selesai. <br>";
?>