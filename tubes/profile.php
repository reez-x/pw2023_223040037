<?php
require 'functions.php';
session_start();
$userid = $_SESSION['user_id'];
$akun = query("SELECT * FROM users WHERE id = '$userid'")[0];

require 'navbar.php';
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- Link -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" crossorigin="anonymous">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" crossorigin="anonymous">
    <link rel="stylesheet" href="css/profile.css">
    <title>Document</title>
    
    <title>Profile Card</title>
</head>
<body>
    <div class="profile-card">
        <div class="profile-img">
            <img src="img/navbar/default-profile.jpg" alt="Profile Image">
        </div>
        <div class="profile-info">
            <p>Name: <?= $akun['username'];?></p>

            <?php
            if ($akun['email'] = ''){
            ?>
            <p>Email: <?php echo $akun['email']; ?></p>
            <?php }else{ ?>
            <p>Email: -</p>
            <?php } ?>

            <p>Gender: Male</p>
        </div>
        <a href="editprofile.php">Edit profile</a>
    </div>
</body>
</html>