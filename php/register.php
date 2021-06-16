<html>
<head>
<meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/js/bootstrap.min.js"></script>
<title>Framily</title>
<!--<link href="register.css" rel="stylesheet" type="text/css" />-->
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
.register{
	width:50%; background:rgba(44, 62, 80, 0.9);color:white; text-align:center;
	margin:auto;
	margin-top:40px;
	height:auto;
	border-radius:10px;
	padding:auto;

}
.register div{
	width:auto; box-sizing:border-box;
}
.register input{
	height:40px;border:1px solid #222;width:auto;
}
.input_group{
	padding:8px 15px 8px 0px; display:flex; box-sizing:border-box;
}
.input_group input{
	 width:60%;
    text-align: center;
    background: transparent;
    border:1px solid #fff;
    font-family: 'Play', sans-serif;
    font-size: 14px;
    font-weight: 100px;
    padding_left: 15px;
    transition: border 0.5s;
	margin-left:15px;
    outline: none;
    color: #fff;
}
.btn1
{border:none;
 width:190px;
 background:white;
 color:#000;
 font-size: 16px;
line-height: 25px;
 padding:10px 0;
 border-radius:15px;
 cursor: pointer;

}
.btn1:hover{
    color:#fff;
    background-color:black; 
}

h2
{
    color: #000;
    
}
::placeholder {
    color:aliceblue;
    opacity: 0.8; 
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
				<a  href="index.php"  style="color: white;"> Register </a>
				
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

<div class="register"><br>
    <form action="insert_user.php" method="post" onSubmit="return valid();" enctype="multipart/form-data" >
    <h2 style="color: #fff;margin:auto;">Register</h2><br>
<div class="input_group">
	<input type="text" name="first_name" class="textInput" placeholder="First Name"  value="" required autocomplete="off" > 
     <input type="text" name="last_name" class="textInput" placeholder="Last Name"  value="" required autocomplete="off">
</div >
<div class="input_group" > 
      <input type="text" name="u_roll" class="textInput" placeholder="Registration Number(if any)" autocomplete="off">
      <input type="text" name="u_batch" class="textInput" placeholder="Batch(e.g. 2015,1996)" value="" required autocomplete="off">
</div>
<div class="input_group">  
	  <input type="email" name="u_email" class="textInput" placeholder="Email Address" value="" required autocomplete="off"> 
	  <input type="phone" name="u_mobile" class="textInput" placeholder="Mobile Number" value="" required autocomplete="off">
</div>
<div class="input_group">
	  <input type="text" name="u_branch" class="textInput" placeholder="Branch" value="" required autocomplete="off">
       <input type="password" name="u_pass" id="u_pass" class="textInput" placeholder="password" value="" required autocomplete="off">
</div>
<div class="input_group">	   
	   <input type="password" name="u_pass1" id="u_pass1" class="textInput" placeholder="Verify Password" value="" required autocomplete="off">
	  Please upload your photo for verification :
    <input type="file" name="image" value=" " required >
	</div>
	<div class="input_group">
	
  <input type="text"  name="vercode" maxlength="5" autocomplete="off" required style="width: 150px; height: 25px;" placeholder="captcha" />&nbsp;<img src="captcha.php"><br><br>
   </div> 
       <button id="signup" class=" btn1 btn-info btn-lg" name="sign_up">
						Signup
					</button><?php

					include('insert_user.php');	
					?>
					
<br><br>
        Already have account?<a href="login.php" style="text-decoration: none; font-family: 'Play', sans-serif; color: yellow;">&nbsp;Log in</a><br><br>
    </form>
    </div>
</body>
</html>
