<!DOCTYPE html>
<?php
session_start();
include("includes/header.php");
include("functions/functions_job.php");
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
	<title>Job Alerts</title>
	<meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/js/bootstrap.min.js"></script>
</head>
<body style="background-color:rgb(222,230,237);">
<style>
		#content{
	width:55%;

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
<div class="row">
	
<div id="insert_post" class="col-sm-12"style="background-color: #6b5b95;margin-top:49px;" >
	<center>
<form action="job_show.php?id=<?php echo $user_id; ?>" method="Post" enctype="multipart/form-data">
	
		<textarea placeholder ="Hello !!! Want to post a job notification ??" name="content" class="form-control" id="content" rows="4" required="" style="color: grey; font-family: cursive;"></textarea>
		</center>
		
		<h3 style="align-content: left; padding-left: 25%; font-family: Tahoma, Geneva, sans-serif ; color: white">Type of job</h3>
		<div style="padding-left: 25%; font-family:Tahoma, Geneva, sans-serif  ; color: white">
		<input type="radio" name="type_of_job" value="gov_tech"> Government Technical&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp
		<input type="radio" name="type_of_job" value="gov_non_tech"> Government Non-Technical&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp
		<input type="radio" name="type_of_job" value="pri_tech"> Private Technical&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp
		<input type="radio" name="type_of_job" value="pri_non_tech" required=""> Private Non-Technical
		</div>
		<br>
		<button id="btn-post" class="btn btn-success" name="sub" style="font-family: Tahoma, Geneva, sans-serif ;" >Post
		</button>
		</form>
		<?php insertpost(); ?>
	
</div>

</div>
<div class="row" style="font-family: cursive;">
	<div class="col-sm-12">
		<center>
			<h2>
				<strong>
					Job Alerts
				</strong>
			</h2>
		</center>
		<?php echo get_posts()?>;
	</div>
	
</div>

</body>
</html>