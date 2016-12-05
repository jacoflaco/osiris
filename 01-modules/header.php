<!--
	 Project: Osiris Resorts & Destinations
   Filename: header.php
	 Creation Date: 10/15/2016

   Author: Jake Handwork
	 Modification Date: 10/18/2016
-->

<!DOCTYPE html>
<html>
<head>
	<meta charset='UTF-8'>
	<meta name='viewport' content='width=device-width, initial-scale=1.0'>
	<title>Experience Osiris</title>
	<link rel='stylesheet' type='text/css' href='css/style.css'>

	<!-- Favicon Code -->
	<link rel='icon' type='image/png' sizes='32x32' href='favicon/favicon-32x32.png'>
	<link rel='icon' type='image/png' sizes='96x96' href='favicon/favicon-96x96.png'>
	<link rel='icon' type='image/png' sizes='16x16' href='favicon/favicon-16x16.png'>
	<link rel='manifest' href='favicon/manifest.json'>
	<meta name='msapplication-TileColor' content='#ffffff'>
	<meta name='msapplication-TileImage' content='/ms-icon-144x144.png'>
	<meta name='theme-color' content='#ffffff'>

</head>

<body>

	<?php

		if(isset($_SESSION['email']) && isset($_SESSION['password'])) {
			$name = $_SESSION['activeuser']['FirstName'];
			$name = strtolower($name);
			print "
				<header>

					<a href='index.php'><div id='logo'></div></a>

					<nav>

						<ul id='secondary'>
							<li id='secondary-list-item-1'>
								<ul class='dropdown-menu'>
									<li class='dropdown-list-items'><a href='puertovallarta.php' class='dropdown-links'>puerto vallarta, mexico</a></li>
									<li class='dropdown-list-items'><a href='northshore.php' class='dropdown-links'>north shore, o'ahu, hawaii</a></li>
									<li class='dropdown-list-items'><a href='emeraldbay.php' class='dropdown-links'>emerald bay, bahamas</a></li>
									<li class='dropdown-list-items'><a href='zermatt.php' class='dropdown-links'>zermatt, switzerland</a></li>
									<li class='dropdown-list-items'><a href='villingili.php' class='dropdown-links'>villingili island, maldvies</a></li>
									<li class='dropdown-list-items'><a href='motupitiaahu.php' class='dropdown-links'>motu piti a'ahu, bora bora</a></li>
								</ul>
								<a href='destinations.php' class='secondary-links'>destinations</a></li>
							<li id='secondary-list-item-2'>
								<ul class='dropdown-menu'>
									<li class='dropdown-list-items'><a href='travelinfo.php' class='dropdown-links'>travel info</a></li>
									<li class='dropdown-list-items'><a href='activities.php' class='dropdown-links'>activities</a></li>
									<li class='dropdown-list-items'><a href='spa.php' class='dropdown-links'>spa</a></li>
									<li class='dropdown-list-items'><a href='entertainment.php' class='dropdown-links'>entertainment</a></li>
								</ul>
								<a href='experienceosiris.php' class='secondary-links'>experience</a></li>
							<li id='secondary-list-item-3'>
								<ul class='dropdown-menu'>
									<li class='dropdown-list-items'><a href='whoweare.php' class='dropdown-links'>who we are</a></li>
									<li class='dropdown-list-items'><a href='osirismembership.php' class='dropdown-links'>osiris membership</a></li>
								</ul>
								<a href='aboutosiris.php' class='secondary-links'>about</a></li>
							<li id='secondary-list-item-4'>
								<ul class='dropdown-menu'>
									<li class='dropdown-list-items'><a href='azure.php' class='dropdown-links'>azure</a></li>
									<li class='dropdown-list-items'><a href='emerald.php' class='dropdown-links'>emerald chateau</a></li>
									<li class='dropdown-list-items'><a href='villa.php' class='dropdown-links'>villa la luna</a></li>
								</ul>
								<a href='resorthotels.php' class='secondary-links'>resort hotels</a></li>
						</ul>

						<ul id='primary'>
							<li id='primary-list-item-1'>
								<a href='reservation.php' class='alt-primary-links'>make a reservation</a>
							</li>
							<li id='primary-list-item-2'>
								<a href='viewreservations.php' class='alt-primary-links'>view reservations</a>
							</li>
							<li id='primary-list-item-3'>
								<a href='contact.php' class='alt-primary-links'>contact</a>
							</li>
							<li id='primary-list-item-4'>
								<ul class='dropdown-menu'>
									<li class='dropdown-list-items'><a href='paybill.php' class='dropdown-links'>pay bills</a></li>
									<li class='dropdown-list-items'><a href='changepassword.php' class='dropdown-links'>change password</a></li>
									<li class='dropdown-list-items'><a href='logout.php' class='dropdown-links'>logout</a></li>
								</ul>
								<a href='welcome.php' class='primary-links'>$name</a>
							</li>
						</ul>

					</nav>

				</header>";
		}
		else {
			print "
				<header>

					<a href='index.php'><div id='logo'></div></a>

					<nav>

						<ul id='secondary'>
							<li><a href='reservation.php' class='secondary-links'>make a reservation</a></li>
							<li><a href='contact.php' class='secondary-links'>contact</a></li>
							<li><a href='register.php' class='secondary-links'>register</a></li>
							<li><a href='login.php' class='secondary-links'>login</a></li>
						</ul>

						<ul id='primary'>
							<li id='primary-list-item-1'>
								<ul class='dropdown-menu'>
									<li class='dropdown-list-items'><a href='puertovallarta.php' class='dropdown-links'>puerto vallarta, mexico</a></li>
									<li class='dropdown-list-items'><a href='northshore.php' class='dropdown-links'>north shore, o'ahu, hawaii</a></li>
									<li class='dropdown-list-items'><a href='emeraldbay.php' class='dropdown-links'>emerald bay, bahamas</a></li>
									<li class='dropdown-list-items'><a href='zermatt.php' class='dropdown-links'>zermatt, switzerland</a></li>
									<li class='dropdown-list-items'><a href='villingili.php' class='dropdown-links'>villingili island, maldvies</a></li>
									<li class='dropdown-list-items'><a href='motupitiaahu.php' class='dropdown-links'>motu piti a'ahu, bora bora</a></li>
								</ul>
								<a href='destinations.php' class='primary-links'>destinations</a>
							</li>
							<li id='primary-list-item-2'>
								<ul class='dropdown-menu'>
									<li class='dropdown-list-items'><a href='travelinfo.php' class='dropdown-links'>travel info</a></li>
									<li class='dropdown-list-items'><a href='activities.php' class='dropdown-links'>activities</a></li>
									<li class='dropdown-list-items'><a href='spa.php' class='dropdown-links'>spa</a></li>
									<li class='dropdown-list-items'><a href='entertainment.php' class='dropdown-links'>entertainment</a></li>
								</ul>
								<a href='experienceosiris.php' class='primary-links'>experience osiris</a>
							</li>
							<li id='primary-list-item-3'>
								<ul class='dropdown-menu'>
									<li class='dropdown-list-items'><a href='whoweare.php' class='dropdown-links'>who we are</a></li>
									<li class='dropdown-list-items'><a href='osirismembership.php' class='dropdown-links'>osiris membership</a></li>
								</ul>
								<a href='aboutosiris.php' class='primary-links'>about osiris</a>
							</li>
							<li id='primary-list-item-4'>
								<ul class='dropdown-menu'>
									<li class='dropdown-list-items'><a href='azure.php' class='dropdown-links'>azure</a></li>
									<li class='dropdown-list-items'><a href='emerald.php' class='dropdown-links'>emerald chateau</a></li>
									<li class='dropdown-list-items'><a href='villa.php' class='dropdown-links'>villa la luna</a></li>
								</ul>
								<a href='resorthotels.php' class='primary-links'>resort hotels</a>
							</li>
						</ul>

					</nav>

				</header>

			";
		}
