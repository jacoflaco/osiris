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

<div class="entertainment-banner">
<!--	<img class="banner-image" src="images/index/banner.jpg"/>-->
	<div class="headline">
		<h1 class="headline-text">entertainment</h1>
	</div>
</div>

<div class="section-wrapper">
	<h2 class="section-header">let us entertain you</h2>
	<span><img src="images/misc/header-flower.png" alt="" class="section-header-flower"></span>
	<hr>

	<div class='info-wrapper'>
		<div class='info-items'>
			<img src='images/information/experience/joya.jpg' class='info-images'/>
			<h4 class='info-header'>JOYA by Cirque du Soleil</h4>
			<p class='info-text'>JOYÀ, the awe-inspiring visual spectacle boasting a performance-packed wondrous journey in the mysterious Mayan jungle with never-before-seen acts and a 3-course meal tailor-designed to mirror the magic happening onstage.</p>
		</div>
		<div class='info-items'>
			<img src='images/information/experience/hakkasan.jpg' class='info-images'/>
			<h4 class='info-header'>Hakkasan Group</h4>
			<p class='info-text'>Hakkasan Group—the culinary and nightlife masterminds behind the top restaurants and clubs of Vegas, London, Miami, and Dubai—is partnering with Osiris. </p>
		</div>
		<div class='info-items'>
			<img src='images/information/experience/santuario.jpg' class='info-images'/>
			<h4 class='info-header'>Santuario</h4>
			<p class='info-text'>Located at Osiris Nuevo Vallarta, Santuario is a feat of architecture — an enormous thatched-roof palapa that acts as a scenic spot for coffee and pastries by day and a vibrant entertainment venue by night, complete with full bar, performance stage, and dance floor.</p>
		</div>
	</div>
</div>




<?php
	include '01-modules/footer.php';
?>
