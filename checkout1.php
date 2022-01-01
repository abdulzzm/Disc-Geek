<?php 
session_start();
require 'conf/koneksi.php';
$query = $koneksi->query('SELECT * FROM users');

?>

<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    
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
      p{
        color: white;
      }
      .col{
        color: white;
        background: transparent;
      }
      .card{
        background: transparent;
      }
      .totalan{
        font-size: 14px;
      }

      
    </style>

    <title></title>
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
                        <li><button class="dropdown-item" type="button">Action</button></li>
                        <li><button class="dropdown-item" type="button">Another action</button></li>
                        <li><button class="dropdown-item" type="button">Something else here</button></li>
                    </ul>
                    </div>
                </li>
                <li class="nav-item">
                <a class="nav-link" style="color: white;" href="#"><h5>CEK RESI</h5></a>
                </li>
                <li class="nav-item">
                <a class="nav-link"  style="color: white;" href="#"><h5>CART</h5></a>
                </li>
                <?php
                    if (!empty($_SESSION['username'])){
                        echo '<li class="nav-item" > <a class="nav-link"  style="color: white;" href="logout.php">Logout ('.$_SESSION['username'].')</a></li>';
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
      <h4 style="color: white;">Checkout</h4><br>
      <?php
          // define variables and set to empty values
          $nama = $alamat = "";

          if ($_SERVER["REQUEST_METHOD"] == "POST") {
            $nama = input($_POST["nama"]);
            $alamat = input($_POST["alamat"]);
          }

          function input($data) {
            $data = trim($data);
            $data = stripslashes($data);
            $data = htmlspecialchars($data);
            return $data;
          }
          ?>
      <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
         <label for="nama" style="color: white;">Nama</label><br>
          <input type="text" id="nama" name="nama" value=""><br>
          <label for="alamat" style="color: white;">Alamat</label><br>
          <input type="text" id="alamat" name="alamat" value=""><br><br>

           <input style="border-radius: 20px; background-color:#E84C3D ; color:white" type="submit" value="Masukan">
      </form>
      
      <p>___________________________________________________________<p>
      <?php
        echo $nama;
        echo "<br>";
        echo $alamat;
      ?>
          <p>___________________________________________________________<p>
    </div>

<div class="container">
   <h4 style="color:white;">DISCGEEK</h4>
</div>

<div class="container">
  <div class="row">
    <div class="col">
      <?php $total = 0; ?>
      <?php foreach ($_SESSION['keranjang'] as $id_produk => $jumlah) : ?>
      <?php
      $query = $koneksi->query("SELECT * FROM produk WHERE id_produk = '$id_produk'");
      $row = $query->fetch_assoc();
      $subharga = $row['harga'] * $jumlah;
      ?>
      <ul>
        <li>
      
          <div class="card mb-3" style="max-width: 200px;">
            <div class="row g-0">
              <div class="col-md-4">
                <img src="Album Data/<?= $row['image']; ?> " class="img-fluid rounded-start" alt="...">
              </div>
            <div class="col-md-8">
              <div class="card-body">
                <h5 class="card-title"><?= $row['artist']; ?></h5>
                <p><?= $row['title']; ?></p>
                <p class="card-text"><?= $row['harga']; ?></p>
              </div>
            </div>
          </div>
        </li>

      </ul>

      <p>___________________________________________________________<p>
    </div>

    <div class="col">
      <p>___________________________________________________________<p>
        <div class="container">
          <div class="row row-cols-2">
            <div class="col">
              <h6>Total Belanja</h6>
            </div>

            <div class="col"> 
              <h6>Rp<h6>
            </div>
                <br> <br><br>

            <div class="btn-group">
              <button class="btn btn-secondary btn-sm dropdown-toggle" type="button" data-bs-toggle="dropdown" aria-expanded="false" style="background:#E84C3D;">
              Durasi Pengiriman
              </button>
              <ul class="dropdown-menu">
              </ul>
            </div>

          </div>
        </div>
    </div>


    <div class="col">
      <p>___________________________________________________________<p>
      <h6>Ringkasan Belanja</h6>
          
      <div class="container">
        <div class="row row-cols-2">
          <div class="col">
            <ul>
              <li class="totalan">Total Harga</li>
              <li class="totalan">Total Ongkos Kirim</li>
              <li class="totalan">Asuransi Pengiriman</li>
            </ul>
          </div>

          <ul>
            <li class="totalan">Rp555.000</li>
            <li class="totalan">Rp20.0000</li>
            <li class="totalan">Rp5.000</li>
          </ul>
        </div>
      </div>

      <p>___________________________________________________________<p>
      <div class="container">
        <div class="row row-cols-2">
          <div class="col">
            Total
          </div>
          <div class="col">
            Rp
          </div>
        </div>
      </div>  
        <br><br>
        <?php $total += $subharga ?>
        <?php endforeach ?>

        <!-- Button trigger modal -->
        <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#staticBackdrop">
          Launch static backdrop modal
        </button>

        <!-- Modal -->
        <div class="modal fade" id="staticBackdrop" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
          <div class="modal-dialog">
            <div class="modal-content">
              <div class="modal-header">
                <h5 class="modal-title" id="staticBackdropLabel">Modal title</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
              </div>
              <div class="modal-body">
                ...
              </div>
              <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                <button type="button" class="btn btn-primary">Understood</button>
              </div>
            </div>
          </div>
        </div>
  </div>
</div>

    </div>

  </div>
</div>


    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>

  
  </body>
</html>