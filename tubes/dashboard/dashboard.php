<?php
session_start();
if( !isset($_SESSION['adminlogin']) && isset($_SESSION['admin'])){
  header('location: ../login-admin.php');
  exit;
}
if( !isset($_SESSION['admin']) && !isset($_SESSION['adminlogin'])){
  header('location: ../login.php');
  exit;
}
$adminId = $_SESSION['admin_id']
?>
<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="UTF-8">
    <title> Admin Dashboard</title>
    <!-- Link to CSS -->
    <link rel="stylesheet" href="../css/dashboard.css">
    <link rel="stylesheet" href="../css/users.css">
    <!-- Boxiocns CDN Link -->
    <link href='https://unpkg.com/boxicons@2.0.7/css/boxicons.min.css' rel='stylesheet'>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- Link Bootsraps -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">
   </head>
<body>
  <!-- Untuk Sidebar set default close pas open page cukup tambahkan "close" pada class dibawah -->
  <div class="sidebar">
    <div class="logo-details">
      <i class='bx bxl-c-plus-plus'></i>
      <span class="logo_name">Admin Dashboard</span>
    </div>
    <ul class="nav-links">
      <li>
        <a href="#">
          <i class='bx bx-grid-alt' ></i>
          <span class="link_name">Dashboard</span>
        </a>
        <ul class="sub-menu blank">
          <li><a class="link_name" href="#">Berita</a></li>
        </ul>
      </li>
      <li>
        <div class="iocn-link">
          <a href="#">
            <i class='bx bx-collection' ></i>
            <span class="link_name">Berita</span>
          </a>
          <i class='bx bxs-chevron-down arrow' ></i>
        </div>
        <ul class="sub-menu">
          <li><a class="link_name" href="#">Berita</a></li>
          <li><a id="insert">Insert</a></li>
          <li><a id="update">Update / Edit</a></li>
          <li><a id="delete">Delete</a></li>
        </ul>
      </li>
      <li>
        <?php
        if (isset($_SESSION['admin'])) { 
          $adminId = $_SESSION['admin_id'];
          if ($adminId == 1) {
        ?>
        <div class="iocn-link">
          <a href="#">
            <i class='bx bx-book-alt' ></i>
            <span class="link_name">Accounts</span>
          </a>
          <i class='bx bxs-chevron-down arrow' ></i>
        </div>
        <ul class="sub-menu">
          <li><a class="link_name" href="#">Accounts</a></li>
          <li><a id="users">Users</a></li>
          <li><a href="#">Admins</a></li>
          <!-- <li><a href="#">Card Design</a></li> -->
        </ul>
      </li>
      <?php }}; ?>
      <li>
        <a href="">
          <i class='bx bx-pie-chart-alt-2' ></i>
          <span class="link_name">Analytics</span>
        </a>
        <ul class="sub-menu blank">
          <li><a class="link_name" href="#">Analytics</a></li>
        </ul>
      </li>
      <li>
        <a href="#">
          <i class='bx bx-line-chart' ></i>
          <span class="link_name">Chart</span>
        </a>
        <ul class="sub-menu blank">
          <li><a class="link_name" href="#">Chart</a></li>
        </ul>
      </li>
      <li>
        <div class="iocn-link">
          <a href="#">
            <i class='bx bx-plug' ></i>
            <span class="link_name">Plugins</span>
          </a>
          <i class='bx bxs-chevron-down arrow' ></i>
        </div>
        <ul class="sub-menu">
          <li><a class="link_name" href="#">Plugins</a></li>
          <li><a href="#">UI Face</a></li>
          <li><a href="#">Pigments</a></li>
          <li><a href="#">Box Icons</a></li>
        </ul>
      </li>
      <li>
        <a href="#">
          <i class='bx bx-compass' ></i>
          <span class="link_name">Explore</span>
        </a>
        <ul class="sub-menu blank">
          <li><a class="link_name" href="#">Explore</a></li>
        </ul>
      </li>
      <li>
        <a href="#">
          <i class='bx bx-history'></i>
          <span class="link_name">History</span>
        </a>
        <ul class="sub-menu blank">
          <li><a class="link_name" href="#">History</a></li>
        </ul>
      </li>
      <li>
        <a href="#">
          <i class='bx bx-cog' ></i>
          <span class="link_name">Setting</span>
        </a>
        <ul class="sub-menu blank">
          <li><a class="link_name" href="#">Setting</a></li>
        </ul>
      </li>
      <li>
    <div class="profile-details">
      <div class="profile-content">
        <img src="images/profile.jpg" alt="profileImg">
      </div>
      <div class="name-job">
        <div class="profile_name">Admin</div>
        <div class="job"></div>
      </div>
      <a href="../logout.php" id=""><i class='bx bx-log-out' ></i></a>
    </div>
  </li>
</ul>
  </div>
  <section class="home-section" >
    <div class="home-content">
      <i class='bx bx-menu' ></i>
      <span class="text">Drop Down Sidebar</span><br>
    </div>
    <div class="myTarget" id="myTarget">
    </div>
  </section>

  <script src="../js/dashboard.js"></script>
    <script>
    var content = document.getElementById("myTarget");
    var insert = document.getElementById("insert");
    var update = document.getElementById("update");
    var del = document.getElementById("delete");
    var users = document.getElementById("users");

    insert.addEventListener("click", function() {
        var xhr = new XMLHttpRequest();
        xhr.onreadystatechange = function() {
        if (xhr.readyState === 4 && xhr.status === 200) {
            content.innerHTML = xhr.responseText;
        }
        };

        xhr.open("GET", "uploadajax.php", true);
        xhr.send();
    });
    update.addEventListener("click", function() {
        var xhr = new XMLHttpRequest();
        xhr.onreadystatechange = function() {
        if (xhr.readyState === 4 && xhr.status === 200) {
            content.innerHTML = xhr.responseText;
        }
        };

        xhr.open("GET", "users.php", true);
        xhr.send();
    });
    del.addEventListener("click", function() {
        var xhr = new XMLHttpRequest();
        xhr.onreadystatechange = function() {
        if (xhr.readyState === 4 && xhr.status === 200) {
            content.innerHTML = xhr.responseText;
        }
        };

        xhr.open("GET", "news-hapus.php", true);
        xhr.send();
    });
    users.addEventListener("click", function() {
        var xhr = new XMLHttpRequest();
        xhr.onreadystatechange = function() {
        if (xhr.readyState === 4 && xhr.status === 200) {
            content.innerHTML = xhr.responseText;
        }
        };

        xhr.open("GET", "users.php", true);
        xhr.send();
    });

</script>
