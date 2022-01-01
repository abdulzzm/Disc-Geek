<?php
session_start();

include 'conf/koneksi.php';
if (!empty($_SESSION['username'])){
	header('location: index.php');
}
?>
<!DOCTYPE html>
<html>
	<head>	
	<title>Login</title>
        <link rel="stylesheet" href="assets/css/stylelogin.css">

        <style>

        	body{
        		background-image: url("assets/img/background.jpg");
        	}
        	.skip {
    		display: block;
    		margin-left: 830px;
    		margin-top: 650px;
    		color: white;

}
        </style>
    </head>
    <body>
        <div class="container">
			<img class="image" src="assets/img/logo.png"> 
            <div class="konten">

			  <form action="" method="POST">
              <input type="text" name="username" placeholder="Username" required/>
              <input type="password" name="password" placeholder="Password" required/>
              
              <input type="submit" name="masuk" value="Masuk" />
			  </form>
			  <?php
				if (isset($_POST['masuk'])){
					$q = $koneksi->query("SELECT * FROM user where username='".strtolower($_POST['username'])."'");
					if ($q->num_rows > 0){
						if($q->fetch_assoc()['password'] == $_POST['password']){
							$_SESSION['username'] = strtolower($_POST['username']);
							header('location: index.php');
						}else{
							echo "<script>alert('Username atau password tidak terdaftar');</script>";
						}
					}else{
						echo "<script>alert('Username atau password tidak terdaftar');</script>";
					}
				}
			  ?>
			  <label>belum punya akun?<a href="Daftar.php">klik di sini</a></label><br>
              <label>Login sebagai admin<a href="adminlogin.php">klik di sini</a></label><br>
            </div>
			
		</div>	
		<label><a href="index.php" class="skip">skip</a></label><br> 
    </body>
</html> 