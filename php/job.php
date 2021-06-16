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
	<title>Edit Job Preference</title>
    <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/js/bootstrap.min.js"></script>
  
	<style>
		body{
			font-family: Tahoma, Geneva, sans-serif;
            color: black;
            background:white;
             background-size:min-width: 0px min-height: 0px ;
			
            }
            
            .job{
            	max-width: 350px;
            	margin: auto;
            	border-radius:10px;
            	background: skyblue;
            	padding: 20px;
            	margin-top: 50px;
            }
            input[type=text],
            select{
            	width: 100%;
            	padding:12px 20px;
            	margin: 8px 0;
            	display-inline-block;
            	border: 1px solid #ccc;
            	border-radius: 4px;
            	box-sizing: borderbox;
            	 }
            	 #submit{
            	 	border: none;
                    width: 100%;
                    background: #006666;
                    color: #fff;
                   font-size: 16px;
                  line-height: 25px;
                  padding: 10px 0px;
                  border-radius: 6px;
                   cursor: pointer;
                   

            	 }
            	 input[type=submit]:hover{
            	 	 background-color: black;
            	  box-shadow: 0 12px 16px 0 rgba(0,0,0,0.24), 0 17px 50px 0 rgba(0,0,0,0.19);
            	 }
	</style>
</head>
<body>
  <?php
if (isset($_GET['u_id'])) {

      $get_id=$_GET['u_id'];
      $get_post="SELECT * FROM users WHERE user_id='$get_id'";
      $run_post = mysqli_query($conn,$get_post);
      $row=mysqli_fetch_array($run_post);

      $user_email= $row['user_email'];

      $get_post1="SELECT * FROM job_profile WHERE email ='$user_email'";
      $run_post1= mysqli_query($conn,$get_post1);
      $row1=mysqli_fetch_array($run_post1);

      $gov_tech= $row1['gov_tech'];
      $gov_non_tech=$row1['gov_non_tech'];
      $pri_tech=$row1['pri_tech'];
      $pri_non_tech=$row1['pri_non_tech'];

      if (isset($_POST['update'])) {
        # code...
      $type_field=$_POST['type_field'];
      $type=$_POST['type_job'];
      $branch=$_POST['branch'];

      if ($type_field=='All' && $type == 'All') {
        $gov_tech='yes';
        $gov_non_tech='yes';
        $pri_tech='yes';
        $pri_non_tech='yes';
      }

      elseif ($type =='Government' && $type_field=='All' ) {
         $gov_tech='yes';
        $gov_non_tech='yes';
        $pri_tech='no';
        $pri_non_tech='no';
      }

      elseif ($type =='Government' && $type_field=='Technical') {
        $gov_tech='yes';
        $gov_non_tech='no';
        $pri_tech='no';
        $pri_non_tech='no';
      }

      elseif ($type=='Government' && $type_field=='Non_Technical') {
        $gov_tech='no';
        $gov_non_tech='yes';
        $pri_tech='no';
        $pri_non_tech='no';
      }

      elseif ($type =='Private' && $type_field=='All' ) {
         $gov_tech='no';
        $gov_non_tech='no';
        $pri_tech='yes';
        $pri_non_tech='yes';
      }

      elseif ($type =='Private' && $type_field=='Technical') {
        $gov_tech='no';
        $gov_non_tech='no';
        $pri_tech='yes';
        $pri_non_tech='no';
      }

      elseif ($type=='Private' && $type_field=='Non_Technical') {
        $gov_tech='no';
        $gov_non_tech='no';
        $pri_tech='no';
        $pri_non_tech='Yes';
      }

      elseif ($type=='All' && $type_field=='Technical') {
        $gov_tech='yes';
        $gov_non_tech='no';
        $pri_tech='yes';
        $pri_non_tech='no';
      }

      elseif ($type=='All' && $type_field=='Non_Technical') {
        $gov_tech='no';
        $gov_non_tech='yes';
        $pri_tech='no';
        $pri_non_tech='yes';
      }
      
      $update_post2="UPDATE job_profile SET gov_tech='$gov_tech',gov_non_tech='$gov_non_tech',pri_tech='$pri_tech',pri_non_tech='$pri_non_tech' WHERE email ='$user_email'";
      $run_update2=mysqli_query($conn,$update_post2);
      if ($run_update2) {
        echo"<script>alert('Job profile has been updated')</script>";
      echo "<script type='text/javascript'> document.location ='home.php'; </script>";
      }
}
    
}


?>
	<div class="job">
		<h3 style="color: white;">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Choose Your Job Prefrence</h3>
		<form action=" " method="post" style="font-family: cursive;">
			<label for="Type of job" style="color: white;" >Type of job</label>
			<select name="type_job" id="Type of job">
				<option value="no">Select</option>
				<option value="All">All</option>
				<option value="Government">Government</option>
				<option value="Private">Private</option>
			 </select><br><br>
				<label for="Field" style="color: white;">Field</label>
			<select name="type_field" id="Field">
		  <option value="no">Select</option>
			<option value="All">All</option>
			<option value="Technical">Technical</option>
			<option value="Non_Technical">Non Technical</option>
			</select><br><br>
				<label for="Branch" style="color: white;">Branch</label>
			<select name="branch" id="Branch">
				<option value="All">Select</option> 
				<option value="IT">IT</option>
				<option value="Civil_Engg.">Civil Engg.</option>
				<option value="Mech_Engg.">Mech. Engg.</option>
				<option value="Elect_Engg.">Elect. Engg.</option>
				<option value="Elect_Comm.">Elect. & Comm.</option>

                </select><br><br>
       <input type="submit" name="update" value="update" class="btn btn-info"/>
            </form>
		</div>
 </body>
 </html>