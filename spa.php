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

<div class="spa-banner">
<!--	<img class="banner-image" src="images/index/banner.jpg"/>-->
	<div class="headline">
		<h1 class="headline-text">spa</h1>
	</div>
</div>

<div class="section-wrapper">
	<h2 class="section-header">be our pampered guest</h2>
	<span><img src="images/misc/header-flower.png" alt="" class="section-header-flower"></span>
	<hr>

	<div class='info-wrapper'>
		<div class='info-items'>
			<img src='images/information/experience/brio.jpg' class='info-images'/>
			<h4 class='info-header'>Brio Spa & Fitness Center</h4>
			<p class='info-text'>Brio is Osiris' expression of the French art of the spa. Beautiful architectural elements combine with soothing sounds and invigorating aromas — all designed to calm the mind and relax the body.</p>
		</div>
		<div class='info-items'>
			<img src='images/information/experience/spatium.jpg' class='info-images'/>
			<h4 class='info-header'>Spatium</h4>
			<p class='info-text'>There simply is no spa experience like Spatium; here, luxury and pampering are taken to a whole new level. You’ll be immersed in an exotic world of luxury where ancient healing techniques are combined with modern practices to transport you to a place of total peace. </p>
		</div>
	</div>
</div>




<?php
	include '01-modules/footer.php';
?>
