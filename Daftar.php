<?php

include 'conf/koneksi.php';
if (!empty($_SESSION['username'])){
    header('location: index.php');
}
if(isset($_POST['register'])){
    if(registrasi($_POST)>0){
        echo "<script>
        alert ('user baru berhasil ditambahkan!');
        </script>";
    }else{
        echo_mysqli_error($conn);
    }
}

?>
 
<!DOCTYPE html>
<html lang="en">
<head>
    <title>Register</title>
    <link rel="stylesheet" href="assets/css/stylelogin.css">
    
</head>
<style>

    body {
            background-image: url("assets/img/background.jpg");
            }

.skip {
    display: block;
    margin-left: 830px;
    margin-top: 650px;
    color: white;

}

</style>>

<body>
    <div class="container">
    <img class="image" src="assets/img/logo.png"> 
    <br>
        <form action="" method="post">
            <div class="form-group">
                <label for="username">username :</label>
                <input type="text" name="username" id="username">
            </div>    
            <div class="form-group">
                <label for="password">password :</label>
                <input type="text" name="password" id="password">
                
            </div>
            <div class="form-group">
                <label for="password2">konfirmasi password :</label>
                <input type="text" name="password2" id="password2">
            </div>
            <div class="form-group">
                <input type="submit" class="btn btn-primary" name= "register" value="Submit">
            </div>
            <p>Already have an account? <a href="Login.php">Login here</a>.</p>

        </form>
    </div>   
      <label><a class="skip" href="index.php">skip</a></label><br>
</body>
</html>
<?php

?>