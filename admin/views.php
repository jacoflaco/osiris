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
	require_once '../00-utility/sessionVerify.php';

	include '../01-modules/adminheader.php';
?>

<div class="form-container">
	<div id="form-wrapper">
		<h3 class="form-header">osiris views</h3>


			<div class="form-section-divs">

				<a class='mainbuttons button-1-cols' href='viewadmins.php'>Admins</a>
				<a class='mainbuttons button-1-cols' href='viewinvoices.php'>Invoices</a>
				<a class='mainbuttons button-1-cols' href='viewhotels.php'>Hotels</a>
				<a class='mainbuttons button-1-cols' href='viewreservations.php'>Reservations</a>
				<a class='mainbuttons button-1-cols' href='viewusers.php'>Users</a>


			</div>



		</form>
	</div>

</div>


<?php
	include '../01-modules/footer.php';
?>
