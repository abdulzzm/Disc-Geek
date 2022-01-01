<?php 
session_start();
require 'conf/koneksi.php';
$q = $koneksi->query('SELECT * FROM alamat');
?>


<!DOCTYPE html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous" />

    <title></title>
    <style>
      body {
        background-image: url("assets/img/background.jpg");
      }

      .image {
        display: block;
        width: 150px;
      }

      .logout {
        border-radius: 30px;
        border: none;
        color: #e84c3d;
        margin-left: 40px;
        align-items: center;
        margin-top: 10px;
      }

      .nav-link {
        font-family: sans-serif;
        margin-left: 40px;
        margin-top: 3px;
      }
      .col {
        color: white;
      }

      button {
        padding: 10px 25px;
        background-color: white;
        color: #e84c3d;
        border: none;
        border-radius: 50px;
        transition: all 0.3s ease 0s;
        cursor: pointer;
        margin-left: 10px;
      }
      button:hover {
        background-color: black;
      }

      p {
        color: white;
      }
      .btnsubmit {
        border-radius: 20px;
        background-color: #e84c3d;
        color: white;
      }
      button {
        padding: 10px 25px;
        background-color: white;
        color: #e84c3d;
        border: none;
        border-radius: 50px;
        transition: all 0.3s ease 0s;
        cursor: pointer;
        margin-left: 10px;
      }
      button:hover {
        background-color: white;
      }
    </style>
  </head>
  <body>
    
    <nav class="navbar navbar-expand-lg navbar-light" style="background: #e84c3d">
      <div class="container-fluid">
        <img class="image" src="assets/img/logo.png" />
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarTogglerDemo02" aria-controls="navbarTogglerDemo02" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarTogglerDemo02">
          <ul class="navbar-nav me-auto mb-2 mb-lg-0">
            <li class="nav-item">
              <a href="index.php" class="nav-link active" aria-current="page" style="color: white"><h5>SHOP</h5></a>
            </li>
            <li class="nav-item">
              <div class="dropdown">
                <button
                  class="btn btn-secondary dropdown-toggle"
                  type="button"
                  id="dropdownMenu2"
                  data-bs-toggle="dropdown"
                  aria-expanded="false"
                  style="border-radius: 20px; background-color: #e84c3d; color: white; margin-left: 40px; margin-top: 2px"
                >
                  Category
                </button>
                <ul class="dropdown-menu" aria-labelledby="dropdownMenu2">
                  <li><button class="dropdown-item" type="button">DC Album</button></li>
                  <li><button class="dropdown-item" type="button">Vinyl</button></li>
                </ul>
              </div>
            </li>

            <li class="nav-item">
              <a href="cekresi.html" class="nav-link" style="color: white"> <h5>CEK RESI</h5></a>
            </li>
            <li class="nav-item">
              <a href="keranjang.php" class="nav-link" style="color: white" ><h5>CART</h5></a>
            </li>
            <li class="nav-item">
                <?php
                    if (!empty($_SESSION['username'])){
                        echo '<li class="nav-item" > <a class="nav-link"  style="color: white;" href="logout.php">Logout ('.$_SESSION['username'].')</a></li>';
                    }
                ?>
            </li>
          </ul>

          <form class="d-flex">
            <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search" />
            <button class="btn btn-outline-light" style="color: white" type="submit">Search</button>
          </form>
        </div>
      </div>
    </nav>
    <br />

    <!-- grid atas 2 kolom -->
    <div class="container">
      <div class="row">
        <div class="col">
          <h4 style="color: white">Checkout</h4>
          
          <br />

          <form method="post" action="">
              <label for="nama" style="color: white;">Nama</label><br>
              <input type="text" id="nama" name="nama" value=""><br>
              <label for="alamat" style="color: white;">Alamat</label><br>
              <input type="text" id="alamat" name="alamat" value=""><br><br>
              <input style="border-radius: 20px; background-color:#E84C3D ; color:white" name="submit" type="submit" value="Masukan">

          </form>
           
          <?php
            $nama_penerima = $alamat_lengkap = '';
            if (isset($_POST['submit'])){
              $nama_penerima = $_POST['nama'];
              $alamat_lengkap = $_POST['alamat'];
            

                if(!empty($nama_penerima) && !empty($alamat_lengkap)){
                  $q = "INSERT INTO alamat ($nama_penerima,alamat_lengkap) values ('$nama_penerima','$alamat_lengkap')";
                  $simpan = mysqli_query($koneksi, $q);
                  
                } else {
                  $pesan = "Tidak dapat menyimpan, data belum lengkap!";
                }
              }    
          ?>
        </div>
        <div class="col">
          <br />
          <br />
          <p>___________________________________________________________</p>
          <p></p>
          <?php
            echo $nama_penerima;
            echo "<br>";
            echo $alamat_lengkap;
          ?>
          <p>___________________________________________________________</p>
          <p></p>
        </div>
      </div>
    </div>

    <br />
    <br />
    <!-- grid bawah 3 kolom -->
    <div class="container">
      
      <div class="row" style="background:transparent ; color:white">
      <h6>List Pembelian</h6>

        <div class="col">
        <?php $total = 0; ?>
        <?php foreach ($_SESSION['keranjang'] as $id_produk => $jumlah) : ?>
        <?php
        $query = $koneksi->query("SELECT * FROM produk WHERE id_produk = '$id_produk'");
        $row = $query->fetch_assoc();
        $subharga = $row['harga'] * $jumlah;
        ?>
          <ol>
            <li>
                <div class="card mb-3" style="background:transparent ;max-width: 200px;">
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
            
          </ol>
          <?php endforeach ?>
        </div>
        
        <div class="col">
          <p>Pilih Durasi Pengiriman</p>
          <div class="dropdown">
          <?php $ongkos = 35000; ?>
          <form method="post" action="">
            <!-- <button class="btn btn-secondary dropdown-toggle" type="button" id="dropdownMenu2" data-bs-toggle="dropdown" aria-expanded="false" style="border-radius: 20px; background-color: #e84c3d; color: white">Durasi Pengiriman</button>
            <ul class="dropdown-menu" name="ongkos" aria-labelledby="dropdownMenu2">
              <li><button class="dropdown-item" type="button">Instan Rp50.0000</button></li>
              <li><button class="dropdown-item" type="button">Reguler Rp35.000</button></li>
            </ul> -->

            <!-- <label for="ongkos" style="color: white;"></label>
            <input list="ongkos" for="ongkos" name="ongkos">
            <datalist id="ongkos">
              <option value="Instan ">Instan Rp50.0000</option>
              <option value="Reguler">Reguler Rp35.000</option>
            </datalist>
            <input type="submit"> -->

            <select id="ongkos" name="ongkos" for="ongkos" class="btn btn-secondary dropdown-toggle" type="button" id="dropdownMenu2" data-bs-toggle="dropdown" aria-expanded="false" style="border-radius: 20px; background-color: #e84c3d; color: white">
              <option value="50000">Instan Rp50.0000</option>
              <option value="35000">Reguler Rp35.000</option>
            </select>
          </form>
          </div>
        </div>
        
        <div class="col">
        <?php $total += $subharga ?>
        <?php 
          $asuransi = 5000; 
          $bayar = $subharga + $ongkos + $asuransi;
        ?>
          <h6>Ringkasan Belanja</h6>
          <ol>
            <li>total harga: Rp <?= $subharga; ?></li>
            <li>ongkos kirim: Rp <?php echo $ongkos; ?></li>
            <li>asuransi pengiriman: Rp <?php echo $asuransi; ?></li>
          </ol>
          <p>______________________________________________</p>
          <p></p>
          <h6>Total Tagihan Rp <?php echo $bayar; ?></h6>

          <div class="dropdown">
            <!-- <button class="btn btn-secondary dropdown-toggle" type="button" id="dropdownMenu2" data-bs-toggle="dropdown" aria-expanded="false" style="border-radius: 20px; background-color: #e84c3d; color: white">pilih pembayaran</button>
            <ul class="dropdown-menu" aria-labelledby="dropdownMenu2">
              <li><button class="dropdown-item" type="button">OVO</button></li>
              <li><button class="dropdown-item" type="button">BANK</button></li>
            </ul> -->

            <select id="pembayaran" name="pembayaran" for="pembayaran" class="btn btn-secondary dropdown-toggle" type="button" id="dropdownMenu2" data-bs-toggle="dropdown" aria-expanded="false" style="border-radius: 20px; background-color: #e84c3d; color: white">
              <option value="ovo">OVO</option>
              <option value="gopay">GOPAY</option>
              <option value="bank">BANK</option>
            </select>
          </div>
          <br />
          <input class="btnsubmit" type="submit" value="Bayar" />
        </div>
        
        
      </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
  </body>
</html>
