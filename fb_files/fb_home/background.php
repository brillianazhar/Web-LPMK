<html>
<head>
	<script src="background_file/background_js/event.js"></script>
	<script src="background_file/background_js/searching.js"></script>
	<script src="background_file/background_js/searched_reco_event.js"></script>
	<script src="background_file/background_js/submited_searched_reco_event.js"></script>
    <link href="../fb_font/font.css" rel="stylesheet" type="text/css">
	<link href="Background_css/Background.css" rel="stylesheet" type="text/css">
    <LINK REL="SHORTCUT ICON" HREF="../fb_title_icon/Faceback.ico" />
</head>
<body>

<script src="background_file/background_js/options.js"></script>

<script>
	function bcheck()
	{
		s=document.fb_search.search1.value;
		
		if(s=="")
		{
			return false;
		}
		return true;
	}
</script>

<?php
error_reporting(1);
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
		$gender=$rec1->Gender;
		$img=$rec2->image;
?>

<div class="main_container">
	<div class="left_part">
		<div class="left_top">
			<div class="logo">
				<img src="img/logoLPMK.png" alt="">
			</div>
			<div class="nama">
				<a id="nama1" href="Home.php">
					<font face="myFbFont">LPMK</font>
				</a>
			</div>
		</div>
		<hr>
		
		<div class="left_mid">
			<div class="container_mid">
				<div class="forum" id="main_forum">
					<img id="forum1" src="img/forum1.png" alt="" onMouseOver="left_news_feed_over()" onMouseOut="left_news_feed_out()">
					<img id="forum2" src="img/forum2.png" alt="" onMouseOver="left_news_feed_over()" onMouseOut="left_news_feed_out()">
					<a id="forum3" href="Home.php" onMouseOver="left_news_feed_over()" onMouseOut="left_news_feed_out()">
						<font face="myFbFont">Forum</font>
					</a>
				</div>

				<div class="procomp" id="main_procomp">
					<img id="procomp1" src="img/compro1.png" alt="" onMouseOver="left_timeline_over()" onMouseOut="left_timeline_out()">
					<img id="procomp2" src="img/compro2.png" alt="" onMouseOver="left_timeline_over()" onMouseOut="left_timeline_out()">
					<a id="procomp3" href="Profile.php" onMouseOver="left_timeline_over()" onMouseOut="left_timeline_out()">
						<font face="myFbFont">Profile Kelurahan</font>
					</a>
				</div>
			</div>	
		</div>

		<div class="left_bottom">
			<div class="bottom_container">
				<div class="profile_image">
					<img src="../../fb_users/<?php echo $user; ?>/Profile/<?php echo $img; ?>"> 
				</div>
				<div class="profile_name">
					<a id="left_name">   
						<font face="myFbFont"><?php echo $name; ?></font>
					</a>
				</div>
				<div class="setting">
					<img id="setting_image" src="img/setting.png" alt="">
					<a href="UpdateImageProfile/index.php">Settings</a>
				</div>
			</div>			
		</div>
	</div>
</div>

<!--Head background-->
<!-- <div class="container" style="position:fixed; left:0px; top:0px; width:100%; height:10%; min-height:100px; z-index:1; background:#b2372a;">
	<div style="display:flex; align-items:center">
		<img src="img/logoLPMK.png" alt="" width="70" height="70" style="margin:10px;">
		<div style="display:flex; flex-direction:column">
			<a href="Home.php" style="font-size:30; font-weight:900; color:#FFFFFF; text-decoration:none;" onMouseOver="on_head_fb_text()" onMouseOut="out_head_fb_text()"> 
				<font face="myFbFont">LPMK</font>
			</a>
			<a href="Home.php" style="font-size:15; font-weight:1; color:#FFFFFF; text-decoration:none;" onMouseOver="on_head_fb_text()" onMouseOut="out_head_fb_text()"> 
				<font face="myFbFont">Lembaga Pemberdayaan Masyarakat Kelurahan</font>
			</a>
		</div>
		<div style="margin-left:auto; margin-right:10px" id="option_p"> 
			<img src="background_file/background_icons/nexusae0_home_settings_icon2.png" height="35" width="35" onClick="open_option()"> 
		</div>
		<div style="display:none; margin-left:auto; margin-right:10px;" id="option">
			<div> 
				<img src="background_file/background_icons/nexusae0_home_settings_icon2.png" height="35" width="35" onClick="close_option()"> 
			</div>
			<div style="position:fixed; left:85%; top:8%; z-index:3; background:#FFF; height:32%; width:14.8%; box-shadow:0px 2px 10px 1px rgb(0,0,0);"></div>
			<div style="position:fixed; left:86%; top:10.5%; z-index:3;">
				<a href="../fb_profile/Profile.php"> 
					<img src="img/timeline.png" width="16" height="16" onMouseOver="head_timeline_over()" onMouseOut="head_timeline_out()">
				</a>
			</div>
			<div style="position:fixed; left:88%; top:7%; z-index:3;">
					<a href="../fb_profile/Profile.php" style="text-decoration:none; color:#000;" id="head_timeline" onMouseOver="head_timeline_over()" onMouseOut="head_timeline_out()" ><h4>Timeline</h4></a> 
			</div>
			<div style="position:fixed; left:86%; top:15.5%; z-index:3;">
				<a href="../fb_profile/about.php"> 
					<img src="img/about.png" onMouseOver="head_about_over()" onMouseOut="head_about_out()"> 
				</a>
			</div> 
			<div style="position:fixed; left:88%; top:12%; z-index:3;">
				<a href="../fb_profile/about.php" style="text-decoration:none; color:#000;" id="head_about" onMouseOver="head_about_over()" onMouseOut="head_about_out()"><h4>About</h4></a> 
			</div>
			<div style="position:fixed; left:85.8%; top:20%; z-index:3;"> 
				<a href="../fb_profile/photos.php"> 
					<img src="img/photo&video.PNG" onMouseOver="head_photos_over()" onMouseOut="head_photos_out()"> 
				</a> 
			</div>
			<div style="position:fixed; left:88.2%; top:17%; z-index:3;">
				<a href="../fb_profile/photos.php" style="text-decoration:none; color:#000;" id="head_photos" onMouseOver="head_photos_over()" onMouseOut="head_photos_out()">
					<h4>Photos</h4>
				</a>
			</div>

			<div style="position:fixed; left:85.8%; top:25%; z-index:3;"> 
				<a href="Settings.php"> 
					<img src="img/settings2.png" height="25" width="23" onMouseOver="head_settings_over()" onMouseOut="head_settings_out()"> 
				</a> 
			</div>
			<div style="position:fixed; left:88.2%; top:22%; z-index:3;">
				<a href="Settings.php" style="text-decoration:none; color:#000;" id="head_settings" onMouseOver="head_settings_over()" onMouseOut="head_settings_out()">
					<h4> Account Settings </h4>
				</a>
			</div>

			<div style="position:fixed; left:86.1%; top:29.5%; z-index:3;"> 
				<a href="feedback.php"> 
					<img src="background_file/background_icons/icon-feedback.png" height="20" width="20" onMouseOver="head_feedback_over()" onMouseOut="head_feedback_out()"> 
				</a> 
			</div>
			<div style="position:fixed; left:88.3%; top:26.5%; z-index:3;">
				<a href="feedback.php" style="text-decoration:none; color:#000;" id="head_feedback" onMouseOver="head_feedback_over()" onMouseOut="head_feedback_out()">
					<h4> Feedback </h4>
				</a>
			</div>

			<div style="position:fixed; left:86%; top:34.5%; z-index:3;"> 
				<a href="../fb_logout/logout.php"> 
					<img src="background_file/background_icons/logout.png" height="20" width="20"  onMouseOver="head_logout_over()" onMouseOut="head_logout_out()"> 
				</a> 
			</div>
			<div style="position:fixed; left:88.3%; top:31.1%; z-index:3;">
				<a href="../fb_logout/logout.php" style="text-decoration:none; color:#000;" id="head_logout" onMouseOver="head_logout_over()" onMouseOut="head_logout_out()">
					<h4> Logout </h4>
				</a>
			</div>
		</div>
	</div>
</div> -->

<!-- <div style=" position:fixed; width:100%; height:100px; left:0; top:0; z-index:1; background:#3B5998">
	
	<div style="font-size:30; font-weight:900;"> 
		<img src="img/logoLPMK.png" width="70" height="70" style="margin-left:15px; margin-top:15px; margin-bottom:15px;">
		<a href="Home.php" style="color:#FFFFFF; text-decoration:none;" onMouseOver="on_head_fb_text()" onMouseOut="out_head_fb_text()"> 
			<font face="myFbFont"> LPMK </font>
		</a>	
	</div>
</div> -->
<!--Head fb text-->





<!-- <form name="fb_search" action="Search_Display_submit.php" method="get" onSubmit="return bcheck()">
	<div style="position:fixed; left:19%; top:1.2%; z-index:1;"> <input type="text" name="search1" style="height:25; width:500;"  onKeyUp="searching();" id="search_text1" placeholder="Search for people" > </div>
	
	<div id="searching_ID"></div> 

	<div style="position:fixed; left:54.2%;top:1.6%; z-index:1;">
	<input type="submit" value=" " style="background-image:url(background_file/background_icons/search.png);">
	</div>
</form> -->



	
<!-- <div style="position:fixed; left:71.8%; top:0.6%; z-index:1;">
	<table cellspacing="0">
	<tr id="hedarname2">
	
		<td style="padding-left:7;" id="head_img" onMouseOver="head_pro_pic_over()" onMouseOut="head_pro_pic_out()"> <a href="../fb_profile/Profile.php">  <img src="../../fb_users/<?php echo $gender; ?>/<?php echo $user; ?>/Profile/<?php echo $img; ?>" style="height:27; width:25;"> </a> </td>
		
		<td id="head_name_bg" onMouseOver="head_pro_pic_over()" onMouseOut="head_pro_pic_out()"> <a href="../fb_profile/Profile.php" id="head_name_font" style="color:#DEDEEF; font-size:12; font-weight:900;font-family:lucida Bright; text-transform:capitalize; text-decoration:none;"> &nbsp;  <?php echo $name; ?> &nbsp;</a> </td>
		<td style="color:#DEDEEF;"> | </td>
		<td id="head_home_bg" onMouseOver="head_home_over()" onMouseOut="head_home_out()"> <a href="Home.php" id="head_home_font" style="color:#DEDEEF; font-size:12; font-weight:900;font-family:lucida Bright; text-decoration:none;"> &nbsp; Home &nbsp; </a> </td>
        <td style="color:#DEDEEF;">|</td>
	</tr>
	</table>
</div> -->

<!--fb option-->


        

           
        

<!--left part-->
<!-- <div class="leftbar" style="width:15%; height:100%; position:fixed; top:0px; left:0px; background:#A6BCCF; display:flex; flex-direction:column; max-height:100%;">
	<div style="margin-top:auto">
		<div style="display:flex; align-items:center; margin-top:100px;" id="news_feed">
			<a href="Home.php" id="forum1"> 
				<img src="img/forum.PNG" onMouseOver="left_news_feed_over()" onMouseOut="left_news_feed_out()"> 
			</a>
			<a href="Home.php" style="display:none;" id="forum2"> 
				<img src="img/forum2.PNG" onMouseOver="left_news_feed_over()" onMouseOut="left_news_feed_out()"> 
			</a>
			<a href="Home.php" style="font-size:15px; text-decoration:none; color:#f8f8f8;" onMouseOver="left_news_feed_over()" onMouseOut="left_news_feed_out()" id="forum3"> 
				<font face="myFbFont"><p>Forum</p></font>
			</a>
		</div>

		<div style="display:flex; align-items:center; margin-top:20px" id="timeline">
			<a href="../fb_profile/Profile.php" id="compro1"> 
				<img src="img/compro.png" onMouseOver="left_timeline_over()" onMouseOut="left_timeline_out()"> 
			</a>
			<a href="../fb_profile/Profile.php" style="display:none;" id="compro2"> 
				<img src="img/compro2.png" onMouseOver="left_timeline_over()" onMouseOut="left_timeline_out()"> 
			</a>  
			<a href="../fb_profile/Profile.php" style="font-size:15px; text-decoration:none; color:#f8f8f8; margin-top:10px;" onMouseOver="left_timeline_over()" onMouseOut="left_timeline_out()" id="compro3">
				<font face="myFbFont"><p>Profile Kelurahan</p></font>
			</a>
		</div>
	</div>
	

	<div style="margin-top:auto; padding:10%;">
		<div> 
			<a href="../fb_profile/Profile.php"> 
				<img src="../../fb_users/<?php echo $gender; ?>/<?php echo $user; ?>/Profile/<?php echo $img; ?>" style="border:5px solid #f8f8f8; margin:auto; margin-bottom:10px; display:block; border-radius:50%; height:70; width:70;"> 
			</a> 
		</div>	
		<div style="text-align:center;">
			<a href="../fb_profile/Profile.php" style="color:#f8f8f8; font-size:12; font-weight:900;font-family:lucida Bright; text-transform:capitalize;" id="left_name">   
				<font face="myFbFont" style="font-size:18px; font-weight:1;"><?php echo $name; ?></font>
			</a>
		</div>
		<div style="text-align:center; margin-top:5px;">
			<a href="../fb_profile/Profile.php" style="color:#f8f8f8; font-size:12; font-weight:900;font-family:lucida Bright; text-transform:capitalize; text-decoration:none;">
				Profile
			</a>
		</div>
	</div>
</div> -->

<!--left hr-->
<!-- <hr style="position:fixed;left:18%;top:4.8%;height:100%;width:0; border-color:#CCCCCC; box-shadow:-5px 0px 5px 0px rgb(0,0,0);"> -->
<!--right hr-->
<!-- <hr style="position:fixed;left:82%;top:4.8%;height:100%;width:0; border-color:#CCCCCC; box-shadow:5px 0px 5px 0px rgb(0,0,0);"> -->


<!--Online-->
<script>
		function up_online()
		{
		 	document.getElementById("online_bg").style.display='block';
			document.getElementById("down_onlne").style.display='block';
			document.getElementById("down_onlne_img").style.display='block';
			document.getElementById("up_online").style.display='none';
			document.getElementById("up_online_img").style.display='none';
		}
		function down_online()
		{
		 	document.getElementById("online_bg").style.display='none';
			document.getElementById("down_onlne").style.display='none';
			document.getElementById("down_onlne_img").style.display='none';
			document.getElementById("up_online").style.display='block';
			document.getElementById("up_online_img").style.display='block';
		}
</script>
<!-- <div style="display:none;" id="online_bg">
<div style="position:fixed; left:84%; top:6%; background-color:#000000; opacity:0.5; height:89.2%; width:16%;"></div> -->

<?php
	 $query_online=mysqli_query($konek,"select * from user_status where status='Online'");
	 $online_count=mysqli_num_rows($query_online);
	 $online_count=$online_count-1;
	 
	 if($online_count==0)
	 {
?>
		<!-- <div style="position:fixed; left:89%; top:8%; color:#FFF;"> Not found </div> -->
<?php
     }
?>
	<!-- <div style="position:fixed; left:84.5%; top:6%;">
	<table> -->
<?php			
	 
	 
	 while($online_data=mysqli_fetch_object($query_online))
	 {
	  	$online_user_id=$online_data->user_id;
		$query_online_user_data=mysqli_query($konek,"select * from users where user_id=$online_user_id");
		$query_online_user_pic=mysqli_query($konek,"select * from user_profile_pic where user_id=$online_user_id");
		
		$fetch_online_user_info=mysqli_fetch_object($query_online_user_data);
		$fetch_online_user_pic=mysqli_fetch_object($query_online_user_pic);
		
		$online_user_name=$fetch_online_user_info->Name;
		$online_user_Email=$fetch_online_user_info->Email;
		$online_user_gender=$fetch_online_user_info->Gender;
		$online_user_pic= $fetch_online_user_pic->image;	

  	
	 if($user!=$online_user_Email)
     {
?>
			 <!-- <tr>
			   	   <td> <a href="../fb_view_profile/view_profile.php?id=<?php echo $online_user_id; ?>"> <img src="../../fb_users/<?php echo $online_user_gender; ?>/<?php echo $online_user_Email; ?>/Profile/<?php echo $online_user_pic; ?>" height="30" width="30"> </a> </td>
				   <td style="color:#ffffff;"> <a href="../fb_view_profile/view_profile.php?id=<?php echo $online_user_id; ?>" style="text-transform:capitalize; text-decoration:none; color:#ffffff;"> <?php echo $online_user_name; ?> </a> &nbsp; </td>	
				   <td><img src="background_file/background_icons/online_symbol.png"  /></td>   
			 </tr> -->
 <?php	            
	  }
	}
?>
</table>
</div>
</div>



<!-- <div style="position:fixed; left:84%; top:95.2%;" id="up_online"> <input type="button" style=" height:30; width:216; border:groove;" value="Online(<?php echo $online_count; ?>)" onClick="up_online()"/>  </div>
<div style="position:fixed; left:84%; top:95.2%; display:none;" id="down_onlne"> <input type="button" style=" height:30; width:216; border: groove;" value="Online(<?php echo $online_count; ?>)" onClick="down_online()" />  </div>
<div style="position:fixed; left:88%; top:95.7%;" id="up_online_img"> <img src="background_file/background_icons/online.png" onClick="up_online()" /></div>
<div style="position:fixed; left:88%; top:95.7%; display:none;"id="down_onlne_img"> <img src="background_file/background_icons/online.png" onClick="down_online()" /></div> -->

</body>
</html>
