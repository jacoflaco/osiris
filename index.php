<!--
	 Project: Osiris Resorts & Destinations
   Filename: index.php
	 Creation Date: 10/15/2016

   Author: Jake Handwork
	 Modification Date: 10/18/2016
-->

<?php session_start();

	include '01-modules/header.php';

?>

<div class="banner">
<!--	<img class="banner-image" src="images/index/banner.jpg"/>-->
	<div class="headline">
		<h1 class="headline-text">e<span></span>xperience e<span></span>xotic</h1> <!--puts padding between 'e' and 'x' -->
		<a class="headline-btn" href="experienceosiris.php">e<span></span>xpierence osiris</a>
	</div>
</div>

<div class="destinations-wrapper">
	<h2 class="section-header">destinations</h2>

	<span><img src="images/misc/header-flower.png" alt="" class="section-header-flower"></span>

	<hr>

	<div class="destinations">

		<a href="nuevovallarta.php" class="destination-links">
			<div class="destination-boxes">
				<p class="city-names">nuevos vallarta</p>
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
		<a href="villingili.php" class="destination-links">
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

	<div class="text-sections">
		<h3 class="text-header"><span>Visit Us All Around The World</span></h2>
		<p class='body-text'>Osiris is a collection of luxury resorts, located in six stunning destinations
			along the most beautiful beaches in the world. Here, everything has been created for your happiness —
			luxurious accommodations, endless pools, world-class restaurants, activities for all ages, and a staff
			that caters to your every need.<br><br>
			Whatever brings you happiness, you’ll find it at Osiris.</p>
	</div>


</div>


<div id="collage-container">
</div>

<div class="hotels-wrapper">
	<h2 class="section-header">resort hotels</h2>

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

	<div class="text-sections">
		<h3 class="text-header"><span>Check Out Our Resort Hotels</span></h2>
		<p class='body-text'>Your days at Osiris begin and end in the spacious accommodations of our resort hotels —
			impeccably designed spaces where you have everything you need for a perfect vacation.</p>
	</div>


</div>




<?php
	include '01-modules/footer.php';
?>
