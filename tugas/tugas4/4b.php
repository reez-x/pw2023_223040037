<?php
$text = ['Motherboard','Processor','Hard Disk','PC Cooler','VGA Card','SSD'];
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tugas 4b</title>
</head>
<body>
<h3>Macam-macam perangkat keras komputer</h3>
    <ol>
        <?php for($i = 0; $i < count($text); $i++){ ?>
        <li><?php echo $text[$i] ; ?></li>
        <?php } ?>
    </ol>

    <h3>Macam-macam perangkat keras komputer baru</h3>
    <ol>
        <?php 
        array_unshift($text, 'Card Reader');
        $text[] = 'Modem';
        sort($text);
        for($i = 0; $i < count($text); $i++){ ?>
        <li><?php echo $text[$i] ; ?></li>
        <?php } ?>
    </ol>
</body>
</html>