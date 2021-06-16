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
<!--<link href="forget.css" rel="stylesheet" type="text/css" />-->"
<link href="https://fonts.googleapis.com/css?family=Play" rel="stylesheet">
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
.forget
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
<div class="row">
	<div class="col-sm-12">
	<div class="row" style="background-color:#6b5b95;heignt:80px;margin-top:-20px;">
    <div class="col-sm-4" style="top: 5px; font-family: cursive; font-size:25px;left:10px;color:white;">
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
<div class="forget">

<form method="POST" action="forgot-password.php">

<h2 align="center" style="color:#fff;">Forgot password</h2><br>
<h5 style="font-size:14px; color:yellow;">Enter email here that you used on your account.We send link on your email to reset your password.</h5>
<div class="input_group">
<input type="text" name="username" placeholder="Enter your email" /><br /><br />
</div>
<input type="submit" name="submit" value="Send" onclick="myFunction()"/><br /><br />
<a href="login.php" style="text-decoration:none; text-align:center;">Go back to Home page</a><br /><br />

<div id="msg">Link send on your email successfully!!</div>

</form>
</div>
<script>
function myFunction() {
    var x = document.getElementById("msg");
    x.className = "show";
    setTimeout(function(){ x.className = x.className.replace("show", ""); }, 3000);
}
</script>
</body>
</html>
