<!--
	 Project: Osiris Resorts & Destinations
   Filename: login.php
	 Creation Date: 10/15/2016

   Author: Jake Handwork
	 Modification Date: 10/18/2016
-->

<?php session_start();
	require_once '00-utility/functions.php';
	require_once '00-utility/dbconnect.php';
	require_once '00-utility/userSessionVerify.php';

	include '01-modules/header.php';
?>

<div class="form-container">

	<div class="report-transparent-container">
		<?php

				if(isset($_POST['cancelreservationsubmit'])) {
					$reservationid = trim($_POST['reservationid']);
					$reservationid = mysqli_real_escape_string($con, $reservationid);

					$userid = $_SESSION['activeuser']['UserID'];

					$reservationquery = mysqli_query($con, "select ReservationID from O_RESERVATION where UserID = '".$userid."' and ReservationID = '".$reservationid."'");
					if(mysqli_num_rows($reservationquery) > 0) {
						$getroomids = mysqli_query($con, "select RoomID from O_RESERVATION_DETAILS where ReservationID = '".$reservationid."'");
						$roomidarray = Array();
						while($row = mysqli_fetch_array($getroomids)) {
							$roomidarray[] = $row[0];
						}

						$deleterd = mysqli_query($con, "delete from O_RESERVATION_DETAILS where ReservationID = '".$reservationid."'");
						$deleter = mysqli_query($con, "delete from O_RESERVATION where ReservationID = '".$reservationid."'");

						//update O_ROOM to not be reserved
						for($i = 0; $i < sizeof($roomidarray); $i++) {
							$roomid = $roomidarray[$i];
							$updateToNotReserved = "update O_ROOM set IsReserved = b'0' where RoomID = '".$roomid."'";
							$check = mysqli_query($con, $updateToNotReserved);
							if(!$check) {
								die("<p class='form-error'>Could not update: " . mysqli_error($con) . "</p>");
							}
						}

						echo "<p class='form-message'>You have successfully canceled this reservation.</p>";

					}
					else {
						echo "<p class='form-message'>Please return and enter a valid reservation id.</p>";
					}
				}
				else {
					header("location: welcome.php");
				}
		?>

	</div>

</div>


<?php
	include '01-modules/footer.php';
?>
