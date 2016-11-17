<!--
	 Project: Osiris Resorts & Destinations
   Filename: login.php
	 Creation Date: 10/15/2016

   Author: Jake Handwork
	 Modification Date: 10/18/2016
-->

<?php session_start();

	require_once '00-utility/functions.php';
	require_once '00-utility/dbconnect.php';

	$message = '';
	$message2 = '';

	if(isset($_GET['activationcode'])) {
		$activationcode = trim($_GET['activationcode']);

		if(validateCode($activationcode)) {

			$activateUser = "update O_USER set isactivated = b'1' where activationcode = '$activationcode'";

			$check = mysqli_query($con, $activateUser);

			if(!$check) {
				die("<p class='form-error'>Could not enter data: " . mysql_error() . "</p>");
			}

			$message = "Your account has been activated. Please click the button below to login.";

      header("Location:login.php");
		}
		else {
			$message = "For some reason, your code did not validate automatically. Please follow <a href='activation.php'>this link</a> to enter your code manually.";
		}
	}
?>

<!-- print page if no activation code -->
<?php
	include '01-modules/header.php';
?>

<div class="form-container">
	<div id='form-wrapper'>
		<h3 class='form-header'>osiris member activation</h3>

		<p class='form-message'>$message</p>

		<form method='post' action='login.php' id='activationform'>

			<div class='form-section-divs'>
				<input id='activate-activationcode' class='form-input-1-cols' placeholder='Activation Code' type='text' name='activationcode' required=''>

				<input id='form-submit' class='form-input-1-cols' type='submit' name='activatesubmit' value='Submit'>

				<a href='login.php' class='after-form-links'>Already activated?</a>
				<a href='register.php' class='after-form-links'>Not Registered?</a>
			</div>

		</form>
	</div>
</div>

<?php
	include '01-modules/footer.php';
?>
