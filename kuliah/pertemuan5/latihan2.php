<?php
$binatang = ['ayam','ular','ikan','burung','sapi'];
$warna = ['hitam','hijau','coklat','biru','putih']

//Mengurutkan Array
//sort(),rsort()


//Mencetak array untuk user
//for, foreach
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Peternakan</title>
</head>
<body>
    <h2>Daftar Binatang</h2>
    <ul>
        <?php for($i = 0; $i < count($binatang); $i++){ ?>
        <li><?php echo $binatang[$i] ; ?></li>
        <?php } ?>
    </ul>
    <h2>Daftar Warna</h2>
    <ul>
        <?php for($i = 0; $i < 5; $i++){ ?>
        <li><?php echo $warna[$i] ; ?></li>
        <?php } ?>
    </ul>

    <h2>Daftar Binatang dengan warna</h2>
    <ul>
        <?php for($i = 0; $i < count($warna); $i++){ ?>
        <li><?php echo $binatang[$i] ; ?> = <?php echo $warna[$i] ?></li>
        <?php } ?>
    </ul>

    <hr>
    <h2>Daftar Binatang</h2>
    <ol>
        <?php foreach($binatang as $b){ ?>
        <li><?= $b; ?></li>
        <?php }?>
    </ol>
    <h2>Daftar Warna</h2>
    <ol>
        <?php foreach($warna as $w){ ?>
        <li><?= $w; ?></li>
        <?php }?>
    </ol>
    <hr>
</body>
</html>