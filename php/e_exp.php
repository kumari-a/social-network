<!DOCTYPE html>
<?php
session_start();
include("includes/header.php");
if (!isset($_SESSION['user_email'])) {
    header("location:index.php");
}
?>
<html>
<head>
	<title>Experience</title>
    <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/js/bootstrap.min.js"></script>
  <link rel="stylesheet" type="text/css" href="style/home_style2.css">

</head>
<body style="font-family: cursive;">
	<?php
	if (isset($_GET['u_id'])) {

      $get_id=$_GET['u_id'];
      $get_post="SELECT * FROM users WHERE user_id='$get_id'";
      $run_post = mysqli_query($conn,$get_post);
      $row=mysqli_fetch_array($run_post);

      $user_email= $row['user_email'];

      $get_post1="SELECT * FROM experience WHERE em ='$user_email'";
      $run_post1= mysqli_query($conn,$get_post1);
      $row1=mysqli_fetch_array($run_post1);

      $curr_job=$row1['curr_job'];
      $prev_job=$row1['prev_job'];
      $prev_job1=$row1['prev_job1'];
      $date=$row1['date'];

      if (isset($_POST['update'])) {
        $cur_job=$_POST['curr_job'];
        $prv_job=$_POST['prev_job'];
        $prv_job1=$_POST['prev_job1'];


      $update_post="UPDATE experience SET curr_job='$cur_job' , prev_job='$prv_job' , prev_job1='$prv_job1'  WHERE em ='$user_email'";
      $run_update=mysqli_query($conn,$update_post);
      if ($run_update) {
        echo"<script>alert('Your profile has beed updated')</script>";
      echo "<script type='text/javascript'> document.location ='home.php'; </script>";
      }
    }

  }

	?>
  <div class="row">
    <div class="col-sm-2">
      
    </div>

    <div class="col-sm-8">
  
	<form action=" " method="post" id="f">
			<center>
				<h2>Edit your experience </h2>
			</center>
			<br><h3>Current Job</h3><br>
			<textarea class="form-control" cols="33" rows="4" name="curr_job"><?php echo $curr_job; ?></textarea><br>
      <h3>
        Previous Jobs
      </h3><br>

			<textarea class="form-control" cols="33" rows="4" name="prev_job"><?php echo $prev_job; ?></textarea><br>
			<textarea class="form-control" cols="33" rows="4" name="prev_job1"><?php echo $prev_job1; ?></textarea><br>
			<input type="submit" name="update" class="btn btn-info"/>
		</form>
    </div>
    <div class="col-sm-2">
      
    </div>

    </div>
</body>
</html>