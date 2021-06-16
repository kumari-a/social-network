<?php
require 'PHPMailerAutoload.php';
$conn= mysqli_connect("localhost" , "root" , "" , "social_network");
//funtion for inserting post
function insertpost()
{
	if (isset($_POST['sub'])) 
	{
		global $conn;
		global $user_id;

		$content=htmlentities($_POST['content']);
		$type_of_job=$_POST['type_of_job'];
		if (strlen($content)>2500) {
			# code...
			echo"<script>alert('please use 2500 or less words')</script>";
			echo "<script>windows.open('job_show.php')</script>";
		}
		
		else
				{
					$insert="INSERT INTO job (user_id , job , type_of_job , j_date) VALUES ('$user_id' , '$content'  ,'$type_of_job' , NOW()) ";

				$run=mysqli_query($conn,$insert);

				if ($run) {
					# code...
					echo"<script>alert('Your Post was updated. Thank you for posting')</script>";
			        echo "<script>windows.open('job_show.php','_self')</script>";
			        $updated="UPDATE users set post='yes' where user_id='$user_id'";
			        $run_update=mysqli_query($conn,$updated);

			        //job mailing code
			        $mail = new PHPMailer(true);
			        //government technical
			        if ($type_of_job=='gov_tech') {
			        	# code...
			        
$query="SELECT * FROM job_profile WHERE gov_tech='yes'";
$run_query = mysqli_query($conn,$query);
while ($row_posts = mysqli_fetch_array($run_query)) {
    $email=$row_posts['email'];

 
try {
    
                                          
    $mail->isSMTP();                                            
    $mail->Host       = 'smtp.gmail.com';  
    $mail->SMTPAuth   = true;                                   
    $mail->Username   = 'framily.studentbody@gmail.com';                     
    $mail->Password   = 'abhi_framily';                               
    $mail->SMTPSecure = 'tls';                                 
    $mail->Port       = 587;                                    

    $mail->setFrom('framily.studentbody@gmail.com', 'student body');
    $mail->addAddress($email);     
  
    $mail->isHTML(true);                                  
    $mail->Subject = "Job Alert";
    $mail->Body    = $content;
    $mail->AltBody = strip_tags($content);

    $mail->send();
    //echo 'Message has been sent';
    
} catch (Exception $e) {
    echo "Message could not be sent. ";
}
}}
//government non technical
elseif ($type_of_job=='gov_non_tech') {
			        	# code...
			        
$query="SELECT * FROM job_profile WHERE gov_non_tech='yes'";
$run_query = mysqli_query($conn,$query);
while ($row_posts = mysqli_fetch_array($run_query)) {
    $email=$row_posts['email'];

 
try {
    
                                          
    $mail->isSMTP();                                            
    $mail->Host       = 'smtp.gmail.com';  
    $mail->SMTPAuth   = true;                                   
    $mail->Username   = 'framily.studentbody@gmail.com';                     
    $mail->Password   = 'abhi_framily';                               
    $mail->SMTPSecure = 'tls';                                 
    $mail->Port       = 587;                                    

    $mail->setFrom('framily.studentbody@gmail.com', 'student body');
    $mail->addAddress($email);     
  
    $mail->isHTML(true);                                  
    $mail->Subject = "Job Alert";
    $mail->Body    = $content;
    $mail->AltBody = strip_tags($content);

    $mail->send();
    //echo 'Message has been sent';
    
} catch (Exception $e) {
    echo "Message could not be sent. ";
}
}}
//private Technical
elseif ($type_of_job=='pri_tech') {
			        	# code...
			        
$query="SELECT * FROM job_profile WHERE pri_tech='yes'";
$run_query = mysqli_query($conn,$query);
while ($row_posts = mysqli_fetch_array($run_query)) {
    $email=$row_posts['email'];

 
try {
    
                                          
    $mail->isSMTP();                                            
    $mail->Host       = 'smtp.gmail.com';  
    $mail->SMTPAuth   = true;                                   
    $mail->Username   = 'framily.studentbody@gmail.com';                     
    $mail->Password   = 'abhi_framily';                               
    $mail->SMTPSecure = 'tls';                                 
    $mail->Port       = 587;                                    

    $mail->setFrom('framily.studentbody@gmail.com', 'student body');
    $mail->addAddress($email);     
  
    $mail->isHTML(true);                                  
    $mail->Subject = "Job Alert";
    $mail->Body    = $content;
    $mail->AltBody = strip_tags($content);

    $mail->send();
    //echo 'Message has been sent';
    
} catch (Exception $e) {
    echo "Message could not be sent. ";
}
}}
//private non technical
elseif ($type_of_job=='pri_non_tech') {
			        	# code...
			        
$query="SELECT * FROM job_profile WHERE pri_non_tech='yes'";
$run_query = mysqli_query($conn,$query);
while ($row_posts = mysqli_fetch_array($run_query)) {
    $email=$row_posts['email'];

 
try {
    
                                          
    $mail->isSMTP();                                            
    $mail->Host       = 'smtp.gmail.com';  
    $mail->SMTPAuth   = true;                                   
    $mail->Username   = 'framily.studentbody@gmail.com';                     
    $mail->Password   = 'abhi_framily';                               
    $mail->SMTPSecure = 'tls';                                 
    $mail->Port       = 587;                                    

    $mail->setFrom('framily.studentbody@gmail.com', 'student body');
    $mail->addAddress($email);     
  
    $mail->isHTML(true);                                  
    $mail->Subject = "Job Alert";
    $mail->Body    = $content;
    $mail->AltBody = strip_tags($content);

    $mail->send();
    //echo 'Message has been sent';
    
} catch (Exception $e) {
    echo "Message could not be sent. ";
}
}}
			        //ending
				}


				else{
						echo"<script>alert('Problem occured while posting. Please try again ')</script>";
			        echo "<script>windows.open('job_show.php,'_self')</script>";
				}

			}
			
        }
		}
     

function get_posts(){
	global $conn;

$em=$_SESSION['user_email'];
$get_type="SELECT * FROM job_profile WHERE email='$em'";
$run_type=mysqli_query($conn,$get_type);
$job_choice=mysqli_fetch_array($run_type);
$gov_tech=$job_choice['gov_tech'];
$gov_non_tech=$job_choice['gov_non_tech'];
$pri_tech=$job_choice['pri_tech'];
$pri_non_tech=$job_choice['pri_non_tech'];


	$per_page=4;

	if (isset($_GET['page'])) {
		$page = $_GET['page'];
	}else{
		$page=1;
	}

	$start_from=($page-1) * $per_page;

	if ($gov_tech=='yes' && $gov_non_tech=='yes' && $pri_tech=='yes' && $pri_non_tech=='yes') {
	

	$get_posts="SELECT * FROM job ORDER BY 1 DESC LIMIT $start_from,$per_page";
	$run_posts = mysqli_query($conn,$get_posts);

	while ($row_posts = mysqli_fetch_array($run_posts)) {
		$job_id = $row_posts['job_id'];
		$user_id = $row_posts['user_id'];
		$type_of_job = $row_posts['type_of_job'];
		$content =substr($row_posts['job'], 0,40);
		$post_date=$row_posts['j_date'];

		$user = "SELECT * FROM users WHERE user_id=$user_id AND post='yes'";
		$run_user = mysqli_query($conn,$user);
		$row_user = mysqli_fetch_array($run_user);
		$user_name = $row_user['user_name'];
		$user_image =$row_user['user_image'];
		

			echo "
			<div class='row'>
			<div class= 'col-sm-3'>
			</div>
			<div id='posts' class='col-sm-6'>
			<div class='row'>
			<div class='col-sm-2'>
			<p><img src='users/$user_image' class='img-circle' width='100px' height='100px'>
			</p>
			</div>
			<div class ='col-sm-6'>
			<h3>
			<a style='text-decocation:none; cursor:pointer; color=#3897e0;' href='user_profile.php?u_id=$user_id'> $user_name </a>
			</h3>

			<h4>
			<small style='color:black;'>updated on: <strong>$post_date</strong></small>
			</h4>
			</div>
			<div class='col-sm-4'>
			</div>
			</div>
			<div class='row'>
			<div class='col-sm-12'>
			<h3><p>$content</p></h3>
			</div>
			</div>
			<br>
			<a href='single1.php?job_id=$job_id' style='float:right;'>
			<button class='btn btn-info'> view
			</button>
			</a>
			<br>
			</div>
			<div class='col-sm-3'>
			</div>
			</div><br><br>
			";
		
	}
}
elseif ($gov_tech=='yes' && $gov_non_tech=='yes' && $pri_tech=='no' && $pri_non_tech=='no') {
	

	$get_posts="SELECT * FROM job WHERE type_of_job='gov_tech' OR type_of_job='gov_non_tech' ORDER BY 1 DESC LIMIT $start_from,$per_page  ";
	$run_posts = mysqli_query($conn,$get_posts);

	while ($row_posts = mysqli_fetch_array($run_posts)) {
		$job_id = $row_posts['job_id'];
		$user_id = $row_posts['user_id'];
		$type_of_job = $row_posts['type_of_job'];
		$content =substr($row_posts['job'], 0,40);
		$post_date=$row_posts['j_date'];

		$user = "SELECT * FROM users WHERE user_id=$user_id AND post='yes'";
		$run_user = mysqli_query($conn,$user);
		$row_user = mysqli_fetch_array($run_user);
		$user_name = $row_user['user_name'];
		$user_image =$row_user['user_image'];
		

			echo "
			<div class='row'>
			<div class= 'col-sm-3'>
			</div>
			<div id='posts' class='col-sm-6'>
			<div class='row'>
			<div class='col-sm-2'>
			<p><img src='users/$user_image' class='img-circle' width='100px' height='100px'>
			</p>
			</div>
			<div class ='col-sm-6'>
			<h3>
			<a style='text-decocation:none; cursor:pointer; color=#3897e0;' href='user_profile.php?u_id=$user_id'> $user_name </a>
			</h3>

			<h4>
			<small style='color:black;'>updated on: <strong>$post_date</strong></small>
			</h4>
			</div>
			<div class='col-sm-4'>
			</div>
			</div>
			<div class='row'>
			<div class='col-sm-12'>
			<h3><p>$content</p></h3>
			</div>
			</div>
			<br>
			<a href='single1.php?job_id=$job_id' style='float:right;'>
			<button class='btn btn-info'> view
			</button>
			</a>
			<br>
			</div>
			<div class='col-sm-3'>
			</div>
			</div><br><br>
			";
		
	}
}
elseif ($gov_tech=='yes' && $gov_non_tech=='yes' && $pri_tech=='yes' && $pri_non_tech=='no') {
	

	$get_posts="SELECT * FROM job WHERE type_of_job='gov_tech' OR type_of_job='gov_non_tech' OR type_of_job='pri_tech' ORDER BY 1 DESC LIMIT $start_from,$per_page  ";
	$run_posts = mysqli_query($conn,$get_posts);

	while ($row_posts = mysqli_fetch_array($run_posts)) {
		$job_id = $row_posts['job_id'];
		$user_id = $row_posts['user_id'];
		$type_of_job = $row_posts['type_of_job'];
		$content =substr($row_posts['job'], 0,40);
		$post_date=$row_posts['j_date'];

		$user = "SELECT * FROM users WHERE user_id=$user_id AND post='yes'";
		$run_user = mysqli_query($conn,$user);
		$row_user = mysqli_fetch_array($run_user);
		$user_name = $row_user['user_name'];
		$user_image =$row_user['user_image'];
		

			echo "
			<div class='row'>
			<div class= 'col-sm-3'>
			</div>
			<div id='posts' class='col-sm-6'>
			<div class='row'>
			<div class='col-sm-2'>
			<p><img src='users/$user_image' class='img-circle' width='100px' height='100px'>
			</p>
			</div>
			<div class ='col-sm-6'>
			<h3>
			<a style='text-decocation:none; cursor:pointer; color=#3897e0;' href='user_profile.php?u_id=$user_id'> $user_name </a>
			</h3>

			<h4>
			<small style='color:black;'>updated on: <strong>$post_date</strong></small>
			</h4>
			</div>
			<div class='col-sm-4'>
			</div>
			</div>
			<div class='row'>
			<div class='col-sm-12'>
			<h3><p>$content</p></h3>
			</div>
			</div>
			<br>
			<a href='single1.php?job_id=$job_id' style='float:right;'>
			<button class='btn btn-info'> view
			</button>
			</a>
			<br>
			</div>
			<div class='col-sm-3'>
			</div>
			</div><br><br>
			";
		
	}
}
elseif ($gov_tech=='yes' && $gov_non_tech=='no' && $pri_tech=='no' && $pri_non_tech=='no') {
	

	$get_posts="SELECT * FROM job WHERE type_of_job='gov_tech' ORDER BY 1 DESC LIMIT $start_from,$per_page  ";
	$run_posts = mysqli_query($conn,$get_posts);

	while ($row_posts = mysqli_fetch_array($run_posts)) {
		$job_id = $row_posts['job_id'];
		$user_id = $row_posts['user_id'];
		$type_of_job = $row_posts['type_of_job'];
		$content =substr($row_posts['job'], 0,40);
		$post_date=$row_posts['j_date'];

		$user = "SELECT * FROM users WHERE user_id=$user_id AND post='yes'";
		$run_user = mysqli_query($conn,$user);
		$row_user = mysqli_fetch_array($run_user);
		$user_name = $row_user['user_name'];
		$user_image =$row_user['user_image'];
		

			echo "
			<div class='row'>
			<div class= 'col-sm-3'>
			</div>
			<div id='posts' class='col-sm-6'>
			<div class='row'>
			<div class='col-sm-2'>
			<p><img src='users/$user_image' class='img-circle' width='100px' height='100px'>
			</p>
			</div>
			<div class ='col-sm-6'>
			<h3>
			<a style='text-decocation:none; cursor:pointer; color=#3897e0;' href='user_profile.php?u_id=$user_id'> $user_name </a>
			</h3>

			<h4>
			<small style='color:black;'>updated on: <strong>$post_date</strong></small>
			</h4>
			</div>
			<div class='col-sm-4'>
			</div>
			</div>
			<div class='row'>
			<div class='col-sm-12'>
			<h3><p>$content</p></h3>
			</div>
			</div>
			<br>
			<a href='single1.php?job_id=$job_id' style='float:right;'>
			<button class='btn btn-info'> view
			</button>
			</a>
			<br>
			</div>
			<div class='col-sm-3'>
			</div>
			</div><br><br>
			";
		
	}
}
elseif ($gov_tech=='yes' && $gov_non_tech=='no' && $pri_tech=='yes' && $pri_non_tech=='no') {
	

	$get_posts="SELECT * FROM job WHERE type_of_job='gov_tech' OR type_of_job='pri_tech' ORDER BY 1 DESC LIMIT $start_from,$per_page  ";
	$run_posts = mysqli_query($conn,$get_posts);

	while ($row_posts = mysqli_fetch_array($run_posts)) {
		$job_id = $row_posts['job_id'];
		$user_id = $row_posts['user_id'];
		$type_of_job = $row_posts['type_of_job'];
		$content =substr($row_posts['job'], 0,40);
		$post_date=$row_posts['j_date'];

		$user = "SELECT * FROM users WHERE user_id=$user_id AND post='yes'";
		$run_user = mysqli_query($conn,$user);
		$row_user = mysqli_fetch_array($run_user);
		$user_name = $row_user['user_name'];
		$user_image =$row_user['user_image'];
		

			echo "
			<div class='row'>
			<div class= 'col-sm-3'>
			</div>
			<div id='posts' class='col-sm-6'>
			<div class='row'>
			<div class='col-sm-2'>
			<p><img src='users/$user_image' class='img-circle' width='100px' height='100px'>
			</p>
			</div>
			<div class ='col-sm-6'>
			<h3>
			<a style='text-decocation:none; cursor:pointer; color=#3897e0;' href='user_profile.php?u_id=$user_id'> $user_name </a>
			</h3>

			<h4>
			<small style='color:black;'>updated on: <strong>$post_date</strong></small>
			</h4>
			</div>
			<div class='col-sm-4'>
			</div>
			</div>
			<div class='row'>
			<div class='col-sm-12'>
			<h3><p>$content</p></h3>
			</div>
			</div>
			<br>
			<a href='single1.php?job_id=$job_id' style='float:right;'>
			<button class='btn btn-info'> view
			</button>
			</a>
			<br>
			</div>
			<div class='col-sm-3'>
			</div>
			</div><br><br>
			";
		
	}
}elseif ($gov_tech=='yes' && $gov_non_tech=='yes' && $pri_tech=='no' && $pri_non_tech=='yes') {
	

	$get_posts="SELECT * FROM job WHERE type_of_job='gov_tech' OR type_of_job='gov_non_tech' OR type_of_job='pri_non_tech' ORDER BY 1 DESC LIMIT $start_from,$per_page  ";
	$run_posts = mysqli_query($conn,$get_posts);

	while ($row_posts = mysqli_fetch_array($run_posts)) {
		$job_id = $row_posts['job_id'];
		$user_id = $row_posts['user_id'];
		$type_of_job = $row_posts['type_of_job'];
		$content =substr($row_posts['job'], 0,40);
		$post_date=$row_posts['j_date'];

		$user = "SELECT * FROM users WHERE user_id=$user_id AND post='yes'";
		$run_user = mysqli_query($conn,$user);
		$row_user = mysqli_fetch_array($run_user);
		$user_name = $row_user['user_name'];
		$user_image =$row_user['user_image'];
		

			echo "
			<div class='row'>
			<div class= 'col-sm-3'>
			</div>
			<div id='posts' class='col-sm-6'>
			<div class='row'>
			<div class='col-sm-2'>
			<p><img src='users/$user_image' class='img-circle' width='100px' height='100px'>
			</p>
			</div>
			<div class ='col-sm-6'>
			<h3>
			<a style='text-decocation:none; cursor:pointer; color=#3897e0;' href='user_profile.php?u_id=$user_id'> $user_name </a>
			</h3>

			<h4>
			<small style='color:black;'>updated on: <strong>$post_date</strong></small>
			</h4>
			</div>
			<div class='col-sm-4'>
			</div>
			</div>
			<div class='row'>
			<div class='col-sm-12'>
			<h3><p>$content</p></h3>
			</div>
			</div>
			<br>
			<a href='single1.php?job_id=$job_id' style='float:right;'>
			<button class='btn btn-info'> view
			</button>
			</a>
			<br>
			</div>
			<div class='col-sm-3'>
			</div>
			</div><br><br>
			";
		
	}
}elseif ($gov_tech=='yes' && $gov_non_tech=='no' && $pri_tech=='no' && $pri_non_tech=='yes') {
	

	$get_posts="SELECT * FROM job WHERE type_of_job='gov_tech' OR type_of_job='pri_non_tech' ORDER BY 1 DESC LIMIT $start_from,$per_page  ";
	$run_posts = mysqli_query($conn,$get_posts);

	while ($row_posts = mysqli_fetch_array($run_posts)) {
		$job_id = $row_posts['job_id'];
		$user_id = $row_posts['user_id'];
		$type_of_job = $row_posts['type_of_job'];
		$content =substr($row_posts['job'], 0,40);
		$post_date=$row_posts['j_date'];

		$user = "SELECT * FROM users WHERE user_id=$user_id AND post='yes'";
		$run_user = mysqli_query($conn,$user);
		$row_user = mysqli_fetch_array($run_user);
		$user_name = $row_user['user_name'];
		$user_image =$row_user['user_image'];
		

			echo "
			<div class='row'>
			<div class= 'col-sm-3'>
			</div>
			<div id='posts' class='col-sm-6'>
			<div class='row'>
			<div class='col-sm-2'>
			<p><img src='users/$user_image' class='img-circle' width='100px' height='100px'>
			</p>
			</div>
			<div class ='col-sm-6'>
			<h3>
			<a style='text-decocation:none; cursor:pointer; color=#3897e0;' href='user_profile.php?u_id=$user_id'> $user_name </a>
			</h3>

			<h4>
			<small style='color:black;'>updated on: <strong>$post_date</strong></small>
			</h4>
			</div>
			<div class='col-sm-4'>
			</div>
			</div>
			<div class='row'>
			<div class='col-sm-12'>
			<h3><p>$content</p></h3>
			</div>
			</div>
			<br>
			<a href='single1.php?job_id=$job_id' style='float:right;'>
			<button class='btn btn-info'> view
			</button>
			</a>
			<br>
			</div>
			<div class='col-sm-3'>
			</div>
			</div><br><br>
			";
		
	}
}elseif ($gov_tech=='yes' && $gov_non_tech=='no' && $pri_tech=='yes' && $pri_non_tech=='yes') {
	

	$get_posts="SELECT * FROM job WHERE type_of_job='gov_tech' OR type_of_job='pri_non_tech' OR type_of_job='pri_tech' ORDER BY 1 DESC LIMIT $start_from,$per_page  ";
	$run_posts = mysqli_query($conn,$get_posts);

	while ($row_posts = mysqli_fetch_array($run_posts)) {
		$job_id = $row_posts['job_id'];
		$user_id = $row_posts['user_id'];
		$type_of_job = $row_posts['type_of_job'];
		$content =substr($row_posts['job'], 0,40);
		$post_date=$row_posts['j_date'];

		$user = "SELECT * FROM users WHERE user_id=$user_id AND post='yes'";
		$run_user = mysqli_query($conn,$user);
		$row_user = mysqli_fetch_array($run_user);
		$user_name = $row_user['user_name'];
		$user_image =$row_user['user_image'];
		

			echo "
			<div class='row'>
			<div class= 'col-sm-3'>
			</div>
			<div id='posts' class='col-sm-6'>
			<div class='row'>
			<div class='col-sm-2'>
			<p><img src='users/$user_image' class='img-circle' width='100px' height='100px'>
			</p>
			</div>
			<div class ='col-sm-6'>
			<h3>
			<a style='text-decocation:none; cursor:pointer; color=#3897e0;' href='user_profile.php?u_id=$user_id'> $user_name </a>
			</h3>

			<h4>
			<small style='color:black;'>updated on: <strong>$post_date</strong></small>
			</h4>
			</div>
			<div class='col-sm-4'>
			</div>
			</div>
			<div class='row'>
			<div class='col-sm-12'>
			<h3><p>$content</p></h3>
			</div>
			</div>
			<br>
			<a href='single1.php?job_id=$job_id' style='float:right;'>
			<button class='btn btn-info'> view
			</button>
			</a>
			<br>
			</div>
			<div class='col-sm-3'>
			</div>
			</div><br><br>
			";
		
	}
}
elseif ($gov_tech=='no' && $gov_non_tech=='yes' && $pri_tech=='yes' && $pri_non_tech=='yes') {
	

	$get_posts="SELECT * FROM job WHERE type_of_job='pri_tech' OR type_of_job='gov_non_tech' OR type_of_job='pri__non_tech' ORDER BY 1 DESC LIMIT $start_from,$per_page  ";
	$run_posts = mysqli_query($conn,$get_posts);

	while ($row_posts = mysqli_fetch_array($run_posts)) {
		$job_id = $row_posts['job_id'];
		$user_id = $row_posts['user_id'];
		$type_of_job = $row_posts['type_of_job'];
		$content =substr($row_posts['job'], 0,40);
		$post_date=$row_posts['j_date'];

		$user = "SELECT * FROM users WHERE user_id=$user_id AND post='yes'";
		$run_user = mysqli_query($conn,$user);
		$row_user = mysqli_fetch_array($run_user);
		$user_name = $row_user['user_name'];
		$user_image =$row_user['user_image'];
		

			echo "
			<div class='row'>
			<div class= 'col-sm-3'>
			</div>
			<div id='posts' class='col-sm-6'>
			<div class='row'>
			<div class='col-sm-2'>
			<p><img src='users/$user_image' class='img-circle' width='100px' height='100px'>
			</p>
			</div>
			<div class ='col-sm-6'>
			<h3>
			<a style='text-decocation:none; cursor:pointer; color=#3897e0;' href='user_profile.php?u_id=$user_id'> $user_name </a>
			</h3>

			<h4>
			<small style='color:black;'>updated on: <strong>$post_date</strong></small>
			</h4>
			</div>
			<div class='col-sm-4'>
			</div>
			</div>
			<div class='row'>
			<div class='col-sm-12'>
			<h3><p>$content</p></h3>
			</div>
			</div>
			<br>
			<a href='single1.php?job_id=$job_id' style='float:right;'>
			<button class='btn btn-info'> view
			</button>
			</a>
			<br>
			</div>
			<div class='col-sm-3'>
			</div>
			</div><br><br>
			";
		
	}
}
elseif ($gov_tech=='no' && $gov_non_tech=='yes' && $pri_tech=='yes' && $pri_non_tech=='no') {
	

	$get_posts="SELECT * FROM job WHERE type_of_job='gov_non_tech' OR type_of_job='pri_tech' ORDER BY 1 DESC LIMIT $start_from,$per_page  ";
	$run_posts = mysqli_query($conn,$get_posts);

	while ($row_posts = mysqli_fetch_array($run_posts)) {
		$job_id = $row_posts['job_id'];
		$user_id = $row_posts['user_id'];
		$type_of_job = $row_posts['type_of_job'];
		$content =substr($row_posts['job'], 0,40);
		$post_date=$row_posts['j_date'];

		$user = "SELECT * FROM users WHERE user_id=$user_id AND post='yes'";
		$run_user = mysqli_query($conn,$user);
		$row_user = mysqli_fetch_array($run_user);
		$user_name = $row_user['user_name'];
		$user_image =$row_user['user_image'];
		

			echo "
			<div class='row'>
			<div class= 'col-sm-3'>
			</div>
			<div id='posts' class='col-sm-6'>
			<div class='row'>
			<div class='col-sm-2'>
			<p><img src='users/$user_image' class='img-circle' width='100px' height='100px'>
			</p>
			</div>
			<div class ='col-sm-6'>
			<h3>
			<a style='text-decocation:none; cursor:pointer; color=#3897e0;' href='user_profile.php?u_id=$user_id'> $user_name </a>
			</h3>

			<h4>
			<small style='color:black;'>updated on: <strong>$post_date</strong></small>
			</h4>
			</div>
			<div class='col-sm-4'>
			</div>
			</div>
			<div class='row'>
			<div class='col-sm-12'>
			<h3><p>$content</p></h3>
			</div>
			</div>
			<br>
			<a href='single1.php?job_id=$job_id' style='float:right;'>
			<button class='btn btn-info'> view
			</button>
			</a>
			<br>
			</div>
			<div class='col-sm-3'>
			</div>
			</div><br><br>
			";
		
	}
}
elseif ($gov_tech=='no' && $gov_non_tech=='yes' && $pri_tech=='no' && $pri_non_tech=='yes') {
	

	$get_posts="SELECT * FROM job WHERE type_of_job='gov_non_tech' OR type_of_job='pri_non_tech' ORDER BY 1 DESC LIMIT $start_from,$per_page  ";
	$run_posts = mysqli_query($conn,$get_posts);

	while ($row_posts = mysqli_fetch_array($run_posts)) {
		$job_id = $row_posts['job_id'];
		$user_id = $row_posts['user_id'];
		$type_of_job = $row_posts['type_of_job'];
		$content =substr($row_posts['job'], 0,40);
		$post_date=$row_posts['j_date'];

		$user = "SELECT * FROM users WHERE user_id=$user_id AND post='yes'";
		$run_user = mysqli_query($conn,$user);
		$row_user = mysqli_fetch_array($run_user);
		$user_name = $row_user['user_name'];
		$user_image =$row_user['user_image'];
		

			echo "
			<div class='row'>
			<div class= 'col-sm-3'>
			</div>
			<div id='posts' class='col-sm-6'>
			<div class='row'>
			<div class='col-sm-2'>
			<p><img src='users/$user_image' class='img-circle' width='100px' height='100px'>
			</p>
			</div>
			<div class ='col-sm-6'>
			<h3>
			<a style='text-decocation:none; cursor:pointer; color=#3897e0;' href='user_profile.php?u_id=$user_id'> $user_name </a>
			</h3>

			<h4>
			<small style='color:black;'>updated on: <strong>$post_date</strong></small>
			</h4>
			</div>
			<div class='col-sm-4'>
			</div>
			</div>
			<div class='row'>
			<div class='col-sm-12'>
			<h3><p>$content</p></h3>
			</div>
			</div>
			<br>
			<a href='single1.php?job_id=$job_id' style='float:right;'>
			<button class='btn btn-info'> view
			</button>
			</a>
			<br>
			</div>
			<div class='col-sm-3'>
			</div>
			</div><br><br>
			";
		
	}
}
elseif ($gov_tech=='no' && $gov_non_tech=='yes' && $pri_tech=='no' && $pri_non_tech=='no') {
	

	$get_posts="SELECT * FROM job WHERE type_of_job='gov_non_tech' ORDER BY 1 DESC LIMIT $start_from,$per_page  ";
	$run_posts = mysqli_query($conn,$get_posts);

	while ($row_posts = mysqli_fetch_array($run_posts)) {
		$job_id = $row_posts['job_id'];
		$user_id = $row_posts['user_id'];
		$type_of_job = $row_posts['type_of_job'];
		$content =substr($row_posts['job'], 0,40);
		$post_date=$row_posts['j_date'];

		$user = "SELECT * FROM users WHERE user_id=$user_id AND post='yes'";
		$run_user = mysqli_query($conn,$user);
		$row_user = mysqli_fetch_array($run_user);
		$user_name = $row_user['user_name'];
		$user_image =$row_user['user_image'];
		

			echo "
			<div class='row'>
			<div class= 'col-sm-3'>
			</div>
			<div id='posts' class='col-sm-6'>
			<div class='row'>
			<div class='col-sm-2'>
			<p><img src='users/$user_image' class='img-circle' width='100px' height='100px'>
			</p>
			</div>
			<div class ='col-sm-6'>
			<h3>
			<a style='text-decocation:none; cursor:pointer; color=#3897e0;' href='user_profile.php?u_id=$user_id'> $user_name </a>
			</h3>

			<h4>
			<small style='color:black;'>updated on: <strong>$post_date</strong></small>
			</h4>
			</div>
			<div class='col-sm-4'>
			</div>
			</div>
			<div class='row'>
			<div class='col-sm-12'>
			<h3><p>$content</p></h3>
			</div>
			</div>
			<br>
			<a href='single1.php?job_id=$job_id' style='float:right;'>
			<button class='btn btn-info'> view
			</button>
			</a>
			<br>
			</div>
			<div class='col-sm-3'>
			</div>
			</div><br><br>
			";
		
	}
}elseif ($gov_tech=='no' && $gov_non_tech=='no' && $pri_tech=='yes' && $pri_non_tech=='yes') {
	

	$get_posts="SELECT * FROM job WHERE type_of_job='pri_non_tech' OR type_of_job='pri_tech' ORDER BY 1 DESC LIMIT $start_from,$per_page  ";
	$run_posts = mysqli_query($conn,$get_posts);

	while ($row_posts = mysqli_fetch_array($run_posts)) {
		$job_id = $row_posts['job_id'];
		$user_id = $row_posts['user_id'];
		$type_of_job = $row_posts['type_of_job'];
		$content =substr($row_posts['job'], 0,40);
		$post_date=$row_posts['j_date'];

		$user = "SELECT * FROM users WHERE user_id=$user_id AND post='yes'";
		$run_user = mysqli_query($conn,$user);
		$row_user = mysqli_fetch_array($run_user);
		$user_name = $row_user['user_name'];
		$user_image =$row_user['user_image'];
		

			echo "
			<div class='row'>
			<div class= 'col-sm-3'>
			</div>
			<div id='posts' class='col-sm-6'>
			<div class='row'>
			<div class='col-sm-2'>
			<p><img src='users/$user_image' class='img-circle' width='100px' height='100px'>
			</p>
			</div>
			<div class ='col-sm-6'>
			<h3>
			<a style='text-decocation:none; cursor:pointer; color=#3897e0;' href='user_profile.php?u_id=$user_id'> $user_name </a>
			</h3>

			<h4>
			<small style='color:black;'>updated on: <strong>$post_date</strong></small>
			</h4>
			</div>
			<div class='col-sm-4'>
			</div>
			</div>
			<div class='row'>
			<div class='col-sm-12'>
			<h3><p>$content</p></h3>
			</div>
			</div>
			<br>
			<a href='single1.php?job_id=$job_id' style='float:right;'>
			<button class='btn btn-info'> view
			</button>
			</a>
			<br>
			</div>
			<div class='col-sm-3'>
			</div>
			</div><br><br>
			";
		
	}
}

elseif ($gov_tech=='no' && $gov_non_tech=='no' && $pri_tech=='yes' && $pri_non_tech=='no') {
	

	$get_posts="SELECT * FROM job WHERE  type_of_job='pri_tech' ORDER BY 1 DESC LIMIT $start_from,$per_page  ";
	$run_posts = mysqli_query($conn,$get_posts);

	while ($row_posts = mysqli_fetch_array($run_posts)) {
		$job_id = $row_posts['job_id'];
		$user_id = $row_posts['user_id'];
		$type_of_job = $row_posts['type_of_job'];
		$content =substr($row_posts['job'], 0,40);
		$post_date=$row_posts['j_date'];

		$user = "SELECT * FROM users WHERE user_id=$user_id AND post='yes'";
		$run_user = mysqli_query($conn,$user);
		$row_user = mysqli_fetch_array($run_user);
		$user_name = $row_user['user_name'];
		$user_image =$row_user['user_image'];
		

			echo "
			<div class='row'>
			<div class= 'col-sm-3'>
			</div>
			<div id='posts' class='col-sm-6'>
			<div class='row'>
			<div class='col-sm-2'>
			<p><img src='users/$user_image' class='img-circle' width='100px' height='100px'>
			</p>
			</div>
			<div class ='col-sm-6'>
			<h3>
			<a style='text-decocation:none; cursor:pointer; color=#3897e0;' href='user_profile.php?u_id=$user_id'> $user_name </a>
			</h3>

			<h4>
			<small style='color:black;'>updated on: <strong>$post_date</strong></small>
			</h4>
			</div>
			<div class='col-sm-4'>
			</div>
			</div>
			<div class='row'>
			<div class='col-sm-12'>
			<h3><p>$content</p></h3>
			</div>
			</div>
			<br>
			<a href='single1.php?job_id=$job_id' style='float:right;'>
			<button class='btn btn-info'> view
			</button>
			</a>
			<br>
			</div>
			<div class='col-sm-3'>
			</div>
			</div><br><br>
			";
		
	}
}
elseif ($gov_tech=='no' && $gov_non_tech=='no' && $pri_tech=='no' && $pri_non_tech=='yes') {
	

	$get_posts="SELECT * FROM job WHERE type_of_job='pri_non_tech' ORDER BY 1 DESC LIMIT $start_from,$per_page  ";
	$run_posts = mysqli_query($conn,$get_posts);

	while ($row_posts = mysqli_fetch_array($run_posts)) {
		$job_id = $row_posts['job_id'];
		$user_id = $row_posts['user_id'];
		$type_of_job = $row_posts['type_of_job'];
		$content =substr($row_posts['job'], 0,40);
		$post_date=$row_posts['j_date'];

		$user = "SELECT * FROM users WHERE user_id=$user_id AND post='yes'";
		$run_user = mysqli_query($conn,$user);
		$row_user = mysqli_fetch_array($run_user);
		$user_name = $row_user['user_name'];
		$user_image =$row_user['user_image'];
		

			echo "
			<div class='row'>
			<div class= 'col-sm-3'>
			</div>
			<div id='posts' class='col-sm-6'>
			<div class='row'>
			<div class='col-sm-2'>
			<p><img src='users/$user_image' class='img-circle' width='100px' height='100px'>
			</p>
			</div>
			<div class ='col-sm-6'>
			<h3>
			<a style='text-decocation:none; cursor:pointer; color=#3897e0;' href='user_profile.php?u_id=$user_id'> $user_name </a>
			</h3>

			<h4>
			<small style='color:black;'>updated on: <strong>$post_date</strong></small>
			</h4>
			</div>
			<div class='col-sm-4'>
			</div>
			</div>
			<div class='row'>
			<div class='col-sm-12'>
			<h3><p>$content</p></h3>
			</div>
			</div>
			<br>
			<a href='single1.php?job_id=$job_id' style='float:right;'>
			<button class='btn btn-info'> view
			</button>
			</a>
			<br>
			</div>
			<div class='col-sm-3'>
			</div>
			</div><br><br>
			";
		
	}
}
elseif ($gov_tech=='no' && $gov_non_tech=='no' && $pri_tech=='no' && $pri_non_tech=='no') {
	

		
			echo "
			<div class='row'>
			<div class= 'col-sm-3'>
			</div>
			<div id='posts' class='col-sm-6'>
			<div class='row'>
			<div class ='col-sm-6'>
			<h3>
			Please change your job preferences in your profile 
			</h3>

			
			</div>
			
			</div>
			
			</div>
			
			</div><br><br>
			";
		
	}



include("pagination_job.php");
}function single_post(){
	if (isset($_GET['job_id'])) {
		global $conn;
		$get_id=$_GET['job_id'];
		$get_posts="SELECT * FROM job WHERE job_id='$get_id'";
		$run_posts=mysqli_query($conn,$get_posts);
		$row_posts=mysqli_fetch_array($run_posts);
		$post_id=$row_posts['job_id'];
		$user_id=$row_posts['user_id'];
		$content=$row_posts['job'];
		$post_date=$row_posts['j_date'];


		$user="SELECT * FROM users WHERE user_id='$user_id' AND post='yes'";
		$run_user=mysqli_query($conn,$user);
		$row_user=mysqli_fetch_array($run_user);
		$user_name=$row_user['user_name'];
		$user_image=$row_user['user_image'];
		$user_com=$_SESSION['user_email'];
		$get_com="SELECT * FROM users WHERE user_email='$user_com'";
		$run_com=mysqli_query($conn,$get_com);
		$row_com=mysqli_fetch_array($run_com);
		$user_com_id=$row_com['user_id'];
		$user_com_name=$row_com['user_name'];

		if (isset($_GET['post_id'])) {
		  $post_id=$_GET['post_id'];
		}

		$get_posts="SELECT post_id FROM  users WHERE post_id='$post_id'";
		$run_user=mysqli_query($conn,$get_posts);
		$post_id=$_GET['job_id'];
		$post=$_GET['job_id'];
		$get_user="SELECT * FROM job WHERE job_id='$post'";
		$run_user=mysqli_query($conn,$get_user);
		$row=mysqli_fetch_array($run_user);

		$p_id=$row['job_id'];

		if ($p_id!=$post_id) {
			echo "<script>alert('Error')</script>";
			echo "<script>Window.open('alumni.php','_self')</script>";
		}
		else{
			echo "
			<div class='row'>
			<div class= 'col-sm-3'>
			</div>
			<div id='posts' class='col-sm-6'>
			<div class='row'>
			<div class='col-sm-2'>
			<p><img src='users/$user_image' class='img-circle' width='100px' height='100px'>
			</p>
			</div>
			<div class ='col-sm-6'>
			<h3>
			<a style='text-decocation:none; cursor:pointer; color=#3897e0;' href='user_profile.php?u_id=$user_id'> $user_name </a>
			</h3>

			<h4>
			<small style='color:black;'>updated on: <strong>$post_date</strong></small>
			</h4>
			</div>
			<div class='col-sm-4'>
			</div>
			</div>
			<div class='row'>
			<div class='col-sm-12'>
			<h3><p>$content</p></h3>
			</div>
			</div>
			<br>
			
			<br>
			</div>
			<div class='col-sm-3'>
			</div>
			</div><br><br>
			";
		}
		include("comments_job.php");

		echo "<div class='row'>
		<div class='col-md-6 col-md-offset-3'>
		<div class='panel panel-info'>
		<div class='panel-body'>
		<form action='' method='post' class='form-inline'>
		<textarea placeholder ='Add your comment here' class='pd-cmnt-textarea' name='comment'>
		</textarea>
		<button class='btn btn-info' pull-right name='reply'>comment
		</button>
		</form>
		</div>
		</div>
		</div>
		</div>";

		if (isset($_POST['comment'])) {
			$comment=htmlentities($_POST['comment']);
			if ($comment=="") {
				
			echo "<script>alert('Enter your comment!')</script>";
			echo "<script>Window.open('single1.php?post_id=$post_id','_self')</script>";
			}
		else{
			$insert= "INSERT INTO comments_job (post_id,user_id,comment,comment_author,c_date) VALUES ('$post_id','$user_id','$comment','$user_com_name',NOW())";

			$run=mysqli_query($conn,$insert);

			echo "<script>alert('Your comment has been added')</script>";
			echo "<script>Window.open('single1.php?post_id=$post_id','_self')</script>";
		}
	  }
	}
}

?>