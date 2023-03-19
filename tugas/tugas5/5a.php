<?php 
$mahasiswa = [
    [
    "nama" => "Rivaldy",
    "nrp" => "6780023",
    "email" => "rivv@gmail.com",
    "jurusan" => "DKV",
    "gambar" => "l.jpg"
    ],
    [
    "nama" => "Dewi Lingga",
    "nrp" => "6780067",
    "email" => "dwi678@gmail.com",
    "jurusan" => "DKV",
    "gambar" => "p.jpg"
    ],
    [
    "nama" => "Bobby",
    "nrp" => "8980023",
    "email" => "bobi456@gmail.com",
    "jurusan" => "Teknik Pangan",
    "gambar" => "l.jpg"
    ],
    [
    "nama" => "Zayn",
    "nrp" => "3480023",
    "email" => "zaynzz@gmail.com",
    "jurusan" => "Perfilman",
    "gambar" => "l.jpg"
    ],
    [
    "nama" => "Risma",
    "nrp" => "9982117",
    "email" => "rismaaaaa@gmail.com",
    "jurusan" => "Ilmu Hukum",
    "gambar" => "p.jpg"
    ],
    [
    "nama" => "Rian",
    "nrp" => "92372125",
    "email" => "riangaming@gmail.com",
    "jurusan" => "Teknik Pangan",
    "gambar" => "l.jpg"
    ],
    [
    "nama" => "Raisya",
    "nrp" => "789869",
    "email" => "dwi678@gmail.com",
    "jurusan" => "Akuntansi",
    "gambar" => "p.jpg"
    ],
    [
    "nama" => "Fitri",
    "nrp" => "6630023",
    "email" => "fitri@gmail.com",
    "jurusan" => "Teknik Pangan",
    "gambar" => "p.jpg"
    ],
    [
    "nama" => "Guavyrno",
    "nrp" => "3480023",
    "email" => "guava@gmail.com",
    "jurusan" => "Teknik Mesin",
    "gambar" => "l.jpg"
    ],
    [
    "nama" => "Aulia",
    "nrp" => "667650067",
    "email" => "Aul123@gmail.com",
    "jurusan" => "Kebidanan",
    "gambar" => "p.jpg"
    ]
];
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tugas 5a</title>
</head>
<body>
    <h1>Daftar Mahasiswa</h1>

    <?php foreach($mahasiswa as $mhs): ?>
        <ul>
            <li>
                <img src="img/<?= $mhs["gambar"]; ?>">
            </li>
            <li>Nama : <?= $mhs["nama"]; ?></li>
            <li>NRP : <?= $mhs["nrp"]; ?></li>
            <li>Jurusan : <?= $mhs["jurusan"]; ?></li>
            <li>Email : <?= $mhs["email"]; ?></li>
        </ul>
    <?php endforeach; ?>
    <style>
        img{
            height: auto;
            width: 100px;
        }
    </style>
</body>
</html>