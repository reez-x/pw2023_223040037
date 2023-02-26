<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Tugas2</title>
</head>
<body>

    <table border="0" cellpadding="10" cellspacing="0">
        <?php for($baris=10; $baris>=1; $baris--){ ?>
            <tr>
                <?php for($kolom=1; $kolom<=$baris; $kolom++){ ?>
                    <div><?php echo " $kolom "; ?></div>
                <?php } ?>
                </tr>
            <?php echo "<br>"; ?>
        <?php } ?>
    </table>

</body>
<style>
    div{
        display: inline-block;
        width: 40px;
        height: 30px;
        background-color: cyan;
        border: 1px black solid;
        text-align: center;
        padding-top: 10px;
    }
</style>
</html>


