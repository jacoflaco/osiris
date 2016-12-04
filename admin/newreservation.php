<!--
	 Project: Osiris Resorts & Destinations
   Filename: register.php
	 Creation Date: 10/15/2016

   Author: Jake Handwork
	 Modification Date: 10/18/2016
-->

<?php session_start();
	require_once '../00-utility/functions.php';
	require_once '../00-utility/dbconnect.php';
	require_once '../00-utility/sessionVerify.php';

	include '../01-modules/adminheader.php';

	$message = '';
?>

<div class="form-container">

	<div id="form-wrapper">
		<h3 class="form-header">create reservation</h3>
		<form method="post" action='newentryconfirmation.php' id='new-entry-form'>

			<?php
				print "<p class='error-message'>$message</p>"
			?>

			<div class="form-section-divs">
				<input id='register-fname' class='form-input-3-cols' placeholder="First Name" type="text" name='firstname' required="">
				<input id='register-lname' class='form-input-3-cols' placeholder="Last Name" type="text" name='lastname' required="">
				<input id='register-email' class='form-input-3-cols' placeholder="Email" type="email" name='email' required="">
			</div>

			<div class="form-section-divs">
				<select class='form-dropdown-material form-select-4-cols' name='accomodation' required>
					<option value='' disabled selected>Accomodations</option>
					<?php
						$accomodationsSQL = "select RoomTypeID, Description from O_ROOM_TYPE";
						$getaccomodations = mysqli_query($con, $accomodationsSQL);
						while($row1 = mysqli_fetch_array($getaccomodations)) {
							echo "<option value='".$row1['RoomTypeID']."'>".$row1['Description']."</option>";
						}
					?>
				</select>
				<select class='form-dropdown-material form-select-4-cols' name='hotel' required>
					<option value='' disabled selected>Hotel</option>
					<?php
						$hotelsSQL = "select HotelID, HotelName from O_HOTEL";
						$gethotels = mysqli_query($con, $hotelsSQL);
						while($row2 = mysqli_fetch_array($gethotels)) {
							echo "<option value='".$row2['HotelID']."'>".$row2['HotelName']."</option>";
						}
					?>
				</select>
				<select class='form-dropdown-material form-select-4-cols' name='resort' required>
					<option value='' disabled selected>Resort</option>
					<?php
						$resortsSQL = "select ResortID, City, State, Country from O_RESORT";
						$getresorts = mysqli_query($con, $resortsSQL);
						while($row3 = mysqli_fetch_array($getresorts)) {
							echo "<option value='".$row3['ResortID']."'>".$row3['City'].", ".$row3['State'].", ".$row3['Country']."</option>";
						}
					?>
				</select>
				<input id='number-of-rooms' class='form-input-1-cols' placeholder="Number Of Rooms" type="number" name='numberofrooms' min='1' max='5' required="">
			</div>

			<div class="form-section-divs">
				<h4 class='form-label'>Amenities</h4></br>
				<?php
					$amenitiesSQL = "select AmenityID, AmenityDescription from O_AMENITY";
					$getamenities = mysqli_query($con, $amenitiesSQL);
					while($row4 = mysqli_fetch_array($getamenities)) {
						echo "<input class='amenity-checkboxes form-checkboxes-1-cols' type='checkbox' name='amenities[]'
									value='".$row4['AmenityID']."'>";

						echo "<label class='amenity-checkbox-label'>".$row4['AmenityDescription']."</label>";
					}
				?>
			</div>

			<div class='form-section-divs'>
				<input id='checkin' class='form-input-2-cols' type='date' name='checkin'>
				<input id='checkout' class='form-input-2-cols' type='date' name='checkout'>
			</div>

			<div class="form-section-divs">
				<input id='form-submit' class='form-input-1-cols' type='submit' name='newreservationsubmit' value='Submit'>
			</div>

		</form>
	</div>

</div>


<?php
	include '../01-modules/footer.php';
?>
