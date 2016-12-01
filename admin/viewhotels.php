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

	$query = "select * from O_VW_HOTELS";
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
	<h3 class="report-header">view hotels</h3>


		<div class="report-transparent-container">

			<table id='datatables'>
	      <thead>
	        <tr>
	          <td>Resort Hotel ID</td>
	          <td>Hotel Name</td>
	          <td>City</td>
	          <td>State</td>
	          <td>Country</td>
	        </tr>
	      </thead>

	      <tbody>
	        <?php
	          while($row = mysqli_fetch_array($result)) {
	            ?>
	            <tr>
								<td><?php print $row['ResortHotelID']; ?></td>
	              <td><?php print $row['HotelName']; ?></td>
	              <td><?php print $row['City']; ?></td>
	              <td><?php print $row['State']; ?></td>
	              <td><?php print $row['Country']; ?></td>
	            </tr>
	            <?php
	          }
	        ?>
	      </tbody>

	      <tfoot>
	        <tr>
						<td>Resort Hotel ID</td>
	          <td>Hotel Name</td>
	          <td>City</td>
	          <td>State</td>
	          <td>Country</td>
	        </tr>
	      </tfoot>

	    </table>


		</div>
	</div>

</div>


<?php
	include '../01-modules/footer.php';
?>
