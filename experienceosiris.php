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

<div class="experience-banner">
<!--	<img class="banner-image" src="images/index/banner.jpg"/>-->
	<div class="headline">
		<h1 class="headline-text">experience luxury</h1>
	</div>
</div>

<div class="section-wrapper">
	<h2 class="section-header">this is where everyone finds happiness</h2>
	<span><img src="images/misc/header-flower.png" alt="" class="section-header-flower"></span>
	<hr>

	<div class='info-wrapper'>
		<div class='info-items'>
			<img src='images/information/experience/one.jpg' class='info-images'/>
			<h4 class='info-header'>Sports</h4>
			<p class='info-text'>From water polo and aquagym to the brand-new pool bike and swimming tournaments, there’s always an opportunity to enjoy the plentiful pools and engage in some friendly competition, or even partake in a new experience or two.</p>
		</div>
		<div class='info-items'>
			<img src='images/information/experience/two.jpg' class='info-images'/>
			<h4 class='info-header'>Spa/Fitness</h4>
			<p class='info-text'>Just because you’re on vacation doesn’t mean you have to leave your fitness routine behind! In fact, the Vidanta destinations offer a variety of fun and interesting ways to incorporate exercise into your day. Choose from fitness classes like yoga, Pilates, spinning, Zumba, stretching, fitness boot camp, and cardio abs.</p>
		</div>
		<div class='info-items'>
			<img src='images/information/experience/three.jpg' class='info-images'/>
			<h4 class='info-header'>Entertainment</h4>
			<p class='info-text'>There’s no better way to get to know the Osiris destinations and experience their beautiful scenery first-hand than by taking a tour. Through the nature and botanical walks, you’ll learn about local wildlife and plants, you’ll see all of the sights with our bike tour, and the back-of-house tour offers an opportunity to see all that goes into making a perfect vacation.</p>
		</div>
		<div class='info-items'>
			<img src='images/information/experience/four.jpg' class='info-images'/>
			<h4 class='info-header'>Beach Activities</h4>
			<p class='info-text'>While vacationing, you’ll never want for ways to spend your days in the sun. From on-resort activities like beach volleyball, yoga, and soccer, to off-resort activities like parasailing, rock wall climbing, and beach trampoline, you’ll find a multitude of exciting beach activities to keep you having fun by the water.</p>
		</div>
	</div>
</div>




<?php
	include '01-modules/footer.php';
?>
