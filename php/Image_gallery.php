<!DOCTYPE html>
<?php
$conn= mysqli_connect("localhost" , "root" , "" , "social_network");
?>
<html>
<head>
	<title>Image Gallery</title>
	<meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/js/bootstrap.min.js"></script>
	<style >
	body
	{ background-color:rgb(222,230,237);
		overflow-x:hidden;
		font-family: cursive;
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
		background-color: #6b5b95;
	}

</style>

</head>
<body>
	<div class="row">
	<div class="col-sm-12">
		<div class="well">
			<div class="container">
  <div class="row">
    <div class="col-sm-4">
      <font face="Algerian"><h1 style="color: white;">MIT FRAMILY</h1></font>
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
				<a href="image_gallery.php"  style="color: white;">Campus Life </a>

				
				
            </li>
		    <li class="dropdown" style="color:white"  id="menu05">
				<a  href="index.php"  style="color: white;"> Regiter/Login </a>
				
            </li>
      </ul>
    </div><!-- /.navbar-collapse -->
	</nav>
     </div>
    
	  
	  </div>
</div>
		</div>
	</div>

<div class=" row">
		<div class="col-sm-1">
			
		</div>
	<?php
	$get_images="SELECT * FROM wall_images ";
  $run_images=mysqli_query($conn,$get_images);
  while ($row_images=mysqli_fetch_array($run_images)) {
    
    $img_id=$row_images['img_id'];
    $wall_image=$row_images['images'];
    
    
    echo "<img src='imagepost/$wall_image' class='img-square' width='400px' height='200px'>" ;
    echo "  ";

  }
 ?>
</div>
</body>
</html>