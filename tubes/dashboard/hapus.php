<?php
require '../functions.php';

$id = htmlspecialchars($_GET['id']);
$news = query("SELECT * FROM news WHERE id = '$id'")[0];
if(hapus($id)>0){
    echo    "<script>
                alert('data berhasil dihapus');
                document.location.href = 'news-hapus.php';
            </script>";
}
else{
    echo    "<script>
                alert('data berhasil dihapus');
                document.location.href = 'news-hapus.php';
            </script>";
}

// Hapus file
$file = '../uploads/' . $news["gambar"];

if (file_exists($file)) {
    if (unlink($file)) {
        echo "<script>
        alert('file berhasil dihapus');
        document.location.href = 'news-hapus.php';
    </script>";
    } else {
        echo "<script>
        alert('file gagal dihapus');
        document.location.href = 'news-hapus.php';
    </script>";
    }
} else {
    echo "File tidak ditemukan.";
}
?>