<?php
require 'functions.php';

$keyword = mysqli_real_escape_string($conn, $_GET['keyword']);
$query = "SELECT * FROM news WHERE judul LIKE '%$keyword%' AND kategori = 'nasional' ORDER BY id DESC";
$items = $conn->query($query);

?>

<section class="news">
    <div class="news-wrap">
  <div class="container">
    <div class="row">
      <?php
      while ($row = mysqli_fetch_assoc($items)) {
        $judul = $row["judul"];
        $deskripsi = $row["deskripsi"];
      ?>
        <div class="col-lg-3">
          <!-- Card -->
          <div class="news-grid">
            <a href="#yeaitswork" class="card-link">
              <div class="news-grid-image">
                <img src="<?php echo $row["gambar"];?>" alt="">
                <div class="news-grid-box">
                  <h1><?php echo date("d", strtotime($row["tanggal"])); ?></h1>
                  <p><?php echo date("M", strtotime($row["tanggal"])); ?></p>
                </div>
              </div>
              <div class="news-grid-txt">
                <span>Finance</span>
                <h2><?php echo $judul; ?></h2>
                <ul>
                  <li><i class="fa fa-calendar" aria-hidden="true"></i> <?php echo date("M d, Y", strtotime($row["tanggal"])); ?></li>
                  <li><i class="fa fa-user" aria-hidden="true"></i> Admin</li>
                </ul>
                <p><?php echo $deskripsi; ?></p>
              </div>
            </a>
          </div>
        </div>
      <?php
      }
      ?>
    </div>
  </div>
</div>
    </section>