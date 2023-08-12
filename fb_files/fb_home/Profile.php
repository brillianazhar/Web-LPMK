<?php

include_once("koneksi.php");
?>


<?php
session_start();
error_reporting(1);
if (isset($_SESSION['fbuser'])) {
	include("background.php");



?>

<html>

<head>
    <title>Profile Kelurahan</title>
    <link href="Home_css/Home.css" rel="stylesheet" type="text/css">
    <link href="profile.css" rel="stylesheet">
    <script src="Home_js/home.js" language="javascript"></script>

</head>

<?php
	$query = "SELECT * FROM halaman";
	$sql = mysqli_query($konek, $query);
	$result = mysqli_fetch_assoc($sql);
	$isi = $result['isi'];

?>

<body id="body">



    <div class="page">
        <?php $isiFilterImage = str_replace(' src="', ' src="../../Admin/', $isi);
	echo $isiFilterImage;
?>


    </div>


    <?php
	$que_post = mysqli_query($konek, "select * from user_post where priority='Public' order by post_id desc");
	while ($post_data = mysqli_fetch_array($que_post)) {
		$postid = $post_data[0];
		$post_user_id = $post_data[1];
		$post_txt = $post_data[2];
		$post_img = $post_data[3];
		$que_user_info = mysqli_query($konek, "select * from users where user_id=$post_user_id");
		$que_user_pic = mysqli_query($konek, "select * from user_profile_pic where user_id=$post_user_id");
		$fetch_user_info = mysqli_fetch_array($que_user_info);
		$fetch_user_pic = mysqli_fetch_array($que_user_pic);
		$user_name = $fetch_user_info[1];
		$user_Email = $fetch_user_info[2];
		$user_gender = $fetch_user_info[4];
		$user_pic = $fetch_user_pic[2];
?>

    <?php
	}?>
    </table>
    </div>

    <?php
	include("Home_error/Home_error.php");
?>
</body>

</html>
<?php
}
else {
	header("location:../../index.php");
}
?>