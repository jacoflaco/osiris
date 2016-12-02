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
	require_once '../00-utility/sessionVerify.php';

	include '../01-modules/adminheader.php';
?>

<div class="form-container">

	<div class="report-transparent-container">
		<?php
			/* * * * * * * NEW ADMIN * * * * * * */

			if(isset($_POST['newadminsubmit'])) {
				$firstname = trim($_POST['firstname']);
				$lastname = trim($_POST['lastname']);
				$email = trim($_POST['email']);
				$confirmemail = trim($_POST['confirmemail']);
				$password = trim($_POST['password']);
				$confirmpassword = trim($_POST['confirmpassword']);

				if(validateEmail($email) && validateEmail($confirmemail) && $email === $confirmemail) {
					if(validatePassword($password)){
						if($password === $confirmpassword){

							$activationcode = randomCodeGenerator(20);

							//escape strings
							$firstname = mysqli_real_escape_string($con, $firstname);
							$lastname = mysqli_real_escape_string($con, $lastname);
							$email = mysqli_real_escape_string($con, $email);
							$confirmemail = mysqli_real_escape_string($con, $confirmemail);
							$password = mysqli_real_escape_string($con, $password);
							$confirmpassword = mysqli_real_escape_string($con, $confirmpassword);

							//hash password
							$password = sha1($password);

							//insert all of the information from the registration page
							$sql = "insert into O_ADMIN values(null, '".$firstname."', '".$lastname."', '".$email."', '".$password."')";

							$check = mysqli_query($con, $sql);

							//if couldn't insert, print error
							if(!$check) {
								die("<p class='form-error'>Could not enter data: " . mysql_error() . "</p>");
							}

							print "<p class='form-message'>You have successfully registered this admin.</p>";
							print "
								<div class='report-data-container'>
									<table id='registration-info-report'>
										<tr>
											<td class='form-field'>First Name: </td>
											<td class='form-input'>$firstname</td></tr>
										<tr>
											<td class='form-field'>Last Name: </td>
											<td class='form-input'>$lastname</td></tr>
										<tr>
											<td class='form-field'>Email: </td>
											<td class='form-input'>$email</td></tr>
									</table>
								</div>";

						}
						else {
							print "<p class='form-message'>Please double check that your password and confirm password fields are indentical.</p>";
						}
					}
					else {
						print "<p class='form-message'>Please double check that your password is at least 10 characters and contains at least 1 letter and 1 digit.</p>";
					}
				}
				else {
					print "<p class='form-message'>Please verify that your email is valid and your confirm email is identical.</p>";
				}
			}


			/* * * * * * * NEW AMENITY * * * * * * */

			//if new hotel is created
			else if(isset($_POST['newamenitysubmit'])) {
				$amenity = trim($_POST['amenity']);

				$amenity = mysqli_real_escape_string($con, $amenity);

				$sql = "insert into O_AMENITY values(null, '".$amenity."')";

				$query = mysqli_query($con, $sql);

				//if couldn't insert, print error
				if(!$query) {
					die("<p class='form-error'>Could not enter data1: " . mysql_error() . "</p>");
				}
				else {
					print "<p class='form-message'>The following hotel has been registered in the database.</p>";
					print "
						<div class='report-data-container'>
							<table id='registration-info-report'>
								<tr>
									<td class='form-field'>Amenity Description: </td>
									<td class='form-input'>$amenity</td></tr>
							</table>
						</div>";
				}

				//get hotelID and put it in the O_RESORT_HOTEL table
				$getamenity = mysqli_query($con, "select AmenityID from O_AMENITY where AmenityDescription = '$amenity'") or die(mysql_error());
				$amenityidarray = mysqli_fetch_array($getamenity);
				$amenityid = $amenityidarray[0];

				$getroom = mysqli_query($con, "select RoomID from O_ROOM");
				$roomids = Array();
				while ($row = mysqli_fetch_array($getroom)) {
				  $roomids[] = $row[0];
				}

				for($i = 0; $i < sizeof($roomids); $i++) {
					$roomid = $roomids[$i];
					print "<p class='form-error'>$roomid";
					print "<p class='form-error'>$amenityid";
					$sql2 = "insert into O_ROOM_AMENITY values(null, '".$roomid."', '".$amenityid."')";
					$query2 = mysqli_query($con, $sql2);

					if(!$query2) {
						die("<p class='form-error'>Could not enter data2: " . mysql_error() . "</p>");
					}
				}
			}


			/* * * * * * * NEW HOTEL * * * * * * */

			//if new hotel is created
			else if(isset($_POST['newhotelsubmit'])) {
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

				//get hotelID and put it in the O_RESORT_HOTEL table
				$gethotel = mysqli_query($con, "select HotelID from O_HOTEL where HotelName = '$hotelname'") or die(mysql_error());
				$hotelidarray = mysqli_fetch_array($gethotel);
				$hotelid = $hotelidarray[0];

				$getresort = mysqli_query($con, "select ResortID from O_RESORT");
				$resortids = Array();
				while ($row = mysqli_fetch_array($getresort)) {
				  $resortids[] = $row[0];
				}

				for($i = 0; $i < sizeof($resortids); $i++) {
					$resortid = $resortids[$i];
					// print "<p class='form-error'>$resortid";
					// print "<p class='form-error'>$hotelid";
					$sql2 = "insert into O_RESORT_HOTEL values(null, '".$resortid."', '".$hotelid."')";
					$query2 = mysqli_query($con, $sql2);

					if(!$query2) {
						die("<p class='form-error'>Could not enter data: " . mysql_error() . "</p>");
					}
				}
			}


			/* * * * * * * NEW PAYMENT DETAILS * * * * * * */

			//if new hotel is created
			//else if(isset($_POST['newpaymentsubmit'])) {
			// 	$hotelname = trim($_POST['hotelname']);
			// 	$hotelnumrooms = trim($_POST['hotelnumrooms']);
			//
			// 	$hotelname = mysqli_real_escape_string($con, $hotelname);
			// 	$hotelnumrooms = mysqli_real_escape_string($con, $hotelnumrooms);
			//
			// 	$sql = "insert into O_HOTEL values(null, '".$hotelname."', '".$hotelnumrooms."')";
			//
			// 	$query = mysqli_query($con, $sql);
			//
			// 	//if couldn't insert, print error
			// 	if(!$query) {
			// 		die("<p class='form-error'>Could not enter data: " . mysql_error() . "</p>");
			// 	}
			// 	else {
			// 		print "<p class='form-message'>The following hotel has been registered in the database.</p>";
			// 		print "
			// 			<div class='report-data-container'>
			// 				<table id='registration-info-report'>
			// 					<tr>
			// 						<td class='form-field'>Hotel Name: </td>
			// 						<td class='form-input'>$hotelname</td></tr>
			// 					<tr>
			// 						<td class='form-field'>Number of Rooms: </td>
			// 						<td class='form-input'>$hotelnumrooms</td></tr>
			// 				</table>
			// 			</div>";
			// 	}
			//
			// 	//get hotelID and put it in the O_RESORT_HOTEL table
			// 	$gethotel = mysqli_query($con, "select HotelID from O_HOTEL where HotelName = '$hotelname'") or die(mysql_error());
			// 	$hotelidarray = mysqli_fetch_array($gethotel);
			// 	$hotelid = $hotelidarray[0];
			//
			// 	$getresort = mysqli_query($con, "select ResortID from O_RESORT");
			// 	$resortids = Array();
			// 	while ($row = mysqli_fetch_array($getresort)) {
			// 	  $resortids[] = $row[0];
			// 	}
			//
			// 	for($i = 0; $i < sizeof($resortids); $i++) {
			// 		$resortid = $resortids[$i];
			// 		// print "<p class='form-error'>$resortid";
			// 		// print "<p class='form-error'>$hotelid";
			// 		$sql2 = "insert into O_RESORT_HOTEL values(null, '".$resortid."', '".$hotelid."')";
			// 		$query2 = mysqli_query($con, $sql2);
			//
			// 		if(!$query2) {
			// 			die("<p class='form-error'>Could not enter data: " . mysql_error() . "</p>");
			// 		}
			// 	}
			// }

			else {
				header("location: newentry.php");
			}
		?>

	</div>

</div>


<?php
	include '../01-modules/footer.php';
?>
