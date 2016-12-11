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

<div class="resort-banner">
<!--	<img class="banner-image" src="images/index/banner.jpg"/>-->
	<div class="headline">
		<h1 class="headline-text">motu piti a'au bora bora</h1> <!--puts padding between 'e' and 'x' -->
	</div>
</div>

<div class="section-wrapper">
	<h2 class="section-header">the most spectacular resort in the french polynesians</h2>
	<span><img src="images/misc/header-flower.png" alt="" class="section-header-flower"></span>
	<hr>

	<div id='slide-wrapper' class='slide-wrapper'>
		<div class='slide-left'>
			<div class='slide-left-header'>
				<h3 class='slide-header'>anything<br>you want</h3>
				<p class='slide-header-text'>Over the past 40 years, we’ve redefined tourism with innovative hotel, dining, and entertainment concepts. Everything we’ve learned and refined over the years will culminate in Osiris Motu Piti A'au.</p>
			</div>
			<div class='slide-nav'>
				<a id='link1' class='resort-nav-buttons'>things to do<span class='flecha'>&#8250</span></a>
				<a id='link2' class='resort-nav-buttons'>spa<span class='flecha'>&#8250</span></a>
				<a id='link3' class='resort-nav-buttons'>entertainment<span class='flecha'>&#8250</span></a>
				<a id='link4' class='resort-nav-buttons'>activities<span class='flecha'>&#8250</span></a>
				<a id='link5' class='resort-nav-buttons'>dining<span class='flecha'>&#8250</span></a>
			</div>
		</div>
		<div id='slide-right' class='slide-right'>
			<div id='info1' class='slide-info'>
				<h3 class='slide-info-header'>things to do at motu piti a'au<h3>
				<p class='slide-info-text'>A dazzling dinner show, a challenging game of golf, or a reinvigorating day at the spa — however you prefer to spend your vacation, there’s always a new activity to try at Osiris Motu Piti A'au.</p>
			</div>
			<div id='info2' class='slide-info'>
				<h3 class='slide-info-header'>spa at motu piti a'au<h3>
				<p class='slide-info-text'>No vacation at Osiris would be complete without a few hours to yourself, where you can focus on, well, just you. With their soothing interiors that embody peace and tranquility, our spas and salons offer you a total escape into luxury and relaxation. </p>
			</div>
			<div id='info3' class='slide-info'>
				<h3 class='slide-info-header'>entertainment at motu piti a'au<h3>
				<p class='slide-info-text'>From bringing JOYÀ by Cirque du Soleil to building new, state-of-the-art entertainment spaces like Santuario, we’re dedicated to providing our members with world-class entertainment, including live music, cultural events, and the performing arts.</p>
			</div>
			<div id='info4' class='slide-info'>
				<h3 class='slide-info-header'>activities at motu piti a'au<h3>
				<p class='slide-info-text'>Traveling is an amazing opportunity for couples and families to reconnect, to experience new cultures, and to learn new things. That’s why we offer a rich variety of activities — including sports, games, nature tours, and classes — that will ensure your vacation is full of priceless memories and experiences.</p>
			</div>
			<div id='info5' class='slide-info'>
				<h3 class='slide-info-header'>dining at motu piti a'au<h3>
				<p class='slide-info-text'>The dining experience at Motu Piti A'au allows our members to take a global culinary tour, all in one amazing destination. Mexican, Spanish, Italian, Asian, French, Continental, American, gourmet burgers — we offer cuisines for every palate.</p>
			</div>
		</div>
		<script>
		$('#link1').click(function() {
    	$('#info1').css({'display': 'block'});
			$('#info2').css({'display': 'none'});
			$('#info3').css({'display': 'none'});
			$('#info4').css({'display': 'none'});
			$('#info5').css({'display': 'none'});
			$('#slide-right').css({'background': 'url(images/information/big/thisone.jpg) no-repeat', 'background-size': 'cover', 'background-position': 'center'});
		});
		$('#link2').click(function() {
    	$('#info1').css({'display': 'none'});
			$('#info2').css({'display': 'block'});
			$('#info3').css({'display': 'none'});
			$('#info4').css({'display': 'none'});
			$('#info5').css({'display': 'none'});
			$('#slide-right').css({'background': 'url(images/information/big/spa.jpg) no-repeat', 'background-size': 'cover', 'background-position': 'center'});
		});
		$('#link3').click(function() {
    	$('#info1').css({'display': 'none'});
			$('#info2').css({'display': 'none'});
			$('#info3').css({'display': 'block'});
			$('#info4').css({'display': 'none'});
			$('#info5').css({'display': 'none'});
			$('#slide-right').css({'background': 'url(images/information/big/entertainment.jpg) no-repeat', 'background-size': 'cover', 'background-position': 'center'});
		});
		$('#link4').click(function() {
    	$('#info1').css({'display': 'none'});
			$('#info2').css({'display': 'none'});
			$('#info3').css({'display': 'none'});
			$('#info4').css({'display': 'block'});
			$('#info5').css({'display': 'none'});
			$('#slide-right').css({'background': 'url(images/information/big/golf.jpg) no-repeat', 'background-size': 'cover', 'background-position': 'center'});
		});
		$('#link5').click(function() {
    	$('#info1').css({'display': 'none'});
			$('#info2').css({'display': 'none'});
			$('#info3').css({'display': 'none'});
			$('#info4').css({'display': 'none'});
			$('#info5').css({'display': 'block'});
			$('#slide-right').css({'background': 'url(images/information/big/dining.jpg) no-repeat', 'background-size': 'cover', 'background-position': 'center'});
		});
	</script>
	</div>
</div>




<?php
	include '01-modules/footer.php';
?>
