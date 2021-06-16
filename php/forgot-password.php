<?php 
	require 'includes/connection.php' ; 
	if(isset($_POST['submit'])){
		echo $email = $_POST['username'];
		
		function getToken($length){
		 $token = "";
		 $codeAlphabet = "ABCDEFGHIJKLMNOPQRSTUVWXYZ";
		 $codeAlphabet.= "abcdefghijklmnopqrstuvwxyz";
		 $codeAlphabet.= "0123456789";
		 $max = strlen($codeAlphabet); // edited

		for ($i=0; $i < $length; $i++) {
			$token .= $codeAlphabet[random_int(0, $max-1)];
		}

		return $token;
		}
		
		$token = getToken(30);

		$query="UPDATE users SET token = '$token' WHERE user_email = '$email'";
		$run = mysqli_query($conn, $query);
		if( mysqli_affected_rows($conn) )
		{ 
			require 'phpmailer/PHPMailerAutoload.php';
			$data = "Hello beta";
			$visitor_email = $email;
			$email_subject = "Forgot Password";
			$link = '127.0.0.1/social_network/reset_password.php?uid='.$token;
			$email_body = '<a href="'.$link.'">To reset your password click here</a>';

			$jkmail = new PHPMailer;
			$jkmail->isSMTP();
			$jkmail->Host = 'ssl://smtp.gmail.com';
			$jkmail->Port = 465;//465
			$jkmail->SMTPAuth = true;
			$jkmail->SMTPSecure = 'tls';
				
			$jkmail->Username = 'framily.studentbody@gmail.com';
			$jkmail->Password = 'abhi_framily';//Use the password for gmail account	
			$jkmail->setFrom('siddharthbuddy99@gmail', $email_subject);
			
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
