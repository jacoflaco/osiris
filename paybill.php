<!--
	 Project: Osiris Resorts & Destinations
   Filename: register.php
	 Creation Date: 10/15/2016

   Author: Jake Handwork
	 Modification Date: 10/18/2016
-->

<?php session_start();
	require_once '00-utility/functions.php';
	require_once '00-utility/dbconnect.php';
	require_once '00-utility/userSessionVerify.php';

	include '01-modules/header.php';

	$message = '';

	$query = "select * from O_VW_USER_INVOICES where UserID = ".$_SESSION['activeuser']['UserID'];
  $result = mysqli_query($con, $query);

  $result_array = array();
?>

<script type="text/javascript" charset="utf-8">
	$(document).ready(function() {
		var table = $('#datatables').DataTable({
			"scrollY":        "7vw",
			"scrollCollapse": true,
			"paging":         false
		});
	})
</script>

<div class="form-container">

	<div id="report-wrapper">
	<h3 class="report-header">invoices to be paid</h3>
		<div class="report-transparent-container">

			<table id='datatables'>
	      <thead>
	        <tr>
	          <td>Invoice ID</td>
	          <td>Reservation ID</td>
						<td>User ID</td>
						<td>First Name</td>
						<td>Last Name</td>
	          <td>Invoice Date</td>
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
								<td><?php print $row['UserID']; ?></td>
								<td><?php print $row['FirstName']; ?></td>
								<td><?php print $row['LastName']; ?></td>
	              <td><?php print $row['InvoiceDate']; ?></td>
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
						<td>User ID</td>
						<td>First Name</td>
						<td>Last Name</td>
	          <td>Invoice Date</td>
	          <td>Is Paid?</td>
	        </tr>
	      </tfoot>

	    </table>
		</div>
	</div>

	<div id="form-wrapper">
		<form method="post" action='payment_confirmation.php' id='new-entry-form'>

			<?php
				print "<p class='error-message'>$message</p>"
			?>

			<div class="form-section-divs">
				<input id='invoice-id' class='form-input-5-cols' placeholder="Invoice ID" type="text" name='invoiceid' required="">
				<input id='creditcard-id' class='form-input-5-cols' placeholder="Credit Card #" type="text" name='creditcard' required="">
				<input id='securitycode-id' class='form-input-5-cols' placeholder="Security Code" type="text" name='securitycode' required="">
				<input id='exp-month' class='form-input-5-cols' placeholder="Expiration Month XX" type="number" name='expmonth' min='01' max='12' required="">
				<input id='exp-year' class='form-input-5-cols' placeholder="Expiration Year XXXX" type="number" name='expyear' min='2016' max='2036' required="">
			</div>

			<div class="form-section-divs">
				<input id='street-number' class='form-input-5-cols' placeholder="Street Number" type="number" name='streetnumber' required="">
				<input id='street-name' class='form-input-5-cols' placeholder="Street Name" type="text" name='streetname' required="">
				<input id='city' class='form-input-5-cols' placeholder="City" type="text" name='city' required="">
				<select class='form-dropdown-material form-select-5-cols' name='state' required>
					<option value='' disabled selected>State</option>
					<option value="AL">Alabama</option>	<option value="AK">Alaska</option> <option value="AS">American Samoa</option> <option value="AZ">Arizona</option>
					<option value="AR">Arkansas</option> <option value="CA">California</option>	<option value="CO">Colorado</option>
					<option value="CT">Connecticut</option>	<option value="DE">Delaware</option> <option value="DC">District Of Columbia</option>
					<option value="FL">Florida</option>	<option value="GA">Georgia</option>	<option value="GU">Guam</option> <option value="HI">Hawaii</option>
					<option value="ID">Idaho</option> <option value="IL">Illinois</option> <option value="IN">Indiana</option>
					<option value="IA">Iowa</option> <option value="KS">Kansas</option>	<option value="KY">Kentucky</option>
					<option value="LA">Louisiana</option>	<option value="ME">Maine</option> <option value="MD">Maryland</option>
					<option value="MA">Massachusetts</option>	<option value="MI">Michigan</option> <option value="MN">Minnesota</option>
					<option value="MS">Mississippi</option>	<option value="MO">Missouri</option> <option value="MT">Montana</option>
					<option value="NE">Nebraska</option> <option value="NV">Nevada</option>	<option value="NH">New Hampshire</option>
					<option value="NJ">New Jersey</option> <option value="NM">New Mexico</option>	<option value="NY">New York</option>
					<option value="NC">North Carolina</option> <option value="ND">North Dakota</option>	<option value="OH">Ohio</option>
					<option value="OK">Oklahoma</option> <option value="OR">Oregon</option>	<option value="PA">Pennsylvania</option>
					<option value="PR">Puerto Rico</option> <option value="RI">Rhode Island</option> <option value="SC">South Carolina</option>	<option value="SD">South Dakota</option>
					<option value="TN">Tennessee</option> <option value="TX">Texas</option>	<option value="UT">Utah</option>
					<option value="VT">Vermont</option>	<option value="VI">Virgin Islands</option> <option value="VA">Virginia</option> <option value="WA">Washington</option>
					<option value="WV">West Virginia</option>	<option value="WI">Wisconsin</option>	<option value="WY">Wyoming</option>
				</select>
				<input id='zipcode' class='form-input-5-cols' placeholder="Zip Code" type="number" name='zipcode' required="">
			</div>

			<div class="form-section-divs">
				<input id='form-submit' class='form-input-1-cols' type='submit' name='newpaymentsubmit' value='Pay'>
			</div>

		</form>
	</div>

</div>


<?php
	include '01-modules/footer.php';
?>
