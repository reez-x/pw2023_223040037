<?php
session_start();
require 'functions.php';
if( !isset($_SESSION["login"])){
    header("location: login.php");
    exit;
  }
  // ...

    $kategori = $_GET['kategori'];
    $sql = "SELECT * FROM news WHERE kategori = '$kategori' ORDER BY id DESC";
    $items = $conn->query($sql);

if (isset($_GET['search'])) {

    $keyword = $_GET['keyword'];
    $query = "SELECT * FROM 
            news   
        WHERE  
            judul LIKE '%$keyword%' OR 
            deskripsi LIKE '%$keyword%'OR
            konten LIKE '%$keyword%'

        ";

        $items = $conn->query($query);

}

// ...

  
  
//   $sql = "SELECT * FROM news WHERE kategori = '$kategori' ORDER BY id DESC";
//   $items = $conn->query($sql);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="css/page.css">
    <!-- Link -->
    <link rel="stylesheet" href="css/card.css">
    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Rubik:wght@300;400;500;600;700;800;900&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Lato&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Roboto+Slab&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" crossorigin="anonymous">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" crossorigin="anonymous">
    <script src="https://kit.fontawesome.com/b99e675b6e.js"></script>
    <style>
    #searchResult {
        background-color: white;
        width: 500px;
        position: absolute;
        z-index: 999;
        border-radius: 0 0 10px 10px;
        box-sizing: border-box;
        display: none;
        overflow: hidden;
        box-shadow: 0px 10px 30px 0px rgba(50, 50, 50, 0.16);
    }

    #searchResult p {
        white-space: nowrap;
        overflow: hidden;
        text-overflow: ellipsis;
        padding-bottom: 5px;
        margin-bottom: 5px;
    }
    .search-item {
        border-bottom: 1px solid #ccc;
        padding: 5px 8px 0 8px;
        margin: 5px 0;
    }

    .search-item:last-child {
        border-bottom: none;
    }
    
</style>


</head>
<body> 
    <?php
    include "navbar.php";
    ?>
    <div class="gapnavbar"></div>
    <!-- Search -->
    <!-- <input type="text" name="keyword" id="keyword" style="margin-top: 100px;"> -->
    <div id="berita">
        <section class="news">
            <div class="news-wrap">
                <div class="container">
                    <div class="heading">
                        <h1 class="kategori"><?= $kategori ?></h1>
                        <div class="search_wrap search_wrap_5">
                            <div class="search_box">
                            <form action="" method="get">
                                <input type="hidden" name="kategori" value="<?= $kategori ?>">
                                <input type="text" class="input" placeholder="search..." id="keyword" name="keyword">
                                <div class="btn">
                                    <button name="search" type="submit">Search</button>
                                </div>
                            </form>
                            </div>
                            <div id="searchResult"></div>
                        </div>
                    </div>
                    
                    <div class="row">
                        <?php
                        while ($row = mysqli_fetch_assoc($items)) {
                            $judul = $row["judul"];
                            $deskripsi = $row["deskripsi"];
                        ?>
                            <div class="col-lg-3">
                                <!-- Card -->
                                <div class="news-grid">
                                    <a href="landingpage.php?id=<?= $row['id'] ?>" class="card-link">
                                        <div class="news-grid-image">
                                            <img src="uploads/<?php echo $row["gambar"];?>" alt="">
                                            <div class="news-grid-box">
                                                <h1><?php echo date("d", strtotime($row["tanggal"])); ?></h1>
                                                <p><?php echo date("M", strtotime($row["tanggal"])); ?></p>
                                            </div>
                                        </div>
                                        <div class="news-grid-txt">
                                            <span><?php echo $row["kategori"];?></span>
                                            <h2><?php echo $judul; ?></h2>
                                            <ul>
                                                <li><i class="fa fa-calendar" aria-hidden="true"></i> <?php echo date("M d, Y", strtotime($row["tanggal"])); ?></li>
                                                <li><i class="fa fa-user" aria-hidden="true"></i> Admin</li>
                                            </ul>
                                            <p><?php echo $deskripsi; ?></p>
                                        </div>
                                    </a>
                                </div>
                            </div>
                        <?php
                        }
                        ?>
                    </div>
                </div>
            </div>
        </section>
    </div>
    <?php require 'footer.php'; ?>
    </body>
</html>
    <script>
    var keywordInput = document.getElementById("keyword");
    var searchBox = document.querySelector(".search_box");
    

    keywordInput.addEventListener('input', function() {
        if (keywordInput.value.trim() !== "") {
            searchBox.classList.add("input-filled");
        } else {
            searchBox.classList.remove("input-filled");
        }
    });
    </script>

    <script>
    var keywordInput = document.getElementById("keyword");
    var searchResult = document.getElementById("searchResult");
    var kategori = '<?php echo $_GET['kategori']; ?>';

    keywordInput.addEventListener('keyup', function() {
        var keyword = keywordInput.value;

        var xhr = new XMLHttpRequest();
        xhr.onreadystatechange = function() {
            if (xhr.readyState == 4 && xhr.status == 200) {
                searchResult.innerHTML = xhr.responseText;
            }
        }

        xhr.open('GET', 'dropdown.php?keyword=' + encodeURIComponent(keyword) + '&kategori=' + encodeURIComponent(kategori), true);

        xhr.send();

        // Menampilkan atau menyembunyikan searchResult
        if (keyword === "") {
            searchResult.style.display = "none";
        } else {
            searchResult.style.display = "block";
        }
    });
</script>


