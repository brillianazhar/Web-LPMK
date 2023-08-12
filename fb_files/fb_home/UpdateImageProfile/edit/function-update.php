<?php 
session_start();

$user=$_SESSION['fbuser'];
$host = "localhost";
$username = "root";
$pass = "";
$db   = "faceback";
$conn = mysqli_connect($host, $username, $pass, $db) or die("Database tidak terhubung");

$query1=mysqli_query($conn,"select * from users where nomorhp='$user'");
$rec1=mysqli_fetch_object($query1);
$userid=$rec1->user_id;

$name=$rec1->name;

if(isset($_POST['update']))
{
    $qupdate = ("update users set name='$name', kelurahan='$kelurahan' where nomorhp = '$user'");
    $update = mysqli_query($conn, $qupdate);
    // $update = ("update users set name='$name', kelurahan='$kelurahan' where nomorhp = '$user'");
    // $update2 = mysqli_query($konek, $update);
    if ($update){
        echo "<script> alert ('Data Berhasil Di Update')</script>";
    }else {
        echo "<script> alert ('Data Tidak Berhasil Di Update')</script>";
    }
    header("Location: index.php");
}
?>