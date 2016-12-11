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

<div class="hotel-banner">
<!--	<img class="banner-image" src="images/index/banner.jpg"/>-->
	<div class="headline">
		<!-- <h1 class="headline-text">azure</h1> <!--puts padding between 'e' and 'x' -->
		<img class='headline-image' src='images/information/villa.png'/>
	</div>
</div>

<div class="section-wrapper">
	<h2 class="section-header">get treated like royalty</h2>
	<span><img src="images/misc/header-flower.png" alt="" class="section-header-flower"></span>
	<hr>

	<div id='slide-wrapper' class='slide-wrapper'>
		<div class='slide-left'>
			<div class='slide-left-header-hotels'>
				<h3 class='slide-header'>everything you want</h3>
				<p class='slide-header-text'>When you stay at Villa la Luna, you’ll enjoy a vacation filled with fun, relaxation, and the very best service. </p>
			</div>
			<div class='slide-nav-hotels'>
				<a id='link1' class='hotel-nav-buttons'>one bedroom suite<span class='flecha'>&#8250</span></a>
				<a id='link2' class='hotel-nav-buttons'>two bedroom suite<span class='flecha'>&#8250</span></a>
				<a id='link3' class='hotel-nav-buttons'>one bedroom villa<span class='flecha'>&#8250</span></a>
				<a id='link4' class='hotel-nav-buttons'>two bedroom villa<span class='flecha'>&#8250</span></a>
				<a id='link5' class='hotel-nav-buttons'>luxxe villa<span class='flecha'>&#8250</span></a>
				<a id='link6' class='hotel-nav-buttons'>penthouse suite<span class='flecha'>&#8250</span></a>
			</div>
		</div>
		<div id='slide-right-hotels' class='slide-right'>
			<div id='info1' class='slide-info'>
				<h3 class='slide-info-header'>one bedroom suite<h3>
				<p class='slide-info-text'>The One Bedroom Suite features a bedroom outfitted with a king-size bed, and living room complete with a dining table and kitchen. Has a balcony with private plunge pool, as well as two LCD televisions. Accommodates 4 adults, 2 children.</p>
			</div>
			<div id='info2' class='slide-info'>
				<h3 class='slide-info-header'>two bedroom suite<h3>
				<p class='slide-info-text'>The Two Bedroom Suite features two bedrooms and two bathrooms with kitchen and dining table. The balcony has a large plunge pool, chaise lounges, and extra seating. Also features three LCD televisions. Accommodates 6 adults, 2 children.</p>
			</div>
			<div id='info3' class='slide-info'>
				<h3 class='slide-info-header'>one bedroom villa<h3>
				<p class='slide-info-text'>The One Bedroom Villa is a one-bedroom, one-and-a-half-bath villa with one king-size bed, Jacuzzi tub, gourmet kitchen, living room with a sleeper sofa, dining room, private deck, sprawling terrace with a plunge pool, and two LCD TVs. Accommodates 4 adults, 2 children.</p>
			</div>
			<div id='info4' class='slide-info'>
				<h3 class='slide-info-header'>two bedroom villa<h3>
				<p class='slide-info-text'>This beautiful living space is a two-bedroom, two-and-a-half bath villa featuring two king-size beds, two Jacuzzi tubs, sprawling terrace with a plunge pool, separate private deck, gourmet kitchen, two living areas with sleeper sofas, and four LCD TVs. Accommodates 8 adults, 2 children.</p>
			</div>
			<div id='info5' class='slide-info'>
				<h3 class='slide-info-header'>luxxe villa<h3>
				<p class='slide-info-text'>The Luxxe Villa has one bedroom, one bathroom, and features a terrace with one plunge pool, a gourmet kitchen, one king-size bed, one living room with sleeper sofa, spacious bathroom with Jacuzzi tub, and two LCD TVs. Accommodates 2 adults, 2 children.</p>
			</div>
			<div id='info6' class='slide-info'>
				<h3 class='slide-info-header'>penthouse suite<h3>
				<p class='slide-info-text'>The Penthouse Suite has three bedrooms and three baths. Features a terrace with one plunge pool, a gourmet kitchen, two king-size beds and two double-size beds, one living room with sleeper sofas, two dining rooms, two Jacuzzi tubs, and four LCD TVs. Accommodates 10 adults, 2 children.</p>
			</div>
		</div>
		<script>
		$('#link1').click(function() {
    	$('#info1').css({'display': 'block'});
			$('#info2').css({'display': 'none'});
			$('#info3').css({'display': 'none'});
			$('#info4').css({'display': 'none'});
			$('#info5').css({'display': 'none'});
			$('#info6').css({'display': 'none'});
			$('#slide-right-hotels').css({'background': 'url(images/information/big/one.jpg) no-repeat', 'background-size': 'cover', 'background-position': 'center'});
		});
		$('#link2').click(function() {
    	$('#info1').css({'display': 'none'});
			$('#info2').css({'display': 'block'});
			$('#info3').css({'display': 'none'});
			$('#info4').css({'display': 'none'});
			$('#info5').css({'display': 'none'});
			$('#info6').css({'display': 'none'});
			$('#slide-right-hotels').css({'background': 'url(images/information/big/two.jpg) no-repeat', 'background-size': 'cover', 'background-position': 'center'});
		});
		$('#link3').click(function() {
    	$('#info1').css({'display': 'none'});
			$('#info2').css({'display': 'none'});
			$('#info3').css({'display': 'block'});
			$('#info4').css({'display': 'none'});
			$('#info5').css({'display': 'none'});
			$('#info6').css({'display': 'none'});
			$('#slide-right-hotels').css({'background': 'url(images/information/big/three.jpg) no-repeat', 'background-size': 'cover', 'background-position': 'center'});
		});
		$('#link4').click(function() {
    	$('#info1').css({'display': 'none'});
			$('#info2').css({'display': 'none'});
			$('#info3').css({'display': 'none'});
			$('#info4').css({'display': 'block'});
			$('#info5').css({'display': 'none'});
			$('#info6').css({'display': 'none'});
			$('#slide-right-hotels').css({'background': 'url(images/information/big/four.jpg) no-repeat', 'background-size': 'cover', 'background-position': 'center'});
		});
		$('#link5').click(function() {
    	$('#info1').css({'display': 'none'});
			$('#info2').css({'display': 'none'});
			$('#info3').css({'display': 'none'});
			$('#info4').css({'display': 'none'});
			$('#info5').css({'display': 'block'});
			$('#info6').css({'display': 'none'});
			$('#slide-right-hotels').css({'background': 'url(images/information/big/five.jpg) no-repeat', 'background-size': 'cover', 'background-position': 'center'});
		});
		$('#link6').click(function() {
    	$('#info1').css({'display': 'none'});
			$('#info2').css({'display': 'none'});
			$('#info3').css({'display': 'none'});
			$('#info4').css({'display': 'none'});
			$('#info5').css({'display': 'none'});
			$('#info6').css({'display': 'block'});
			$('#slide-right-hotels').css({'background': 'url(images/information/big/six.jpg) no-repeat', 'background-size': 'cover', 'background-position': 'center'});
		});
	</script>
	</div>
</div>




<?php
	include '01-modules/footer.php';
?>
