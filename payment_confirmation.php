<!--
	 Project: Osiris Resorts & Destinations
   Filename: login.php
	 Creation Date: 10/15/2016

   Author: Jake Handwork
	 Modification Date: 10/18/2016
-->

<?php session_start();
	require_once '00-utility/functions.php';
	require_once '00-utility/mail/mail.class.php';
	require_once '00-utility/dbconnect.php';
	require_once '00-utility/userSessionVerify.php';

	include '01-modules/header.php';
?>

<div class="form-container">

	<div class="report-transparent-container">
		<?php

			//if new payment is created
			if(isset($_POST['newpaymentsubmit'])) {
				$invoiceid = trim($_POST['invoiceid']);
				$creditcard = trim($_POST['creditcard']);
				$securitycode = trim($_POST['securitycode']);
				$expmonth = trim($_POST['expmonth']);
				$expyear = trim($_POST['expyear']);
				$streetnumber = trim($_POST['streetnumber']);
				$streetname = trim($_POST['streetname']);
				$city = trim($_POST['city']);
				$state = trim($_POST['state']);
				$zipcode = trim($_POST['zipcode']);

				if($expmonth < 10) {
					$expmonth = '0' . $expmonth;
				}

				$invoiceid = mysqli_real_escape_string($con, $invoiceid);
				$creditcard = mysqli_real_escape_string($con, $creditcard);
				$securitycode = mysqli_real_escape_string($con, $securitycode);
				$expmonth = mysqli_real_escape_string($con, $expmonth);
				$expyear = mysqli_real_escape_string($con, $expyear);
				$streetnumber = mysqli_real_escape_string($con, $streetnumber);
				$streetname = mysqli_real_escape_string($con, $streetname);
				$city = mysqli_real_escape_string($con, $city);
				$state = mysqli_real_escape_string($con, $state);
				$zipcode = mysqli_real_escape_string($con, $zipcode);

				$sql = "insert into O_PAYMENT_DETAILS values(null, '".$invoiceid."', '".$creditcard."', '".$securitycode."', '".$expmonth."', '".$expyear."', '".$streetnumber."', '".$streetname."', '".$city."', '".$state."', '".$zipcode."')";
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
									<td class='form-field'>Invoice ID: </td>
									<td class='form-input'>$invoiceid</td></tr>
								<tr>
									<td class='form-field'>Credit Card Number: </td>
									<td class='form-input'>$creditcard</td></tr>
								<tr>
									<td class='form-field'>Security Code: </td>
									<td class='form-input'>$securitycode</td></tr>
								<tr>
									<td class='form-field'>Expiration Date: </td>
									<td class='form-input'>$expmonth/$expyear</td></tr>
								<tr>
									<td class='form-field'>Street Address: </td>
									<td class='form-input'>$streetnumber $streetname</td></tr>
								<tr>
									<td class='form-field'></td>
									<td class='form-input'>$city, $state, $zipcode</td></tr>
							</table>
						</div>";
				}

				//update O_INVOICE to show paid
				$updateToPaid = "update O_INVOICE set ispaid = b'1' where invoiceid = '$invoiceid'";
				$check = mysqli_query($con, $updateToPaid);
				if(!$check) {
					die("<p class='form-error'>Could not update: " . mysql_error() . "</p>");
				}
			}
			else {
				header("location: paybill.php");
			}
		?>

	</div>

</div>


<?php
	include '01-modules/footer.php';
?>
