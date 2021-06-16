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
	<title>View your post</title>
      <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/js/bootstrap.min.js"></script>
  <link rel="stylesheet" type="text/css" href="style/home_style2.css">
</head>
<body style="font-family: cursive;">
<div class="row">
	<div class="col-sm-12">
		<center>
			<h2>
				Comments
			</h2>
			<br>
			<?php  single_post(); ?>
		</center>
	</div>
</div>
</body>
</html>