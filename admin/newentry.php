<!--
	 Project: Osiris Resorts & Destinations
   Filename: login.php
	 Creation Date: 10/15/2016

   Author: Jake Handwork
	 Modification Date: 10/18/2016
-->

<?php session_start();
	require_once '../00-utility/functions.php';
	require_once '../00-utility/sessionVerify.php';

	include '../01-modules/adminheader.php';
?>

<div class="form-container">
	<div id="form-wrapper">
		<h3 class="form-header">osiris new data</h3>


			<div class="form-section-divs">

				<a class='mainbuttons button-2-cols' href='newadmin.php'>Admin</a>
				<a class='mainbuttons button-2-cols' href='newamenity.php'>Amenity</a>
				<a class='mainbuttons button-2-cols' href='newhotel.php'>Hotel</a>
				<a class='mainbuttons button-2-cols' href='newinvoice.php'>Invoice</a>
				<a class='mainbuttons button-2-cols' href='newpaymentdetails.php'>Payment Details</a>
				<a class='mainbuttons button-2-cols' href='newreservation.php'>Reservation</a>
				<a class='mainbuttons button-2-cols' href='newreservationdetails.php'>Reservation Details</a>
				<a class='mainbuttons button-2-cols' href='newresort.php'>Resort</a>
				<a class='mainbuttons button-2-cols' href='newresorthotels.php'>Resort Hotel</a>
				<a class='mainbuttons button-2-cols' href='newroom.php'>Room</a>
				<a class='mainbuttons button-2-cols' href='newroomamenities.php'>Room Amenity</a>
				<a class='mainbuttons button-2-cols' href='newroomtype.php'>Room Type</a>
				<a class='mainbuttons button-2-cols' href='newroomtypequantities.php'>Room Type Quantities</a>
				<a class='mainbuttons button-2-cols' href='newuser.php'>User</a>


			</div>



		</form>
	</div>

</div>


<?php
	include '../01-modules/footer.php';
?>
