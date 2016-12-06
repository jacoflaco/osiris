<!--
	 Project: Osiris Resorts & Destinations
   Filename: index.php
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
<form id='user-reservation-form' action="reservation_confirmation.php" method="post">
<div class="darkbanner">
<!--	<img class="banner-image" src="images/index/banner.jpg"/>-->
	<div class="reservation-form-header">
		<!-- <h2 class='page-title'>reservation</h2> -->
			<div class='form-section-divs'>
				<div class='form-label-2-cols'>
					<label class='reservation-labels'>Check In</label>
				</div>
				<div class='form-label-2-cols'>
					<label class='reservation-labels'>Check Out</label>
				</div>
			</div>

			<div class='form-section-divs less-top-margin'>
				<input id='checkin' class='reservation-input-2-cols' type='date' name='checkin'>
				<input id='checkout' class='reservation-input-2-cols' type='date' name='checkout'>
			</div>

			<div class='form-section-divs less-top-margin-2'>
				<select id='reservation-dropdown' class='form-dropdown-material form-select-1-cols' name='accomodation' required>
					<option value='' disabled selected>Accomodations</option>
					<?php
						$accomodationsSQL = "select RoomTypeID, Description from O_ROOM_TYPE";
						$getaccomodations = mysqli_query($con, $accomodationsSQL);
						while($row1 = mysqli_fetch_array($getaccomodations)) {
							echo "<option value='".$row1['RoomTypeID']."'>".$row1['Description']."</option>";
						}
					?>
				</select>
				<input id='number-of-rooms' class='reservation-input-2-cols' placeholder="Number Of Rooms" type="number" name='numberofrooms' min='1' max='5' required="">
			</div>

			<div class="form-section-divs less-top-margin-2">
				<h4 class='form-label less-bottom-margin'>Amenities</h4></br>
				<?php
					$amenitiesSQL = "select AmenityID, AmenityDescription from O_AMENITY";
					$getamenities = mysqli_query($con, $amenitiesSQL);
					$i = 0;
					while($row4 = mysqli_fetch_array($getamenities)) {
						$amenityid = "amenity-id-forlabel-".$i;
						echo "<input id='".$amenityid."' class='amenity-checkboxes form-checkboxes-1-cols' type='checkbox' name='amenities[]'
									value='".$row4['AmenityID']."'>";

						echo "<label class='amenity-checkbox-label' for='".$amenityid."'>".$row4['AmenityDescription']."</label>";
						if($i == 3) {
							echo "<br><br>";
						}
						$i++;
					}
				?>
			</div>
	</div>
</div>

<div class="destinations-wrapper">
	<h2 class="section-header">choose your destination</h2>
	<span><img src="images/misc/header-flower.png" alt="" class="section-header-flower"></span>
	<hr>

	<div class="destinations">
		<label>
		  <input type="radio" name="resort" value="1" required>
				<div class="destination-boxes">
					<p class="city-names">nuerto vallarta</p>
					<p class="country-names">mexico</p>
					<img src="images/image-links/dolphin.png" alt="">
				</div>
		</label>
		<label>
		  <input type="radio" name="resort" value="2">
			<div class="destination-boxes">
				<p class="city-names">north shore</p>
				<p class="country-names">o'ahu, hawaii</p>
				<img src="images/image-links/ukulele.png" alt="">
			</div>
		</label>
		<label>
		  <input type="radio" name="resort" value="3">
			<div class="destination-boxes">
				<p class="city-names">emerald bay</p>
				<p class="country-names">bahamas</p>
				<img src="images/image-links/palmtrees.png" alt="">
			</div>
		</label>
		<label>
		  <input type="radio" name="resort" value="4">
			<div class="destination-boxes">
				<p class="city-names">zermatt</p>
				<p class="country-names">switzerland</p>
				<img src="images/image-links/mountains.png" alt="">
			</div>
		</label>
		<label>
		  <input type="radio" name="resort" value="5">
			<div class="destination-boxes">
				<p class="city-names">villingili island</p>
				<p class="country-names">maldives</p>
				<img src="images/image-links/bungalow.png" alt="">
			</div>
		</label>
		<label>
		  <input type="radio" name="resort" value="6">
			<div class="destination-boxes">
				<p class="city-names">motu piti a'au</p>
				<p class="country-names">bora bora</p>
				<img src="images/image-links/leaf.png" alt="">
			</div>
		</label>
	</div>
	<!-- <div class="text-sections">
		<h3 class="text-header"><span>Visit Us All Around The World</span></h2>
		<p class='body-text'>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Illum distinctio neque inventore quo commodi ipsam adipisci, animi, rerum saepe amet nulla ratione unde doloribus odio ad aperiam et assumenda. Ratione! Lorem ipsum dolor sit amet, consectetur adipisicing elit. Natus doloribus neque corrupti exercitationem autem, consequatur quaerat a maxime repellat possimus fugit illo, distinctio nesciunt, aliquid enim magni nobis laborum blanditiis!</br></br>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Neque porro voluptate non ipsum praesentium nemo, ipsam ad error facere natus ea suscipit repellat placeat, vitae, asperiores quos culpa laboriosam consectetur.</p>
	</div> -->
</div>

<div class='spacer'></div>

<div class="hotels-wrapper">
	<h2 class="section-header">choose your hotel</h2>
	<span><img src="images/misc/header-flower.png" alt="" class="section-header-flower"></span>
	<hr>

	<div class="hotels">
		<label>
		  <input type="radio" name="hotel" value="1" required>
			<div id='azure-box' class="hotel-boxes">
			</div>
		</label>
		<label>
		  <input type="radio" name="hotel" value="2">
			<div id='emerald-box' class="hotel-boxes">
			</div>
		</label>
		<label>
		  <input type="radio" name="hotel" value="3">
			<div id='villa-box' class="hotel-boxes">
			</div>
		</label>
	</div>
</div>

<div class='spacer'></div>

	<div class="form-section-divs">
		<input id='reservation-submit' type='submit' name='userreservationsubmit' value='Reserve'>
	</div>

<div class='spacer'></div>

</form>
<?php
	include '01-modules/footer.php';
?>
