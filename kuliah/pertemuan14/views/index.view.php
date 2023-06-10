<?php require('partials/header.php'); ?>
<?php require('partials/nav.php'); ?>

<div class="container mt-3">
  <h1>Halaman Home</h1>

  <h3>Daftar Mahasiswa</h3>

  <a href="tambah.php" class="btn btn-primary">Tambah data mahasiswa</a>

  <div class="row">
    <div class="col-md-6">
      <form action="">
      <div class="input-group my-3">
          <input type="text" name="keyword" class="form-control" placeholder="Search Student" autofocus autocomplete="off">
          <button class="btn btn-primary" type="submit" id="button-addon2" name="search" id="search-button">Search</button>
       </div>
      </form>
    </div>
  </div>


  <!-- <?php foreach ($students as $student) : ?>
    <ul>
      <li>Nama: <?= $student["nama"]; ?></li>
      <li>NIM: <?= $student["nim"]; ?></li>
      <li>Email: <?= $student["email"]; ?></li>
      <li>Jurusan: <?= $student["jurusan"]; ?></li>
    </ul>
  <?php endforeach; ?>
</div> -->




<div class="search-container">
<?php if ($students):?>
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
        <a href="ubah.php?id=<?= $student['id']?>">ubah</a> |
        <a href="hapus.php?id=<?= $student['id']?>" onclick="return confirm('yakin?')">hapus</a>
      </td>
    </tr>
    <?php endforeach; ?>

  </tbody>
</table>
<?php else : ?>
  <div class="row">
    <div class="col-md-6">
      <div class="alert alert-danger" role="alert">
        Student not found!
      </div>
    </div>
  </div>
<?php endif ;?>
</div>

<?php require('partials/footer.php'); ?>