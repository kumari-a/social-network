<html>
<head>
<meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Framily Login</title>
<link href="login.css" rel="stylesheet" type="text/css" />
<link href="https://fonts.googleapis.com/css?family=Play" rel="stylesheet">
<style>

*{margin:0px; padding:0px; font-family: cursive;
	
}
body
{background-image: url(images/bkg4.jpg);
 background-size:cover;
font-family:  "montserrat",sans-serif;
	}

.top
{
    overflow: hidden;
    clear: both;
    
}
header
{
    overflow: hidden;
    height: 100%;
}

.title
{
    position: absolute;
    height: 60px;
    width: 100%;
    background-color: #6b5b95;
}
.name
{
    margin: 14px 30px;
    height: 60px;
    float: left;
    color: #fff;
    font-size: 25px;
    text-transform: uppercase;
}
.menu
{
    margin:20px;
    float: right;
    list-style: none;
}
.menu li
{
    display: inline-block;
    margin: 0 5px;
}
.menu li a
{
    padding: 5px 10px;
    text-decoration: none;
    color: #fff;
    letter-spacing: 2px;
}
.menu li.active a{
    color:skyblue;
}
.menu li a:hover
{
     color: skyblue;
     transition: 0.5s;
}
.front-text
{
    position: absolute;
    top: 42%;
    left: 18%;
    text-align: center;
}
.front-text h2
{
    margin:0;
    color: #fff;
    font-size: 40px;
}
.front-text p
{
    color: #fff;
     font-size: 18px;
}
.btn
{
    background-color: black;
    border:none;
    color: #fff;
    padding: 10px 30px;
    font-size: 15px;
    text-transform: uppercase;
    border-radius: 25px;
    display: inline-block;
    margin-top: 25px;
    cursor: pointer;
    font-weight: bold;
    font-family:  "montserrat",sans-serif;
}
.btn:hover
{
    color: black;
    background-color: skyblue;
    transition: 0.5s;
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
<header class="top">
	  <div class="title">
            <div class="name">MIT Framily</div>
            <ul class="menu">
                <li class="active"><a href="mit_framily.html">Home</a></li>
                <li><a href="#">Career</a></li>
                <li><a href="image_gallery.php">Campus Life</a></li>
                <li><a href="index.php">Register</a></li>
                
            </ul>
        </div>

        
    </header>
<body style="font-family: cursive;">
	 
<div class="register">
<form method="post" action="signin.php">
<h2 style="color:#fff;">Log in</h2>
<input type="text" name="email" placeholder="E-mail" autocomplete="off"/><br /><br />
<input type="password" name="pass" placeholder="Password" autocomplete="off"/><br /><br />
<input type="text"  name="vercode" maxlength="5" autocomplete="off" required style="width: 150px; height: 25px;" placeholder="captcha" />&nbsp;<img src="captcha.php"><br><br>
<input type="submit" value="Log in" name="login" />
<br /><br />
</form>
<div id="container">
<!--<a href="reset.html" style=" margin-right:0px; font-size:13px; font-family:Tahoma, Geneva, sans-serif;">Reset password?</a>-->
    <a href="forgot_password.php" title="Reset Password" style=" margin-left:30px; font-size:13px; font-family:Tahoma, Geneva, sans-serif;">Forget password?</a>
    </div><br /><br /><center>
Don't have account?<a href="register.php" title="Create Account" style="font-family:'Play', sans-serif;">&nbsp;Register</a></center>
</div>
</body>
</html>