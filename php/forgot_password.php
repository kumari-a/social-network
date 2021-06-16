<?php 
	require 'dbcon.php' ; 
	if(isset($_POST['commit'])){

		echo $email = $_POST['user']['email'];

		$query="SELECT password FROM persons WHERE email = '$email'";
		$run = mysqli_query($con, $query);
		$num_rows = mysqli_num_rows($run);
		if( $num_rows >= 1)
		{ 
			require '../phpmailer/PHPMailerAutoload.php';
			$data = mysqli_fetch_assoc($run);
			//echo $data['password'];
			//die();
			$visitor_email = $email;
			$email_subject = "Forgot Password";
			$email_body = "<h5>Hi,<br/> Greetings from Mahabharti.online<br/>.
			You recently requested for your password on Mahabharti.online<br/> Your password is: </h5><br/>".$data['password']."<br><a href='https://mahabharti.online'>Please login with your password</a>.<br/>Regard's <br/> ParikshaPlus Academy's Mahabharti.online <br/> (Don't share your password with anyone)";

			$jkmail = new PHPMailer;
			$jkmail->isSMTP();
			$jkmail->Host = 'ssl://smtp.gmail.com';
			$jkmail->Port = 465;
			$jkmail->SMTPAuth = true;
			$jkmail->SMTPSecure = 'tls';
				
			$jkmail->Username = 'bishalprashant00@gmail.com';
			$jkmail->Password = '';//Use the password for gmail account	
			$jkmail->setFrom('bishalprashant00@gmail.com', $email_subject);
			
			$jkmail->addAddress($visitor_email);
			$jkmail->addReplyTo($visitor_email);

			$jkmail->isHTML(true);
			$jkmail->Subject = $email_subject;
			$jkmail->Body = $email_body ;
		    if (!$jkmail->send()) {
			    echo "Mailer Error: " . $jkmail->ErrorInfo;
			} else {
			    echo '<div class="row jumbotron">
                        <div class="col-4">Password has been sent to your email.</div>
                        <div class="col-4"><a href="/index.php"><button type="button" class="btn btn-success">HOME</button></a></div>
                        <div class="col-4"></div>
                    </div>';
			}
		} else {
			echo "Sorry no users found";
		}
	}
?>
