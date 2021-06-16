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
	<title><?php echo "confirm user" ?></title>
</head>
<body>
<?php

	$auth_id=$_GET['auth_id'];
	$get_user="SELECT * FROM users WHERE user_id = '$auth_id'";
                $run_user= mysqli_query($conn,$get_user);
                $row= mysqli_fetch_array($run_user);
                $status=$row['status'];

                $update_post="UPDATE users SET status='verified' WHERE user_id='$auth_id'";
			$run_update=mysqli_query($conn,$update_post);
			if ($run_update) {
				echo"<script>alert('user has been verified')</script>";
	    echo "<script type='text/javascript'> document.location ='auth_user.php'; </script>";
			}
?>
</body>
</html>

