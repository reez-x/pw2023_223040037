<?php
session_start();
if( !isset($_SESSION["login"])){
    header("location: login.php");
    exit;
  }

  $kategori = $_GET['kategori'];
  $conn = mysqli_connect("localhost", "root", "", "tubespw");
  $sql = "SELECT * FROM news WHERE kategori = '$kategori' ORDER BY id DESC";
  $items = $conn->query($sql);
  
?>  
    <!-- Search -->
    <input type="text" name="keyword" id="keyword" style="margin-top: 100px;">

    <div id="berita">
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
                <img src="uploads/<?php echo $row["gambar"];?>" alt="">
                <div class="news-grid-box">
                  <h1><?php echo date("d", strtotime($row["tanggal"])); ?></h1>
                  <p><?php echo date("M", strtotime($row["tanggal"])); ?></p>
                </div>
              </div>
              <div class="news-grid-txt">
                <span><?php echo $row["kategori"];?></span>
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
    </div>

    <script>
var keywordInput = document.getElementById("keyword");
var kontenKategori = document.getElementById("berita");

keywordInput.addEventListener('input', function() {
  var keyword = keywordInput.value;

  var xhr = new XMLHttpRequest();
  xhr.onreadystatechange = function() {
    if (xhr.readyState == 4 && xhr.status == 200) {
      kontenKategori.innerHTML = xhr.responseText;
    }
  }

  xhr.open('GET', 'page-search.php?keyword=' + encodeURIComponent(keyword), true);
  xhr.send();
});

</script>

</body>
</html>