<!--
	 Project: Osiris Resorts & Destinations
   Filename: login.php
	 Creation Date: 10/15/2016

   Author: Jake Handwork
	 Modification Date: 10/18/2016
-->

<?php
	require_once '00-utility/functions.php';
	require_once '00-utility/mail/mail.class.php';
	require_once '00-utility/dbconnect.php';
	require_once '00-utility/userSessionVerify.php';

	include '01-modules/header.php';
?>
<?php
if(isset($_POST['forgotsubmit'])) {

	//store input into variables and trim whitespace
	$email = trim($_POST['email']);

	//escape strings
	$email = mysqli_real_escape_string($con, $email);

	//generate new password
	$newpassword = randomPasswordGenerator(10);

	//used to be able to stylize link in email
	$headers  = 'MIME-Version: 1.0' . "\r\n";
	$headers .= 'Content-type: text/html; charset=iso-8859-1' . "\r\n";

	$subject = "Osiris Forgotten Password";

	$get = mysqli_query($con, "select * from O_USER where email = '$email'") or die(mysql_error());

	$_SESSION['forgotpassword'] = mysqli_fetch_assoc($get);

	$name = $_SESSION['forgotpassword']['FirstName'];
	$body = "Hello, $name.<br><br>You have submitted a request to change your password. Here is a temporary password $newpassword. Please click on the following link to login with this password. Afterwards, click on your name in the top right corner and choose the 'Change Password' link. There enter your temporary password in the first field and your new password in the second.<br><br><a href='http://corsair.cs.iupui.edu:20111/osiris/current/login.php'>Change Password</a><br><br>Jake Handwork<br>Chief Executive Officer<br>Osiris Destinations & Resorts";

	$mailer = new Mail();
	if (($mailer->sendMail($email, $name, $subject, $body, $headers))==true)
		$message = "Hello, $name.<br><br>You have submitted a request to change your password. Here is a temporary password $newpassword. Please click on the following link to login with this password. Afterwards, click on your name in the top right corner and choose the 'Change Password' link. There enter your temporary password in the first field and your new password in the second.<br><br><a href='http://corsair.cs.iupui.edu:20111/osiris/current/login.php'>Change Password</a><br><br>Jake Handwork<br>Chief Executive Officer<br>Osiris Destinations & Resorts";
	else $msg = "Email not sent. " . $email.' '. $name.' '. $subject.' '. $body;

	//hash password and update database after sending email
	$newpassword = sha1($newpassword);

	$query = "update O_USER set password = '$newpassword' where email = '$email'";

	$check = mysqli_query($con, $query);

	if(!$check) {
		die("<p class='form-error'>Could not enter data: " . mysql_error() . "</p>");
	}

}
?>
<div class="form-container">

	<div class="report-transparent-container">
			<p class='form-message'>You have been sent an email with your temporary password. Please take a look at the email and follow the steps given.</p>

	</div>

</div>


<?php
	include '01-modules/footer.php';
?>
