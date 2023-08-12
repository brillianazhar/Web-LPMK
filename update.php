<?php
include 'config.php';
$_SESSION["id"] = 7; // User's session
$sessionId = $_SESSION["id"];
$user = mysqli_fetch_assoc(mysqli_query($conn, "SELECT * FROM tb_user WHERE id = $sessionId"));
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
        $id = $user["id"];
        $name = $_POST["name"];
        $nomorhp = $_POST["nomorhp"];
        $kelurahan = $_POST["kelurahan"];
        $image = $user["image"];

        $update = mysqli_query($conn, "update tb_user set name='$name', image='$image', nomorhp='$nomorhp', kelurahan='$kelurahan' where id = '$id'");

        if ($update){
          echo "<script> alert ('Data Berhasil Di Update')</script>";
        }else {
          echo "<script> alert ('Data Tidak Berhasil Di Update')</script>";
        }
        ?>
        <img src="img/<?php echo $image; ?>" width = 125 height = 125 title="<?php echo $image; ?>">
        <div class="round">
          <input type="hidden" name="id" value="<?php echo $id; ?>">
          <input type="hidden" name="name" value="<?php echo $name; ?>">
          <input type="file" name="image" id = "image" accept=".jpg, .jpeg, .png">
          <i class = "fa fa-camera" style = "color: #fff;"></i>
        </div>
      </div>
    
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
    <div class="form-container">


  <center>
     <h3>UPDATE PROFILE</h3>
    <?php
    if(isset($message)){
        foreach($message as $message){
           echo '<div class="message">'.$message.'</div>';
        }
    }
   ?>
    <center><input type="text" name="name" placeholder="Masukkan Nama" class="box" value="<?php echo $name;?>" required></center>
    <center><input type="text" name="nomorhp" placeholder="Masukkan No HP" class="box"  value="<?php echo $nomorhp;?>"required></center>
    <center><input type="text" name="kelurahan" placeholder="Masukkan Alamat" class="box" value="<?php echo $kelurahan;?>" required></center>
    <center><input type="submit" name="submit" value="Update" class="btn"></center>
  </center>
</form>
<a href="welcome.php" >Kembali</a>
</div>

  </body>
</html>