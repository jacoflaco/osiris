<!--
	 Project: Osiris Resorts & Destinations
   Filename: login.php
	 Creation Date: 10/15/2016

   Author: Jake Handwork
	 Modification Date: 10/18/2016
-->

<?php session_start();
	require_once '../00-utility/functions.php';
	require_once '../00-utility/dbconnect.php';

	if(!isset($_SESSION['admin'])) {
		session_unset();
		session_destroy();
		header('location: login.php');
	}
?>

<?php
	include '../01-modules/adminheader.php';
?>

<div class="form-container">
	<div id="form-wrapper">
		<h3 class="form-header">osiris control center</h3>


			<div class="form-section-divs">

				<a class='mainbuttons button-2-cols' href='newentry.php'>New Entry</a>
				<a class='mainbuttons button-2-cols' href='views.php'>Views</a>
				<a class='mainbuttons button-2-cols' href='https://corsair.cs.iupui.edu/phpmyadmin/'>phpMyAdmin</a>

			</div>



		</form>
	</div>

</div>


<?php
	include '../01-modules/footer.php';
?>
