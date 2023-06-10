<?php
require 'navbar.php';
?>
<?php
require 'functions.php';
session_start();
$userid = $_SESSION['user_id'];
$akun = query("SELECT * FROM users WHERE id = '$userid'")[0];

// Register
if (isset($_POST["edit-profile"])) {
  if (editProfile($_POST) > 0) {
    echo "<script>
              alert('Profile berhasil diedit');
              document.location.href = 'profile.php';
          </script>";
  } else {
    echo mysqli_error($conn);
  }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" crossorigin="anonymous">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" crossorigin="anonymous">
    <link href="css/editprofile.css" rel="stylesheet">
    
    <title>Document</title>

    <!-- Link -->
    <link rel="stylesheet" href="path/to/font-awesome/css/font-awesome.min.css">
<body>
  <div class="container" id="container">
        <h1>Edit Profile</h1>
        <form method="post">
        <input name="id" type="hidden" value="<?php echo $akun['id']; ?>">
        <input name="username" id="username" type="text" value="<?php echo $akun['username'] ?>">

        <?php if($akun["email"] == ''){ ?>
            <input name="email" id="email" type="email" placeholder="Masukkan Email Anda">
        <?php 
        } 
        else{
        ?>
          <input name="email" id="email" type="email" placeholder="email" value="<?php echo $akun['email'] ?>">
        <?php } ?>
        
        <!-- <input name="password2" id="password2" type="password" placeholder="Konformasi Password"> -->
        <button type="submit" name="edit-profile">Submit</button>
        </form>
  </div>

  <script src="js/script.js"></script>


</body>