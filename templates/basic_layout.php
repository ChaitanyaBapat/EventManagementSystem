<!DOCTYPE html>
<html>
<head>

	<title>Event Manager HomePage</title>

	<!-- Meta Information -->
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">

	<!-- W.CSS Stylesheet -->
	<link rel="stylesheet" type="text/css" href="../css/w3.css">
	<link rel="stylesheet" href="https://www.w3schools.com/lib/w3-colors-highway.css">
	<!-- Script For jQuery -->
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
		<style type="text/css">
			@media screen and (max-resolution:420dpi) and (max-device-width:720px) {
			.myclass {
				display: flex;
			}
		}
		</style>
</head>
<body>

	<div class="w3-row w3-highway-green" style="padding-top: 10px; padding-bottom: 10px; position: sticky;  top:0px;z-index:1000">

		<div class="w3-col l8 w3-container w3-highway-green" style="text-align: center;">
			<a href="#/" style="text-decoration: none; font-size: 30px;">Event Management System</a>
		</div>

		<div class="w3-col l4 w3-row w3-highway-green w3-mobile myclass">

	<?php

		// PHP Script For echoing Login/Register buttons or Logout Button

		session_start();

		//If Admin is logged in, redirect to admin's homepage
		// Here, the redirect address is set to events/index.php
		//The script in that page redirects it to admin homepage (admin_homepage.php)

		if ( isset ( $_SESSION['admin_login'] ) && $_SESSION['admin_login'] ) {

			header ( "location:../events/index.php" );
			exit ();

		}

		//If User is logged in, echo Logout Button
		//Else, echo Login and register buttons
		if( isset ( $_SESSION['login'] ) && $_SESSION['login'] ) {
			//change dis sjhit
			echo '<a class="w3-mobile w3-btn w3-hover-white w3-round-large w3-border-highway-green" style="float:left;font-size: 16px;" href="logout/logout.php">Logout</a>';

		}
		else {

			echo '<a class="w3-mobile w3-btn w3-hover-white w3-round-large w3-border-highway-green" style="float:left;font-size: 16px;" href="login/login.php">Login</a>';
			echo '<a class="w3-mobile w3-btn w3-hover-white w3-round-large w3-border-highway-green" style="float:left;font-size: 16px;" href="register/register.php">Register</a>';

		}
	?>
			<a class="w3-mobile w3-btn w3-hover-white w3-round-large w3-border-highway-green" style="float:left;font-size: 16px;" href="#/">Contact Us</a>
		</div>
	</div>				

	<!-- Main Body Starts Here -->
	<div class="w3-row w3-mobile">
		<div class="w3-col l2 w3-bar-block" style="position: sticky; top: 70px;">
			<a href="#/" class="w3-bar-item w3-button">My Events</a>
			<a href="#/" class="w3-bar-item w3-button">Past Events</a>
			<a href="#/" class="w3-bar-item w3-button">Login</a>
			<a href="#/" class="w3-bar-item w3-button">Register</a>
			<a href="#/" class="w3-bar-item w3-button">Contact Us</a>
		</div>
		<div class="w3-col l10" style="z-index:100;">
			
		</div>
	</div>

</body>
</html>
