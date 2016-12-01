<!--
	 Project: Osiris Resorts & Destinations
   Filename: login.php
	 Creation Date: 10/15/2016

   Author: Jake Handwork
	 Modification Date: 10/18/2016
-->

<?php session_start();
	require_once '../00-utility/functions.php';
	require_once '../00-utility/mail/mail.class.php';
	require_once '../00-utility/dbconnect.php';

	include '../01-modules/adminheader.php';
?>

<div class="form-container">

	<div class="report-transparent-container">
		<?php
			//if new hotel is created
			if(isset($_POST['newhotelsubmit'])) {
				$hotelname = trim($_POST['hotelname']);
				$hotelnumrooms = trim($_POST['hotelnumrooms']);

				$hotelname = mysqli_real_escape_string($con, $hotelname);
				$hotelnumrooms = mysqli_real_escape_string($con, $hotelnumrooms);

				$sql = "insert into O_HOTEL values(null, '".$hotelname."', '".$hotelnumrooms."')";

				$query = mysqli_query($con, $sql);

				//if couldn't insert, print error
				if(!$query) {
					die("<p class='form-error'>Could not enter data: " . mysql_error() . "</p>");
				}
				else {
					print "<p class='form-message'>The following hotel has been registered in the database.</p>";
					print "
						<div class='report-data-container'>
							<table id='registration-info-report'>
								<tr>
									<td class='form-field'>Hotel Name: </td>
									<td class='form-input'>$hotelname</td></tr>
								<tr>
									<td class='form-field'>Number of Rooms: </td>
									<td class='form-input'>$hotelnumrooms</td></tr>
							</table>
						</div>";
				}
			}
		?>

	</div>

</div>


<?php
	include '../01-modules/footer.php';
?>
