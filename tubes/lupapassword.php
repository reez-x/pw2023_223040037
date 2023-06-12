<?php
require 'functions.php';

$errors = array();

if (isset($_POST["lupapassword"])) {
    $username = $_POST["username"];
    $email = $_POST["email"];
    $passwordbaru = $_POST["passwordbaru"];
    $passwordbaru2 = $_POST["passwordbaru2"];
    
    $result = mysqli_query($conn, "SELECT * FROM users WHERE username = '$username'");
    
    if (mysqli_num_rows($result) === 1) {
        $row = mysqli_fetch_assoc($result);
        $id = $row["id"];
        
        if ($email != $row['email']) {
            $errors[] = "Email tidak sesuai";
        }
        
        if ($passwordbaru != $passwordbaru2) {
            $errors[] = "Password baru tidak sama";
        }
        
        if (empty($errors)) {
            if (lupaPassword($_POST) > 0) {
                echo "<script>
                    alert('Ganti Password berhasil');
                    document.location.href = 'login.php';
                </script>";
                exit(); // Menghentikan eksekusi kode selanjutnya
            }
        }
    } else {
        $errors[] = "Username tidak ditemukan";
    }
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <!-- Link -->
    <link rel="stylesheet" href="css/lupapassword.css">
    <link rel="stylesheet" href="path/to/font-awesome/css/font-awesome.min.css">
</head>
<body>
    <div class="container">
        <div class="form-container lupapassword-container">
        <form action="lupapassword.php" method="post">
            <h1>Lupa password</h1>
            <input type="hidden" name="id" id="id" value="<?php if (isset($id)) echo $id; ?>">
            <input name="email" id="email" type="text" placeholder="Email" value="<?php echo isset($_POST['email']) ? $_POST['email'] : ''; ?>">
            <input name="username" id="username" type="text" placeholder="Username" value="<?php echo isset($_POST['username']) ? $_POST['username'] : ''; ?>">
            <input name="passwordbaru" id="passwordbaru" type="password" placeholder="Password Baru">
            <input name="passwordbaru2" id="passwordbaru2" type="password" placeholder="Konfirmasi Password Baru">
            <?php if (!empty($errors)): ?>
                <div class="error-container">
                    <?php foreach ($errors as $error): ?>
                        <p><?php echo $error; ?></p>
                    <?php endforeach; ?>
                </div>
            <?php endif; ?>
            <div class="showpassword">
                <input type="checkbox" id="showPassword" onclick="togglePasswordVisibilityRegister()">
                <label class="spass">Show Password</label>
            </div>
            <button type="submit" name="lupapassword">Ganti Password</button>
        </form>
        </div>

        <a href="login.php" class="batal">Kembali..</a>
    </div>
    <script>
    function togglePasswordVisibilityRegister() {
    var passwordBaru = document.getElementById("passwordbaru");
    var passwordBaru2 = document.getElementById("passwordbaru2");
    if (passwordBaru.type === "password") {
        passwordBaru.type = "text";
    } else {
        passwordBaru.type = "password";
    }
    if (passwordBaru2.type === "password") {
        passwordBaru2.type = "text";
    } else {
        passwordBaru2.type = "password";
    }
    }
    </script>
</body>
</html>
