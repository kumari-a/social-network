<?php
include("connection.php");
//include("functions/functions.php");
?>
<nav class = "navbar navbar-inverse navbar-fixed-top" style="font-family:Tahoma, Geneva, sans-serif;">
	<div class="container-fluid">
		<div class="navbar-header">
			<button type ="button" class="navbar-toggle collapsed"
			data-target="#bs-example-navbar-collapse-1" data-toggle="collape" aria-expanded="false">
			<span class="sr-only">Toggle navigation</span>
			<span class="icon-bar"></span>
			<span class="icon-bar"></span>
			<span class="icon-bar"></span>
			</button>
			<a href="home.php" class="navbar-brand">MIT Framily</a>
		</div>
		<div class="collapse navbar-collapse" id="#bs-example-navbar-collapse-1">
			<ul class="nav navbar-nav">
				<?php
                $user=$_SESSION['user_email'];

                $get_user="SELECT * FROM users WHERE user_email = '$user'";
                $run_user= mysqli_query($conn,$get_user);
                $row= mysqli_fetch_array($run_user);

                $user_id= $row['user_id'];
                $user_name= $row['user_name'];
                $first_name= $row['f_name'];
                $last_name= $row['l_name'];
                $describe_user= $row['describe_user'];
                $user_pass= $row['user_pass'];
                $user_email=$row['user_email'];
                $user_roll= $row['user_roll'];
                $user_batch= $row['batch'];
                $user_image= $row['user_image'];
                $user_cover= $row['user_cover'];
                //$recovery_account= $row['recovery_account'];
                $register_date=$row['user_reg_date'];
                $user_mob= $row['user_mobile'];

                

                $user_post="SELECT * FROM posts WHERE  	user_id = '$user_id'";
                $run_posts= mysqli_query($conn,$user_post);
                $posts = mysqli_num_rows($run_posts);
                
                
                $curyear=date('Y');
                $user_state=$curyear-$user_batch;
                if ($user_id==11) {
                   $role='admin';
                }

                elseif ($user_state>4) {
                    $role='alumni';
                }

                elseif ($user_state<=4) {
                    $role='student';
                }

                
                

                 $get_post1="SELECT * FROM job_profile WHERE email ='$user_email'";
      $run_post1= mysqli_query($conn,$get_post1);
      $row1=mysqli_fetch_array($run_post1);

      $gov_tech= $row1['gov_tech'];
      $gov_non_tech=$row1['gov_non_tech'];
      $pri_tech=$row1['pri_tech'];
      $pri_non_tech=$row1['pri_non_tech'];

				?>
				<li>
					<a href='profile.php?<?php echo "u_id=$user_id"; ?>'><?php echo"$first_name";?> </a>
				</li>
				<li> <a href="home.php">Home</a></li>
				<!--<li> <a href="home.php">Find People</a></li>-->
        <li> <a href="alumni.php">Alumni</a></li>
        <li> <a href="studentnotice.php">Campus Talk</a></li>
        <li> <a href="job_show.php">Jobs</a></li>
			</ul>
			<ul class="nav navbar-nav navbar-right">
        
          <form class="navbar-form navbar-left" method="get" action="logout.php">
            <div class="form-group">
              <input type="submit" class="btn btn-danger" value="Logout">
            </div>
          </form>        
      </ul><form method="get" action="members.php">
      <div class="container">
<div class="input-group">
      <span class="input-group-btn">
        <button class="btn btn-search" type="submit" style="top: 7px; position: relative; float: right;"><i class="fa fa-search fa-fw"></i> Search</button>
      </span>
</div>
</div></form>
		</div>
	</div>
</nav>