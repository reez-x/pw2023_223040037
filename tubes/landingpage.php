<?php 
require 'functions.php';
$id = $_GET['id'];

$news = query("SELECT * FROM news WHERE id = $id")[0];
$sql = "SELECT * FROM news";
$recomendation = $conn->query($sql);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <!-- Link -->
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
    <link rel="stylesheet" href="css/landingpage.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@680&family=Roboto+Slab&display=swap" rel="stylesheet">
</head>
<?php require 'navbar.php';?>
<body>
    <div class="container">
        <div class="news-container">
            <div class="image">
                <img src="uploads/<?php echo $news['gambar']?>" alt="">
            </div>
            <div class="text">
                <h1 class="judul"><?php echo $news['judul']?></h3>
                <p><?php echo date("M d, Y", strtotime($news["tanggal"])); ?></p>
                <p class="deskripsi"><?php echo $news['deskripsi']?></p>
                <p class="konten"><?php echo $news['konten']?></p>
            </div>
        </div>
        <div class="recomendation">
            <div class="kabar-terkini">
                <div class="header">
                    <h4>KABAR TERKINI</h4>
                </div>
                <div class="kabar-container">
                <?php while ($row = mysqli_fetch_assoc($recomendation)) { ?>
                    <a href="landingpage.php?id=<?= $row['id'] ?>" class="card-link">
                    <div class="card">
                    
                        <div class="gambar">
                            <img src="uploads/<?php echo $row['gambar']?>">
                        </div>
                        <div class="recomendation-text">
                            <div class="tanggal">
                                <i class='bx bxs-calendar'></i>
                                <p><?php echo $row['tanggal']?></p>
                            </div>
                            <h6><?php echo $row['judul']?></h6>
                        </div>
                    </div>
                </a>
                    <?php } ?>
                </div>
            </div>
        </div>
    </div>
</body>
<?php include 'footer.php';?>
</html>