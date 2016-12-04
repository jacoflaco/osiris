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

							print "<p class='form-message'>You have successfully created this admin.</p>";
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
				$price = trim($_POST['price']);

				$amenity = mysqli_real_escape_string($con, $amenity);
				$price = mysqli_real_escape_string($con, $price);

				$sql = "insert into O_AMENITY values(null, '".$amenity."', '".$price."')";

				$query = mysqli_query($con, $sql);

				//if couldn't insert, print error
				if(!$query) {
					die("<p class='form-error'>Could not enter data1: " . mysql_error() . "</p>");
				}
				else {
					print "<p class='form-message'>The following amenity has been created in the database.</p>";
					print "
						<div class='report-data-container'>
							<table id='registration-info-report'>
								<tr>
									<td class='form-field'>Description: </td>
									<td class='form-input'>$amenity</td></tr>
								<tr>
									<td class='form-field'>Price: </td>
									<td class='form-input'>$$price</td></tr>
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

				//store reservation user id in a variable to access user info
				$getuser = mysqli_query($con, "select UserID from O_RESERVATION where ReservationID = $reservationid AND IsInvoiced = 0") or die("<p class='form-error'>Could not select the data: ".mysql_error()."</p>");
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
				$sql = "insert into O_INVOICE values(null, '".$reservationid."', now(), 0)";
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


			/* * * * * * *
				PAYMENT PAYMENT PAYMENT PAYMENT PAYMENT PAYMENT PAYMENT * * * * * *
			 * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * */

			//if new payment is created
			else if(isset($_POST['newpaymentsubmit'])) {
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

				if(sizeof($expmonth) == 1) {
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



			/* * * * * * *
				RESERVATION RESERVATION RESERVATION RESERVATION RESERVATION * * * * * *
			 * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * */

			//if new payment is created
			else if(isset($_POST['newreservationsubmit'])) {
				$firstname = trim($_POST['firstname']);
				$lastname = trim($_POST['lastname']);
				$email = trim($_POST['email']);
				$accomodationid = trim($_POST['accomodation']);
				$hotelid = trim($_POST['hotel']);
				$resortid = trim($_POST['resort']);
				$numberofrooms = trim($_POST['numberofrooms']);
				$checkin = trim($_POST['checkin']);
				$checkout = trim($_POST['checkout']);

				//escape strings
				$firstname = mysqli_real_escape_string($con, $firstname);
				$lastname = mysqli_real_escape_string($con, $lastname);
				$email = mysqli_real_escape_string($con, $email);
				$accomodationid = mysqli_real_escape_string($con, $accomodationid);
				$hotelid = mysqli_real_escape_string($con, $hotelid);
				$resortid = mysqli_real_escape_string($con, $resortid);
				$numberofrooms = mysqli_real_escape_string($con, $numberofrooms);
				$checkin = mysqli_real_escape_string($con, $checkin);
				$checkout = mysqli_real_escape_string($con, $checkout);

				//calculate the total stay in nights
				$datetime1 = strtotime($checkin);
				$datetime2 = strtotime($checkout);
				$secs = $datetime2 - $datetime1;// == <seconds between the two times>
				$nights = $secs / 86400;

				//store prices of rooms in an array to access
				$getroomprice = mysqli_query($con, "select Price from O_ROOM_TYPE where RoomTypeID = $accomodationid") or die("<p class='form-error'>Could not select the data: ".mysql_error()."</p>");
				$roompricearray = mysqli_fetch_array($getroomprice);
				$roomprice = $roompricearray[0];

				//post the checkbox data into an array
				$amenitiesarray = $_POST['amenities'];

				//store prices of amenities in an array to access
				$amenitiespricearray = Array();
				for($i = 0; $i < sizeof($amenitiesarray); $i++) {
					$query = "select AmenityPrice from O_AMENITY where AmenityID = ".$amenitiesarray[$i];
					$getamenitiesprice = mysqli_query($con, $query) or die("<p class='form-error'>Could not select the data: ".mysql_error()."</p>");
					while ($row = mysqli_fetch_array($getamenitiesprice)) {
					  $amenitiespricearray[] = $row[0];
					}
				}

				//total all amenities for one night
				$totalamenitiesprice = 0;
				foreach($amenitiespricearray as $value) {
					$totalamenitiesprice = $totalamenitiesprice + $value;
				}

				//the total cost of the stay
				$price = $nights * ($roomprice + $totalamenitiesprice) * 1.08;

				//find descriptions of room, hotel, and resort
				$getaccomodation = mysqli_query($con, "select Description from O_ROOM_TYPE where RoomTypeID = $accomodationid") or die("<p class='form-error'>Could not select the data1: ".mysql_error()."</p>");
				$accomodationarray = mysqli_fetch_array($getaccomodation);
				$roomtype = $accomodationarray[0];

				$gethotel = mysqli_query($con, "select HotelName from O_HOTEL where HotelID = $hotelid") or die("<p class='form-error'>Could not select the data2: ".mysql_error()."</p>");
				$hotelarray = mysqli_fetch_array($gethotel);
				$hotelname = $hotelarray[0];

				$getresortinfo = mysqli_query($con, "select City, State, Country from O_RESORT where ResortID = '".$resortid."'") or die("<p class='form-error'>Could not select the data3: ".mysql_error()."</p>");
				$resortarray = Array();
				$resortarray = mysqli_fetch_assoc($getresortinfo);

				//get user id
				$getuserid = mysqli_query($con, "select UserID from O_USER where FirstName = '".$firstname."' AND LastName = '".$lastname."' AND Email = '".$email."'") or die("<p class='form-error'>Could not select the data4: ".mysqli_error($con)."</p>");
				$userarray = mysqli_fetch_array($getuserid);
				$userid = $userarray[0];

				//get resorthotelid
				$getresorthotelid = mysqli_query($con, "select ResortHotelID from O_RESORT_HOTEL where HotelID = $hotelid AND ResortID = $resortid") or die("<p class='form-error'>Could not select the data5: ".mysqli_error($con)."</p>");
				$resorthotelarray = mysqli_fetch_array($getresorthotelid);
				$resorthotelid = $resorthotelarray[0];

				//get first available room at hotel
				$getroomid = mysqli_query($con, "select RoomID from O_ROOM where ResortHotelID = $resorthotelid AND RoomTypeID = $accomodationid AND IsReserved = 0") or die("<p class='form-error'>Could not select the data6: ".mysqli_error($con)."</p>");
				$roomarray = mysqli_fetch_array($getroomid);
				$roomid = $roomarray[0];

				//store current admins id in local variable
				$currentadminid = $_SESSION['admin']['AdminID'];
				//store the reservation info
				$sql1 = "insert into O_RESERVATION values(null, '".$userid."', '".$roomid."', '".$currentadminid."', now(), '".$price."', 0)";
				$query1 = mysqli_query($con, $sql1);
				//if couldn't insert, print error
				if(!$query1) {
					die("<p class='form-error'>Could not enter data1: " . mysqli_error($con) . "</p>");
				}

				$todaystime = getdate();
				$todaysdate = $todaystime['year']."-".$todaystime['mday']."-".$todaystime['mon'];
				//get the reservationid of this reservation
				$getreservationid = mysqli_query($con, "select ReservationID from O_RESERVATION where UserID = $userid AND RoomID = $roomid AND DateOfReservation = '".$todaysdate."'") or die("<p class='form-error'>Could not select the data7: ".mysqli_error($con)."</p>");
				$reservationarray = mysqli_fetch_array($getreservationid);
				$reservationid = $reservationarray[0];
				//store the reservation details
				// $sql2 = "insert into O_RESERVATION_DETAILS values(null, '".$reservationid."', '".$numberofrooms."', '".$checkin."', '".$checkout."')";
				// $query2 = mysqli_query($con, $sql2);
				// //if couldn't insert, print error
				// if(!$query2) {
				// 	die("<p class='form-error'>$reservationid Could not enter data2: " . mysqli_error($con) . "</p>");
				// }
				// else {
					print "<p class='form-message'>The following reservation has been created and emailed to the user.</p>";
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
								<tr>
									<td class='form-field'>Accomodations: </td>
									<td class='form-input'>$roomtype</td></tr>
								<tr>
									<td class='form-field'>Hotel: </td>
									<td class='form-input'>$hotelname</td></tr>
								<tr>
									<td class='form-field'>Resort:</td>
									<td class='form-input'>".$resortarray['City'].", ".$resortarray['State'].", ".$resortarray['Country']."</td></tr>
								<tr>
									<td class='form-field'>Number Of Rooms:</td>
									<td class='form-input'>$numberofrooms</td></tr>
								<tr>
									<td class='form-field'>Check In:</td>
									<td class='form-input'>$checkin</td></tr>
								<tr>
									<td class='form-field'>Check Out:</td>
									<td class='form-input'>$checkout</td></tr>
								<tr>
									<td class='form-field'>Nights:</td>
									<td class='form-input'>$nights</td></tr>
								<tr>
									<td class='form-field'>Reservation ID:</td>
									<td class='form-input'>$todaysdate / $reservationid</td></tr>
								<tr>
									<td class='form-field'>Price:</td>
									<td class='form-input'>$$price</td></tr>
							</table>
						</div>";
				// }
				//
				// //used to be able to stylize link in email
				// $headers  = 'MIME-Version: 1.0' . "\r\n";
				// $headers .= 'Content-type: text/html; charset=iso-8859-1' . "\r\n";
				//
				// $subject = "Osiris Reservation";
				//
				// $body = "Hello $userfirst,<br><br>Thank you for reserving your stay at Osiris Destinations & Resorts.
				// 				We are excited to have you here and we hope that you enjoy your stay.
				// 				Here is the information from your reservation.<br><br>
				// 				<table>
				// 					<tr>
				// 						<td style='padding-right:15px; border-right: 1px solid black;'>First Name: </td>
				// 						<td style='padding-left:15px;'>$firstname</td></tr>
				// 					<tr>
				// 						<td style='padding-right:15px; border-right: 1px solid black;'>Last Name: </td>
				// 						<td style='padding-left:15px;'>$lastname</td></tr>
				// 					<tr>
				// 						<td style='padding-right:15px; border-right: 1px solid black;'>Email: </td>
				// 						<td style='padding-left:15px;'>$email</td></tr>
				// 					<tr>
				// 						<td style='padding-right:15px; border-right: 1px solid black;'>Accomodations: </td>
				// 						<td style='padding-left:15px;'>$roomtype</td></tr>
				// 					<tr>
				// 						<td style='padding-right:15px; border-right: 1px solid black;'>Hotel: </td>
				// 						<td style='padding-left:15px;'>$hotelname</td></tr>
				// 					<tr>
				// 						<td style='padding-right:15px; border-right: 1px solid black;'>Resort:</td>
				// 						<td style='padding-left:15px;'>".$resortarray['City'].", ".$resortarray['State'].", ".$resortarray['Country']."</td></tr>
				// 					<tr>
				// 						<td style='padding-right:15px; border-right: 1px solid black;'>Number Of Rooms:</td>
				// 						<td style='padding-left:15px;'>$numberofrooms</td></tr>
				// 					<tr>
				// 						<td style='padding-right:15px; border-right: 1px solid black;'>Check In:</td>
				// 						<td style='padding-left:15px;'>$checkin</td></tr>
				// 					<tr>
				// 						<td style='padding-right:15px; border-right: 1px solid black;'>Check Out:</td>
				// 						<td style='padding-left:15px;'>$checkout</td></tr>
				// 					<tr>
				// 						<td style='padding-right:15px; border-right: 1px solid black;'>Nights:</td>
				// 						<td style='padding-left:15px;'>$nights</td></tr>
				// 					<tr>
				// 						<td style='padding-right:15px; border-right: 1px solid black;'>Price:</td>
				// 						<td style='padding-left:15px;'>$$price</td></tr>
				// 				</table>
				// 				<br><br>
				// 				If you have any questions, please call us at 1-800-(674)-7470. We look forward to seeing your soon!
				// 				<br><br>Jake Handwork<br>Chief Executive Officer<br>Osiris Destinations & Resorts";
				// $mailer = new Mail();
				// if (($mailer->sendMail($email, $firstname, $subject, $body, $headers))==true)
				// 	$message = "Hi";
				// else $msg = "Email not sent. " . $email.' '. $firstname.' '. $subject.' '. $body;
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
