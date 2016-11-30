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

	$query = "select * from O_VW_USERS";
  $result = mysqli_query($con, $query);

  $result_array = array();
?>

<script type="text/javascript" charset="utf-8">
	$(document).ready(function() {
		var table = $('#datatables').DataTable();
	})
</script>

<div class="report-container">

	<div id="report-wrapper">
	<h3 class="report-header">view users</h3>


		<div class="report-transparent-container">

			<table id='datatables'>
	      <thead>
	        <tr>
	          <td>User ID</td>
	          <td>First Name</td>
	          <td>Last Name</td>
	          <td>Email</td>
	          <td>DoB</td>
						<td>Phone Number</td>
						<td>IsActivated</td>
	        </tr>
	      </thead>

	      <tbody>
	        <?php
	          while($row = mysqli_fetch_array($result)) {
	            ?>
	            <tr>
								<td><?php print $row['UserID']; ?></td>
	              <td><?php print $row['FirstName']; ?></td>
	              <td><?php print $row['LastName']; ?></td>
	              <td><?php print $row['Email']; ?></td>
	              <td><?php print $row['DoB']; ?></td>
								<td><?php print $row['PhoneNumber']; ?></td>
								<td><?php print $row['IsActivated']; ?></td>
	            </tr>
	            <?php
	          }
	        ?>
	      </tbody>

	      <tfoot>
	        <tr>
						<td>User ID</td>
	          <td>First Name</td>
	          <td>Last Name</td>
	          <td>Email</td>
	          <td>DoB</td>
						<td>Phone Number</td>
						<td>IsActivated</td>
	        </tr>
	      </tfoot>

	    </table>


		</div>
	</div>

</div>


<?php
	include '../01-modules/footer.php';
?>
