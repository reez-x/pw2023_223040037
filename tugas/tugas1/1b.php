<?php 
$npm = "37"; // 223040037
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tugas 1b</title>
</head>
<body>
    <p>
     Aku adalah angka <b><?php echo $npm ?></b><br>
     <?php $hasilkali = $npm * 5 ?>
     Jika aku dikali 5, maka aku sekarang menjadi <b><?php echo $hasilkali ?></b><br>
     <?php $hasilbagi = $hasilkali / 2 ?>
     Jika aku dibagi 2, maka aku sekarang menjadi <b><?php echo $hasilbagi ?></b><br>
     <?php $hasiltambah = $hasilbagi + 75 ?>
     Jika aku ditambah 75, maka aku sekarang menjadi <b><?php echo $hasiltambah ?></b><br>
     <?php $hasilkurang = $hasiltambah - 20 ?>
     Jika aku dikurang 20, maka aku sekarang menjadi <b><?php echo $hasilkurang ?></b><br>
    </p>
</body>
</html>