<?php 
	include 'conf/koneksi.php';


    //if (empty($_GET['id_produk'])){header('location: index.php');}
    $getDetailProduk = $koneksi->query("SELECT * FROM produk where id_produk ='".$_GET['id']."' ")->fetch_assoc();
?>


<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">

    <title>Disc Geek</title>

    <style>

            body {
            background-image: url("assets/img/background.jpg");
            }

            .image {
            display: block;
            width: 150px;
            }

            .logout{
            border-radius: 30px;
            border: none;
            color:#E84C3D ;
            margin-left: 40px;
            align-items: center;
                    margin-top: 10px;
            }

            .nav-link {
            margin-left: 40px;
            margin-top: 3px;

            }

            .btnadd {
            background:#E84C3D;
            color: white;
            border-radius: 20px;
            }
            .col{
            color: white;
            }
            .button1 {
                background-color: #E84C3D;
                color: white;
                border-radius: 20px;
                border-color: white;
            }
            button{
                padding: 10px 25px;
                background-color: white;
                color: #E84C3D;
                border:none;
                border-radius: 50px;
                transition : all 0.3s ease 0s;
                cursor: pointer;
                margin-left: 10px;
            }
            button:hover{
                background-color: white;
            }


    </style>
  </head>
  <body>




<nav class="navbar navbar-expand-lg navbar-light" style="background:#E84C3D;">
  <div class="container-fluid">
      <img class="image" src="assets/img/logo.png">
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarTogglerDemo02" aria-controls="navbarTogglerDemo02" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarTogglerDemo02">
      <ul class="navbar-nav me-auto mb-2 mb-lg-0">
        <li class="nav-item">
          <a class="nav-link active" aria-current="page"  style="color: white;" href="index.php"><h5>SHOP</h5></a>
        </li>
        <li class="nav-item">
          

          <div class="dropdown">
  <button class="btn btn-secondary dropdown-toggle" type="button" id="dropdownMenu2" data-bs-toggle="dropdown" aria-expanded="false" style="border-radius: 20px; background-color:#E84C3D ; color:white; margin-left: 40px; margin-top: 2px;">
    Category
  </button>
  <ul class="dropdown-menu" aria-labelledby="dropdownMenu2">
      <li><button class="dropdown-item" type="button">DC Album</button></li>
      <li><button class="dropdown-item" type="button">Vinyl</button></li>
  </ul>
</div>

        </li>
        <li class="nav-item">
          <a class="nav-link" style="color: white;" href="cekresi.html"><h5>CEK RESI</h5></a>
        </li>
         <li class="nav-item">
          <a class="nav-link"  style="color: white;" href="keranjang.php"><h5>CART</h5></a>
        </li>
        <?php
			if (!empty($_SESSION['username'])){
				echo '<li class="nav-item" > <a class="nav-link" href="logout.php">Logout ('.$_SESSION['username'].')</a></li>';
			}
		?>
        <?php
			if (empty($_SESSION['username'])){
				echo '<a class="button1" href="Daftar.php"><button>Daftar</button></a>
				<a class="button2" href="Login.php"><button>Masuk</button></a>';
			}
		?>
      </ul>
      <form class="d-flex">
        <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search">
        <button class="btn btn-outline-light" style="color:white;" type="submit">Search</button>
      </form>
    </div>
  </div>
</nav>

   <br> 

   
<div class="container">
  <div class="row">

    <div class="col">
        <div class="card" style="width: 30rem; background:transparent;">
            <img src="Album Data/<?= $getDetailProduk['image']; ?>" class="card-img-top" alt="...">

            <div class="card-body">
            </div>
        </div>
    </div>

    <div class="col" style="color:white;">
        <p><?= $getDetailProduk['kategori']; ?></P>
        <h3><?= $getDetailProduk['artist']; ?></h3>
        <h4><?= $getDetailProduk['title']; ?></h4>
        <h4>Rp. <?= $getDetailProduk['harga']; ?></h4>
        <h6><?= $getDetailProduk['release']; ?></h6>
        <h6><?= $getDetailProduk['genre']; ?></h6>
        <p>Deskripsi :<br>
        <?= $getDetailProduk['deskripsi']; ?>
        </p>
    </div>
</div>

  <br>
  <br>

<div class="container">
    <div class="row row-cols-4">
        <div class="col">
            <div class="container">
                <div class="row row-cols-2">
                    <div class="col">
                        <div class="card" style="width: 5rem;">
                            <img src="Album Data/<?= $getDetailProduk['image']; ?>" class="card-img-top" alt="...">
                        </div>
                    </div>

                    <div class="col">
                        <div class="card" style="width: 5rem;">
                            <img src="Album Data/<?= $getDetailProduk['image']; ?>" class="card-img-top" alt="...">
                        </div>
                    </div>

                </div>
            </div>
        </div>


        <div class="col"></div>
            <div class="col">Stok: <?= $getDetailProduk['stok']; ?></div>
                <div class="col">
                    <div class="d-grid gap-2 d-md-flex justify-content-md-end">
                    
                    <a href="beli.php?id=<?= $getDetailProduk['id_produk']; ?>" class="btn btn-dark text-white" style="background:#E84C3D; border-radius: 30px;">ADD TO CART</a>
                </div>
            </div>
        </div>
    </div>
</div>

<br>
<br>
<br>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>

  
  </body>
</html>