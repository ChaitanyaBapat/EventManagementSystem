<!DOCTYPE html>
<html>
<head>

	<title>EMS HomePage</title>

	<!-- Meta Information -->
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">

	<!-- W.CSS Stylesheet -->
	<link rel="stylesheet" type="text/css" href="css/w3.css">
	<link rel="stylesheet" href="css/w3-colors-highway.css">

	<!-- Script For jQuery -->
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>

		<!-- Internal CSS -->
		<style type="text/css">
			@media screen and (max-resolution:420dpi) and (max-device-width:720px) {
				.myclass {
					display: flex;
				}
			}
		</style>
</head>
<body>
	<!-- Header -->
	<div class="w3-row w3-highway-green" style="padding-top: 10px; padding-bottom: 10px; position: sticky;  top:0px;z-index:1000">

		<div class="w3-col l8 w3-container w3-highway-green" style="text-align: center;">
			<a href="./index.php" style="text-decoration: none; font-size: 30px;">Event Management System</a>
		</div>

		<div class="w3-col l4 w3-row w3-highway-green w3-mobile myclass">

			<?php

				// PHP Script For echoing Login/Register buttons or Logout Button

				session_start();

				//If Admin is logged in, redirect to admin's homepage
				// Here, the redirect address is set to events/index.php
				//The script in that page redirects it to admin homepage (admin_homepage.php)

				if ( isset ( $_SESSION['admin_login'] ) && $_SESSION['admin_login'] ) {

					header ( "location:/EventManagementSystem/events/index.php" );
					exit ();

				}

				//If User is logged in, echo Logout Button
				//Else, echo Login and register buttons

				if( isset ( $_SESSION['login'] ) && $_SESSION['login'] ) {

					echo '<a class="w3-mobile w3-btn w3-hover-white w3-round-large w3-border-highway-green" style="float:left;font-size: 16px;" href="logout/logout.php">Logout</a>';

				}
				else {

					echo '<a class="w3-mobile w3-btn w3-hover-white w3-round-large w3-border-highway-green" style="float:left;font-size: 16px;" href="login/login.php">Login</a>';
					echo '<a class="w3-mobile w3-btn w3-hover-white w3-round-large w3-border-highway-green" style="float:left;font-size: 16px;" href="register/register.php">Register</a>';

				}
			?>
			<!-- Contact Us Button -->
			<a class="w3-mobile w3-btn w3-hover-white w3-round-large w3-border-highway-green" style="float:left;font-size: 16px;" href="#/">Contact Us</a>
		</div>
	</div>				

	<!-- Main Body Starts Here -->

	<!-- Container For Body -->
	<div class="w3-mobile">

		<!-- Side Navigation Bar Starts Here -->
		<!-- <div class="w3-col l2 w3-bar-block" style="height: 100%;">

			<a href="#/" class="w3-bar-item w3-button">My Events</a>
			<a href="#/" class="w3-bar-item w3-button">Past Events</a>
			<a href="#/" class="w3-bar-item w3-button">Login</a>
			<a href="#/" class="w3-bar-item w3-button">Register</a>
			<a href="#/" class="w3-bar-item w3-button">Contact Us</a>

		</div> -->

		<!-- Side Navigation Bar Ends Here -->
		<center>
		<!-- Page Content starts here -->
		<div class="w3-container" style="z-index:100; border-left: 2px solid #AAAAAA;">
			<br>
			<div class="w3-row">
			<?php
				//PHP Script For Displaying Events

				require 'auth/connection.php';
			
				$connection_variable = connect_to_the_database();
				$sql = "SELECT * FROM EVENTS";
				$result = $connection_variable->query($sql);
				$count = 0;
				if ( $result->num_rows > 0 ) {
					
					while( $row = $result->fetch_assoc () ) {
						
						//Declaration for w3-card is here
						//div for w3-card is nested in an anchor tag (To make it clickbale)

						echo '<div class="w3-mobile w3-white w3-quarter"min-width:400px; height: 400px;overflow:hidden;position:relative;"><div class="w3-card" style="margin:20px; height:400px;position:relative;"><a href="events/display_event_info.php?e_id='.$row['e_id'].'" style="text-decoration: none;">';

						//Echo the name of the event

						echo '<div class="w3-container w3-padding" style="font-size:18px;display:block;width:100%;text-align:center;"><span style="text-align:center;">'.$row['name'].'</span></div>';

						//Echo the image

						echo '<img class="w3-padding" style="width:100%;" src="images/'.$row['img_name'].'">';

						if( isset( $_SESSION['login'] ) && $_SESSION['login'] && isset( $_SESSION['roll_number'] ) ) {

							//If the user is logged in,
							//1. The max-height limit for short description is enabled (So it doesn't take up the entire div)
							//2. An interested button is added at the bottom
							//3 This interested button is the submit button of the form which redirects to events/display_events.php with e_id

							echo '<div class="w3-container" style="overflow:hidden; max-height:150px;">'.$row['short_desc'].'</div>';

							echo '<form action="events/user_interested.php" method="POST">';

							echo '<input type="hidden" name="e_id" value="'.$row['e_id'].'"></input>';
							echo '<input type="hidden" name="roll_number" value="'.$_SESSION['roll_number'].'"></input>';

							echo '<input class="w3-container w3-button w3-highway-blue" style="position:absolute; right:0; bottom:0; display:block; width:100%; font-size:18px; padding-top:8px;padding-bottom:8px; box shadow:5px 5px 5px solid #888888" type="submit" value="Interested ?"></input></form></a></div>';
						}
						else {

							//If the user is not logged in,
							//The max height limit is disabled, short description takes entire card height
							//Interested button is not echoed

							echo '<div style="overflow:hidden;padding:16px;height:130px;">'.$row['short_desc'].'</div></a></div>';
						}
						echo '</div>';
						$count = $count + 1;
					}
				}
			?>
	</div></div></center></div></div>
</body>
</html>
