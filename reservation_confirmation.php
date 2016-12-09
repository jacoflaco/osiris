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
			if(isset($_POST['userreservationsubmit'])) {
				$userid = $_SESSION['activeuser']['UserID'];
				$firstname = $_SESSION['activeuser']['FirstName'];
				$lastname = $_SESSION['activeuser']['LastName'];
				$email = $_SESSION['activeuser']['Email'];
				$accomodationid = trim($_POST['accomodation']);
				$hotelid = trim($_POST['hotel']);
				$resortid = trim($_POST['resort']);
				$numberofrooms = trim($_POST['numberofrooms']);
				$checkin = trim($_POST['checkin']);
				$checkout = trim($_POST['checkout']);

				//escape strings
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
				if($nights < 0) {
					echo "<p class='form-message'>Please choose a check out date that is after your check in date.</p>";
				}
				else {
					if(($accomodationid == 1 && $numberofrooms > 4) || ($accomodationid == 2 && $numberofrooms > 4) || ($accomodationid == 3 && $numberofrooms > 3)
					|| ($accomodationid == 4 && $numberofrooms > 3) || ($accomodationid == 5 && $numberofrooms > 2) || ($accomodationid == 6 && $numberofrooms > 1)) {
						echo "<p class='form-message'>The accomodation you chose does not support the number of rooms you requested. Please choose less rooms or create separate reservations with different accomodations.</p>";
					}
					else {
						$countquery = mysqli_query($con, "select RoomID from O_VW_RESERVED_ROOMS where ResortID = '".$resortid."' and HotelID = '".$hotelid."' and RoomTypeID = '".$accomodationid."'") or die("<p class='form-error'>Could not select the data1: ".mysqli_error($con)."</p>");
						$reservedarray = Array();
						while ($row = mysqli_fetch_array($countquery)) {
							$reservedarray[] = $row[0];
						}
						$numberofreserved = sizeof($reservedarray);

						if($accomodationid == 1 OR $accomodationid == 2) {
							$numberavailable = 4 - $numberofreserved;
						}
						else if($accomodationid == 3 OR $accomodationid == 4) {
							$numberavailable = 3 - $numberofreserved;
						}
						else if($accomodationid == 5) {
							$numberavailable = 2 - $numberofreserved;
						}
						else {
							$numberavailable = 1 - $numberofreserved;
						}

						if($numberofrooms > $numberavailable) {
							echo "<p class='form-message'>You have chosen more rooms than are available. Please go back and choose less rooms, a different accomodation, or a different hotel.</p>";
						}
						else {
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

							//get resorthotelid
							$getresorthotelid = mysqli_query($con, "select ResortHotelID from O_RESORT_HOTEL where HotelID = $hotelid AND ResortID = $resortid") or die("<p class='form-error'>Could not select the data5: ".mysqli_error($con)."</p>");
							$resorthotelarray = mysqli_fetch_array($getresorthotelid);
							$resorthotelid = $resorthotelarray[0];

							//store the reservation info
							$sql1 = "insert into O_RESERVATION values(null, '".$userid."', '1', '".$numberofrooms."', NOW(), '".$checkin."', '".$checkout."', '".$price."', 0)";
							$query1 = mysqli_query($con, $sql1);
							//if couldn't insert, print error
							if(!$query1) {
								die("<p class='form-error'>Could not enter data1: " . mysqli_error($con) . "</p>");
							}
							//get reservationid of the most recent insert
							$getreservationid = mysqli_query($con, "select LAST_INSERT_ID()") or die("<p class='form-error'>Could not select the data5: ".mysqli_error($con)."</p>");
							$reservationidarray = mysqli_fetch_array($getreservationid);
							$reservationid = $reservationidarray[0];

							//store the reservation details
							if($numberofrooms > 1) {
								for($i = 0; $i < $numberofrooms; $i++) {
									//get first available room at hotel
									$getroomid = mysqli_query($con, "select RoomID from O_ROOM where ResortHotelID = $resorthotelid AND RoomTypeID = $accomodationid AND IsReserved = 0") or die("<p class='form-error'>Could not select the data6: ".mysqli_error($con)."</p>");
									$roomarray = mysqli_fetch_array($getroomid);
									$roomid = $roomarray[0];

									$sql2 = "insert into O_RESERVATION_DETAILS values(null, '".$reservationid."', '".$roomid."')";
									$query2 = mysqli_query($con, $sql2);
									//if couldn't insert, print error
									if(!$query2) {
										die("<p class='form-error'>Could not enter data3: " . mysqli_error($con) . "</p>");
									}

									//update O_ROOM to say IsReserved
									$updateToReserved = "update O_ROOM set isreserved = b'1' where roomid = '$roomid'";
									$check = mysqli_query($con, $updateToReserved);
									if(!$check) {
										die("<p class='form-error'>Could not update: " . mysqli_error($con) . "</p>");
									}
								}
								print "<p class='form-message'>The following reservation has been created and emailed to the user. Multiple rooms have been reserved.</p>";
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
												<td class='form-field'>Price:</td>
												<td class='form-input'>$$price</td></tr>
										</table>
									</div>";
							}
							else {
								//get first available room at hotel
								$getroomid = mysqli_query($con, "select RoomID from O_ROOM where ResortHotelID = $resorthotelid AND RoomTypeID = $accomodationid AND IsReserved = 0") or die("<p class='form-error'>Could not select the data6: ".mysqli_error($con)."</p>");
								$roomarray = mysqli_fetch_array($getroomid);
								$roomid = $roomarray[0];

								$sql2 = "insert into O_RESERVATION_DETAILS values(null, '".$reservationid."', '".$roomid."')";
								$query2 = mysqli_query($con, $sql2);
								//if couldn't insert, print error
								if(!$query2) {
									die("<p class='form-error'>Could not enter data2: " . mysqli_error($con) . "</p>");
								}
								//update O_ROOM to say IsReserved
								$updateToReserved = "update O_ROOM set isreserved = b'1' where roomid = '$roomid'";
								$check = mysqli_query($con, $updateToReserved);
								if(!$check) {
									die("<p class='form-error'>Could not update: " . mysqli_error($con) . "</p>");
								}
								else {
									print "<p class='form-message'>The following reservation has been created and emailed to you at $email.</p>";
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
													<td class='form-field'>Price:</td>
													<td class='form-input'>$$price</td></tr>
											</table>
										</div>";
								}
							}

							//used to be able to stylize link in email
							$headers  = 'MIME-Version: 1.0' . "\r\n";
							$headers .= 'Content-type: text/html; charset=iso-8859-1' . "\r\n";

							$subject = "Osiris Reservation";

							$body = "Hello $firstname,<br><br>Thank you for reserving your stay at Osiris Destinations & Resorts.
											We are excited to have you here and we hope that you enjoy your time with us.
											Here is the information from your reservation.<br><br>
											<table>
												<tr>
													<td style='padding-right:15px; border-right: 1px solid black;'>First Name: </td>
													<td style='padding-left:15px;'>$firstname</td></tr>
												<tr>
													<td style='padding-right:15px; border-right: 1px solid black;'>Last Name: </td>
													<td style='padding-left:15px;'>$lastname</td></tr>
												<tr>
													<td style='padding-right:15px; border-right: 1px solid black;'>Email: </td>
													<td style='padding-left:15px;'>$email</td></tr>
												<tr>
													<td style='padding-right:15px; border-right: 1px solid black;'>Accomodations: </td>
													<td style='padding-left:15px;'>$roomtype</td></tr>
												<tr>
													<td style='padding-right:15px; border-right: 1px solid black;'>Hotel: </td>
													<td style='padding-left:15px;'>$hotelname</td></tr>
												<tr>
													<td style='padding-right:15px; border-right: 1px solid black;'>Resort:</td>
													<td style='padding-left:15px;'>".$resortarray['City'].", ".$resortarray['State'].", ".$resortarray['Country']."</td></tr>
												<tr>
													<td style='padding-right:15px; border-right: 1px solid black;'>Number Of Rooms:</td>
													<td style='padding-left:15px;'>$numberofrooms</td></tr>
												<tr>
													<td style='padding-right:15px; border-right: 1px solid black;'>Check In:</td>
													<td style='padding-left:15px;'>$checkin</td></tr>
												<tr>
													<td style='padding-right:15px; border-right: 1px solid black;'>Check Out:</td>
													<td style='padding-left:15px;'>$checkout</td></tr>
												<tr>
													<td style='padding-right:15px; border-right: 1px solid black;'>Nights:</td>
													<td style='padding-left:15px;'>$nights</td></tr>
												<tr>
													<td style='padding-right:15px; border-right: 1px solid black;'>Price:</td>
													<td style='padding-left:15px;'>$$price</td></tr>
											</table>
											<br><br>
											If you have any questions, please call us at 1-800-(674)-7470. We look forward to seeing your soon!
											<br><br>Jake Handwork<br>Chief Executive Officer<br>Osiris Destinations & Resorts";
							$mailer = new Mail();
							if (($mailer->sendMail($email, $firstname, $subject, $body, $headers))==true)
								$message = "Hi";
							else $msg = "Email not sent. " . $email.' '. $firstname.' '. $subject.' '. $body;
						}
					}
				}
			}
			else {
				header("location: reservation.php");
			}
		?>

	</div>

</div>


<?php
	include '01-modules/footer.php';
?>
