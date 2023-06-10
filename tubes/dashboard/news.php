<?php
require '../functions.php';

$kategori = isset($_POST["kategori"]) ? $_POST["kategori"] : "All";



if ($kategori === "All") {
  $students = query("SELECT * FROM news");
} else {
  $students = query("SELECT * FROM news WHERE kategori = '$kategori'");
}

?>
<?php include 'partials/dashboard-top.php';?>
<div class="container mt-3">
  <h1>Halaman Home</h1>

  <h3>Daftar Berita</h3>

<form action="" method="POST">
  <select name="kategori" id="kategoriSelect">
    <option value="All" <?php echo $kategori === "All" ? "selected" : ""; ?>>All</option>
    <option value="nasional" <?php echo $kategori === "nasional" ? "selected" : ""; ?>>Nasional</option>
    <option value="ragam" <?php echo $kategori === "ragam" ? "selected" : ""; ?>>Ragam</option>
    <option value="layanan" <?php echo $kategori === "layanan" ? "selected" : ""; ?>>Layanan</option>
  </select>
</form>

<div id="kontenKategori" class="konten-scroll">

    
<table class="table">
  <thead>
    <tr>
      <th scope="col">#</th>
      <th scope="col">Gambar</th>
      <th scope="col">Judul</th>
      <th scope="col">Deskripsi</th>
      <th scope="col">Tanggal</th>
      <th scope="col">Kategori</th>
      <th scope="col">Aksi</th>
    </tr>
  </thead>
  <tbody>
    <?php $i = 0; ?>
    <?php foreach ($students as $student): ?>
      <?php $i++; ?>
      <tr>
        <th scope="row"><?= $i ?></th>
        <td><img src="../uploads/<?= $student["gambar"] ?>" width="50"></td>
        <td><?= $student["judul"] ?></td>
        <td><?= $student["deskripsi"] ?></td>
        <td><?= $student["tanggal"] ?></td>
        <td><?= $student["kategori"] ?></td>
        <td>
          <a href="ubah.php?id=<?= $student['id'] ?>">ubah</a>
        </td>
      </tr>
    <?php endforeach; ?>
  </tbody>
</table>
    </div>

    <?php include 'partials/dashboard-bottom.php';?>
<script>

var kategoriSelect = document.getElementById("kategoriSelect");
var kontenKategori = document.getElementById("kontenKategori");

kategoriSelect.addEventListener('change', function() {
  var kategori = kategoriSelect.value;

  var xhr = new XMLHttpRequest();
  xhr.onreadystatechange = function() {
    if (xhr.readyState == 4 && xhr.status == 200) {
      kontenKategori.innerHTML = xhr.responseText;
    }
  }

  xhr.open('POST', 'dashboard_ajax.php', true);
  xhr.setRequestHeader('Content-type', 'application/x-www-form-urlencoded');
  xhr.send('kategori=' + kategori);
});

</script>

    </body> 