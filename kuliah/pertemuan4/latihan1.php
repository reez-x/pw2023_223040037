<?php
//Cek bilangan ganjil atau genap
function cekGanjil($angka){
if ($angka %2 == 1){
return "$angka adalah angka Ganjil";
}
else {
return "$angka adalah angka Genap";
}
}
echo cekGanjil(10);
?>