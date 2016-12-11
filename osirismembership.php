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

<div class="membership-banner">
<!--	<img class="banner-image" src="images/index/banner.jpg"/>-->
	<div class="headline">
		<h1 class="headline-text">osiris memberships</h1>
	</div>
</div>

<div class="section-wrapper">
	<h2 class="section-header">about osiris</h2>
	<span><img src="images/misc/header-flower.png" alt="" class="section-header-flower"></span>
	<hr>

	<div class="text-sections">
		<h3 class="text-header"><span>What Is Osiris Vacations?</span></h2>
		<p class='body-text'>Osiris Vacations is a luxury destination club that offers you access to amazing vacation
			experiences at the finest and most exclusive resorts in the world. Whatever happiness means to you,
			Osiris Vacations will help you find your own piece of paradise and true happiness through spectacular vacations.</p>
	</div>

	<div class="text-sections">
		<h3 class="text-header"><span>Resort Hotels</span></h2>
		<p class='body-text'>When you stay at an Osiris destination, your days begin and end in luxurious resort hotels with everything you need for a perfect vacation.</p>
	</div>
</div>




<?php
	include '01-modules/footer.php';
?>
