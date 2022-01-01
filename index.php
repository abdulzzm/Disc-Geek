<?php
session_start();
require 'conf/koneksi.php';

$query = mysqli_query($koneksi, "SELECT * FROM produk");

?>

<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">

    <title></title>

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
        font-family: sans-serif;
        margin-left: 40px;
        margin-top: 3px;


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
  <button class="btn btn-secondary dropdown-toggle" type="button" id="dropdownMenu2" data-bs-toggle="dropdown" aria-expanded="false" style="border-radius: 20px; background-color:#E84C3D ; color:white; margin-left: 40px; margin-top: 2px; border:none;">
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
				echo '<li class="nav-item"> <a class="nav-link"  href="logout.php">Logout ('.$_SESSION['username'].')</a></li>';
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


        <!-- produk -->
        <div class="container mb-5">
            <div class="col-lg-12">
                <div class="row mt-6">
                    <?php while ($row = mysqli_fetch_assoc($query)) : ?>
                      
                    <div class="col-lg-3 mb-3">
                        <div class="card">
                            <img src="Album Data/<?= $row['image'] ?>" class="card-img-top">
                            <div class="card-body">
                                <div class="mb-3">
                                    <div class="font-weight-bold"><?= $row['artist']; ?></div>
                                    <div class="font-weight-bold"><?= $row['title']; ?></div>
                                    <div class="text-danger">Rp.<?= number_format($row['harga']); ?></div>
                                </div>
                                <hr class="my-4">
                                <div class="text-center">
                                
                                  <a href="beli.php?id=<?= $row['id_produk']; ?>" class="btn btn-dark text-white" style="background:#E84C3D; border-radius: 30px;">Buy</a>
                                  <a href="detail produk.php?id=<?= $row['id_produk']; ?>" class="btn btn-dark text-white" style="background:#E84C3D; border-radius: 30px;">Detail</a>
                                </div>
                            </div>
                        </div>
                    </div>
                    <?php endwhile; ?>
                </div>
            </div>
        </div>

        




    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>

  
  </body>
</html>