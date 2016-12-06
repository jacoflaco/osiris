<!--
	 Project: Osiris Resorts & Destinations
   Filename: login.php
	 Creation Date: 10/15/2016

   Author: Jake Handwork
	 Modification Date: 10/18/2016
-->

<?php session_start();
	require_once '../00-utility/functions.php';
	require_once '../00-utility/dbconnect.php';

	$_SESSION['timeout'] = time();

	$message = '';
	$message2 = '';

	//if the user is already logged in
	if(isset($_SESSION['admin'])) {
		header('location: adminhome.php');
	}

	//if user already filled in login info
	if(isset($_POST['loginsubmit'])) {
		//store input into variables and trim whitespace
		$email = trim($_POST['email']);
		$password = trim($_POST['password']);

		//escape strings
		$email = mysqli_real_escape_string($con, $email);
		$password = mysqli_real_escape_string($con, $password);

		//hash the password to interact with database
		$password = sha1($password);

		//store the email from the user info where the password matches the one submitted
		$emailquery = mysqli_query($con, "select email from O_ADMIN where password = '$password'");
		$emailoutput = mysqli_fetch_array($emailquery);
		$dbEmail = $emailoutput['email'];

		//store the password from the user info where the email matches the one submitted
		$passwordquery = mysqli_query($con, "select password from O_ADMIN where email = '$email'");
		$passwordoutput = mysqli_fetch_array($passwordquery);
		$dbPassword = $passwordoutput['password'];

		//verify that the username and password match the login info and store in session variables and redirect to the welcome page
		if ($dbEmail === $email){

			if ($dbPassword === $password){
				$_SESSION['adminEmail'] = $dbEmail;
				$_SESSION['adminPpassword'] = $dbPassword;

				//store the email from the user info where the password matches the one submitted
				$get = mysqli_query($con, "select * from O_ADMIN where email = '$email' AND password = '$password' ") or die(mysql_error());

				$_SESSION['admin'] = mysqli_fetch_assoc($get);

				header("Location: adminhome.php");

			}
			//counting login attempts
			else {
				$message = "This is not the password registered with this email. Please enter the password that you registered with.";
				if (isset($_SESSION['count'])) {
					if ($_SESSION['count'] >= 3) {
						$message2 = "Access Denied for 15 Seconds.";
						$_SESSION['count'] = 0;
					}
					else {
						$message2 = "You have tried to log in " . $_SESSION['count'] . " times.";
						++$_SESSION['count'];
					}
				}
				else {
					$_SESSION['count'] = 1;
					$message = "";
				}
			}
		}
	}

?>

<?php
	include '../01-modules/adminheader.php';
?>

<div class="form-container">
	<div id="form-wrapper">
		<h3 class="form-header">osiris admin login</h3>

		<?php print "<p class='form-message'>$message<br>$message2</p>"; ?>

		<form method="post" action='login.php' id='loginform'>

			<div class="form-section-divs">
				<input id='login-email' class='form-input-1-cols' placeholder="Username (Email)" type="text" name='email' required="">
				<input id='login-password' class='form-input-1-cols' placeholder="Password" type="password" name='password' required="">

				<input id='form-submit' class='form-input-1-cols' type='submit' name='loginsubmit' value='Log In'>

				<a href="forgotpassword.php" class="after-form-links">Forgot Password?</a>
			</div>



		</form>
	</div>

</div>


<?php
	include '../01-modules/footer.php';
?>
