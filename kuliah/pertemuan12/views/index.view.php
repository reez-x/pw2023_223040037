<?php require('partials/header.php'); ?>
<?php require('partials/nav.php'); ?>

<div class="container mt-3">
  <h1>Halaman Home</h1>

  <h3>Daftar Mahasiswa</h3>

  <a href="tambah.php" class="btn btn-primary">Tambah data mahasiswa</a>
  <!-- <?php foreach ($students as $student) : ?>
    <ul>
      <li>Nama: <?= $student["nama"]; ?></li>
      <li>NIM: <?= $student["nim"]; ?></li>
      <li>Email: <?= $student["email"]; ?></li>
      <li>Jurusan: <?= $student["jurusan"]; ?></li>
    </ul>
  <?php endforeach; ?>
</div> -->

<?php require('partials/footer.php'); ?>

<table class="table">
  <thead>
<tr>
      <th scope="col">#</th>
      <th scope="col">Gambar</th>
      <th scope="col">NIP</th>
      <th scope="col">Nama</th>
      <th scope="col">Email</th>
      <th scope="col">Jurusan</th>
      <th scope="col">Aksi</th>

</tr>
</thead>
<tbody>
    <?php $i = 0 ;
    foreach($students as $student):
    $i++?>
    <tr>
      <th scope="row"><?=$i?></th>
      <td><img src="img/default.png" width="50"></td>
      <td><?= $student["nim"]; ?></td>
      <td><?= $student["nama"]; ?></td>
      <td><?= $student["email"];?></td>
      <td><?= $student["jurusan"]; ?></td>
      <td>
        <a href="">ubah</a>
        <a href="">hapus</a>
      </td>
    </tr>
    <?php endforeach; ?>

  </tbody>
</table>