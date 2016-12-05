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

	$query = "select * from O_VW_RESERVATIONS";
  $result = mysqli_query($con, $query);

  $result_array = array();
?>

<script type="text/javascript" charset="utf-8">
	$(document).ready(function() {
		var table = $('#datatables').DataTable({
			"scrollY":        "300px",
			"scrollCollapse": true,
			"paging":         false
		});
	})
</script>

<div class="form-container">

	<div id="report-wrapper">
	<h3 class="report-header">reservations to be invoiced</h3>
		<div class="report-transparent-container">

			<table id='datatables'>
	      <thead>
	        <tr>
	          <td>Reservation ID</td>
	          <td>First Name</td>
	          <td>Last Name</td>
	          <td>Hotel</td>
						<td>Country</td>
						<td>Reservation Date</td>
						<td>Price</td>
						<td># of Rooms</td>
						<td>Check In</td>
						<td>Check Out</td>
	        </tr>
	      </thead>

	      <tbody>
	        <?php
	          while($row = mysqli_fetch_array($result)) {
	            ?>
	            <tr>
								<td><?php print $row['ReservationID']; ?></td>
	              <td><?php print $row['FirstName']; ?></td>
	              <td><?php print $row['LastName']; ?></td>
	              <td><?php print $row['HotelName']; ?></td>
								<td><?php print $row['Country']; ?></td>
								<td><?php print $row['ReservationDate']; ?></td>
								<td><?php print $row['Price']; ?></td>
								<td><?php print $row['NumberOfRooms']; ?></td>
								<td><?php print $row['CheckIn']; ?></td>
								<td><?php print $row['CheckOut']; ?></td>
	            </tr>
	            <?php
	          }
	        ?>
	      </tbody>

	      <tfoot>
	        <tr>
						<td>Reservation ID</td>
	          <td>First Name</td>
	          <td>Last Name</td>
	          <td>Hotel Name</td>
						<td>Country</td>
						<td>Reservation Date</td>
						<td>Price</td>
						<td># of Rooms</td>
						<td>Check In</td>
						<td>Check Out</td>
	        </tr>
	      </tfoot>

	    </table>


		</div>
	</div>

	<div id="form-wrapper">
		<form method="post" action='newentryconfirmation.php' id='new-entry-form'>

			<?php
				print "<p class='error-message'>$message</p>"
			?>

			<div class="form-section-divs">
				<input id='reservation-id' class='form-input-1-cols' placeholder="Reservation ID" type="text" name='reservationid' required="">
				<p class="form-clarification-message">Please enter the Reservation ID of the reservation you want to invoice</p>

				<input id='form-submit' class='form-input-1-cols' type='submit' name='newinvoicesubmit' value='Submit'>
			</div>

		</form>
	</div>

</div>


<?php
	include '../01-modules/footer.php';
?>
