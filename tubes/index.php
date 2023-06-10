<?php
require 'functions.php';
session_start();
if( isset($_SESSION['admin'])){
  header("location: login-admin.php");
  exit;
};
if( !isset($_SESSION["login"])){
  header("location: login.php");
  exit;
};



$nasional = "SELECT * FROM news WHERE kategori = 'nasional' ORDER BY id DESC LIMIT 4";
$ragam = "SELECT * FROM news WHERE kategori = 'ragam' ORDER BY tanggal DESC LIMIT 4";
$layanan = "SELECT * FROM news WHERE kategori = 'layanan' ORDER BY id DESC LIMIT 4";
$sqln = $conn->query($nasional);
$sqlr = $conn->query($ragam);
$sqll = $conn->query($layanan);

?>
<!DOCTYPE html>
<html lang="en" xmlns="http://www.w3.org/1999/xhtml">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>PemerintahKita.id</title>

    <!-- link to css -->
    <link rel="stylesheet" href="css/card.css">
    <link rel="stylesheet" href="https://unpkg.com/boxicons@latest/css/boxicons.min.css">

    
    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Rubik:wght@300;400;500;600;700;800;900&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Lato&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Roboto+Slab&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" crossorigin="anonymous">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" crossorigin="anonymous">
    
    <link rel="stylesheet" type="text/css" href="css/style.css">
</head>

<body>
    
    <!-- header -->
    <?php
    include 'header.php';
    ?>

    

    <!-- Home -->
    <div class="parallax">
        <h2 id="text">Pemerintah Kita</h2>
        <img src="img/home/cloud6.png" id="awan1">
        <img src="img/home/cloud2.png" id="awan2"> 
    </div>

    <?php
    include 'navbar.php';
    ?>

<div class="foreground">
    <!-- Garis merah  -->
    <div class="garismerah"></div>
    <!-- Logout -->
    
    

<!-- <section class="cards">
    <div class="wrapper card">
      <i id="left" class="fa-solid fa-angle-left"></i>
      <ul class="carousel">
      
        <li class="card">
          <div class="col-lg-4">
            <div class="news-grid">
              <div class="news-grid-image"><img src="images/1.jpg" alt="">
                <div class="news-grid-box">
                  <h1>19</h1>
                  <p>Sep</p>
                </div></div>
                <div class="news-grid-txt">
                    <span>Finacne</span>
                    <h2>Heading Will Be Here</h2>
                    <ul>
                      <li><i class="fa fa-calendar" aria-hidden="true"></i> Sep 19, 2020</li>
                      <li><i class="fa fa-user" aria-hidden="true"></i> </li>
                    </ul>
                    <p>Lorem, ipsum dolor sit amet consectetur, adipisicing elit. Consequuntur aspernatur reprehenderit velit est voluptatum, voluptas amet quasi dicta consectetur.</p>
                    <a href="#">Read More...</a>
                </div>
              </div>
          </div>
        </li>
        
      </ul>
      <i id="right" class="fa-solid fa-angle-right"></i>
    </div>
</section> -->

<section class="national" id="national">
<div class="category-div"><h2 class="category">Nasional</h2></div>

<!-- <div class="gariss"><hr class="garis"></div> -->

<div class="news-wrap">
  <div class="container">
    <div class="row">
      <?php
      while ($row = mysqli_fetch_assoc($sqln)) {
        $judul = $row["judul"];
        $deskripsi = $row["deskripsi"];
      ?>
        <div class="col-lg-3">
          <!-- Card -->
          <div class="news-grid">
            <a href="landingpage.php?id=<?= $row['id'] ?>" class="card-link">
              <div class="news-grid-image">
              <img src="uploads/<?php echo $row["gambar"]; ?>" alt="">
                <div class="news-grid-box">
                  <h1>19</h1>
                  <p>Sep</p>
                </div>
              </div>
              <div class="news-grid-txt">
                <span>Nasional</span>
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
      <a class="seemore" href="page.php?kategori=nasional">Lihat selengkapnya..</a>
    </div>
  </div>
</div>

</section>


<section class="national" id="ragam">
<div class="category-div"><h2 class="category">Ragam</h2></div>

<!-- <div class="gariss"><hr class="garis"></div> -->

<div class="news-wrap">
  <div class="container">
    <div class="row">
      <?php
      while ($row = mysqli_fetch_assoc($sqlr)) {
        $judul = $row["judul"];
        $deskripsi = $row["deskripsi"];
      ?>
        <div class="col-lg-3">
          <!-- Card -->
          <div class="news-grid">
            <a href="#yeaitswork" class="card-link">
              <div class="news-grid-image">
                <img src="uploads/<?php echo $row["gambar"]; ?>" alt="">
                <div class="news-grid-box">
                  <h1>19</h1>
                  <p>Sep</p>
                </div>
              </div>
              <div class="news-grid-txt">
                <span>Ragam</span>
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
      <a class="seemore" href="page.php?kategori=ragam">Lihat selengkapnya..</a>
    </div>
  </div>


<section class="national">
<div class="category-div"><h2 class="category">Layanan</h2></div>

<!-- <div class="gariss"><hr class="garis"></div> -->

<div class="news-wrap">
  <div class="container">
    <div class="row">
      <?php
      while ($row = mysqli_fetch_assoc($sqll)) {
        $judul = $row["judul"];
        $deskripsi = $row["deskripsi"];
      ?>
        <div class="col-lg-3">
          <!-- Card -->
          <div class="news-grid">
            <a href="#yeaitswork" class="card-link">
              <div class="news-grid-image">
                <img src="images/1.jpg" alt="">
                <div class="news-grid-box">
                  <h1>19</h1>
                  <p>Sep</p>
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



    <!-- <div class="news-wrap">
			<div class="container">
				<div class="row">
					<div class="col-lg-4">
						<div class="news-grid">
							<div class="news-grid-image"><img src="images/1.jpg" alt="">
								<div class="news-grid-box">
									<h1>19</h1>
									<p>Sep</p>
								</div></div>
								<div class="news-grid-txt">
									<span>Finacne</span>
									<h2>Heading Will Be Here</h2>
									<ul>
										<li><i class="fa fa-calendar" aria-hidden="true"></i> Sep 19, 2020</li>
										<li><i class="fa fa-user" aria-hidden="true"></i> Admin</li>
									</ul>
									<p>Lorem, ipsum dolor sit amet consectetur, adipisicing elit. Consequuntur aspernatur reprehenderit velit est voluptatum, voluptas amet quasi dicta consectetur.</p>
									<a href="#">Read More...</a>
								</div>
							</div>
						</div>
						<div class="col-lg-4">
							<div class="news-grid">
								<div class="news-grid-image"><img src="images/2.jpg" alt="">
									<div class="news-grid-box">
										<h1>20</h1>
										<p>Sep</p>
									</div></div>
									<div class="news-grid-txt">
										<span>Finacne</span>
										<h2>Heading Will Be Here</h2>
										<ul>
											<li><i class="fa fa-calendar" aria-hidden="true"></i> Sep 20, 2020</li>
											<li><i class="fa fa-user" aria-hidden="true"></i> Admin</li>
										</ul>
										<p>Lorem, ipsum dolor sit amet consectetur, adipisicing elit. Consequuntur aspernatur reprehenderit velit est voluptatum, voluptas amet quasi dicta consectetur.</p>
										<a href="#">Read More...</a>
									</div>
								</div>
							</div>
							<div class="col-lg-4">
								<div class="news-grid">
									<div class="news-grid-image"><img src="images/3.jpg" alt="">
										<div class="news-grid-box">
											<h1>24</h1>
											<p>Sep</p>
										</div></div>
										<div class="news-grid-txt">
											<span>Finacne</span>
											<h2>Heading Will Be Here</h2>
											<ul>
												<li><i class="fa fa-calendar" aria-hidden="true"></i> Sep 24, 2020</li>
												<li><i class="fa fa-user" aria-hidden="true"></i> Admin</li>
											</ul>
											<p>Lorem, ipsum dolor sit amet consectetur, adipisicing elit. Consequuntur aspernatur reprehenderit velit est voluptatum, voluptas amet quasi dicta consectetur.</p>
											<a href="#">Read More...</a>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div> -->
		

        </section>

<form method="post" action="send_email.php">
  <textarea name="message" rows="4" cols="50"></textarea><br>
  <input type="submit" value="Send Email">
</form>

        <h2 class="title">Budaya</h2>

    <div class="news-wrap">
			<div class="container">
				<div class="row">
					<div class="col-lg-4">
						<div class="news-grid">
							<div class="news-grid-image"><img src="images/1.jpg" alt="">
								<div class="news-grid-box">
									<h1>19</h1>
									<p>Sep</p>
								</div></div>
								<div class="news-grid-txt">
									<span>Finacne</span>
									<h2>Heading Will Be Here</h2>
									<ul>
										<li><i class="fa fa-calendar" aria-hidden="true"></i> Sep 19, 2020</li>
										<li><i class="fa fa-user" aria-hidden="true"></i> Admin</li>
									</ul>
									<p>Lorem, ipsum dolor sit amet consectetur, adipisicing elit. Consequuntur aspernatur reprehenderit velit est voluptatum, voluptas amet quasi dicta consectetur.</p>
									<a href="#">Read More...</a>
								</div>
							</div>
						</div>
						<div class="col-lg-4">
							<div class="news-grid">
								<div class="news-grid-image"><img src="images/2.jpg" alt="">
									<div class="news-grid-box">
										<h1>20</h1>
										<p>Sep</p>
									</div></div>
									<div class="news-grid-txt">
										<span>Finacne</span>
										<h2>Heading Will Be Here</h2>
										<ul>
											<li><i class="fa fa-calendar" aria-hidden="true"></i> Sep 20, 2020</li>
											<li><i class="fa fa-user" aria-hidden="true"></i> Admin</li>
										</ul>
										<p>Lorem, ipsum dolor sit amet consectetur, adipisicing elit. Consequuntur aspernatur reprehenderit velit est voluptatum, voluptas amet quasi dicta consectetur.</p>
										<a href="#">Read More...</a>
									</div>
								</div>
							</div>
							<div class="col-lg-4">
								<div class="news-grid">
									<div class="news-grid-image"><img src="images/3.jpg" alt="">
										<div class="news-grid-box">
											<h1>24</h1>
											<p>Sep</p>
										</div></div>
										<div class="news-grid-txt">
											<span>Finacne</span>
											<h2>Heading Will Be Here</h2>
											<ul>
												<li><i class="fa fa-calendar" aria-hidden="true"></i> Sep 24, 2020</li>
												<li><i class="fa fa-user" aria-hidden="true"></i> Admin</li>
											</ul>
											<p>Lorem, ipsum dolor sit amet consectetur, adipisicing elit. Consequuntur aspernatur reprehenderit velit est voluptatum, voluptas amet quasi dicta consectetur.</p>
											<a href="#">Read More...</a>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
    
    <!-- Layanan Prototype -->


    <!-- Home -->
    
        <section class="sec">
            <h2>Parallax</h2>
            <p>Lorem, ipsum dolor sit amet consectetur adipisicing elit. Tenetur repudiandae vero, natus molestiae assumenda id aliquid! Obcaecati ratione corporis adipisci sint sunt facere. Odit vel tempore non neque cupiditate. Harum nobis sed earum, hic necessitatibus maxime assumenda, ullam molestias inventore perferendis doloribus adipisci, nisi reprehenderit eos aut quo nemo dolore reiciendis debitis totam rerum saepe dolores unde! Aliquid ad quidem omnis laborum itaque esse odio similique quibusdam a quasi sit illo iste quos mollitia, impedit distinctio, sed eum quisquam sequi fugiat ratione. Quis neque, ut assumenda sint .</p><br><br>
            <p>Lorem, ipsum dolor sit amet consectetur adipisicing elit. Tenetur repudiandae vero, natus molestiae assumenda id aliquid! Obcaecati ratione corporis adipisci sint sunt facere. Odit vel tempore non neque cupiditate. Harum nobis sed earum, hic necessitatibus maxime assumenda, ullam molestias inventore perferendis doloribus adipisci, nisi reprehenderit eos aut quo nemo dolore reiciendis debitis totam rerum saepe dolores unde! Aliquid ad quidem omnis laborum itaque esse odio similique quibusdam a quasi sit illo iste quos mollitia, impedit distinctio, sed eum quisquam sequi fugiat ratione. Quis neque, ut assumenda sint .</p>
        </section>

    <div class="wave">
        <svg class="sec2" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 1440 320"><path fill="#c80000" fill-opacity="1" d="M0,96L40,117.3C80,139,160,181,240,186.7C320,192,400,160,480,160C560,160,640,192,720,197.3C800,203,880,181,960,160C1040,139,1120,117,1200,133.3C1280,149,1360,203,1400,229.3L1440,256L1440,0L1400,0C1360,0,1280,0,1200,0C1120,0,1040,0,960,0C880,0,800,0,720,0C640,0,560,0,480,0C400,0,320,0,240,0C160,0,80,0,40,0L0,0Z"></path></svg>
    </div>

<!-- Image Slider -->
<section class="imageslider">
    <div class="slider">
        <div class="slide">
            <input type="radio" name="radio-btn" id="radio1">
            <input type="radio" name="radio-btn" id="radio2">
            <input type="radio" name="radio-btn" id="radio3">

            <div class="st first">
                <img src="img/home/bank.jpg" alt="">
            </div>
            <div class="st">
                <img src="img/home/iphone.jpg" alt="">
            </div>
            <div class="st">
                <img src="" alt="">
            </div>

            <div class="nav-auto">
                <div class="a-b1"></div>
                <div class="a-b2"></div>
                <div class="a-b3"></div>
            </div>
        </div>
        <div class="nav-m">
            <label for="radio1" class="m-btn"></label>
            <label for="radio2" class="m-btn"></label>
            <label for="radio3" class="m-btn"></label>
        </div>
    </div>
</section>

</div>
    <!-- link to js -->
    <script type="text/javascript" src="js/script.js"></script>
    <!-- Cards news js -->
    <script type="text/javascript" src="js/cards.js"></script>
</body>
</html>