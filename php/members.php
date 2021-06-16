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
	
	<title>Find People</title>
	<meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/js/bootstrap.min.js"></script>
  <link rel="stylesheet" type="text/css" href="style/home_style2.css">/
</head>
<body style="font-family: cursive;background-color:#6b5b95;">
<div class="row" style="margin-top: 50px;">
	<div class="col-sm-12">
		<center>
			<h2 style="color:white;">
				Find people
			</h2>
		</center><br><br>
		<div class="row">
			<div class="col-sm-4">
				
			</div>
			<div class="col-sm-4">
				<form class="search_form" action="">
					<input type="text" name="search_user" placeholder="search user">
					<button class="btn btn-info" type="submit" name="search_user_btn">Search</button>
				</form>
			</div><br><br>
			<div class="col-sm-4">
				
			</div><br><br>
			<?php search_user(); ?>
		</div>
	</div>
</div>
</body>
</html>