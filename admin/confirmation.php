<!--
	 Project: Osiris Resorts & Destinations
   Filename: login.php
	 Creation Date: 10/15/2016

   Author: Jake Handwork
	 Modification Date: 10/18/2016
-->

<?php
	require_once '../00-utility/functions.php';
	require_once '../00-utility/mail/mail.class.php';
	require_once '../00-utility/dbconnect.php';

	include '../01-modules/adminheader.php';
?>

<div class="form-container">

	<div class="report-transparent-container">
		<?php

				$firstname = trim($_POST['firstname']);
				$lastname = trim($_POST['lastname']);
				$email = trim($_POST['email']);
				$confirmemail = trim($_POST['confirmemail']);
				$password = trim($_POST['password']);
				$confirmpassword = trim($_POST['confirmpassword']);
				$month = trim($_POST['month']);
				$day = trim($_POST['day']);
				$year = trim($_POST['year']);
				$phone = trim($_POST['phone']);
				$dob = $year . '-' . $month . '-' . $day;

				if(validateEmail($email) && validateEmail($confirmemail) && $email === $confirmemail) {
					if(validatePassword($password)){
						if($password === $confirmpassword){

							$activationcode = randomCodeGenerator(20);

							print "<p class='form-message'>You have registered successfully! Please check your email for an activation link and further directions.</p>";
							print "
								<div class='report-data-container'>
									<table id='registration-info-report'>
										<tr>
											<td class='form-field'>First Name: </td>
											<td class='form-input'>$firstname</td></tr>
										<tr>
											<td class='form-field'>Last Name: </td>
											<td class='form-input'>$lastname</td></tr>
										<tr>
											<td class='form-field'>Email: </td>
											<td class='form-input'>$email</td></tr>
										<tr>
											<td class='form-field'>Date of Birth: </td>
											<td class='form-input'>$dob</td></tr>
										<tr>
											<td class='form-field'>Phone Number: </td>
											<td class='form-input'>$phone</td></tr>
										<tr>
											<td class='form-field'>Activation Code: </td>
											<td class='form-input'>$activationcode</td></tr>
									</table>
								</div>";

							//escape strings
							$firstname = mysqli_real_escape_string($con, $firstname);
							$lastname = mysqli_real_escape_string($con, $lastname);
							$email = mysqli_real_escape_string($con, $email);
							$confirmemail = mysqli_real_escape_string($con, $confirmemail);
							$password = mysqli_real_escape_string($con, $password);
							$confirmpassword = mysqli_real_escape_string($con, $confirmpassword);
							$phone = mysqli_real_escape_string($con, $phone);
							$dob = mysqli_real_escape_string($con, $dob);

							//hash password
							$password = sha1($password);

							//insert all of the information from the registration page
							$sql = "insert into O_USER values(null, '".$firstname."', '".$lastname."', '".$email."', '".$password."', '".$dob."', '".$phone."', '".$activationcode."', 0)";

							$check = mysqli_query($con, $sql);

							//if couldn't insert, print error
							if(!$check) {
								die("<p class='form-error'>Could not enter data: " . mysql_error() . "</p>");
							}

							//used to be able to stylize link in email
							$headers  = 'MIME-Version: 1.0' . "\r\n";
							$headers .= 'Content-type: text/html; charset=iso-8859-1' . "\r\n";

							$subject = "Osiris Account Activation";

							$body = "Hello $firstname.<br><br>Thank you for becoming a member of Osiris Destinations & Resorts. Your activation code is $activationcode. Please click on the following link to activate your account and login.<br><br><a href='http://corsair.cs.iupui.edu:20111/osiris/current/activation.php?activationcode=$activationcode'>Activate</a><br><br>Welcome to Osiris and have a great day!<br><br>Jake Handwork<br>Chief Exeecutive Officer<br>Osiris Destinations & Resorts";
							$mailer = new Mail();
							if (($mailer->sendMail($email, $firstname, $subject, $body, $headers))==true)
								$message = "Hello $firstname.<br><br>Thank you for becoming a member of Osiris Destinations & Resorts. Your activation code is $activationcode. Please click on the following link to activate your account and login.<br><br><a href='http://corsair.cs.iupui.edu:20111/osiris/current/activation.php?activationcode=$activationcode'>Activate</a><br><br>Welcome to Osiris and have a great day!<br><br>Jake Handwork<br>Chief Exeecutive Officer<br>Osiris Destinations & Resorts";
							else $msg = "Email not sent. " . $email.' '. $firstname.' '. $subject.' '. $body;

						}
						else {
							print "<p class='form-message'>Please double check that your password and confirm password fields are indentical.</p>";
						}
					}
					else {
						print "<p class='form-message'>Please double check that your password is at least 10 characters and contains at least 1 letter and 1 digit.</p>";
					}
				}
				else {
					print "<p class='form-message'>Please verify that your email is valid and your confirm email is identical.</p>";
				}

		?>

	</div>

</div>


<?php
	include '../01-modules/footer.php';
?>
