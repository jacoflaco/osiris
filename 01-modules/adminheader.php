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

	<link rel="stylesheet" type="text/css" href="../css/datatables/jquery.dataTables_themeroller.css">
  <link rel="stylesheet" type="text/css" href="../css/datatables/jquery.dataTables.min.css">

  <script type="text/javascript" language="javascript" src="../js/jquery.js"></script>
  <script type="text/javascript" language="javascript" src="../js/jquery.dataTables.min.js"></script>

	<link rel='stylesheet' type='text/css' href='../css/style.css'>

	<!-- Favicon Code -->
	<link rel='icon' type='image/png' sizes='32x32' href='../favicon/favicon-32x32.png'>
	<link rel='icon' type='image/png' sizes='96x96' href='../favicon/favicon-96x96.png'>
	<link rel='icon' type='image/png' sizes='16x16' href='../favicon/favicon-16x16.png'>
	<link rel='manifest' href='../favicon/manifest.json'>
	<meta name='msapplication-TileColor' content='#ffffff'>
	<meta name='msapplication-TileImage' content='/ms-icon-144x144.png'>
	<meta name='theme-color' content='#ffffff'>

</head>

<body>

				<header>

					<a href='../index.php'><div id='logo'></div></a>

					<nav>

						<ul id='secondary'>
							<li><a href='newreservation.php' class='secondary-links'>reservation</a></li>
							<li><a href='newadmin.php' class='secondary-links'>admin</a></li>
							<li><a href='newuser.php' class='secondary-links'>user</a></li>
							<?php
								if(isset($_SESSION['admin'])) {
									print "<li><a href='logout.php' class='secondary-links'>logout</a></li>";
								} else {
									print "<li><a href='login.php' class='secondary-links'>login</a></li>";
								}
							?>

						</ul>

						<ul id='primary'>
							<li id='primary-list-item-1'>
								<a href='adminhome.php' class='primary2-links'>control</a>
							</li>
							<li id='primary-list-item-2'>
								<a href='newentry.php' class='primary2-links'>new entry</a>
							</li>
							<li id='primary-list-item-3'>
								<a href='views.php' class='primary2-links'>reports</a>
							</li>
							<li id='primary-list-item-4'>
								<a href='https://corsair.cs.iupui.edu/phpmyadmin/' class='primary2-links'>phpmyadmin</a>
							</li>
						</ul>

					</nav>

				</header>
