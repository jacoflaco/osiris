<!--
	 Project: Osiris Resorts & Destinations
   Filename: login.php
	 Creation Date: 10/15/2016

   Author: Jake Handwork
	 Modification Date: 10/18/2016
-->

<?php session_start();
	require_once '00-utility/functions.php';
	require_once '00-utility/mail/mail.class.php';
	require_once '00-utility/dbconnect.php';
	require_once '00-utility/userSessionVerify.php';

	$message = '';
	$message2 = '';

	//if send a message was pressed
	if(isset($_POST['contactsubmit'])) {
		$usermessage = trim($_POST['contactmessage']);

		$adminemail = "jakeah122@gmail.com";
		$firstname = "Jake";

		$contactmessage = "User ID: ".$_SESSION['activeuser']['UserID']."<br>First Name: ".$_SESSION['activeuser']['FirstName']."<br>Last Name: ".$_SESSION['activeuser']['LastName']."<br>Message: ".$usermessage;

		//used to be able to stylize link in email
		$headers  = 'MIME-Version: 1.0' . "\r\n";
		$headers .= 'Content-type: text/html; charset=iso-8859-1' . "\r\n";

		$subject = "User Contact Message";

		$body = $contactmessage;
		$mailer = new Mail();
		if (($mailer->sendMail($adminemail, $firstname, $subject, $body, $headers))==true)
			$message = "Hi";
		else $msg = "Email not sent. " . $email.' '. $firstname.' '. $subject.' '. $body;

		header("location: contact.php?contact=1");
	}
	else if(isset($_GET['contact'])) {
		include '01-modules/header.php';
		?>
		<div class="form-container">
			<div id="form-wrapper">
				<h3 class="form-header">contact us</h3>

				<?php print "<p class='form-message'>Your message has been successfully sent. We will respond as soon as possible!</p>"; ?>

			</div>
		</div>
		<?php
		include '01-modules/footer.php';

	}
	else {
		include '01-modules/header.php';
		?>

		<div class="form-container">
			<div id="form-wrapper">
				<h3 class="form-header">contact us</h3>

				<?php print "<p class='form-message'>$message<br>$message2</p>"; ?>

				<form method="post" action='contact.php' id='contactform'>

					<div class="form-section-divs">
						<textarea id='text-area' class='form-textarea-1-cols' rows='15' placeholder='Please type your message here' name='contactmessage' required></textarea>
						<!-- <input id='login-email' class='form-input-1-cols' placeholder="Username (Email)" type="text" name='email' required="">
						<input id='login-password' class='form-input-1-cols' placeholder="Password" type="password" name='password' required=""> -->

						<input id='form-submit' class='form-input-1-cols' type='submit' name='contactsubmit' value='Send'>
					</div>



				</form>
			</div>

		</div>
		<?php
		include '01-modules/footer.php';
	}
?>
