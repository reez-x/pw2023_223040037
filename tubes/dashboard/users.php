<?php
require '../functions.php';

$users = query("SELECT * FROM users WHERE role = 'user'");


?>
<div class="container mt-3">
  <h1>Halaman Users</h1>

  <h3>Daftar Pengguna</h3> | <a href="cetak.php" target="_blank">Cetak</a>

<div id="kontenKategori" class="konten-scroll">
    
<table class="table">
  <thead>
    <tr>
      <th scope="col">#</th>
      <th scope="col">Gambar</th>
      <th scope="col">Username</th>
      <th scope="col">Email</th>
      <th scope="col" class="aksi">Aksi</th>
    </tr>
  </thead>
  <tbody>
    <?php $i = 0; ?>
    <?php foreach ($users as $user): ?>
      <?php $i++; ?>
      <tr>
        <th scope="row"><?= $i ?></th>

        <?php if($user["gambar"] == ''){ ?>
          <td><img src="../img/navbar/default-profile.jpg" width="50"></td>
        <?php 
        } 
        else{
        ?>
          <td><img src="../uploads/user/<?= $user["gambar"] ?>" width="50"></td>
        <?php } ?>

        <td><?= $user["username"] ?></td>
        <td><?= $user["email"] ?></td>
        <td class="aksi">
          <a href="ubah.php?id=<?= $user['id'] ?>">ubah</a>
        </td>
      </tr>
    <?php endforeach; ?>
  </tbody>
</table>
    </div>
    
<script></script>

    </body> 