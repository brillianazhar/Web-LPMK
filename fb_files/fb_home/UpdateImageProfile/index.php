<?php
require 'connection.php';

session_start();
$user=$_SESSION['fbuser'];
$query1=mysqli_query($conn,"select * from users where nomorhp='$user'");
$rec1=mysqli_fetch_object($query1);
$userid=$rec1->user_id;

$query2=mysqli_query($conn,"select * from user_profile_pic where user_id=$userid");
$rec2=mysqli_fetch_object($query2);

$nama=$rec1->name;
$kelurahan=$rec1->kelurahan;
$img=$rec2->image;

// $sessionId = $_SESSION["fbuser"];
// $user = mysqli_fetch_assoc(mysqli_query($conn, "SELECT * FROM user WHERE nomorhp = $sessionId"));
?>
<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>Profile</title>
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
          $image2 = $img;
        ?>
        <img src="../../../fb_users/<?php echo $user; ?>/Profile/<?php echo $img; ?>" width = 125 height = 125 title="<?php echo $img; ?>">
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
          document.location.href = '../updateimageprofile';
        </script>
        ";
      }
      elseif ($imageSize > 1200000){
        echo
        "
        <script>
          alert('Image Size Is Too Large');
          document.location.href = '../updateimageprofile';
        </script>
        ";
      }
      else{
        $newImageName = $name . " - " . date("Y.m.d") . " - " . date("h.i.sa"); // Generate new image name
        $newImageName .= '.' . $imageExtension;
        $query = "UPDATE user_profile_pic SET image = '$newImageName' WHERE user_id = $userid";
        mysqli_query($conn, $query);
        move_uploaded_file($tmpName, "../../../fb_users/".$user."/Profile/" . $newImageName);
        echo
        "
        <script>
        document.location.href = '../UpdateImageProfile/index.php';
        </script>
        ";
      }
    }
    ?>
    <div class="form-container">

<form action="" method="post" enctype="multipart/form-data">

   <h3>PROFILE</h3>
   <?php
   if(isset($message)){
      foreach($message as $message){
         echo '<div class="message">'.$message.'</div>';
      }
   }
   ?>
   <a>Nama</a>
   <center><input readonly name="name" class="box" value="<?php echo $nama;?>"></center>
   <a>Kelurahan</a>
   <center><input readonly name="kelurahan" class="box" value="<?php echo $kelurahan;?>"></center>

  <center><a href="edit/index.php" class="btn">Edit Profile</a></center>
  <center><a href="../Home.php" class="btn">Kembali</a></center>
  <center><a href="logout.php" class="delete-btn">Log out</a></center>

</form>
</div>

  </body>
</html>