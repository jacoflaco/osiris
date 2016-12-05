<!--
	 Project: Osiris Resorts & Destinations
   Filename: login.php
	 Creation Date: 10/15/2016

   Author: Jake Handwork
	 Modification Date: 10/18/2016
-->

<?php session_start();
	require_once '../00-utility/functions.php';
	require_once '../00-utility/mail/mail.class.php';
	require_once '../00-utility/dbconnect.php';
	require_once '../00-utility/sessionVerify.php';

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

		if($month == 2 && $day > 29) {
				print "<p class='form-message'>You have entered February ".$day." as your birthday.
				This is not a real date. Please return and enter a real date.</p>";
		}
		else if(($month == 9 OR $month == 4 OR $month == 6 OR $month == 11) && $day > 30) {
				print $day;
				print "<p class='form-message'>You have entered the 31st of a month with 30 days as your birthday.
				This is not a real date. Please return and enter a real date.</p>";
		}
		else {
			$dob = $year . '-' . $month . '-' . $day;
			if($phone <= 9999999999){

				if(validateDate($month, $day, $year)) {
					if(validateEmail($email) && validateEmail($confirmemail) && $email === $confirmemail) {
						if(validatePassword($password)){
							if($password === $confirmpassword){

								$query = mysqli_query($con, "select UserID from O_USER where Email = '".$email."'");
								$userids = Array();
								while ($row = mysqli_fetch_array($query)) {
									$userids[] = $row[0];
								}

								if(sizeof($userids) == 0) {
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

									$body = "Hello $firstname.<br><br>This is a notice that an Admin at Osiris Destinations & Resorts has registered you as a member on our website. We thank you for becoming a member. To verify that you requested this, your activation code is $activationcode. Please click on the following link to activate your account and login.<br><br><a href='http://corsair.cs.iupui.edu:20111/osiris/current/activation.php?activationcode=$activationcode'>Activate</a><br><br>Welcome to Osiris and have a great day!<br><br>Jake Handwork<br>Chief Exeecutive Officer<br>Osiris Destinations & Resorts";

									$mailer = new Mail();
									if (($mailer->sendMail($email, $firstname, $subject, $body, $headers))==true)
										$message = "Hello $firstname,<br><br>Thank you for becoming a member of Osiris Destinations & Resorts. Your activation code is $activationcode. Please click on the following link to activate your account and login.<br><br><a href='http://corsair.cs.iupui.edu:20111/current/current/activation.php?activationcode=$activationcode'>Activate</a><br><br>Welcome to Osiris and have a great day!<br><br>Jake Handwork<br>Chief Executive Officer<br>Osiris Destinations & Resorts";
									else $msg = "Email not sent. " . $email.' '. $firstname.' '. $subject.' '. $body;
								}
								else {
									print "<p class='form-message'>A user has already been registered with that email. Please go back and enter a different email address.</p>";
								}
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
				}
				else {
					print "<p class='form-message'>Please enter a valid birth date in the format: MM DD YYYY</p>";
				}
			}
			else {
				print "<p class='form-message'>Please enter a valid 10 digit phone number in the format: XXXXXXXXX.";
			}
		}
		?>

	</div>

</div>

<?php
	include '../01-modules/footer.php';
?>
