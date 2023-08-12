<?php
	session_start();
	error_reporting(1);
	if(isset($_SESSION['fbuser']))
	{
		include("background.php");
	
?>

<?php
	// if(isset($_POST['file']))
	// {
	// 	$txt=$_POST['post_txt'];
	// 	$priority=$_POST['priority'];
	// 	$post_time=$_POST['pic_post_time'];
	// 	if($txt=="")
	// 	{
	// 		$txt="added a new photo.";
	// 	}
	// 	if($gender=="Male")
	// 	{
	// 		$path = "../../fb_users/Male/".$user."/Post/";
	// 	}
	// 	else
	// 	{
	// 		$path = "../../fb_users/Female/".$user."/Post/";
	// 	}
		
	// 	$img_name=$_FILES['file']['name'];
    // 	$img_tmp_name=$_FILES['file']['tmp_name'];
    // 	$prod_img_path=$img_name;
	// 	if($gender=="Male")
	// 	{
	// 		move_uploaded_file($img_tmp_name,"../../fb_users/Male/".$user."/Post/".$prod_img_path);
	// 	}
	// 	else
	// 	{
	// 		move_uploaded_file($img_tmp_name,"../../fb_users/Female/".$user."/Post/".$prod_img_path);
	// 	}
    // 	mysqli_query($konek,"insert into user_post(user_id,post_txt,post_pic,post_time,priority) values('$userid','$txt','$img_name','$post_time','$priority');");
	// 	header("Location: Home.php");
	// }




	// if(isset($_POST['delete_warning']))
	// {
	// 	$user_warning_id=intval($_POST['warning_id']);
	// 	mysqli_query($konek,"delete from user_warning where user_id=$user_warning_id;");
	// }
	// if(isset($_POST['delete_notice']))
	// {
	// 	$n_id=intval($_POST['notice_id']);
	// 	mysqli_query($konek,"delete from users_notice where notice_id=$n_id;");
	// }
	// if(isset($_POST['txt']))
	// {
	// 	$txt=$_POST['post_txt'];
	// 	$priority=$_POST['priority'];
	// 	$post_time=$_POST['txt_post_time'];
	// 	mysqli_query($konek,"insert into user_post(user_id,post_txt,post_time,priority) values('$userid','$txt','$post_time','$priority');");
	// }
	
	// if(isset($_POST['file']))
	// {
	// 	$txt=$_POST['post_txt'];
	// 	$priority=$_POST['priority'];
	// 	$post_time=$_POST['pic_post_time'];
	// 	if($txt=="")
	// 	{
	// 		$txt="added a new photo.";
	// 	}
	// 	if($gender=="Male")
	// 	{
	// 		$path = "../../fb_users/Male/".$user."/Post/";
	// 	}
	// 	else
	// 	{
	// 		$path = "../../fb_users/Female/".$user."/Post/";
	// 	}
		
	// 	$img_name=$_FILES['file']['name'];
    // 	$img_tmp_name=$_FILES['file']['tmp_name'];
    // 	$prod_img_path=$img_name;
	// 	if($gender=="Male")
	// 	{
	// 		move_uploaded_file($img_tmp_name,"../../fb_users/Male/".$user."/Post/".$prod_img_path);
	// 	}
	// 	else
	// 	{
	// 		move_uploaded_file($img_tmp_name,"../../fb_users/Female/".$user."/Post/".$prod_img_path);
	// 	}
    // 	mysqli_query($konek,"insert into user_post(user_id,post_txt,post_pic,post_time,priority) values('$userid','$txt','$img_name','$post_time','$priority');");
	// }
	// if(isset($_POST['delete_post']))
	// {
	// 	$post_id=intval($_POST['post_id']);
	// 	mysqli_query($konek,"delete from user_post where post_id=$post_id;");
	// }
	// if(isset($_POST['Like']))
	// {
	// 	$post_id=intval($_POST['postid']);
	// 	$user_id=intval($_POST['userid']);
	// 	mysqli_query($konek,"insert into user_post_status(post_id,user_id,status) values($post_id,$user_id,'Like');");
	// }
	// if(isset($_POST['Unlike']))
	// {
	// 	$post_id=intval($_POST['postid']);
	// 	$user_id=intval($_POST['userid']);
	// 	mysqli_query($konek,"delete from user_post_status where post_id=$post_id and  	user_id=$user_id;");
	// }
	// if(isset($_POST['comment']))
	// {
	// 	$post_id=intval($_POST['postid']);
	// 	$user_id=intval($_POST['userid']);
	// 	$txt=$_POST['comment_txt'];
	// 	if($txt!="")
	// 	{
	// 	mysqli_query($konek,"insert into user_post_comment(post_id,user_id,comment) values($post_id,$user_id,'$txt');");
	// 	}
	// }
	// if(isset($_POST['delete_comment']))
	// {
	// 	$comm_id=intval($_POST['comm_id']);
	// 	mysqli_query($konek,"delete from user_post_comment where comment_id=$comm_id;");
	// }
?>

<html>
<head>
<title>Home</title>
	<link href="Home_css/Home.css" rel="stylesheet" type="text/css">
	<script src="Home_js/home.js" language="javascript"></script>
    <script>
		function time_get()
		{
			d = new Date();
			mon = d.getMonth()+1;
			time = d.getDate()+"-"+mon+"-"+d.getFullYear()+" "+d.getHours()+":"+d.getMinutes();
			posting_txt.txt_post_time.value=time;
		}
		function time_get1()
		{
			d = new Date();
			mon = d.getMonth()+1;
			time = d.getDate()+"-"+mon+"-"+d.getFullYear()+" "+d.getHours()+":"+d.getMinutes();
			posting_pic.pic_post_time.value=time;
		}
	</script>
</head>
<body id="body">
<?php
	$que_warning=mysqli_query($konek,"select * from user_warning where user_id=$userid");
	$warning_count=mysqli_num_rows($que_warning);
	if($warning_count>0)
	{
		$warning_data=mysqli_fetch_array($que_warning);
		$warning_txt=$warning_data[1];
?>

<div style="position:fixed; background:#3A3E41; opacity: 0.8; left:0%; top:0%; height:100%; width:100%; z-index:3"></div>
<div style="position:fixed; background:#FFF; left:17%; top:5%; height:90%; width:65.5%; z-index:3"></div>


<div style="position:fixed; left:35%; top:8%; z-index:3;"> <img src="img/Warning_icon.png" height="100" width="100"></div>
<div style="position:fixed; left:43%; top:8%; z-index:3; color:#971111; font-size:72px;">   warning  </div>

<div style="position:fixed; left:20%; top:32%; color:#971111; font-size:20px; z-index:3;">  <?php echo $warning_txt; ?> </div>

<form method="post">
    <input type="hidden" name="warning_id" value="<?php echo $userid; ?>" >
<div style="position:fixed; left:62%; top:83%; z-index:3;">  
    <input type="submit" name="delete_warning" value="I accept Warning" id="accept_button">
</div> 
</form>
 
	
<?php	
	}
?>

<?php
	$que_notice=mysqli_query($konek,"select * from users_notice where user_id=$userid");
	$notice_count=mysqli_num_rows($que_notice);
	if($notice_count>0)
	{
		$notice_data=mysqli_fetch_array($que_notice);
		$notice_id=$notice_data[0];
		$notice_txt=$notice_data[2];
		$notice_time=$notice_data[3];
?>

<div style="position:fixed; background:#3A3E41; opacity: 0.8; left:0%; top:0%; height:100%; width:100%; z-index:3"></div>
<div style="position:fixed; background:#FFF; left:17%; top:5%; height:90%; width:65.5%; z-index:3"></div>


<div style="position:fixed; left:39%; top:8%; z-index:3;"> <img src="img/Notice.png" height="100" width="100"></div>
<div style="position:fixed; left:47%; top:12%; z-index:3; color:#3B59A4; font-size:48px;">   Notice  </div>

<div style="position:fixed; left:20%; top:32%; font-size:20px; z-index:3;">  <?php echo $notice_txt; ?> 
</div>

<div style="position:fixed; left:62%; top:75%; font-size:20px; color:#999999; z-index:3;"> Notice Time: <?php echo $notice_time; ?> 
</div>

<form method="post">
    <input type="hidden" name="notice_id" value="<?php echo $notice_id; ?>" >
<div style="position:fixed; left:62%; top:83%; z-index:3;">  
    <input type="submit" name="delete_notice" value="I accept Notice" id="accept_button">
</div> 
</form>
 
	
<?php	
	}
?>

<!-- <div class="slcontainer">
	<div class="slider">
		<div class="slides">
			<input type="radio" name="radio-btn" id="radio1">
			<input type="radio" name="radio-btn" id="radio2">
			<input type="radio" name="radio-btn" id="radio3">
			<input type="radio" name="radio-btn" id="radio4">

			<div class="slide first">
				<img src="img/1.jpg" alt="">
			</div>
			<div class="slide">
				<img src="img/2.jpg" alt="">
			</div>
			<div class="slide">
				<img src="img/3.jpg" alt="">
			</div>
			<div class="slide">
				<img src="img/4.jpg" alt="">
			</div>

			<div class="navigation-auto">
				<div class="auto-btn1"></div>
				<div class="auto-btn2"></div>
				<div class="auto-btn3"></div>
				<div class="auto-btn4"></div>
			</div>
		</div>
		<div class="navigation-manual">
			<label for="radio1" class="manual-btn"></label>
			<label for="radio2" class="manual-btn"></label>
			<label for="radio3" class="manual-btn"></label>
			<label for="radio4" class="manual-btn"></label>
		</div>
	</div>
</div> -->

<!-- <script type="text/javascript">
	var counter=1;
	setInterval(function(){
		document.getElementById('radio' + counter).checked = true;
		counter++;
		if(counter > 4){
			counter = 1;
		}
	}, 5000);
</script> -->
	<div class="content">
		<div class="mid_content">
			<!-- <div class="mid_berita">
				<h1>
					<font>"UNTUK BERITA"</font>
				</h1>
			</div> -->

			<div class="mid_status">
				<div class="status1">
					<div class="status_image">
						<img src="../../fb_users/<?php echo $gender; ?>/<?php echo $user; ?>/Profile/<?php echo $img; ?>">
					</div>					
					<div class="status_text_container" onClick="upload_open1();">						
						<div class="status_text_input_container">
							<font class="status_text_input">What's on your mind?</font>
						</div>						
					</div>
				</div>
				<hr>
				<div class="update_photo_container">
					<div class="update_photo" onClick="upload_open2();">
						<img src="img/foto.png" alt="">
						<font face="myFbFont">Add Images</font>
					</div>
				</div>			
			</div>

			<div class="status2">
				<!--Status LogBox 1-->
				<div id="status_logbox"> 
					<div class="status_logbox_container">
						<div class="status_logbox_content">
							<div class="status_content1">
								<div class="content1_mid">
									<font face="myFbFont">Update Status</font>
								</div>
								<div class="content1_right" onClick="upload_close1();">
									<img src="img/close.png" alt="">
								</div>
							</div>
							<hr>
							<div class="status_content2">
								<form action="file_post_action.php" method="post" name="posting_txt" onSubmit="return blank_post_check();" id="post_txt">
									<div class="status_content2_1"> 
										<img src="../../fb_users/<?php echo $gender; ?>/<?php echo $user; ?>/Profile/<?php echo $img; ?>">
										<div class="status_content2_user">
											<font face="myFbFont"><?php echo $name; ?></font>
											<select style="background:transparent; height:25px;" name="priority"> 
												<option value="Public"> Public </option> 
												<option value="Private"> Only me </option> 
											</select>
										</div>
									</div>
									<div class="status_content2_2"> 
										<textarea name="post_txt" maxlength="500" placeholder="What's on your mind?"></textarea>
										<input type="hidden" name="txt_post_time">
									</div>
									<div class="status_content2_3">
										<div class="status_content2_submit">
											<button type="submit" value="Post" name="txt" id="post_button" onClick="time_get();">Kirim</button> 
										</div>
									</div>
								</form>
							</div>
						</div>
					</div>						
				</div>

				<!--Status LogBox 2-->
				<div id="status_logbox2"> 
					<div class="status_logbox_container">
						<div class="status_logbox_content">
							<div class="status_content1">
								<div class="content1_mid">
									<font face="myFbFont">Update Status</font>
								</div>
								<div class="content1_right" onClick="upload_close2();">
									<img src="img/close.png" alt="">
								</div>
							</div>
							<hr>
							<div class="status_content2">
								<form action="file_post_action.php" method="post" enctype="multipart/form-data" name="posting_pic" id="post_pic" onSubmit="return Img_check();">
									<div class="status_content2_1"> 
										<img src="../../fb_users/<?php echo $gender; ?>/<?php echo $user; ?>/Profile/<?php echo $img; ?>">
										<div class="status_content2_user">
											<font face="myFbFont"><?php echo $name; ?></font>
											<select style="background:transparent; height:25px;" name="priority"> 
												<option value="Public"> Public </option> 
												<option value="Private"> Only me </option> 
											</select>
										</div>
									</div>
									<div class="status_content2_2"> 
										<textarea name="post_txt" maxlength="9999" placeholder="What's on your mind?  (maks 500)"></textarea>
										<input type="hidden" name="pic_post_time">
									</div>
									<div class="status_content2_4">
										<div class="status_content2_add2">
											<label for="img" id="label_img">
												<img src="img/addimage.png" alt="">
											</label>
											<span id="file-name" class="file-box"></span>
											<input type="file" name="file" id="img" onchange='uploadFile(this)'> 
										</div>
										<div class="status_content2_submit2">
											<button type="submit" value="Post" name="file" id="post_button" onClick="time_get1()">Kirim</button> 
										</div>
									</div>
								</form>
							</div>
						</div>
					</div>						
				</div>
			</div>

			<div class="mid_isi">
				<?php
				$que_post=mysqli_query($konek,"select * from user_post where priority='Public' order by post_id desc");
				while($post_data=mysqli_fetch_array($que_post))
				{
					$postid=$post_data[0];
					$post_user_id=$post_data[1];
					$post_txt=$post_data[2];
					$post_img=$post_data[3];
					$que_user_info=mysqli_query($konek,"select * from users where user_id=$post_user_id");
					$que_user_pic=mysqli_query($konek,"select * from user_profile_pic where user_id=$post_user_id");
					$fetch_user_info=mysqli_fetch_array($que_user_info);
					$fetch_user_pic=mysqli_fetch_array($que_user_pic);
					$user_name=$fetch_user_info[1];
					$user_Email=$fetch_user_info[2];
					$user_gender=$fetch_user_info[4];
					$user_pic=$fetch_user_pic[2];
				?>	
					<div class="mid_isi_posting">
						<div class="isi_posting_top">
							<div class="isi_posting_img">
								<img src="../../fb_users/<?php echo $user_Email; ?>/Profile/<?php echo $user_pic; ?>" id="isi_posting_profile_img">
							</div>							
							<div class="isi_posting_nd">
								<a style="text-transform:capitalize; text-decoration:none; color:#003399;" id="uname<?php echo $postid; ?>"> <font face="myFbFont" id="font_face_uname"><?php echo $user_name; ?></font> </a>
								<span id="isi_posting_date"><?php echo $post_data[4];?></span>	
							</div>							
							
							<?php
							if($userid==$post_user_id) { 
							?>
							<div class="isi_posting_delete">
								<form action="file_post_action.php" method="post">  
									<input type="hidden" name="post_id" value="<?php echo $postid; ?>" >
									<button type="submit" name="delete_post" value=" " id="delete_img">
										<img src="img/delete_post.png" alt="">
									</button>
								</form>
							</div>								
							<?php
							}
							else { 
							?>
							<?php	
							}
							?>
						</div>
						
						<div class="isi_posting_text">
							<a>
							<?php
							$line1=$post_data[2];
							?>
							<?php echo $line1; ?>
							</a>
						</div>
						
						<?php 
						if($post_data[3]!="") {
						?>
							<div class="isi_posting_images">
								<img src="../../fb_users/<?php echo $user_Email; ?>/Post/<?php echo $post_img; ?>">
							</div>
						<?php
						}
						?>

						<?php
						$que_status=mysqli_query($konek,"select * from user_post_status where post_id=$postid and user_id=$userid;");
						$que_like=mysqli_query($konek,"select * from user_post_status where post_id=$postid");
						$count_like=mysqli_num_rows($que_like);
						$status_data=mysqli_fetch_array($que_status);
						?>

						<?php
						$que_comment=mysqli_query($konek,"select * from user_post_comment where post_id =$postid order by comment_id");
						$count_comment=mysqli_num_rows($que_comment);
						?>
						
						<div class="isi_posting_top_comment">
							<div class="top_comment_like">
								<?php 
								if($status_data[3]=="Like"){
								?>
									<img src="img/like2.PNG">
								<?php 
								}
								else{
								?>
									<img src="img/like.PNG">
								<?php 
								}
								?>
								<?php echo $count_like; ?>
							</div>
							<div class="top_comment_komentar">
								<input type="button" value="<?php echo $count_comment; ?> Komentar" style="background:#fefefe; border:none; font-size:15px; color:#565656;" onClick="Comment_focus(<?php echo $postid; ?>);" id="comment<?php echo $postid; ?>">
							</div>							
						</div>
							
						<hr id="hr1">
						
						<div class="isi_posting_bottom_comment">
							<div class="bottom_comment_like">
								<?php
								if($status_data[3]=="Like"){
								?>
									<form class="bottom_like_input_container" action="file_post_action.php" method="post">
										<input type="hidden" name="postid" value="<?php echo $postid; ?>">
										<input type="hidden" name="userid" value="<?php echo $userid; ?>">
										<input type="submit" value="Unlike" name="Unlike" class="bottom_like_input" id="unlike<?php echo $postid; ?>">
									</form>
								<?php
								}
								else{
								?>
									<form class="bottom_unlike_input_container" action="file_post_action.php" method="post">
										<input type="hidden" name="postid" value="<?php echo $postid; ?>">
										<input type="hidden" name="userid" value="<?php echo $userid; ?>">
										<input type="submit" value="Like" name="Like" class="bottom_unlike_input" id="like<?php echo $postid; ?>">
									</form>
								<?php
								}
								?>
							</div>
							<div class="bottom_comment_komentars" id="bottom_comment_komentar<?php echo $postid; ?>">
								<div class="bottom_komentar_input_container">
									<input type="button" value="Lihat Komentar" onClick="Comment_open(<?php echo $postid; ?>);" class="bottom_komentar_input" id="comment2<?php echo $postid; ?>">
								</div>								
							</div>
							<div class="bottom_comment_komentar2s" id="bottom_comment_komentar2<?php echo $postid; ?>" style="display:none">
								<div class="bottom_komentar_input_container2">
									<input type="button" value="Sembunyikan Komentar" onClick="Comment_close(<?php echo $postid; ?>);" class="bottom_komentar_input2" id="comment2<?php echo $postid; ?>">
								</div>								
							</div>							
						</div>	
						
						<div class="comment_container">
							<div id="komen<?php echo $postid; ?>" class="comment_container2" style="display:none;">
								<hr id="hr2">
								<div class="form_comment_container">
									<img src="../../fb_users/<?php echo $gender; ?>/<?php echo $user; ?>/Profile/<?php echo $img; ?>" id="comment_profile_img">
									<form action="file_post_action.php" method="post"  id="form_comment" name="commenting" onSubmit="return blank_comment_check()">
										<input type="text" name="comment_txt" placeholder="Write a comment..." maxlength="500" class="form_comment_input" id="<?php echo $postid;?>"> 
										<input type="hidden" name="postid" value="<?php echo $postid; ?>"> 
										<input type="hidden" name="userid" value="<?php echo $userid; ?>"> 
										<input type="submit" name="comment" style="display:none;"> 
									</form>
									
								</div>
								<?php
								while($comment_data=mysqli_fetch_array($que_comment)){
									$comment_id=$comment_data[0];
									$comment_user_id=$comment_data[2];
									$que_user_info1=mysqli_query($konek,"select * from users where user_id=$comment_user_id");
									$que_user_pic1=mysqli_query($konek,"select * from user_profile_pic where user_id=$comment_user_id");
									$fetch_user_info1=mysqli_fetch_array($que_user_info1);
									$fetch_user_pic1=mysqli_fetch_array($que_user_pic1);
									$user_name1=$fetch_user_info1[1];
									$user_Email1=$fetch_user_info1[2];
									$user_gender1=$fetch_user_info1[4];
									$user_pic1=$fetch_user_pic1[2];
								?>
								<div class="commented_container">
									<div class="commented_img">
										<img src="../../fb_users/<?php echo $user_Email1; ?>/Profile/<?php echo $user_pic1; ?>" height="40" width="47">
									</div>
									
									<div class="commented_comment">
										<div class="commented_comment_top">
											<div class="commented_comment_text">
												<font face="myFbFont" class="commented_comment_font" id="cuname<?php echo $comment_id; ?>"> <?php echo $user_name1; ?></font>
											</div>
											
											<div class="commented_comment_delete">
												<?php
												if($userid==$post_user_id){ 
												?>
													<form action="file_post_action.php" method="post">  
														<input type="hidden" name="comm_id" value="<?php echo $comment_id; ?>" >
														<button type="submit" name="delete_comment" id="btn_delete_comment1" value=" ">
															<img src="img/delete_comment.gif" alt="">
														</button>
													</form>
												<?php
												}
												else if($userid==$comment_user_id){ 
												?>
													<form action="file_post_action.php" method="post">  
														<input type="hidden" name="comm_id" value="<?php echo $comment_id; ?>" >
														<button type="submit" name="delete_comment" id="btn_delete_comment2" value="  ">
															<img src="img/delete_comment.gif" alt="">
														</button>
													</form>
												<?php
												}
												else{
												?>
													
												<?php
												}
												?>
											</div>
										</div>
										
										<div class="commented_comment_bottom">
											<?php
											$cline1=$comment_data[3];
											?>
											<?php echo $cline1; ?>
										</div>
									</div>
								</div>	
								<?php
								}
								?>	
							</div>
						</div>
					</div>
				<?php 
				} 
				?>
			</div>
		</div>
	</div>

<!--Status-->
<!-- <div style="max-width:100%; margin-top:30px; margin-left:20%;">
	<div style="width:100%; height:100%;">
		<div style=" background:#FFFFFF; height:22%; width:41.4%; z-index:-5; box-shadow:0px 2px 5px 1px rgb(0,0,0); display:flex; flex-direction:column;">
			<div style="display:flex; flex-direction:row; align-items:center; margin-left:2px; margin-top:2px;">
				<div>
					<img src="img/Status.PNG">
					<input type="button" onClick="upload_close();"  value="Update Status" style="background:#FFFFFF; border:#FFFFFF;">
				</div>
				<div>
					<img src="img/photo&video.PNG">
					<input type="button"  value="Add Photos" onClick="upload_open();" name="file" style="background:#FFFFFF; border:#FFFFFF;">
				</div>
			</div>
			<div>
				<form method="post" name="posting_txt" onSubmit="return blank_post_check();" id="post_txt">
					<div style="">
						<textarea style="margin-left:5px; margin:right:5px; height:100; width:98%;" name="post_txt" maxlength="511" placeholder="What's on your mind?"></textarea>
						<input type="hidden" name="txt_post_time">
					</div>
					<div style="display:flex; flex-direction:row; align-items:center; padding-right:5px; padding-top:5px; margin-top:auto; background:#f2f2f2">
						<div style="margin-left:auto;">
							<select style="background:transparent; height:25px;" name="priority"> 
								<option value="Public"> Public </option> 
								<option value="Private"> Only me </option> 
							</select> 
						</div>
						<div style="margin-left:10px"> 
							<input type="submit" value="Post" name="txt" id="post_button" onClick="time_get()" style="height:25px;">
						</div>
					</div>	
				</form>
				<form method="post" enctype="multipart/form-data" name="posting_pic" style="display:none;" id="post_pic" onSubmit="return Img_check();">
					<div style="">
						<textarea style="margin-left:5px; margin:right:5px; height:100; width:98%;" name="post_txt" maxlength="511" placeholder="What's on your mind?"></textarea>
						<input type="hidden" name="pic_post_time">
					</div>
					<div style="display:flex; flex-direction:row; align-items:center; padding-right:5px; padding-top:5px; margin-top:auto; background:#f2f2f2">
						<div style="margin-left:5px;"> 
							<input type="file" name="file" id="img"> 
						</div>
						<div style="margin-left:auto;">
							<select style="background: transparent; height:25px;" name="priority"> 
								<option value="Public"> Public </option> 
								<option value="Private"> Only me </option> 
							</select> 
						</div>
						<div style="margin-left:10px"> 
							<input type="submit" value="Post" name="file" id="post_button" onClick="time_get1()" style="height:25px;"> 
						</div>
					</div>
				</form>
			</div>
		</div>	
	</div>
</div> -->
	
	<?php
		include("Home_error/Home_error.php");
	?>
</body>
</html>
<?php
	}
	else
	{
		header("location:../../index.php");
	}
?>