<?php
$conn = mysqli_connect("localhost", "root", "", "tubespw");
if(isset($_POST["submit"])){
    $judul = htmlspecialchars($_POST["judul"]);
    $deskripsi = htmlspecialchars($_POST["deskripsi"]);
    $konten = htmlspecialchars($_POST["konten"]);
    $tanggal = htmlspecialchars($_POST["tanggal"]);
    $kategori = htmlspecialchars($_POST["kategori"]);

    $upload_dir = "../uploads/";
    $gambar = $upload_dir.basename($_FILES["imageUpload"]["name"]);
    $gambar_name = basename($_FILES["imageUpload"]["name"]);
    $upload_dir.$_FILES["imageUpload"]["name"];
    $upload_file = $upload_dir.basename($_FILES["imageUpload"]["name"]);
    $imageType = strtolower(pathinfo($upload_file,PATHINFO_EXTENSION));
    $check = $_FILES["imageUpload"]["size"];
    $upload_ok = 0;

    if(file_exists($upload_file)){
        echo "<script>alert('The file already exist')</script>";
        $upload_ok = 0;
    }else{
            if($imageType ==  'jpg' || $imageType == 'png' || $imageType == 'jpeg'){
                $upload_ok = 1;
            }else{
                echo "<script>alert('ini bukan gambar')</script>";
            }
    if($upload_ok == 0){
        echo "<script>alert('gagal')</script>";
    }else{
        if($judul != "" && $deskripsi != ""){
            move_uploaded_file($_FILES["imageUpload"]["tmp_name"],$upload_file);
            $sql = "INSERT INTO news(judul,kategori,deskripsi,konten,tanggal,gambar)
            VALUES('$judul','$kategori','$deskripsi','$konten','$tanggal','$gambar_name')";

            if($conn->query($sql) === TRUE){
                echo "<script>alert('sukses');
                document.location.href = 'news.php';
                </script>";
                exit;
            }
        }   
    }
}
}
?>
<?php include 'partials/dashboard-top.php';?>
<head>
    <link rel="stylesheet" href="../css/upload.css">
</head>
<body>
<div id="kontenKategori" class="konten-scroll">
    <div class="form">
        <form action="upload.php" method="POST" enctype="multipart/form-data">
        <select name="kategori" required>
            <option value="">Pilih Kategori</option>
            <option value="nasional">Nasional</option>
            <option value="ragam">Ragam</option>
            <option value="layanan">Layanan</option>
            <option value="olahraga">Olahraga</option>
        </select>
        <div class="input-box">
          <label>Judul</label>
          <input type="text" name="judul" id="judul" placeholder="Masukkan Judul" required>
          <p id="limit-judul"></p>
        </div>
        <div class="input-box">
          <label>Deskripsi</label>
          <input type="text" name="deskripsi" id="deskripsi" placeholder="Masukkan Deskripsi" required>
          <p id="limit-deskripsi"></p>
        </div>
        <div class="input-box">
          <label>Konten</label>
          <textarea type="text" name="konten" id="konten" placeholder="Masukkan Konten" required></textarea>
          <p id="limit-konten"></p>
        </div>
        <div class="input-box">
        <label>Tanggal:</label>
        <input type="date" name="tanggal" id="tanggal" required>
        </div>
            <input type="file" name="imageUpload" id="imageUpload" required>
            <button id="choose">Choose Image</button>
            <input type="submit" value="Upload" name="submit">
        </form>
    </div>
</div>
    <script type="text/javascript" src="../js/upload.js"></script>

    <script>
        //    Auto Expand Text area
        const textarea = document.querySelector("textarea");
        textarea.addEventListener("keyup", e =>{
        textarea.style.height = "63px";
        let scHeight = e.target.scrollHeight;
        textarea.style.height = `${scHeight}px`;
      });
    </script>
    <script>
        var judul = document.getElementById("judul");
        var detail = document.getElementById("deskripsi");
        var choose = document.getElementById("choose");
        var uploadImage = document.getElementById("imageUpload");

        function upload(){
            uploadImage.click();
        }

        uploadImage.addEventListener("change",function(){
            var file = this.file[0];
            if(judul.value == ""){
                judul.value = file.name;
            }
            choose.innerHTML = "You can change("+file.name+") picture";
            });
    </script>

</body>
<?php include 'partials/dashboard-bottom.php';?>