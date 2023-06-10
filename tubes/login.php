<?php
session_start();
require 'functions.php';

// Cek cookie
if (isset($_COOKIE['id']) && isset($_COOKIE['key'])) {
  $id = $_COOKIE['id'];
  $key = $_COOKIE['key'];

  $result = mysqli_query($conn, "SELECT username FROM users WHERE id = $id");
  $row = mysqli_fetch_assoc($result);

  if ($key === hash('sha256', $row['username'])) {
    $_SESSION['login'] = true;
  }
}

if (isset($_SESSION['login'])) {
  header("Location: index.php");
  exit;
}

// Login
if (isset($_POST["login"])) {
  $username = $_POST["username"];
  $password = $_POST["password"];
  $result = mysqli_query($conn, "SELECT * FROM users WHERE username = '$username'");
  if (mysqli_num_rows($result) === 1) {
    $row = mysqli_fetch_assoc($result);
    if (password_verify($password, $row["password"])) {
      if ($username == "admin") {
        $_SESSION["admin"] = true;
        header("location: login-admin.php");
        exit;
      } else {
        $_SESSION["login"] = true;
        // Remember me
        if (isset($_POST['remember'])) {
          setcookie('id', $row['id'], time() + 60);
          setcookie('key', hash('sha256', $row['username']), time() + 60);
        }
        $_SESSION["user_id"] = $row["id"];
        header("location: index.php");
        exit;
      }
    }
  }
  $error = true;
}

// Register
if (isset($_POST["register"])) {
  if (registrasi($_POST) > 0) {
    echo "<script>
              alert('User baru berhasil ditambahkan');
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
    <link href="css/login.css" rel="stylesheet">
    <title>Document</title>

    <!-- Link -->
    <link rel="stylesheet" href="path/to/font-awesome/css/font-awesome.min.css">
<body>
  <div class="container" id="container">

    <div class="form-container register-container">
      <form action="#" method="post">
        <h1>Register hire.</h1>
        <input name="username" id="username" type="text" placeholder="Name">
        <input name="password" id="passwordreg" type="password" placeholder="Password">
        <input name="password2" id="password2" type="password" placeholder="Konformasi Password">
        <div class="showpasswordreg">
          <input type="checkbox" id="showPassword" onclick="togglePasswordVisibilityRegister()">
          <label class="spass">Show Password</label>
        </div>
        <button type="submit" name="register">Register</button>
      </form>
    </div>

    <div class="form-container login-container">
    <form action="" method="post">
        <h1>Login hire.</h1>
        <input type="text" name="username" class="input" id="username" required autocomplete="off">
        <input type="password" class="input" id="password" name="password" required>
        <div class="content">
          <div class="checkbox">
            <input type="checkbox" name="remember" id="remember" >
            <label for="remember">Remember me</label>
          </div>
          <div class="showpassword">
          <input type="checkbox" id="showPassword" onclick="togglePasswordVisibility()">
          <label>Show Password</label>
          </div>
        </div>
        <div class="pass-link">
            <a href="#">Forgot password?</a>
          </div>
        <button type="submit" class="submit" name="login" value="Sign Up">Login</button>
        <?php if (isset($error)): ?>
            <li>
                <p style="color: red;" >Username atau Password salah</p>
            </li>
        <?php endif ?>
      </form>
    </div>

    <div class="overlay-container">
      <div class="overlay">
        <div class="overlay-panel overlay-left">
          <h1 class="title">Hello <br> friends</h1>
          <p>if Yout have an account, login here and have fun</p>
          <button class="ghost" id="login">Login
            <i class="lni lni-arrow-left login"></i>
          </button>
        </div>
        <div class="overlay-panel overlay-right">
          <h1 class="title">Start yout <br> journy now</h1>
          <p>if you don't have an account yet, join us and start your journey.</p>
          <button class="ghost" id="register" >Register
            <i class="lni lni-arrow-right register"></i>
          </button>
        </div>
      </div>
    </div>

  </div>

  <script src="js/script.js"></script>


</body>