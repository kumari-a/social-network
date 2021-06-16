<!DOCTYPE html>
<?php
session_start();
include("includes/header.php");
if (!isset($_SESSION['user_email'])) {
	header("location:index.php");
}
elseif ($role!='admin') {
 header("location:home.php");
}
?>
<html>
<head>
	<title>Upload images</title>
	<meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/js/bootstrap.min.js"></script>
</head>
<body style="font-family:Tahoma, Geneva, sans-serif ;background-color:rgb(222,230,237); ">
  
	<div class=" row" style="margin-top:150px; margin-left:-250px; ">
		<div class="col-sm-1">
			
		</div>
	<?php
	$get_images="SELECT * FROM wall_images ";
  $run_images=mysqli_query($conn,$get_images);
  while ($row_images=mysqli_fetch_array($run_images)) {
    
    $img_id=$row_images['img_id'];
    $wall_image=$row_images['images'];
    
    
    echo "<img src='imagepost/$wall_image' class='img-square' width='400px' height='300px'>" ;
    echo "  ";

  }
 


	if (isset($_POST['Upload_image'])) {
      $file_name = $_FILES['image']['name'];
      $image_temp= $_FILES['image']['tmp_name'];
    $random_number=rand(1,100);

      if ($file_name=='') {
        echo "<script>alert('Please select Image')</script>";
        echo "<script>window.open('photoupload.php?u_id=$user_id', '_self')</script>";
        exit();
      }

      else{
        
        
        move_uploaded_file($image_temp,"imagepost/$file_name.$random_number");
        $update="INSERT INTO wall_images(images) VALUES ('$file_name.$random_number')";
        $run=mysqli_query($conn, $update);

        if ($run) {
          echo "<script>alert('Image Uploaded')</script>";
        echo "<script>window.open('photoupload.php?u_id=$user_id', '_self')</script>";
        }
      }
	}

	?>
	<div class="col-sm-1">
		
	</div>
	</div>
	<div class="row">
	<div class="col-sm-2">
		
	</div>
	<div class="col-sm-2" style="margin-top:-380px; margin-left:-210px; " >
<form action="photoupload.php" method="POST" enctype="multipart/form-data">
         <input type="file" class="btn btn-danger" name="image" />
         <input type="submit" class="btn btn-success" name="Upload_image">
      </form>
</div>
</div>
</body>
</html>