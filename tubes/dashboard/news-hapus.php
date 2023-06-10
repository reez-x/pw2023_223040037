<?php
require '../functions.php';

$kategori = isset($_POST["kategori"]) ? $_POST["kategori"] : "All";



if ($kategori === "All") {
  $students = query("SELECT * FROM news");
} else {
  $students = query("SELECT * FROM news WHERE kategori = '$kategori'");
}

?>
<div class="container mt-3">
  <h1>Halaman Home</h1>

  <h3>Daftar Berita</h3>

  <form action="" method="POST">
<select name="kategori" id="kategoriSelect">
  <option value="All" <?php echo $kategori === "All" ? "selected" : ""; ?>>All</option>
  <option value="nasional" <?php echo $kategori === "nasional" ? "selected" : ""; ?>>nasional</option>
  <option value="futsal" <?php echo $kategori === "futsal" ? "selected" : ""; ?>>Futsal</option>
  <option value="volleyball" <?php echo $kategori === "volleyball" ? "selected" : ""; ?>>Volleyball</option>
  <option value="tennis" <?php echo $kategori === "tennis" ? "selected" : ""; ?>>Tennis</option>
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
        <a href="hapus.php?id=<?= $student['id'] ?>" onclick="return confirm('yakin?')">hapus</a>
        </td>
      </tr>
    <?php endforeach; ?>
  </tbody>
</table>
    </div>

<script>
    var tombolCari = document.getElementById("tombolcari");
  var kontenKategori = document.getElementById("kontenKategori");
    
  tombolCari.addEventListener('click', function() {
     // Mencegah perilaku bawaan tombol submit
    var xhr = new XMLHttpRequest();
    // Ajax
    xhr.onreadystatechange = function(){
      if(xhr.readyState == 4 && xhr.status == 200){
        kontenKategori.innerHTML = xhr.responseText;
      }
    }

    xhr.open('GET', '../upload.php', true);
    xhr.send();

  });

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