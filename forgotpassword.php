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

?>

<?php
include '01-modules/header.php';
?>

<div class='form-container'>
	<div id='form-wrapper'>
		<h3 class='form-header'>forgot password</h3>

		<form method='post' action='success.php' id='loginform'>

			<div class='form-section-divs'>
				<input id='login-email' class='form-input-1-cols' placeholder='Username (Email)' type='text' name='email' required=''>

				<input id='form-submit' class='form-input-1-cols' type='submit' name='forgotsubmit' value='Submit'>
			</div>

		</form>

	</div>
</div>

<?php
include '01-modules/footer.php';
 ?>
