<?php
require 'functions.php';
$keyword = $_GET['keyword'];
$kategori = $_GET['kategori'];
$query = "SELECT * FROM news   
          WHERE (judul LIKE '%$keyword%' OR deskripsi LIKE '%$keyword%')
          AND kategori = '$kategori'";

$news = query($query);
?>

<?php foreach ($news as $item) { ?>
    <div class="search-item"><a href="landingpage.php?id=<?= $item['id'] ?>"><p><?= $item["judul"]; ?></p></a></div>
<?php } ?>


