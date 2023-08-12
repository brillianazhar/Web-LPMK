<?php 

session_start();
unset($_SESSION['fbuser']);

header("location:../../../index.php");

?>