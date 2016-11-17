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
?>

<?php
	include '../01-modules/adminheader.php';
?>

<div class="form-container">
	<div id="form-wrapper">
		<h3 class="form-header">osiris views</h3>


			<div class="form-section-divs">

				<a class='mainbuttons button-2-cols' href='viewadmin.php'>Admin</a>
				<a class='mainbuttons button-2-cols' href='viewbill.php'>Bill</a>
				<a class='mainbuttons button-2-cols' href='viewhotel.php'>Hotel</a>
				<a class='mainbuttons button-2-cols' href='viewpaymentdetails.php'>Payment Details</a>
				<a class='mainbuttons button-2-cols' href='viewreservation.php'>Reservation</a>
				<a class='mainbuttons button-2-cols' href='viewreservationdetails.php'>Reservation Details</a>
				<a class='mainbuttons button-2-cols' href='viewuser.php'>User</a>


			</div>



		</form>
	</div>

</div>


<?php
	include '../01-modules/footer.php';
?>
