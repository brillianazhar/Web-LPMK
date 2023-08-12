<?php

include 'config.php';

error_reporting(0);

session_start();

if (isset($_SESSION['fbuser'])) {
    header("Location: index.php");
}

if (isset($_POST['submit'])) {
	  $name = $_POST['name'];
	  $kelurahan = $_POST['kelurahan'];
    $nomorhp = $_POST['nomorhp'];

		$sql = "SELECT * FROM users WHERE nomorhp='$nomorhp'";
		$result = mysqli_query($conn, $sql);
		if (!$result->num_rows > 0) {
			$sql = "INSERT INTO users (name, kelurahan, nomorhp) VALUES ('$name', '$kelurahan','$nomorhp')";
			$result = mysqli_query($conn, $sql);
      $path = "fb_users/".$nomorhp."/Profile/";
      $path2 = "fb_users/".$nomorhp."/Post/";
      $path3 = "fb_users/".$nomorhp."/Cover/";
      
      mkdir($path, 0, true);
      mkdir($path2, 0, true);
      mkdir($path3, 0, true);

      $pic_from = "fb_users/default/default_img.png";
      $pic_to = "fb_users/".$nomorhp."/Profile/default_img.png";
      copy($pic_from, $pic_to);

			if ($result) {
        $queryid=mysqli_query($conn,"select * from users where nomorhp=$nomorhp");
        $rec2=mysqli_fetch_object($queryid);

        $userid=$rec2->user_id;

        mysqli_query($conn,"insert into user_post(user_id,post_txt,post_time,priority) values($userid,'Join Faceback','1','1');");
				echo "<script>alert('Wow! User Registration Completed.')</script>";
				$name = "";
				$kelurahan = "";
        $nomorhp = "";
        header("Location:index.php"); 

			} else {
				echo "<script>alert('Woops! Something Wrong Went.')</script>";
			}
		} else {
			echo "<script>alert('Woops! nomorhp sudah ada.')</script>";
		}

}

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <div class="container">
	<script type="text/javascript">
      document.getElementById("image").onchange = function(){
          document.getElementById("form").submit();
      };
    </script>
    <?php
    if(isset($_FILES["image"]["name"])){
      $id = $_POST["id"];
      $name = $_POST["name"];

      $imageName = $_FILES["image"]["name"];
      $imageSize = $_FILES["image"]["size"];
      $tmpName = $_FILES["image"]["tmp_name"];
      
      // Image validation
      $validImageExtension = ['jpg', 'jpeg', 'png'];
      $imageExtension = explode('.', $imageName);
      $imageExtension = strtolower(end($imageExtension));
      if (!in_array($imageExtension, $validImageExtension)){
        echo
        "
        <script>
          alert('Invalid Image Extension');
          document.location.href = '../login';
        </script>
        ";
      }
      elseif ($imageSize > 1200000){
        echo
        "
        <script>
          alert('Image Size Is Too Large');
          document.location.href = '../login';
        </script>
        ";
      }
      else{
        $newImageName = $name . " - " . date("Y.m.d") . " - " . date("h.i.sa"); // Generate new image name
        $newImageName .= '.' . $imageExtension;
        $query = "UPDATE tb_user SET image = '$newImageName' WHERE id = $id";
        mysqli_query($conn, $query);
        move_uploaded_file($tmpName, 'img/' . $newImageName);
        echo
        "
        <script>
        document.location.href = '../login';
        </script>
        ";
      }
    }
    ?>
        <form action="" method="POST" class="login-email">
            <div class="logo">
                <img src=img/logoLPMK.png width="131px" height="131px" >
                <p id="lpmk_text">LPMK</p>
            </div>
            <p class="login-text" style="font-size: 2rem; font-weight: 800;">Register</p>
        	<div class="round">
          		<input type="hidden" name="id" value="<?php echo $id; ?>">
          		<input type="hidden" name="name" value="<?php echo $name; ?>">
          		<i class = "fa fa-camera" style = "color: #fff;"></i>
			    </div>
			<div class="input-group">
				<input type="text" placeholder="username" name="name" value="<?php echo $name; ?>" required>
			</div>
            <div class="input-group">
                <input type="text" placeholder="Masukan Alamat Kelurahan anda" name="kelurahan" value="<?php echo $kelurahan;?>" required>
            </div>
			<div class="input-group">
				<input type="text" placeholder="NomorHp" name="nomorhp" value="<?php echo $nomorhp; ?>" required>
			</div>
			<div class="input-group">
				<button name="submit" class="btn">Register</button>
			</div>
			<p class="login-register-text">Have an account? <a href="index.php">Login Here</a>.</p>

        </form>           
 
    </div>
</div>
</body>
</html>