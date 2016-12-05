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

	include '01-modules/header.php';

	// if(!isset($_SESSION['activeuser'])) {
	// 	header("location: login.php");
	// }
?>

<div class="darkbanner">
<!--	<img class="banner-image" src="images/index/banner.jpg"/>-->
	<div class="headline">

		<div class='form-section-divs'>
			<div class='form-label-2-cols'>
				<label class='reservation-labels'>Check In</label>
			</div>
			<div class='form-label-2-cols'>
				<label class='reservation-labels'>Check Out</label>
			</div>
		</div>

		<div class='form-section-divs'>
			<input id='checkin' class='form-input-2-cols' type='date' name='checkin'>
			<input id='checkout' class='form-input-2-cols' type='date' name='checkout'>
		</div>

		<div class='form-section-divs'>
			<select class='form-dropdown-material form-select-1-cols' name='accomodation' required>
				<option value='' disabled selected>Accomodations</option>
				<?php
					$accomodationsSQL = "select RoomTypeID, Description from O_ROOM_TYPE";
					$getaccomodations = mysqli_query($con, $accomodationsSQL);
					while($row1 = mysqli_fetch_array($getaccomodations)) {
						echo "<option value='".$row1['RoomTypeID']."'>".$row1['Description']."</option>";
					}
				?>
			</select>
			<input id='number-of-rooms' class='form-input-2-cols' placeholder="Number Of Rooms" type="number" name='numberofrooms' min='1' max='5' required="">
		</div>

		<div class="form-section-divs">
			<h4 class='form-label'>Amenities</h4></br>
			<?php
				$amenitiesSQL = "select AmenityID, AmenityDescription from O_AMENITY";
				$getamenities = mysqli_query($con, $amenitiesSQL);
				while($row4 = mysqli_fetch_array($getamenities)) {
					echo "<input class='amenity-checkboxes form-checkboxes-1-cols' type='checkbox' name='amenities[]'
								value='".$row4['AmenityID']."'>";

					echo "<label class='amenity-checkbox-label'>".$row4['AmenityDescription']."</label>";
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

		<a href="puertovallarta.php" class="destination-links">
			<div class="destination-boxes">
				<p class="city-names">puerto vallarta</p>
				<p class="country-names">mexico</p>
				<img src="images/image-links/dolphin.png" alt="">
			</div>
		</a>
		<a href="northshore.php" class="destination-links">
			<div class="destination-boxes">
				<p class="city-names">north shore</p>
				<p class="country-names">o'ahu, hawaii</p>
				<img src="images/image-links/ukulele.png" alt="">
			</div>
		</a>
		<a href="emeraldbay.php" class="destination-links">
			<div class="destination-boxes">
				<p class="city-names">emerald bay</p>
				<p class="country-names">bahamas</p>
				<img src="images/image-links/palmtrees.png" alt="">
			</div>
		</a>
		<a href="zermatt.php" class="destination-links">
			<div class="destination-boxes">
				<p class="city-names">zermatt</p>
				<p class="country-names">switzerland</p>
				<img src="images/image-links/mountains.png" alt="">
			</div>
		</a>
		<a href="villingiliisland.php" class="destination-links">
			<div class="destination-boxes">
				<p class="city-names">villingili island</p>
				<p class="country-names">maldives</p>
				<img src="images/image-links/bungalow.png" alt="">
			</div>
		</a>
		<a href="motupitiaau.php" class="destination-links">
			<div class="destination-boxes">
				<p class="city-names">motu piti a'au</p>
				<p class="country-names">bora bora</p>
				<img src="images/image-links/leaf.png" alt="">
			</div>
		</a>


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

		<a href="azure.php" class="hotel-links">
			<div id='azure-box' class="hotel-boxes">
			</div>
		</a>
		<a href="emerald.php" class="hotel-links">
			<div id='emerald-box' class="hotel-boxes">
			</div>
		</a>
		<a href="villa.php" class="hotel-links">
			<div id='villa-box' class="hotel-boxes">
			</div>
		</a>


	</div>

	<!-- <div class="text-sections">
		<h3 class="text-header"><span>Check Out Our 3 Hotels</span></h2>
		<p class='body-text'>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Illum distinctio neque inventore quo commodi ipsam adipisci, animi, rerum saepe amet nulla ratione unde doloribus odio ad aperiam et assumenda. Ratione! Lorem ipsum dolor sit amet, consectetur adipisicing elit. Natus doloribus neque corrupti exercitationem autem, consequatur quaerat a maxime repellat possimus fugit illo, distinctio nesciunt, aliquid enim magni nobis laborum blanditiis!</br></br>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Neque porro voluptate non ipsum praesentium nemo, ipsam ad error facere natus ea suscipit repellat placeat, vitae, asperiores quos culpa laboriosam consectetur.</p>
	</div> -->
</div>

<div class='spacer'></div>

<?php
	include '01-modules/footer.php';
?>
