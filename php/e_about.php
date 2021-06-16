<!DOCTYPE html>
<?php
session_start();
include("includes/header.php");
include("functions/functions.php");
if (!isset($_SESSION['user_email'])) {
	header("location:index.php");
}
?>
<html>
<head>
	<title>Edit About</title>
	<meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/js/bootstrap.min.js"></script>
  <link rel="stylesheet" type="text/css" href="style/home_style2.css">
</head>
<body style="font-family:Tahoma, Geneva, sans-serif ;background-color:rgb(222,230,237); ">
	
<div class="row" >
	<div class="col-sm-3">
		
	</div>
	<div class="col-sm-6" style="margin-top:50px;">
		<?php
		if (isset($_GET['u_id'])) {
			$get_id=$_GET['u_id'];
			$get_post="SELECT * FROM users WHERE user_id='$get_id'";
			$run_post = mysqli_query($conn,$get_post);
			$row=mysqli_fetch_array($run_post);

			$post_con= $row['describe_user'];
		}
		?>
		<form action=" " method="post" id="f">
			<center>
				<h2>Edit your profile</h2>
			</center>
			<br>
			<textarea class="form-control" cols="33" rows="4" name="content"><?php echo $post_con; ?></textarea><br>
			<input type="submit" name="update" class="btn btn-info"/>
		</form>
		<?php
		if (isset($_POST['update'])) {
			$content= $_POST['content'];

			$update_post="UPDATE users SET 	describe_user='$content' WHERE user_id='$get_id'";
			$run_update=mysqli_query($conn,$update_post);
			if ($run_update) {
				echo"<script>alert('Profile has been updated')</script>";
	    echo "<script type='text/javascript'> document.location ='home.php'; </script>";
			}
		}
		?>
	</div>
	<div class="col-sm-3">
		
	</div>
</div>
</body>
</html>