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

	$query = "select * from O_VW_INVOICES";
  $result = mysqli_query($con, $query);

  $result_array = array();
?>

<script type="text/javascript" charset="utf-8">
	$(document).ready(function() {
		var table = $('#datatables').DataTable({
			"scrollY":        "25vw",
			"scrollCollapse": true,
			"paging":         false
		});
	})
</script>

<div class="report-container">

	<div id="report-wrapper">
	<h3 class="report-header">view invoices</h3>


		<div class="report-transparent-container">

			<table id='datatables'>
	      <thead>
	        <tr>
	          <td>Invoice ID</td>
						<td>Reservation ID</td>
	          <td>First Name</td>
	          <td>Last Name</td>
						<td>Price</td>
	          <td>Date of Invoice</td>
	          <td>Is Paid?</td>
	        </tr>
	      </thead>

	      <tbody>
	        <?php
	          while($row = mysqli_fetch_array($result)) {
	            ?>
	            <tr>
								<td><?php print $row['InvoiceID']; ?></td>
								<td><?php print $row['ReservationID']; ?></td>
	              <td><?php print $row['FirstName']; ?></td>
	              <td><?php print $row['LastName']; ?></td>
								<td><?php print $row['Price']; ?></td>
	              <td><?php print $row['DateOfInvoice']; ?></td>
	              <td><?php print $row['IsPaid']; ?></td>
	            </tr>
	            <?php
	          }
	        ?>
	      </tbody>

	      <tfoot>
	        <tr>
						<td>Invoice ID</td>
						<td>Reservation ID</td>
	          <td>First Name</td>
	          <td>Last Name</td>
						<td>Price</td>
	          <td>Date of Invoice</td>
	          <td>Is Paid?</td>
	        </tr>
	      </tfoot>

	    </table>


		</div>
	</div>

</div>


<?php
	include '../01-modules/footer.php';
?>
