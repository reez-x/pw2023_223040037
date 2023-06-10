<?php
require_once __DIR__ . '/../vendor/autoload.php';
require '../functions.php';
$users = query("SELECT * FROM users WHERE role = 'user'");

$mpdf = new \Mpdf\Mpdf();
$html = '<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Document</title>
</head>
<body>
<h1>Daftar Pengguna</h1>
<table border="1" cellpadding="10" cellspacing="0">
  <tr>
    <th>#</th>
    <th>Gambar</th>
    <th>Username</th>
    <th>Email</th>
  </tr>';

  $i = 0;
  foreach ($users as $user){
    $html .='<tr>
                <td>'.$i++.'</td>
                <td><img src="../uploads/user/'. $user["gambar"] .'"></td>
                <td>'. $user["username"] .'</td>
                <td>'. $user["email"] .'</td>
            </tr>';
  }
$html .= '</table>
</body>
</html>';
$mpdf->WriteHTML($html);
$mpdf->Output('Daftar-Pengguna.pdf', \Mpdf\Output\Destination::INLINE);
?>