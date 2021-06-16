<?php
	
	require 'includes/connection.php';
	session_start();
	if(isset($_REQUEST['uid'])){
		$token = $_REQUEST['uid'];
		$dd = mysqli_query($conn,"select user_id from users WHERE token = '$token'");
		
		if(mysqli_num_rows($dd)>0)
		{
			$succ = "true";	
			$ty = mysqli_fetch_array($dd);
			
			
			$_SESSION['id'] = $ty['user_id'];
		}
		else
		{
			$err = "Reset link is invalid";
		}
	}
	if (isset($_POST['submit']))
	{
		$pass1 = $_POST['pass1'];
		$pass2 = $_POST['pass2'];


		
		if ($pass1 != $pass2)
		{
			echo "<script>alert('Password does not match');</script>";
		}
		else if (strlen($pass1) < 6)
		{
			echo "<script>alert('Password must be 6 character long');</script>";
		}
		else
		{
			$id = $_SESSION['id'];
			$fm = mysqli_query($conn,"update users set user_pass='$pass1' where user_id = '$id'");
		    header("location:login.php?reset=true");
		}
	}

?>

<html>
<head>
<meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
 <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/js/bootstrap.min.js"></script>

<title>Untitled Document</title>
<!--<link href="re.css" rel="stylesheet" type="text/css" />-->
<link href="https://fonts.googleapis.com/css?family=Play" rel="stylesheet">
<script type="text/javascript">
function valid()
{
var a=document.getElementById('u_pass').value;
var b=document.getElementById('u_pass1').value;
if (a==" ") {
    alert("enter password");
    return false;
}
if (a!=b) {
    alert("passwords do not match ");
    return false;
}
}
</script>
    <style>
	.active {
  background-color: #4CAF50;
}
li a:hover:not(.active) {
  background-color: #111;
}
body
{overflow-x:hidden;
	background-image: url(images/bkg4.jpg);
background-size:cover;
font-family:  "montserrat",sans-serif;
}
*{margin:0px; padding:0px; font-family: cursive;
	
}
a
{
    color: yellow;
    text-decoration: blink;
    font-family: Tahoma, Geneva, sans-serif;
    
}
.reset
{
   width:340px; background:rgba(44, 62, 80, 0.9);color:white; text-align:center;
	margin:auto;
	margin-top:80px;
	height:auto;
	border-radius:10px;
	padding:40px;
}
.input_group input
{width: 240px;
    text-align: center;
    background: transparent;
    border: none;
    border-bottom: 1px solid #fff;
    font-family: 'Play', sans-serif;
    font-size: 16px;
    font-weight: 200px;
    padding: 10px 0;
    transition: border 0.5s;
    outline: none;
    color: #fff;
}


input[type=submit]
{
    border: none;
    width: 190px;
    background: white;
    color: #000;
    font-size: 16px;
    line-height: 25px;
    padding: 10px 0;
    border-radius: 15px;
    cursor: pointer;
}
input[type=submit]:hover
{
    color: #fff;
    background-color: black;
}
h2
{
    color: white;
    
}
a
{
    color: yellow;
    text-decoration: blink;
}
a:hover
{
    color: skyblue;
}

::placeholder {
    color:aliceblue;
    opacity: 0.8; /* Firefox */
}

@media(max-width:480px)
{.register{
	width95%;
}
	}
@media(min-width:481px) and(max-width:768px)
{.register{
	width95%;
}
	}	
	



</style>
 <style>
    
    #msg {
    visibility: hidden;
    min-width: 250px;
    background-color:yellow;
    color: #000;
    text-align: center;
    border-radius: 2px;
    padding: 16px;
    position: fixed;
    z-index: 1;
    right: 30%;
    top: 50px;
    font-size: 17px;
	margin-right:30px;
}

#msg.show {
    visibility: visible;
    -webkit-animation: fadein 0.5s, fadeout 0.5s 2.5s;
    animation: fadein 0.5s, fadeout 0.5s 2.5s;
}


.change
{
    animation: change 4s infinite;
}
@keyframes change 
{
    0%
    {
        color: black;
    }
     25%
    {
        color: royalblue;
    }
     50%
    {
        color: orange;
    }
     100%
    {
        color: white;
    }
}

</style>
</head>
</head>
<div class="row">
	<div class="col-sm-12">
	<div class="row" style="background-color:#6b5b95;heignt:80px;">
    <div class="col-sm-4" style="top: 5px; font-family: cursive; font-size: 25px;left:10px;color:white;">
      MIT Framily
      </div>
    <div class="col-sm-8" style="top: 0px; font-family: cursive; font-size: 20px;">
      <nav class="nav navbar-pills" style="background-color:rgb(100,150,400);";width="100px">
      <!-- Brand and toggle get grouped for better mobile display -->
       <div class="navbar-header">
            <button type="btn" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#UpperNav" aria-expanded="false">
       <!-- <span class="sr-only">Toggle navigation</span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>-->
		        <span class="glyphicon glyphicon-align-justify"></span>
           </button>
            <!--  <a class="navbar-brand" href="#">Brand/WebsiteName</a>//Not Required here-->
       </div>
	   <div class="collapse navbar-collapse" id="UpperNav">
         <ul class="nav nav-justified">
             
		     <li class="dropdown" style="color:white"  id="menu02">
			 
                <a href="mit_framily.html" style="color:white;">Home 
		        </a>
                
             </li>
		     <li class="dropdown" style="color:white"  id="menu03">
				<a href="#"  style="color: white;">Career</a>
				
            </li>
			<li class="dropdown" style="color:white"  id="menu04">
				<a href="image_gallery.php"  style="color: white;">Campus Life</a>

				
				
            </li>
		    <li class="active" class="dropdown" style="color:white"  id="menu05">
				<a  href="index.php"  style="color: white;"> Login </a>
				
            </li>
      </ul>
    </div><!-- /.navbar-collapse -->
	</nav>
     </div>
    
	  
	  </div>
</div>
		</div>
	</div>
</div>

<body>
<div class="reset">
<form action="reset_password.php" method="POST" onSubmit="return valid();" enctype="multipart/form-data" >
<h2 align="center" style="color:#fff;">Reset password</h2>
<div class="input_group">
<input type="password" name="pass1" placeholder="New password" /><br /><br />
</div>
<div class="input_group">
<input type="password" name="pass2" placeholder="Confirm new password" /><br /><br />
</div>
<input type="submit" name="submit" value="Save" onclick="myFunction()"/><br /><br />
<a href="logn.html" style="text-decoration:none;">Go back to Home page</a><br /><br />
<div id="msg">Your password changed successfully!!</div>

<script>
function myFunction() {
    var x = document.getElementById("msg");
    x.className = "show";
    setTimeout(function(){ x.className = x.className.replace("show", ""); }, 3000);
}
</script>
</form>
</div>
</body>
</html>
