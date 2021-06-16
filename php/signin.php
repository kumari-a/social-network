<?php
session_start();
include('includes/connection.php');
if (isset($_POST['login'])) {
   if ($_POST["vercode"] != $_SESSION["vercode"] OR $_SESSION["vercode"]=='')  {
        echo "<script>alert('Incorrect verification code');</script>" ;
        echo "<script>window.open('login.php', '_self')</script>";
    }else{
   $email= htmlentities(mysqli_real_escape_string($conn,$_POST['email']));
   $pass= htmlentities(mysqli_real_escape_string($conn,$_POST['pass']));

   $select_user="SELECT * FROM users WHERE user_email = '$email' AND user_pass='$pass' AND status = 'verified'";
   $query=mysqli_query($conn,$select_user);
   $check_user= mysqli_num_rows($query);
   #checking for verified user in database
   if ($check_user == 1) {

      $_SESSION['user_email']= $email;

      echo "<script>window.open('home.php', '_self')</script>";
   }
   else{
      echo "<script>alert('Invalid Details')</script>";
      echo "<script>window.open('login.php', '_self')</script>";
   }
}}
?>