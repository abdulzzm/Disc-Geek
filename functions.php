<?php
functions registrasi($data){
	global $conn;

	$username = strtolower(stripcslashes($data["username"]));
	$passsword = mysqli_real_escape_string($conn,$data["password"]);
	$passsword2 = mysqli_real_escape_string($conn,$data["password2"]);

	$result = mysqli_quey ($conn, "SELECT username FROM user WHERE username = '$username'");
	if(mysqli_fetch_assoc($result)){
		echo "<script>
		alert ('username sudah terdaftar');
		</script>";
		return false;
	}

	if($passsword !== $passsword2){
		echo "<script>
		alert ('konfirmasi password tidak sesuai!');
		</script>";
		return false;
	}

	$passsword = $password_hash($passsword, PASSWORD_DEFAULT);
	mysqli_query($conn, "INSERT INTO user VALUES('','$username','$password')");

	return mysqli_affected_rows($conn);
}
?>