<?php

include 'config.php';

session_start();

error_reporting(0);

$user=$_POST['nomorhp'];

if (isset($_SESSION['fbuser'])) {
    header("location:fb_files/fb_home/Home.php");
}

if (isset($_POST['submit'])) {
	$nomorhp = $_POST['nomorhp'];

	$sql = "SELECT * FROM users WHERE nomorhp='$nomorhp'";
	$result = mysqli_query($conn, $sql);
	if ($result->num_rows > 0) {
		$row = mysqli_fetch_assoc($result);
		$_SESSION['fbuser'] = $nomorhp;
		header("location:fb_files/fb_home/Home.php");

		$que1=mysqli_query($conn,"select * from users where nomorhp='$nomorhp' ");
		$rec=mysqli_fetch_array($que1);
		$userid=$rec[0];

		$que2=mysqli_query($conn,"select * from user_profile_pic where user_id=$userid");
		$count1=mysqli_num_rows($que2);
		if($count1==0)
		{
			mysqli_query($conn,"insert into user_profile_pic(user_id,image) values('$userid','default_img.png')");
		}
	} else {
		echo "<script>alert('Woops! NomorHp Salah.')</script>";
	}
}

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sign In</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
<div class="container">
		<form action="" method="POST" class="login-email">
		<div class="logo">
                <img src=img/logoLPMK.png width="131px" height="131px" >
                <p id="lpmk_text">LPMK</p>
            </div>
			<p class="login-text" style="font-size: 2rem; font-weight: 800;">Login</p>
			<div class="input-group">
				<input type="text" placeholder="Masukan Nomor HP" name="nomorhp" value="<?php echo $nomorhp; ?>" required>
			</div>
			<div class="input-group">
				<button name="submit" class="btn">Login</button>
			</div>
			<p class="login-register-text">Don't have an account? <a href="Register.php">Register Here</a>.</p>
		</form>
	</div>
</body>
</html>