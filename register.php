<!--
	 Project: Osiris Resorts & Destinations
   Filename: register.php
	 Creation Date: 10/15/2016

   Author: Jake Handwork
	 Modification Date: 10/18/2016
-->

<?php
	require_once '00-utility/functions.php';

	include '01-modules/header.php';

	$message = '';
?>

<div class="form-container">

	<div id="form-wrapper">
		<h3 class="form-header">osiris member registration</h3>
		<form method="post" action='registration_confirmation.php' id='register-form'>

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
			</div>

			<div class="form-section-divs">
				<h4 class='form-label'>Date of Birth</h4></br>
				<input id='register-month' class='form-input-3-cols' placeholder="Month" type="text" name='month' class='onethird' minlength='2' maxlength='2' required="">
				<input id='register-day' class='form-input-3-cols' placeholder="Day" type="text" name='day' class='onethird' minlength='2' maxlength='2' required="">
				<input id='register-year' class='form-input-3-cols' placeholder="Year" type="text" name='year' class='onethird' minlength='4' maxlength='4' required="">
				<p class="form-clarification-message">Please enter in format: MM DD YYYY</p>
			</div>

			<div class="form-section-divs">
				<input id='register-phone' class='form-input-1-cols' placeholder="Phone Number" type="tel" name='phone' required="">
				<p class="form-clarification-message">Please enter only numbers</p>

				<input id='form-submit' class='form-input-1-cols' type='submit' name='registersubmit' value='Submit'>
				<a href="login.php" class="after-form-links">Already Registered? Login Here</a>
			</div>
			
		</form>
	</div>

</div>


<?php
	include '01-modules/footer.php';
?>
