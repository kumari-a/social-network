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
  <?php


  ?>
	<title>Verify user</title>
<meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/js/bootstrap.min.js"></script>
  <link rel="stylesheet" type="text/css" href="style/home_style2.css">
</head>
<body style="font-family:Tahoma, Geneva, sans-serif ;background-color:rgb(222,230,237); ">
	<?php
  $auth_user="SELECT * FROM users WHERE status !='verified' ORDER BY 1 DESC LIMIT 5";
  $run_auth=mysqli_query($conn,$auth_user);
  while ($row_auth=mysqli_fetch_array($run_auth)) {
    global $auth_id;
    $auth_id=$row_auth['user_id'];
    $auth_fname=$row_auth['f_name'];
    $auth_lname=$row_auth['l_name'];
    $auth_batch=$row_auth['batch'];
    $auth_pic=$row_auth['user_image'];
    $auth_status=$row_auth['status'];
    $auth_roll=$row_auth['user_roll'];
    $auth_branch=$row_auth['branch'];
    
    echo "<div class='row'style='margin-top:50px;background-color:#6b5b95;height:360px;'>
    <div class='col-sm-2'></div>
    <div class='col-sm-8'style='background-color:white;height:auto;border-radius:10px;margin-top:30px;margin-bottom:10px;'>
    <img src='users/$auth_pic' class='img-circle' width='100px' height='100px'>
      <h3>Registration number : $auth_roll</h3>
      <h1> User Name : $auth_fname $auth_lname</h1>
      <h2>Branch : $auth_branch  Batch : $auth_batch</h2>" ;
    
    
    echo "<a href='confirm_user.php?auth_id=$auth_id' style='float:right;margin-bottom:5px;'>
      <button class='btn btn-success' name='confirm'> confirm
      </button>
      </a>";
    echo "<br></div></div>
    <hr>";

  }
 

?>
</body>
</html>