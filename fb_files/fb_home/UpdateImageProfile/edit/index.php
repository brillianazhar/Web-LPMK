<?php
require 'connection.php';

session_start();
$user=$_SESSION['fbuser'];
$query1=mysqli_query($conn,"select * from users where nomorhp='$user'");
$rec1=mysqli_fetch_object($query1);
$userid=$rec1->user_id;

$query2=mysqli_query($conn,"select * from user_profile_pic where user_id=$userid");
$rec2=mysqli_fetch_object($query2);

$img=$rec2->image;

?>
<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>Update Profile</title>
    <link rel="stylesheet" href="styles.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

  </head>
  <body>
    <div class="main-container">
      <form class="form" id = "form" action="" enctype="multipart/form-data" method="post">
        <div class="upload">
        <?php
        $id = $userid; 
        $name = isset($_POST["name"]) ? $_POST["name"] : '' ;
        $kelurahan = isset($_POST["kelurahan"]) ? $_POST["kelurahan"] : '' ;
        $image2 = $img;
        ?>
        <img src="../../../../fb_users/<?php echo $user; ?>/Profile/<?php echo $img; ?>" width = 125 height = 125>
        <div class="round">
          <input type="hidden" name="id" value="<?php echo $id; ?>">
          <input type="hidden" name="name" value="<?php echo $name; ?>">
          <input type="file" name="image" id = "image" accept=".jpg, .jpeg, .png">
          <i class = "fa fa-camera" style = "color: #fff;"></i>
        </div>
      </div>
    </form>
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
          document.location.href = '../edit/index.php';
        </script>
        ";
      }
      elseif ($imageSize > 1200000){
        echo
        "
        <script>
          alert('Image Size Is Too Large');
          document.location.href = '../edit/index.php';
        </script>
        ";
      }
      else{
        $newImageName = $name . " - " . date("Y.m.d") . " - " . date("h.i.sa"); // Generate new image name
        $newImageName .= '.' . $imageExtension;
        $query = "UPDATE user_profile_pic SET image = '$newImageName' WHERE user_id = $userid";
        mysqli_query($conn, $query);
        move_uploaded_file($tmpName, "../../../../fb_users/".$user."/Profile/" . $newImageName);
        echo
        "
        <script>
        document.location.href = '../edit/index.php';
        </script>
        ";
      }
    }
    ?>
    <div class="form-container">

<form action="" method="post" enctype="multipart/form-data">
<center>
    <h3>UPDATE PROFILE</h3>
    <?php
    if(isset($message)){
        foreach($message as $message){
          echo '<div class="message">'.$message.'</div>';
        }
    }
    ?>
    <?php
      

      if(isset($_POST['update'])){
        $qupdate = ("update users set name='$name', kelurahan='$kelurahan' where nomorhp = '$user'");
        $update = mysqli_query($conn, $qupdate);
        if ($update){
            echo "<script> alert ('Data Berhasil Di Update')</script>";
        }else {
            echo "<script> alert ('Data Tidak Berhasil Di Update')</script>";
        }
        header("Location: ../../Home.php"); 
      }                 
    ?>
    <form action="" method="post" enctype="multipart/form-data">
    <center><input type="text" name="name" placeholder="Masukkan Nama" class="box" value="<?php echo $name;?>" required></center>
    <center><input type="text" name="kelurahan" placeholder="Masukkan Alamat" class="box" value="<?php echo $kelurahan;?>" required></center>    
    <center><button type="submit" name="update" value="update" class="btn">Update</button></center>
    <center><a href="../index.php" class="delete-btn">Kembali</a></center>
    </form>

   
 </center>
 </form>

</div>

  </body>
</html>