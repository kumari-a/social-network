<!DOCTYPE html>
<?php
session_start();
include("includes/header.php");
include("functions/functions_student.php");
if (!isset($_SESSION['user_email'])) {
	header("location:index.php");
}
?>
<html>
<head>
	<?php
        			
                $user=$_SESSION['user_email'];
                $get_user="SELECT * FROM users WHERE user_email = '$user'";
                $run_user= mysqli_query($conn,$get_user);
                $row= mysqli_fetch_array($run_user);
                
	?>
	<title><?php echo "$user_name" ?></title>
	<meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/js/bootstrap.min.js"></script>
  <link rel="stylesheet" type="text/css" href="style/home_style2.css">
</head>
<body style="font-family:Tahoma, Geneva, sans-serif ;background-color:rgb(222,230,237);">
	
	<style>
		#content{
	width: 55%;

}
		#upload_image_button{
	position: absolute;
	top: 55.5%;
	right: 14%;
	min-width: 100px;
	max-width: 100px;
	border-radius: 4px;
	transform: translate(-50%,-50%);
}

	#btn-post{
		position: relative;
    right: -35%;
	min-width: 28%;
	max-width: 28%;

}

#insert_post{
	background-color: #fff;
	border: 2px solid #e6e6e6;
	padding: 40px 50px;
}

#posts{
	background-color: white;
	border: 2px solid #e6e6e6;
	padding: 40px 50px;
	border-radius: 10px;
}

#posts-img{
	padding-top: 5px;
	padding-right: 10px;
	min-width: 102%;
	max-width: 50%;
}
#single_post{
	background-color: white;
	border:5px solid #e6e6e6;
	padding: 40px 50px;
	border-radius: 10px;

}
	</style>
	<?php

	if ($role!='alumni') {
		?>
	

<div class="row">
	
<div id="insert_post" class="col-sm-12" style="font-family:Tahoma, Geneva, sans-serif ;background-color:#6b5b95; margin-top:49px;">
	<center>
<form action="studentnotice.php?id=<?php echo $user_id; ?>" method="Post" enctype="multipart/form-data">
	
		<textarea placeholder="Hello !!! What's on your mind ??" name="content" class="form-control" id="content" rows="4"></textarea>
		</center><br><br>
		<button id="btn-post" class="btn btn-success" name="sub" style="align:center; font-family:Tahoma, Geneva, sans-serif ;font-size: 20px;">Post
			
		</button>
		</form>
		<?php insertpost(); ?>
	
</div>

</div>
<?php
}
?>

<div class="row">
	<div class="col-sm-12">
		<center>
			<h2>
				<strong>
					News Feed
				</strong>
			</h2>
		</center>
		<?php echo get_posts()?>;
	</div>
	
</div>
</body>
</html>