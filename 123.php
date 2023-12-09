<!DOCTYPE html>
<html>
<head>
	<title>Send Mail Anonymously </title>
  <link rel="stylesheet" href="new.css">
</head>
<body>
  <center><h1>Send Mail Anonymously</h1>
  <p>Made By <a href="https://instagram.com/anonboy.96">Umang Patel</a></p></center>
<div class="container">
<hr>
	<?php 
		if(isset($_POST['sendmail'])) {
			require 'PHPMailerAutoload.php';
			require 'credential.php';

			$mail = new PHPMailer;

			// $mail->SMTPDebug = 4;                                  // Enable verbose debug output

			$mail->isSMTP();                                        // Set mailer to use SMTP
			$mail->Host = 'smtp-relay.brevo.com';                  // Specify main and backup SMTP servers
			$mail->SMTPAuth = true;                               // Enable SMTP authentication
			$mail->Username = 'amanwar5566@gmail.com';           // SMTP username
			$mail->Password = 'AcMmgUk7PHBYN2bG';               // SMTP password
			$mail->SMTPSecure = ($_POST['pass']);              // Enable TLS encryption, `ssl` also accepted
			$mail->Port=587;                                  // TCP port to connect to

			$mail->setFrom($_POST['From']);
			$mail->addAddress($_POST['email']);     // Add a recipient

			$mail->addReplyTo(EMAIL);
			// print_r($_FILES['file']); exit;
			for ($i=0; $i < count($_FILES['file']['tmp_name']) ; $i++) { 
				$mail->addAttachment($_FILES['file']['tmp_name'][$i], $_FILES['file']['name'][$i]);    // Optional name
			}
			$mail->isHTML(true);                                  // Set email format to HTML

			$mail->Subject = $_POST['subject'];
			$mail->Body = $_POST['message'];
      
			if(!$mail->send()) {
			    echo 'Message could not be sent.';
			    echo 'Mailer Error: ' . $mail->ErrorInfo;
			} else {
			    echo 'Message has been sent';
        echo("<meta http-equiv='refresh' content='1'>");
			}
		}
	 ?>
	<div class="row">
      <div</div>
    <div class="col-md-9 col-md-offset-2">
        <form role="form" method="post" enctype="multipart/form-data">
        	<div class="row">
                <div class="col-sm-9 form-group">
                    <label for="email">From Email:</label>
                     <input type="email" class="form-control" id="email" name="From" placeholder="Enter Email To Send" maxlength="50"><br>
      <label for="email">To Email:</label>
                    <input type="email" class="form-control" id="email" name="email" placeholder="Enter your email" maxlength="50">
                </div>
            </div>

            <div class="row">
                <div class="col-sm-9 form-group">
                    <label for="subject">Subject:</label>
                    <input type="contact" class="form-control" id="subject" name="subject" placeholder="Enter Your Subject" maxlength="50">
                </div>
            </div>
          <br>
            
            <div class="row">
                <div class="col-sm-9 form-group">
                    <label for="name">Message:</label>
                    <textarea class="form-control" type="textarea" id="message" name="message" placeholder="Your Message Here" maxlength="6000" rows="4"></textarea>
                </div>
            </div>
          <br>
            <div class="row">
                <div class="col-sm-9 form-group">
                    <label for="name">File:</label>
                    <input name="file[]" multiple="multiple" class="form-control" type="file" id="file">
                </div>
            </div>
               <br>
          
            <div class="row">
                <div class="col-sm-9 form-group">
                    <label for="subject">Key:</label>
                    <input type="password" class="form-control" id="pass" name="pass" placeholder="Enter Your key" maxlength="50" required>
                </div>
            </div>
          <br>
             <div class="row">
                <div class="col-sm-9 form-group">
                    <button type="submit" name="sendmail" class="btn btn-lg btn-success btn-block">Send</button>
                </div>
            </div>
        </form>
	</div>
</div>
</body>
</html>