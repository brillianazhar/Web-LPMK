<?php
	session_start();
	error_reporting(1);
	$user=$_SESSION['fbuser'];
		$host = "localhost";
		$username = "root";
		$pass = "";
		$db   = "faceback";
		$konek = mysqli_connect($host, $username, $pass, $db) or die("Database tidak terhubung");
	$query1=mysqli_query($konek,"select * from users where Email='$user'");
	$rec1=mysqli_fetch_array($query1);
	$userid=$rec1[0];
	mysqli_query($konek,"update user_status set status='Offline' where user_id='$userid'");
	unset($_SESSION['fbuser']);
	//session_destroy();
	header("location:../../index.php");
?>