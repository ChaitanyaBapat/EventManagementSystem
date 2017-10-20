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
			<a href="./index.php" style="text-decoration: none; font-size: 30px;">Event Management System</a>
		</div>

		<div class="w3-col l4 w3-row w3-highway-green w3-mobile myclass">

	<?php

		// PHP Script For echoing Login/Register buttons or Logout Button

		session_start();

		//If Admin is logged in, redirect to admin's homepage
		// Here, the redirect address is set to events/index.php
		//The script in that page redirects it to admin homepage (admin_homepage.php)

		if ( isset ( $_SESSION['login'] ) && $_SESSION['login'] ) {

			header ( "location:../index.php" );
			exit ();

		}

		//If User is logged in, echo Logout Button
		//Else, echo Login and register buttons
		if( isset ( $_SESSION['admin_login'] ) && $_SESSION['admin_login'] ) {
			//change dis sjhit
			echo '<a class="w3-mobile w3-btn w3-hover-white w3-round-large w3-border-highway-green" style="float:left;font-size: 16px;" href="../logout/logout.php">Logout As Admin</a>';

			echo '<a class="w3-mobile w3-btn w3-hover-white w3-round-large w3-border-highway-green" style="float:left;font-size: 16px;" href="./add_event.php">Add New Event</a>';

		}
		else {
			header("location:../index.php");
			exit();
			
		}
	?>
			<a class="w3-mobile w3-btn w3-hover-white w3-round-large w3-border-highway-green" style="float:left;font-size: 16px;" href="#/">Contact Us</a>
		</div>
	</div>				

	<!-- Main Body Starts Here -->
	<div class="w3-row w3-mobile">
		<div class="w3-col l2 w3-bar-block" style="height: 100%;">
			<a href="#/" class="w3-bar-item w3-button">My Events</a>
			<a href="#/" class="w3-bar-item w3-button">Past Events</a>
			<a href="#/" class="w3-bar-item w3-button">Login</a>
			<a href="#/" class="w3-bar-item w3-button">Register</a>
			<a href="#/" class="w3-bar-item w3-button">Contact Us</a>
		</div>
		<div class="w3-col l10" style="z-index:100; border-left: 2px solid #AAAAAA;">
			<br>
		<?php
			//PHP Script For Displaying Events

			require '../auth/connection.php';
		
			$connection_variable = connect_to_the_database();
			$sql = "SELECT * FROM EVENTS";
			$result = $connection_variable->query($sql);
			$count = 0;
			if ( $result->num_rows > 0 ) {
				
				while( $row = $result->fetch_assoc () ) {
					
					if($count % 3 == 0) {
						echo '<div class="w3-row">';
						echo '<a href="../events/display_event_info.php?e_id='.$row['e_id'].'" style="text-decoration: none;"><div class="w3-card w3-mobile w3-white" style="border:1px solid #BBBBBB;min-width:250px;margin: 5px;width:30%; height: 400px; float:left; overflow:hidden; position: relative;">';
					}
					elseif($count % 3 == 2) {
						echo '<a href="../events/display_event_info.php?e_id='.$row['e_id'].'" style="text-decoration: none;"><div class="w3-card w3-mobile w3-white" style="border:1px solid #BBBBBB;min-width:250px;margin: 5px;width:30%; height: 400px; float:left; overflow:hidden; position: relative;">';
					}
					else {
						echo '<a href="../events/display_event_info.php?e_id='.$row['e_id'].'" style="text-decoration: none;"><div class="w3-card w3-mobile w3-white" style="border:1px solid #BBBBBB;min-width:250px;margin: 5px;width:30%; height: 400px; float:left; overflow:hidden; position: relative;">';
					}

					echo '<div class="w3-container w3-padding" style="font-size:18px;display:block;width:100%;text-align:center;"><span style="text-align:center;">'.$row['name'].'</span></div>';

					echo '<img class="w3-padding" style="width:100%;" src="../images/'.$row['img_name'].'">';

					if( isset( $_SESSION['admin_login'] ) && $_SESSION['admin_login'] ) {

						echo '<div class="w3-container" style="overflow:hidden; max-height:150px;">'.$row['short_desc'].'</div>';

						echo '<form action="update_event.php" method="POST">';

						echo '<input type="hidden" name="e_id" value="'.$row['e_id'].'"></input>';

						echo '<input class="w3-half w3-button w3-highway-blue" style="position: absolute; right:0; bottom:0; display:block; width:49.8%; font-size:18px; padding-top:8px;padding-bottom:8px; box shadow:5px 5px 5px solid #888888;border:3px solid white;" type="submit" value="Update Event"></input></form>';

						echo '<form action="get_log.php" method="POST">';

						echo '<input type="hidden" name="e_id" value="'.$row['e_id'].'"></input>';

						echo '<input class="w3-half w3-button w3-highway-blue" style="position: absolute; left:0; bottom:0; display:block; width:49.8%; font-size:18px; padding-top:8px;padding-bottom:8px; box shadow:5px 5px 5px solid #888888;border:3px solid white;" type="submit" value="Get Log"></input></form>';
					}
					else {
						echo '<div class="w3-container" style="overflow:hidden;">'.$row['short_desc'].'</div>';
					}
					echo '</div></a>';
					$count = $count + 1;
				}
			}
		?>
	</div></div></div>
</body>
</html>
