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
	require_once '../00-utility/sessionVerify.php';

	$message = '';
	$message2 = '';

	//if user already filled in login info
	if(isset($_POST['changesubmit'])) {
		//store input into variables and trim whitespace
		$password = trim($_POST['password']);
		$newpassword = trim($_POST['newpassword']);

		$uid = $_SESSION['activeuser']['UserID'];

		//escape strings
		$password = mysqli_real_escape_string($con, $password);
		$newpassword = mysqli_real_escape_string($con, $newpassword);

		//hash the password to interact with database
		$password = sha1($password);
		$newpassword = sha1($newpassword);

		//store the password from the user info where the email matches the one submitted
		$passwordquery = mysqli_query($con, "select password from O_USER where userid = '$uid'");
		$passwordoutput = mysqli_fetch_array($passwordquery);
		$dbPassword = $passwordoutput['password'];

		//verify that the username and password match the login info and store in session variables and redirect to the welcome page
		if ($dbPassword === $password){

			$query = "update O_USER set password = '$newpassword' where userid = '$uid'";

			$check = mysqli_query($con, $query);

			if(!$check) {
				die("<p class='form-error'>Could not enter data: " . mysql_error() . "</p>");
			}

			$_SESSION['activeuser']['password'] = $newpassword;
			$message = "Your password has been successfully changed.";

      header("location:welcome.php");

		}
	}

?>

<?php
	include '01-modules/header.php';
?>

<div class="form-container">
	<div id="form-wrapper">
		<h3 class="form-header">osiris member login</h3>

		<?php print "<p class='form-message'>$message<br>$message2</p>"; ?>

		<form method="post" action='changepassword.php' id='changepasswordform'>

			<div class="form-section-divs">
				<input id='change-password' class='form-input-1-cols' placeholder="Password" type="password" name='password' required="">
				<input id='change-newpassword' class='form-input-1-cols' placeholder="New Password" type="password" name='newpassword' required="">

				<input id='form-submit' class='form-input-1-cols' type='submit' name='changesubmit' value='Change Password'>

			</div>



		</form>
	</div>

</div>


<?php
	include '01-modules/footer.php';
?>
