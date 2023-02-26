<!DOCTYPE html>
<html> 
<head> 
<title>Tugas 2d</title>
<meta hcharset="UTF-8">
</head>
<body> 
    <table border="1px" width="270px" cellspacing="0px" cellpadding="0px">
        <?php for($baris=1;$baris<=5;$baris++){
                echo "<tr>";
                for($kolom=1;$kolom<=5;$kolom++){
                    $total=$baris+$kolom;
                if($total%2==0){
                    echo "<td bgcolor=white></td>";
                }
		        else{
                    echo "<td bgcolor=black></td>";
                }
                }
                echo "</tr>";
            }
        ?>
</table>
</body>
<style>
    td{
        width: 30px;
        height: 50px;
    }
</style>
</html>