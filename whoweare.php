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

<div class="who-banner">
<!--	<img class="banner-image" src="images/index/banner.jpg"/>-->
	<div class="headline">
		<h1 class="headline-text">who we are</h1>
	</div>
</div>

<div class="section-wrapper">
	<h2 class="section-header">about osiris</h2>
	<span><img src="images/misc/header-flower.png" alt="" class="section-header-flower"></span>
	<hr>

	<div class="text-sections">
		<h3 class="text-header"><span>Inspiring a Lifetime of Happiness</span></h2>
		<p class='body-text'>At Osiris, we have one simple goal — the happiness of our guests.<br><br>
				The Osiris destinations are six exclusive properties throughout the world where stunning natural
				beauty meets awe-inspiring design. Days here are spent making vacation memories unlike any other.<br><br>
				Osiris has reinvented the vacation destination, offering luxurious, spacious accommodations; gourmet dining;
				pristine pools; state-of-the-art spas; world-class entertainment, including JOYÀ by Cirque du Soleil;
				and the best names in golf course design: Jack Nicklaus and Greg Norman.</p>
	</div>

	<div class="text-sections">
		<h3 class="text-header"><span>The Osiris Difference</span></h2>
		<p class='body-text'>At Osiris, we treat you like family. It is our honor to get to know your name and attend
			to your every need so that you can focus on what matters most: making memories with your loved ones.</p>
	</div>
</div>




<?php
	include '01-modules/footer.php';
?>
