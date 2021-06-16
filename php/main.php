<!DOCTYPE html>
<html>
<head>
	<title>
		Framily login and sign up
	</title>
	  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/js/bootstrap.min.js"></script>
<style >

	body
	{
		overflow-x:hidden;
		font-family:Tahoma, Geneva, sans-serif ;
	}

	#centered1{
		position: absolute;
		font-size: 10px;
		top: 30%;
		left: 30%;
		transform: translate(-50%.-50%);
	}
	#centered2{
		position: absolute;
		font-size: 10px;
		top: 50%;
		left: 40%;
		transform: translate(-50%.-50%);
	}
	#centered3{
		position: absolute;
		font-size: 10px;
		top: 70%;
		left: 50%;
		transform: translate(-50%.-50%);
	}

	#signup{
		width: 60%;
		border-radius: 30px;
	}

	#login{
		width: 60%;
		background-color:#fff;
		border : 1px solid #1da1f2;
		color: #1da1f2;
		border-radius: 30px;
	}
	#login:hover{
		width: 60%;
		background-color: #fff;
		border : 1px solid #1da1f2;
		color: #1da1f2;
		border-radius: 30px;
	}

	.well{
		background-color:rgba(44,60,80,0.7);
	
		
	}

</style>
<body style="font-family: cursive;">
<div class="row">
	<div class="col-sm-12">
		<div class="well">
			<div class="container">
  <div class="row" >
    <div class="col-sm-4">
      <font face="Algerian"><h1 style="color: white;">MIT Framily</h1></font>
      </div>
    <div class="col-sm-8" style="top: 15px; font-family: cursive; font-size: 20px;">
      <nav class="nav navbar-pills" style="background-color:none;";width="100px">
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
			 
                <a href="mit_framily.html" style="color: white;">Home 
		        </a>
                
             </li>
		     <li class="dropdown" style="color:white"  id="menu03">
				<a href="#"  style="color: white;">Career</a>
				
            </li>
			<li class="dropdown" style="color:white"  id="menu04">
				<a href="image_gallery.php"  style="color: white;">Campus Life</a>

				
				
            </li>
		    <li class="dropdown" style="color:white"  id="menu05">
				<a  href="index.php"  style="color: white;"> Register/Loin </a>
				
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
<div class="row">
	<div class="col-sm-6" style="left: 0.5%">
		<img src=" images/trees.jpeg" class="img-rounded" title="framily" width="650px" height="500px">
		<div id="centered1" class="centered">
			<h3 style="color: white">
				<span class="googleapis">&nbsp&nbsp<strong>connect with alumni</strong></span>
			</h3>
			
		</div>
				<div id="centered2" class="centered">
			<h3 style="color: white">
				<span class="googleapis">&nbsp&nbsp<strong>connect with peers</strong></span>
			</h3>
			
		</div>
				<div id="centered3" class="centered">
			<h3 style="color: white">
				<span class="googleapis">&nbsp&nbsp<strong>Join the framily</strong></span>
			</h3>
			
		</div>

	</div>
	<div class="col-sm-6" style="left: 50%:">
			<img src="images/logo.jpeg" class="img-rounded" width="80px" height="80px">
			<br>

			<h2><strong>stay connected</strong></h2>
			<br>
			<br>
			<h4><strong>Join the framily</strong></h4>
			<br>
			<br>
			<form method="post" action="">
				<button id="signup" class="btn btn-info btn-lg" name="signup">sign up</button>
				<?php
				if (isset($_POST['signup'])) {
					# code...
					echo "<script>window.open('register.php','_self')</script>";
				}
				?>
				<br>
				<br>
				<button id="login" class="btn btn-info btn-lg" name="login">Log in</button>
				<?php
				if (isset($_POST['login'])) {
					# code...
					echo "<script>window.open('login.php','_self')</script>";
				}
				?>
			</form>
		</div>
</div>
</body>
</html>