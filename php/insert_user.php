<?php

include("includes/connection.php");
error_reporting(0);
session_start();
if (isset($_POST['sign_up'])) {
	if ($_POST["vercode"] != $_SESSION["vercode"] OR $_SESSION["vercode"]=='')  {
        echo "<script>alert('Incorrect verification code');</script>" ;
        echo "<script type='text/javascript'> document.location ='register.php'; </script>";
    }else{
	# collect data from input
	$first_name=htmlentities(mysqli_real_escape_string($conn,$_POST['first_name']));
	$last_name=htmlentities(mysqli_real_escape_string($conn,$_POST['last_name']));
	$pass=htmlentities(mysqli_real_escape_string($conn,$_POST['u_pass']));
	$email=htmlentities(mysqli_real_escape_string($conn,$_POST['u_email']));
	$batch=htmlentities(mysqli_real_escape_string($conn,$_POST['u_batch']));
	$roll=htmlentities(mysqli_real_escape_string($conn,$_POST['u_roll']));
	$branch=htmlentities(mysqli_real_escape_string($conn,$_POST['u_branch']));
	$mobile=htmlentities(mysqli_real_escape_string($conn,$_POST['u_mobile']));
	//$birthday=htmlentities(mysqli_real_escape_string($conn,$_POST['u_birthday']));
	$status= "not verified";
	$posts ="no";
	#generate a username...
	$newgid =sprintf('%05d',rand(0,999999));
    $username=strtolower($first_name . "_" . $last_name . "_" . $newgid );
	$check_username_query = "SELECT user_name FROM users WHERE user_email='$email'";
	$run_username = mysqli_query($conn,$check_username_query);
	$token = '';

	if (strlen($pass)<6) {
		# code...
		echo "<script>alert('password should be of minimum 6 character')</script>";
		exit();
	}

	$check_email="SELECT * FROM users WHERE user_email='$email'";
	if($run_email = mysqli_query($conn,$check_email))
{
	$check= mysqli_num_rows($run_email);

	if ($check>0) {
		# code...
		echo "<script>alert('E-mail already exists, please use another E-mail')</script>";
		//echo "<script>windows.open('signup.php', '_self')";
		echo "<script type='text/javascript'> document.location ='register.php'; </script>";
		exit();
	}

	//mysqli_free_result($check);
}
//check for student

	
     $file_name = $_FILES['image']['name'];
     $image_temp= $_FILES['image']['tmp_name'];
     $random_number=rand(1,100);
     move_uploaded_file($image_temp,"users/$file_name.$random_number");



	$insert="INSERT INTO `users`(`f_name`, `l_name`, `user_name`, `describe_user`, `user_pass`, `user_email`, `user_roll`, `batch`, `branch`, `user_mobile`, `user_image`, `user_cover`, `user_reg_date`, `status`, `post`, `token`) VALUES  ('$first_name','$last_name','$username','welcome to framily','$pass','$email','$roll','$batch','$branch','$mobile','$file_name.$random_number','malcov.jpg',NOW(),'$status','$posts','$token')";
	$query = mysqli_query($conn,$insert);

	if($query){
		$insert1="INSERT INTO `job_profile` (`email`, `gov_tech`, `gov_non_tech`, `pri_tech`, `pri_non_tech`) VALUES ('$email', 'no', 'no', 'no', 'no')";
       $query1= mysqli_query($conn,$insert1);
       if ($query1) {

       	$insert2="INSERT INTO `experience` (`em`, `curr_job`, `prev_job`, `prev_job1`, `date`) VALUES ('$email', '...', '...', '...', NOW())";
       $query2= mysqli_query($conn,$insert2);
	   }
       if($query2){
       echo "<script>alert('Your request has been registered. Please wait 24 hours for verfication')</script>";
      echo "<script type='text/javascript'> document.location ='mit_framily.html'; </script>";
	}
	}
	
	else
	{
echo "<script>alert('Registration Failed. Please try again !!')</script>";
		//echo "<script>windows.open('signup.php', '_self')";
	echo "<script type='text/javascript'> document.location ='register.php'; </script>";

}
}
}



 ?>
