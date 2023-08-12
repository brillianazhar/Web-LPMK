<?php 
	session_start();

	$user=$_SESSION['fbuser'];
	$host = "localhost";
	$username = "root";
	$pass = "";
	$db   = "faceback";
	$konek = mysqli_connect($host, $username, $pass, $db) or die("Database tidak terhubung");

	$query1=mysqli_query($konek,"select * from users where nomorhp='$user'");
	$rec1=mysqli_fetch_object($query1);
	$userid=$rec1->user_id;
	$query2=mysqli_query($konek,"select * from user_profile_pic where user_id=$userid");
	$rec2=mysqli_fetch_object($query2);

	$name=$rec1->name;
	$img=$rec2->image;

	if(isset($_POST['delete_warning']))
	{
		$user_warning_id=intval($_POST['warning_id']);
		mysqli_query($konek,"delete from user_warning where user_id=$user_warning_id;");
		header("Location: Home.php");
	}
	if(isset($_POST['delete_notice']))
	{
		$n_id=intval($_POST['notice_id']);
		mysqli_query($konek,"delete from users_notice where notice_id=$n_id;");
		header("Location: Home.php");
	}
	if(isset($_POST['txt']))
	{
		$txt=$_POST['post_txt'];
		$priority=$_POST['priority'];
		$post_time=$_POST['txt_post_time'];
		mysqli_query($konek,"insert into user_post(user_id,post_txt,post_time,priority) values('$userid','$txt','$post_time','$priority');");
		header("Location: Home.php");
	}
	
	if(isset($_POST['file']))
	{
		$txt=$_POST['post_txt'];
		$priority=$_POST['priority'];
		$post_time=$_POST['pic_post_time'];
		if($txt=="")
		{
			$txt="added a new photo.";
		}
		$path = "../../fb_users/".$user."/Post/";
		
		$img_name=$_FILES['file']['name'];
    	$img_tmp_name=$_FILES['file']['tmp_name'];
    	$prod_img_path=$img_name;
		move_uploaded_file($img_tmp_name,"../../fb_users/".$user."/Post/".$prod_img_path);
    	mysqli_query($konek,"insert into user_post(user_id,post_txt,post_pic,post_time,priority) values('$userid','$txt','$img_name','$post_time','$priority');");
		header("Location: Home.php");
	}
	if(isset($_POST['delete_post']))
	{
		$post_id=intval($_POST['post_id']);
		mysqli_query($konek,"delete from user_post where post_id=$post_id;");
		header("Location: Home.php");
	}
	if(isset($_POST['Like']))
	{
		$post_id=intval($_POST['postid']);
		$user_id=intval($_POST['userid']);
		mysqli_query($konek,"insert into user_post_status(post_id,user_id,status) values($post_id,$user_id,'Like');");
		header("Location: Home.php");
	}
	if(isset($_POST['Unlike']))
	{
		$post_id=intval($_POST['postid']);
		$user_id=intval($_POST['userid']);
		mysqli_query($konek,"delete from user_post_status where post_id=$post_id and  	user_id=$user_id;");
		header("Location: Home.php");
	}
	if(isset($_POST['comment']))
	{
		$post_id=intval($_POST['postid']);
		$user_id=intval($_POST['userid']);
		$txt=$_POST['comment_txt'];
		if($txt!="")
		{
		mysqli_query($konek,"insert into user_post_comment(post_id,user_id,comment) values($post_id,$user_id,'$txt');");
		}
		header("Location: Home.php");
	}
	if(isset($_POST['delete_comment']))
	{
		$comm_id=intval($_POST['comm_id']);
		mysqli_query($konek,"delete from user_post_comment where comment_id=$comm_id;");
		header("Location: Home.php");
	}
?>