<!--
	 Project: Osiris Resorts & Destinations
   Filename: register.php
	 Creation Date: 10/15/2016

   Author: Jake Handwork
	 Modification Date: 10/18/2016
-->

<?php session_start();
	require_once '../00-utility/functions.php';
	require_once '../00-utility/sessionVerify.php';

	include '../01-modules/adminheader.php';

	$message = '';
?>

<div class="form-container">

	<div id="form-wrapper">
		<h3 class="form-header">create admin</h3>
		<form method="post" action='newentryconfirmation.php' id='new-entry-form'>

			<?php
				print "<p class='error-message'>$message</p>"
			?>

			<div class="form-section-divs">
				<input id='register-fname' class='form-input-2-cols' placeholder="First Name" type="text" name='firstname' required="">
				<input id='register-lname' class='form-input-2-cols' placeholder="Last Name" type="text" name='lastname' required="">
			</div>

			<div class="form-section-divs">
				<input id='register-email' class='form-input-2-cols' placeholder="Email" type="email" name='email' required="">
				<input id='register-confirmemail' class='form-input-2-cols' placeholder="Confirm Email" type="email" name='confirmemail' required="">
			</div>

			<div class="form-section-divs">
				<input id='register-password' class='form-input-2-cols' placeholder="Password" type="password" name='password' required="">
				<input id='register-confirmpassword' class='form-input-2-cols' placeholder="Confirm Password" type="password" name='confirmpassword' required="">
				<p class='form-clarification-message'>Must be at least 10 characters with at least one letter and one number</p>

				<input id='form-submit' class='form-input-1-cols' type='submit' name='newadminsubmit' value='Create'>
			</div>

		</form>
	</div>

</div>


<?php
	include '../01-modules/footer.php';
?>
