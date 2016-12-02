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
		<h3 class="form-header">osiris amenity registration</h3>
		<form method="post" action='newentryconfirmation.php' id='new-entry-form'>

			<?php
				print "<p class='error-message'>$message</p>"
			?>

			<div class="form-section-divs">
				<input id='amenity-desc' class='form-input-1-cols' placeholder="Amenity Description" type="text" name='amenity' required="">

				<input id='form-submit' class='form-input-1-cols' type='submit' name='newamenitysubmit' value='Submit'>
			</div>

		</form>
	</div>

</div>


<?php
	include '../01-modules/footer.php';
?>
