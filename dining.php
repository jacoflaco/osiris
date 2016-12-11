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

<div class="dining-banner">
<!--	<img class="banner-image" src="images/index/banner.jpg"/>-->
	<div class="headline">
		<h1 class="headline-text">dining</h1>
	</div>
</div>

<div class="section-wrapper">
	<h2 class="section-header">a world tour of gourmet cuisine</h2>
	<span><img src="images/misc/header-flower.png" alt="" class="section-header-flower"></span>
	<hr>

	<div class='info-wrapper'>
		<div class='info-items'>
			<img src='images/information/experience/cooking.jpg' class='info-images'/>
			<h4 class='info-header'>Cooking Classes</h4>
			<p class='info-text'>Learn a new recipe or two to show off when you return home!</p>
		</div>
		<div class='info-items'>
			<img src='images/information/experience/culinary.jpg' class='info-images'/>
			<h4 class='info-header'>Culinary Tour</h4>
			<p class='info-text'>Take a tour of four different resort restaurants in one meal!</p>
		</div>
		<div class='info-items'>
			<img src='images/information/experience/mixology.jpg' class='info-images'/>
			<h4 class='info-header'>Mixology Class</h4>
			<p class='info-text'>Master the tricks of preparing the perfect cocktail.</p>
		</div>
	</div>
</div>




<?php
	include '01-modules/footer.php';
?>
