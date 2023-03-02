<?php

function urutanAngka($angka){
    $no_angka = 1;
    for ($col = 0; $col < $angka; $col++){
    for ($row = 0; $row <= $col; $row++ ){
        echo $no_angka." ";
        $no_angka = $no_angka + 1;
    }
    echo "<br/>";
    }
}
echo urutanAngka(8);

?>