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
		<h3 class="form-header">create resort</h3>
		<form method="post" action='newentryconfirmation.php' id='new-entry-form'>

			<?php
				print "<p class='error-message'>$message</p>"
			?>

			<div class="form-section-divs">
				<input id='street-number' class='form-input-2-cols' placeholder="Street Number" type="number" name='streetnumber' required="">
				<input id='street-name' class='form-input-2-cols' placeholder="Street Name" type="text" name='streetname' required="">
			</div>

			<div class='form-section-divs'>
				<input id='city' class='form-input-4-cols' placeholder="City" type="text" name='city' required="">
				<input id='state' class='form-input-4-cols' placeholder="State" type="text" name='state' required="">
				<input id='country' class='form-input-4-cols' placeholder="Country" type="text" name='country' required="">
				<input id='street-name' class='form-input-4-cols' placeholder="Zip Code" type="number" name='zipcode' required="">
			</div>

			<div class='form-section-divs'>
				<input id='form-submit' class='form-input-1-cols' type='submit' name='newresortsubmit' value='Create'>
			</div>

		</form>
	</div>

</div>


<?php
	include '../01-modules/footer.php';
?>
