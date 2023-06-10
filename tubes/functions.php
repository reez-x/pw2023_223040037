<?php
$conn = mysqli_connect("localhost", "root", "", "tubespw");
$result = mysqli_query($conn, "SELECT * FROM users");
$mhs = mysqli_fetch_row($result);

// USER
function registrasi($data){
    global $conn;

    $username = strtolower(stripslashes($data["username"]));
    $password = mysqli_real_escape_string($conn, $data["password"]);
    $password2 = mysqli_real_escape_string($conn, $data["password2"]);

    $result = mysqli_query($conn, "SELECT username FROM users WHERE username = '$username'");
    if(mysqli_fetch_assoc($result)){
        echo "<script>
                alert(Username sudah terdaftar);
                </script>";
        return false;
    }

    if($password !== $password2){
        echo "<script>
                alert('Konfirmasi password tidak sesuai');
                </script>";
        return false;
    } 

    $password = password_hash($password, PASSWORD_DEFAULT);

    mysqli_query($conn, "INSERT INTO users VALUES('', '$username', '$password', 'user')");

    return mysqli_affected_rows($conn);
}

function editProfile($data) {
  global $conn;
  $id = $data['id'];
  $username = htmlspecialchars($data['username']);
  $email = htmlspecialchars($data['email']);

  // Cek apakah username sudah terdaftar selain untuk pengguna saat ini
  $result = mysqli_query($conn, "SELECT username FROM users WHERE username = '$username' AND id != '$id'");
  if (mysqli_fetch_assoc($result)) {
    echo "<script>
              alert('Username sudah terdaftar');
          </script>";
    return false;
  }

  $query = "UPDATE users
            SET username = '$username',
            email = '$email'
            WHERE id = $id";

  mysqli_query($conn, $query) or die(mysqli_error($conn));

  return mysqli_affected_rows($conn);
}


function koneksi(){
    $conn = mysqli_connect('localhost', 'root', '', 'tubespw') or die('Koneksi ke database gagal');
    return $conn;
  }
  
  function query($query){
    $conn = koneksi();
    $result = mysqli_query($conn, $query);
  
    $rows = [];
    while($row = mysqli_fetch_assoc($result)){
    $rows[] = $row;
    };
    return $rows;
  }


  function ubah($data)
{
  $conn = koneksi();
  $id = $data['id'];

  $kategori = htmlspecialchars($data['kategori']);
  $judul = htmlspecialchars($data['judul']);
  $deskripsi = htmlspecialchars($data['deskripsi']);
  $konten = htmlspecialchars($data['konten']);
  $tanggal = htmlspecialchars($data['tanggal']);


  $query = "UPDATE
              news
            SET
            kategori = '$kategori',
            judul = '$judul',
            deskripsi = '$deskripsi',
            konten = '$konten',
            tanggal = '$tanggal'
              WHERE id = $id
            ";

  mysqli_query($conn, $query) or die(mysqli_error($conn));
  return mysqli_affected_rows($conn);
}

function hapus($id){
  $conn = koneksi();
  $query = "DELETE FROM news WHERE id = $id";
  mysqli_query($conn, $query) or die(mysqli_error($conn));

  return mysqli_affected_rows($conn);
}

// ADMIN
function registrasiAdmin($data){
  global $conn;

  $username = strtolower(stripslashes($data["username"]));
  $password = mysqli_real_escape_string($conn, $data["password"]);
  $password2 = mysqli_real_escape_string($conn, $data["password2"]);

  $result = mysqli_query($conn, "SELECT username FROM admins WHERE username = '$username'");
  if(mysqli_fetch_assoc($result)){
      echo "<script>
              alert(Username sudah terdaftar);
              </script>";
      return false;
  }

  if($password !== $password2){
      echo "<script>
              alert('Konfirmasi password tidak sesuai');
              </script>";
      return false;
  } 

  $password = password_hash($password, PASSWORD_DEFAULT);

  mysqli_query($conn, "INSERT INTO admins VALUES('', '$username', '$password')");

  return mysqli_affected_rows($conn);
}
?>