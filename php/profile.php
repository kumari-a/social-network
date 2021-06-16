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
	<?php
        			 
                $user=$_SESSION['user_email'];
                $get_user="SELECT * FROM users WHERE user_email = '$user'";
                $run_user5= mysqli_query($conn,$get_user);
                $row= mysqli_fetch_array($run_user5);
                 $user_id=$row['user_id'];
                 global $user_id;
	?>
	<title><?php echo "$user_name" ?></title>
	<meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/js/bootstrap.min.js"></script>
  <link rel="stylesheet" type="text/css" href="style/home_style2.css">
</head>
<style>
  .body{
    background-color:#6b5b95; 
  }
	#cover-img{
    top:20px;
		height:400px;
		width: 98.3%;
    margin-left:12px;
	}

	#profile-img{
		position: absolute;
		top: 160px;
		left: 40px;
	}

	#update_profile{
		position: relative;
		top: -33px;
		cursor: pointer;
		left: 93px;
		border-radius: 4px;
		background-color: rgba(0,0,0,0.1);
		transform: translate(-50%,-50%);
	}

	#button_profile{
		position: absolute;
		top: 82%;
		left: 50%;
		cursor: pointer;
		transform: translate(-50%,-50%);
	}
</style>
<body class="body" style="font-family:Tahoma, Geneva, sans-serif ;">
<div class="row" style="background-color:rgb(222,230,237); margin-top:54px;height:400px;">
	<div class="col-sm-2">
	</div>
	<div class="col-sm-8">
    <form action="profile.php?u_id='$u_id'" method="post" enctype="multipart/form-data">
   
      
		<?php
            echo "
               <div><div><img src='cover/$user_cover' id='cover-img' class='img-rounded'  alt='cover'></div>
                 <form action='profile.php?u_id=$user_id' method='post' enctype='multipart/form-data'>
                 <ul class='nav pull-left' style='position:absolute;top:10px;left:40px;'>
                 <li class='dropdown'>
                 <button class='dropdown-toggle btn btn-default' data-toggle='dropdown'style='margin-top:5px;'> Change Cover
                 </button>
                   <div class='dropdown-menu'>
                   <center>
                   <p>Click <strong> Select Image </strong> and then click the <br> <strong> Update Cover </strong> </p>
                   <label class='btn btn-info'>Select Image
                   <input type='file' name='u_cover'/>
                   </label>
                   <br> 
                   <br>
                   <button name='submit' class='btn btn-info'> Update Cover</button>
                   </center>
                   </div>
                 </li>
                 </ul>
                 </form>
               </div>
               <div id='profile-img'>
               <img src='users/$user_image' alt='profile' class='img-circle' width='180px' height='185px'>
               <form action='profile.php?u_id=$user_id' method='post' enctype
               ='multipart/form-data'>
               <label id='update_profile'>Select Image
                   <input type = 'file' name ='u_image'/>
                   </label>
                   <br>
                   <br>
                   <button id='button_profile' name='update' class='btn btn-info'> Update Photo</button>
               </form>
               </div><br>
                 ";
		?></form>

		<?php 
		if (isset($_POST['submit'])) {
      
     $u_cover = $_FILES['u_cover']['name'];
     $image_tmp= $_FILES['u_cover']['tmp_name'];
    
			$random_number=rand(1,100);

			if ($u_cover=='') {
				echo "<script>alert('Please select cover image')</script>";
				echo "<script>window.open('profile.php?u_id=$user_id', '_self')</script>";
				exit();
			}

			else{
        if (
				move_uploaded_file($image_tmp,"cover/$u_cover.$random_number")){
				$update="UPDATE users SET user_cover='$u_cover.$random_number' WHERE user_id='$user_id'";
				$run=mysqli_query($conn, $update);

				if ($run) {
			    echo "<script>alert('Cover image updated')</script>";
				echo "<script>window.open('profile.php?u_id=$user_id', '_self')</script>";
				}
      }else{
          echo "<script>alert('Cover image size too big... Please try another image')</script>";
        echo "<script>window.open('profile.php?u_id=$user_id', '_self')</script>";

      }
			}
		}



		?>
    <!--user photo-->
    <?php 
    if (isset($_POST['update'])) {
      
     $u_image = $_FILES['u_image']['name'];
     $image_tmp1= $_FILES['u_image']['tmp_name'];
    
      $random_number=rand(1,100);

      if ($u_image=='') {
        echo "<script>alert('Please select profile image')</script>";
        echo "<script>window.open('profile.php?u_id=$user_id', '_self')</script>";
        exit();
      }

      else{
        
        
        move_uploaded_file($image_tmp1,"users/$u_image.$random_number");
        $update="UPDATE users SET user_image='$u_image.$random_number' WHERE user_id='$user_id'";
        $run=mysqli_query($conn, $update);

        if ($run) {
          echo "<script>alert('profile image updated')</script>";
        echo "<script>window.open('profile.php?u_id=$user_id', '_self')</script>";
        }
      }
    }



    ?>

	</div>
	<div class="col-sm-2">
		
	</div>
</div>
<!--about-->

	
	<div class="col-sm-3" style="background-color: #80ced6; text-align: center;width:65%; left:17.8%; border-radius: 5px;margin-top:-10px;">
		<?php
    if ($role!='admin') {
      # code...
    
		echo "
             
             <center><h2><strong>$first_name&nbsp$last_name</strong></h2> </center>
             <p><strong><center><h4><i style ='color:white';>$describe_user</i></strong></h4></center></strong></p><br>
             <p><strong><center><h4>Batch:</strong><i style ='color:white';> $user_batch</i></h4></center></p>
             <p><strong><center><h4>Contact Details :</strong></h4></center></p>
             <p><center><h4> <i style ='color:white';>$user_email</i></h4></center></p><br>";

 

		?>
    <a style=" position: relative; float: right;" href='e_about.php?<?php echo "u_id=$user_id"; ?>'>Edit </a>
    <?php
   }
   else{
    echo "
             
             <center><h2><strong>$first_name&nbsp$last_name</strong></h2> </center>
             <p><strong><center><h4><i style ='color:white';>$describe_user</i></strong></h4></center></strong></p><br>
             <p><strong><center><h4>Status:</strong><i style ='color:white';> $role</i></h4></center></p>
             <p><strong><center><h4>Contact Details :</strong></h4></center></p>
             <p><center><h4> <i style ='color:white';>$user_email</i></h4></center></p><br>";

   
    ?>
    <a style=" position: relative; float: left;color:#ffff00" href='auth_user.php?<?php echo "u_id=$user_id"; ?>'><strong>Verify Users</strong> </a>
    <a style=" position: relative; float: justify;color:#ffff00" href='photoupload.php?<?php echo "u_id=$user_id"; ?>'><strong>Upload Images</strong> </a>
    
    <a style=" position: relative; float: right;color:#ffff00" href='e_about.php?<?php echo "u_id=$user_id"; ?>'><strong>Edit</strong ></a>
    <?php
   }
   ?>
		
	</div>

<?php
if ($role!='admin') {
               
                   			
                
                $get_user1="SELECT * FROM experience WHERE em = '$user_email'";
                $run_user6= mysqli_query($conn,$get_user1);
                $row1= mysqli_fetch_array($run_user6);
                 
                	$curr_job=$row1['curr_job'];
                	$prev_job=$row1['prev_job'];
                	$prev_job1=$row1['prev_job1'];
                	$us_em=$row1['em'];
                
                
	?>

<!--experience profile-->


	<div class="col-sm-3" style="background-color: white;margin-top:10px;  text-align: justify; left: 17.8%;width:65%;right:10%; border-radius: 5px;"> 
		<?php

		echo "
             <h2 align=center><strong>Experience<hr></strong></h2>
             <h4><strong>Currently Working:</strong></h4> 
             <p><strong><h4><i style ='color:grey';>$curr_job</i></strong></h4></strong></p><br>
             <p><strong><h4>Past Experience</strong><br><i style ='color:grey';> $prev_job</i></h4></p><br>
             <p><i style ='color:grey';> $prev_job1</i></h4></p><br>
             ";
        if ($us_em==$_SESSION['user_email']) {
        	?>
        <a style=" position: relative; float: center;" href='e_exp.php?<?php echo "u_id=$user_id"; ?>'>Edit </a>
       <?php
        }
?>
		
		</div>
	
  <!--job profile-->
  <div class="row">
	
	<div class="col-sm-3" style="background-color:white; margin-top: 10px; text-align: jutify;left:18.5%;width:63.5%;right:10%;border-radius:5px;" >
	<?php
	            $get_user2="SELECT * FROM job_profile WHERE email = '$user_email'";
                $run_user7= mysqli_query($conn,$get_user2);
                $row1= mysqli_fetch_array($run_user7);
                 
                $gov_tech=$row1['gov_tech'];
                $gov_non_tech=$row1['gov_non_tech'];
                $pri_tech=$row1['pri_tech'];
                $pri_non_tech=$row1['pri_non_tech'];
                $us_em=$row1['email'];

                if ($us_em==$user_email) {
                	echo "
             <h2 align=center><strong>Job Profile<hr><hr></strong></h2>
             <h3><strong>Job Preferences<hr></strong></h3> 
             <p><strong><h4>Government Technical : </strong>&nbsp<i style ='color:grey';> $gov_tech</i></h4></p><br>
             <p><strong><h4>Government Non-Technical : </strong>&nbsp<i style ='color:grey';> $gov_non_tech</i></h4></p><br>
             <p><strong><h4>Private Technical : </strong>&nbsp<i style ='color:grey';> $pri_tech</i></h4></p><br>
             <p><strong><h4>Private Non-Technical : </strong>&nbsp<i style ='color:grey';> $pri_non_tech</i></h4></p><br>
             ";
              ?>
               <a style=" position: relative; float: right;" href='job.php?<?php echo "u_id=$user_id"; ?>'>Edit </a>
                </div></div>
                <?php
                }

}
else{
  

echo "<div class='row'>
<div class=col-sm-3 style='background-color: white; text-align: ;width:63.5%; left: 18.5%; border-radius: 5px; margin-top:10px;'><br><br><br></div>";
  
}
	?>
</div>
  
  <div class="col-sm-3" style="background-color: white; text-align: jutify;width:64.8%; left:17.8%;right:10%; border-radius: 5px;margin-top:10px;">
    <h2 align=center><b><strong>My Posts<br><hr></strong></b></h2>
  </div>
  </div><br><br><br><br><br><br>

  <!--for general updates-->
  <div class="row">
	
<div class="col-sm-3" style="background-color: white; text-align: justify; border-radius: 5px;width:435px; left: 18.4%;margin-top:-5px;margin-bottom:50px;">
  <?php
  global $conn;
  if (isset($GET['user_id'])) {
    $u_id=$_GET['user_id'];
  }
  $get_post4="SELECT * FROM posts WHERE user_id='$user_id'ORDER BY 1 DESC LIMIT 5";
  $run_post4=mysqli_query($conn,$get_post4);
  echo"<h2 align=center><b><strong>My Updates<hr><strong><b></h2>";
  while ($row_post4=mysqli_fetch_array($run_post4)) {
    $post_id=$row_post4['post_id'];
    $user_id=$row_post4['user_id'];
    $content=$row_post4['post_content'];
    $post_date=$row_post4['post_date'];

    $user="SELECT * FROM users WHERE user_id='$user_id' AND post ='yes'";
    $run_user8=mysqli_query($conn,$user);
    $row_user3=mysqli_fetch_array($run_user8);
    $user_name=$row_user3['user_name'];
    $user_image=$row_user3['user_image'];

    if ($content) {
      echo "
      <div id='own_posts'>
      <div class='row'>
      <div class='col-sm-2'>
      <p><img src='users/$user_image' class='img-circle' width='60px' height='60px'>
      </p>
      </div>
      <div class='col-sm-4'>
      <h4><a style='text-decocation:none; cursor:pointer; color=#3897e0;' href='user_profile.php?u_id=$user_id'> $user_name </a>
      </h4><h4>
      <small style='color:black;'>updated on:<br> <strong>$post_date</strong></small>
      </h4>
      </div>
      <div class='col-sm-4'>
      </div>
      </div>
      <div class='col-sm-12'>
      <h3><p>$content</p></h3>
      </div>
      <br>
      <a href='single.php?post_id=$post_id' style='float:right;'>
      <button class='btn btn-success'> View
      </button>
      </a>
      <a href='edit_post.php?post_id=$post_id' style='float:right;'>
      <button class='btn btn-info'> Edit
      </button>
      </a>
      <a href='functions/delete_post.php?post_id=$post_id' style='float:right;'>
      <button class='btn btn-danger'> Delete
      </button>
      </a>
      </div>
      <br>
      <br>
      <br>
      <hr>
      ";
      global $conn;

      if (isset($user_id)) {
        $u_id=$_GET['u_id'];
      }
      $get_posts = "SELECT user_email FROM users WHERE user_id='$u_id' ";
      $run_user9=mysqli_query($conn,$get_posts);
      $row=mysqli_fetch_array($run_user9);

      $user_email=$row['user_email'];
      $user=$_SESSION['user_email'];
      $get_user="SELECT * FROM users WHERE user_email='$user'";
      $run_user0=mysqli_query($conn,$get_user);

      $row= mysqli_fetch_array($run_user0);
      $user_id=$row['user_id'];
      $u_email=$row['user_email'];

      if ($u_email!=$user_email) {
        echo "<script>windows.open('profile.php?u_id=$user_id','_self')</script>";
      }
    }
    include("functions/delete_post.php");
  }

  ?>
</div>
<div class="col-sm-1">
  
</div>

<!--for alumni and student seprate  update-->
<!--for alumni-->
<?php
if ($role=='alumni') {
  ?>



<div class="col-sm-4" style="background-color: white; text-align: justify; border-radius: 5px;width:435px;left:10.5%;margin-top:-5px;">
  <?php
  global $conn;
  if (isset($GET['user_id'])) {
    $u_id=$_GET['user_id'];
  }
  $get_post4="SELECT * FROM alumni WHERE user_id='$user_id'ORDER BY 1 DESC LIMIT 5";
  $run_post4=mysqli_query($conn,$get_post4);
  echo"<h2><b><strong>My Alumni Updates<hr><strong><b></h2>";
  while ($row_post4=mysqli_fetch_array($run_post4)) {
    $post_id=$row_post4['post_id'];
    $user_id=$row_post4['user_id'];
    $content=$row_post4['post_content'];
    $post_date=$row_post4['post_date'];

    $user="SELECT * FROM users WHERE user_id='$user_id' AND post ='yes'";
    $run_user8=mysqli_query($conn,$user);
    $row_user3=mysqli_fetch_array($run_user8);
    $user_name=$row_user3['user_name'];
    $user_image=$row_user3['user_image'];

    if ($content) {
      echo "
      <div id='own_posts'>
      <div class='row'>
      <div class='col-sm-2'>
      <p><img src='users/$user_image' class='img-circle' width='60px' height='60px'>
      </p>
      </div>
      <div class='col-sm-4'>
      <h4><a style='text-decocation:none; cursor:pointer; color=#3897e0;' href='user_profile.php?u_id=$user_id'> $user_name </a>
      </h4><h4>
      <small style='color:black;'>updated on:<br> <strong>$post_date</strong></small>
      </h4>
      </div>
      <div class='col-sm-4'>
      </div>
      </div>
      <div class='col-sm-12'>
      <h3><p>$content</p></h3>
      </div>
      <br>
      <a href='view_post.php?post_id=$post_id' style='float:right;'>
      <button class='btn btn-success'> View
      </button>
      </a>
      <a href='edit_post_alumni.php?post_id=$post_id' style='float:right;'>
      <button class='btn btn-info'> Edit
      </button>
      </a>
      <a href='functions/delete_post_alumni.php?post_id=$post_id' style='float:right;'>
      <button class='btn btn-danger'> Delete
      </button>
      </a>
      </div>
      <br>
      <br>
      <br>
      <hr>
      ";
      global $conn;

      if (isset($user_id)) {
        $u_id=$_GET['u_id'];
      }
      $get_posts = "SELECT user_email FROM users WHERE user_id='$u_id' ";
      $run_user9=mysqli_query($conn,$get_posts);
      $row=mysqli_fetch_array($run_user9);

      $user_email=$row['user_email'];
      $user=$_SESSION['user_email'];
      $get_user="SELECT * FROM users WHERE user_email='$user'";
      $run_user0=mysqli_query($conn,$get_user);

      $row= mysqli_fetch_array($run_user0);
      $user_id=$row['user_id'];
      $u_email=$row['user_email'];

      if ($u_email!=$user_email) {
        echo "<script>windows.open('profile.php?u_id=$user_id','_self')</script>";
      }
    }
    include("functions/delete_post_alumni.php");
  }

  ?>
</div>


<?php
}

//for students
elseif ($role=='student') {
?>

<div class="col-sm-3"  style="background-color: white; text-align: justify; border-radius: 5px;width:435px;left:10.5%;margin-top:-5px;">
  <?php
  global $conn;
  if (isset($GET['user_id'])) {
    $u_id=$_GET['user_id'];
  }
  $get_post4="SELECT * FROM student_post WHERE user_id='$user_id'ORDER BY 1 DESC LIMIT 5";
  $run_post4=mysqli_query($conn,$get_post4);
  echo"<h2 align=center><b><strong>My College Updates<hr><strong><b></h2>";
  while ($row_post4=mysqli_fetch_array($run_post4)) {
    $post_id=$row_post4['post_id'];
    $user_id=$row_post4['user_id'];
    $content=$row_post4['post_content'];
    $post_date=$row_post4['post_date'];

    $user="SELECT * FROM users WHERE user_id='$user_id' AND post ='yes'";
    $run_user8=mysqli_query($conn,$user);
    $row_user3=mysqli_fetch_array($run_user8);
    $user_name=$row_user3['user_name'];
    $user_image=$row_user3['user_image'];

    if ($content) {
      echo "
      <div id='own_posts'>
      <div class='row'>
      <div class='col-sm-2'>
      <p><img src='users/$user_image' class='img-circle' width='60px' height='60px'>
      </p>
      </div>
      <div class='col-sm-4'>
      <h4><a style='text-decocation:none; cursor:pointer; color=#3897e0;' href='user_profile.php?u_id=$user_id'> $user_name </a>
      </h4><h4>
      <small style='color:black;'>updated on:<br> <strong>$post_date</strong></small>
      </h4>
      </div>
      <div class='col-sm-4'>
      </div>
      </div>
      <div class='col-sm-12'>
      <h3><p>$content</p></h3>
      </div>
      <br>
      <a href='view_post1.php?post_id=$post_id' style='float:right;'>
      <button class='btn btn-success'> View
      </button>
      </a>
      <a href='edit_post_student.php?post_id=$post_id' style='float:right;'>
      <button class='btn btn-info'> Edit
      </button>
      </a>
      <a href='functions/delete_post_student.php?post_id=$post_id' style='float:right;'>
      <button class='btn btn-danger'> Delete
      </button>
      </a>
      </div>
      <br>
      <br>
      <br>
      <hr>
      ";
      global $conn;

      if (isset($user_id)) {
        $u_id=$_GET['u_id'];
      }
      $get_posts = "SELECT user_email FROM users WHERE user_id='$u_id' ";
      $run_user9=mysqli_query($conn,$get_posts);
      $row=mysqli_fetch_array($run_user9);

      $user_email=$row['user_email'];
      $user=$_SESSION['user_email'];
      $get_user="SELECT * FROM users WHERE user_email='$user'";
      $run_user0=mysqli_query($conn,$get_user);

      $row= mysqli_fetch_array($run_user0);
      $user_id=$row['user_id'];
      $u_email=$row['user_email'];

      if ($u_email!=$user_email) {
        echo "<script>windows.open('profile.php?u_id=$user_id','_self')</script>";
      }
    }
    include("functions/delete_post_student.php");
  }

  ?>
</div>


</div>
<?php
}
?>
</body>
</html>