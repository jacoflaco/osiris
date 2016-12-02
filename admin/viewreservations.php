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

	$query = "select * from O_VW_RESERVATIONS";
  $result = mysqli_query($con, $query);

  $result_array = array();
?>

<script type="text/javascript" charset="utf-8">
	$(document).ready(function() {
		var table = $('#datatables').DataTable({
			"scrollY":        "500px",
			"scrollCollapse": true,
			"paging":         false
		});
	})
</script>

<div class="report-container">

	<div id="report-wrapper">
	<h3 class="report-header">view reservations</h3>


		<div class="report-transparent-container">

			<table id='datatables'>
	      <thead>
	        <tr>
	          <td>Reservation ID</td>
	          <td>First Name</td>
	          <td>Last Name</td>
	          <td>Room #</td>
	          <td>Hotel</td>
						<td>City</td>
						<td>State</td>
						<td>Country</td>
						<td>Admin ID</td>
						<td>Date of Res</td>
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
	              <td><?php print $row['RoomNumber']; ?></td>
	              <td><?php print $row['HotelName']; ?></td>
								<td><?php print $row['City']; ?></td>
								<td><?php print $row['State']; ?></td>
								<td><?php print $row['Country']; ?></td>
								<td><?php print $row['AdminID']; ?></td>
								<td><?php print $row['DateOfReservation']; ?></td>
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
	          <td>Room #</td>
	          <td>Hotel</td>
						<td>City</td>
						<td>State</td>
						<td>Country</td>
						<td>Admin ID</td>
						<td>Date of Res</td>
						<td>Price</td>
						<td># of Rooms</td>
						<td>Check In</td>
						<td>Check Out</td>
	        </tr>
	      </tfoot>

	    </table>


		</div>
	</div>

</div>


<?php
	include '../01-modules/footer.php';
?>
