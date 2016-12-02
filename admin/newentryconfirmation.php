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

			/* * * * * * *
				ADMIN ADMIN ADMIN ADMIN ADMIN ADMIN ADMIN ADMIN * * * * * *
			 * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * */

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


			/* * * * * * *
				AMENITY AMENITY AMENITY AMENITY AMENITY AMENITY AMENITY * * * * * *
			 * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * */

			//if new amenity is created
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

				//get AmenityID and put it in the O_ROOM_AMENITY table
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
					$sql2 = "insert into O_ROOM_AMENITY values(null, '".$roomid."', '".$amenityid."')";
					$query2 = mysqli_query($con, $sql2);

					if(!$query2) {
						die("<p class='form-error'>Could not enter data2: " . mysql_error() . "</p>");
					}
				}
			}


			/* * * * * * *
				HOTEL HOTEL HOTEL HOTEL HOTEL HOTEL HOTEL HOTEL HOTEL * * * * * *
			 * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * */

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
					$sql2 = "insert into O_RESORT_HOTEL values(null, '".$resortid."', '".$hotelid."')";
					$query2 = mysqli_query($con, $sql2);

					if(!$query2) {
						die("<p class='form-error'>Could not enter data: " . mysql_error() . "</p>");
					}
				}
			}


			/* * * * * * *
				INVOICE INVOICE INVOICE INVOICE INVOICE INVOICE INVOICE * * * * * *
			 * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * */

			// if new invoice is created
			else if(isset($_POST['newinvoicesubmit'])) {
				//store the reservationid
				$reservationid = trim($_POST['reservationid']);
				$reservationid = mysqli_real_escape_string($con, $reservationid);


				//VERIFY THAT RESERVATIONID IS NOT CURRENTLY INVOICED


				//store reservation user id in a variable to access user info
				$getuser = mysqli_query($con, "select UserID from O_RESERVATION where ReservationID = $reservationid") or die("<p class='form-error'>Could not select the data: ".mysql_error()."</p>");
				$useridarray = mysqli_fetch_array($getuser);
				$userid = $useridarray[0];

				//store user info to send invoice through email
				$getuserinfo = mysqli_query($con, "select * from O_USER where UserID = '".$userid."'") or die("<p class='form-error'>Could not select the data: ".mysql_error()."</p>");
				$userarray = Array();
				$userarray = mysqli_fetch_assoc($getuserinfo);

				$userfirst = $userarray['FirstName'];
				$userlast = $userarray['LastName'];
				$useremail = $userarray['Email'];

				//store the reservation as an invoice with today being the day of invoice
				$sql = "insert into O_INVOICE values(null, '".$reservationid."', now())";
				$query = mysqli_query($con, $sql);

				//if couldn't insert, print error
				if(!$query) {
					die("<p class='form-error'>Could not enter data: " . mysql_error() . "</p>");
				}
				else {
					print "<p class='form-message'>An invoice has been created for the following reservation. The invoice has been emailed to the user and posted to their account.</p>";
					print "
						<div class='report-data-container'>
							<table id='registration-info-report'>
								<tr>
									<td class='form-field'>Reservation ID: </td>
									<td class='form-input'>$reservationid</td></tr>
								<tr>
									<td class='form-field'>First Name: </td>
									<td class='form-input'>$userfirst</td></tr>
								<tr>
									<td class='form-field'>Last Name: </td>
									<td class='form-input'>$userlast</td></tr>
							</table>
						</div>";
				}

				$updateToInvoiced = "update O_RESERVATION set isinvoiced = b'1' where reservationid = '$reservationid'";
				$check = mysqli_query($con, $updateToInvoiced);
				if(!$check) {
					die("<p class='form-error'>Could not update: " . mysql_error() . "</p>");
				}

				//store reservation info to send invoice through email
				$getreservationinfo = mysqli_query($con, "select DateOfReservation, Price from O_RESERVATION where ReservationID = '".$reservationid."'") or die("<p class='form-error'>Could not select the data: ".mysql_error()."</p>");
				$reservationarray = Array();
				$reservationarray = mysqli_fetch_assoc($getreservationinfo);

				$dateofres = $reservationarray['DateOfReservation'];
				$price = $reservationarray['Price'];

				//used to be able to stylize link in email
				$headers  = 'MIME-Version: 1.0' . "\r\n";
				$headers .= 'Content-type: text/html; charset=iso-8859-1' . "\r\n";

				$subject = "Osiris Invoice";

				$body = "Hello $userfirst,<br><br>Thank you for staying at Osiris Destinations & Resorts.
								We are glad to have you as a part of the Osiris family and greatly appreciate your business.
								Here is an invoice for your most recent stay with us.<br><br>
								<table>
									<tr>
										<td style='padding-right:15px; border-right: 1px solid black;'>Reservation ID</td>
										<td style='padding-left:15px;'>$reservationid</td></tr>
									<tr>
										<td style='padding-right:15px; border-right: 1px solid black;'>Date Of Reservation</td>
										<td style='padding-left:15px;'>$dateofres</td></tr>
									<tr>
										<td style='padding-right:15px; border-right: 1px solid black;'>Price</td>
										<td style='padding-left:15px;'>$$price</td></tr>
								</table>
								<br><br>
								To view more information about this invoice and to pay this invoice, please <a href='http://corsair.cs.iupui.edu:20111/osiris/current/login.php'>login here.</a>
								After loggin in, click on the drop down with your name, and click 'Pay Bills'.
								If you are having any problems with paying online, please call us at 1-800-(674)-7470. We hope you enjoyed your time with us at Osiris Destinations & Resorts
								<br><br>Jake Handwork<br>Chief Executive Officer<br>Osiris Destinations & Resorts";
				$mailer = new Mail();
				if (($mailer->sendMail($useremail, $userfirst, $subject, $body, $headers))==true)
					$message = "Hello $userfirst,<br><br>Thank you for staying at Osiris Destinations & Resorts.
									We are glad to have you as a part of the Osiris family and greatly appreciate your business.
									Here is an invoice for your most recent stay with us.<br><br>
									<table>
										<tr>
											<td>Reservation ID</td>
											<td>$reservationid</td></tr>
										<tr>
											<td>Date Of Reservation</td>
											<td>$dateofres</td></tr>
										<tr>
											<td>Price</td>
											<td>$price</td></tr>
									</table>
									<br><br>
									To view more information about this invoice and to pay this invoice, please <a href='http://corsair.cs.iupui.edu:20111/osiris/current/login.php'>login here.</a>
									After loggin in, click on the drop down with your name, and click 'Pay Bills'.
									If you are having any problems with paying online, please call us at 1-800-(674)-7470. We hope you enjoyed your time with us at Osiris Destinations & Resorts
									<br><br>Jake Handwork<br>Chief Executive Officer<br>Osiris Destinations & Resorts";
				else $msg = "Email not sent. " . $useremail.' '. $userfirst.' '. $subject.' '. $body;
			}

			else {
				header("location: newentry.php");
			}
		?>

	</div>

</div>


<?php
	include '../01-modules/footer.php';
?>
