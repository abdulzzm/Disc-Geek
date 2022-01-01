<?php
session_start();
$u = "admin";
$p = "12345";
?>
<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8">
		<meta name= "viewport" content="width=device-width, initial-scale=1">
		<title>Login</title>
		<link rel="stylesheet" type="text/css" href="assets/css/stylelogin.css">
		
    </head>

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
    <body>
        <div class="container">
            <img class="image" src="assets/img/logo.png"> 
			  <form action="" method="POST">
              <input type="text" name="username" placeholder="Username" required/>
              <input type="password" name="password" placeholder="Password" required/>
              <input type="submit" name="masuk" value="Masuk" />
			  </form>
			  <?php
			  if (isset($_POST['masuk'])){
				if ($_POST['username'] != $u && $_POST['password'] != $p){
					echo "<script>alert('Username atau password salah');</script>";
				}else{
					$_SESSION['admin'] = 'admin';
					header('location: admin.php');
				}
			  }
			  ?>
			  
        </div> 
        <label><a href="index.php">skip</a></label><br>
		 
    </body>
</html> 

