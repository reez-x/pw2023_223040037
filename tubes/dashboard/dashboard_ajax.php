<?php
require '../functions.php';

$kategori = isset($_POST["kategori"]) ? $_POST["kategori"] : "All";

if ($kategori === "All") {
  $students = query("SELECT * FROM news");
} else {
  $students = query("SELECT * FROM news WHERE kategori = '$kategori'");
}
?>

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
          <a href="ubah.php?id=<?= $student['id'] ?>">ubah</a> |
          <a href="hapus.php?id=<?= $student['id'] ?>" onclick="return confirm('yakin?')">hapus</a>
        </td>
      </tr>
    <?php endforeach; ?>
  </tbody>
</table>
