<!DOCTYPE html>
<html>
<head>

	<title>EMS HomePage</title>

	<!-- Meta Information -->
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">

	<!-- W.CSS Stylesheet -->
	<link rel="stylesheet" type="text/css" href="../css/w3.css">
	<link rel="stylesheet" href="../css/w3-colors-highway.css">

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
	<?php
		session_start();
		if(isset($_SESSION['login']) && $_SESSION['login'] === true) {

			header("location:../index.php");
			exit();

		}
		//If Admin is logged in, redirect to admin's homepage
		// Here, the redirect address is set to events/index.php
		//The script in that page redirects it to admin homepage (admin_homepage.php)

		if(isset($_SESSION['admin_login']) && $_SESSION['admin_login'] === true) {

			header("location:../events/index.php");
			exit();

		}

	?>
	
	<div class="w3-row w3-highway-green" style="padding-top: 10px; padding-bottom: 10px; position: sticky;  top:0px;z-index:1000">

		<div class="w3-col l8 w3-container w3-highway-green" style="text-align: center;">
			<a href="../index.php" style="text-decoration: none; font-size: 30px;">Event Management System</a>
		</div>

		<div class="w3-col l4 w3-row w3-highway-green w3-mobile myclass">

	<?php

		// PHP Script For echoing Register button
		echo '<a class="w3-mobile w3-btn w3-hover-white w3-round-large w3-border-highway-green" style="float:left;font-size: 16px;" href="../register/register.php">Register</a>';


	?>
			<a class="w3-mobile w3-btn w3-hover-white w3-round-large w3-border-highway-green" style="float:left;font-size: 16px;" href="#/">Contact Us</a>
		</div>
	</div>				

	<!-- Main Body Starts Here -->
	<div class="w3-mobile">
		<!-- <div class="w3-col l2 w3-bar-block" style=" z-index:10">
			<a href="#/" class="w3-bar-item w3-button">My Events</a>
			<a href="#/" class="w3-bar-item w3-button">Past Events</a>
			<a href="#/" class="w3-bar-item w3-button">Login</a>
			<a href="#/" class="w3-bar-item w3-button">Register</a>
			<a href="#/" class="w3-bar-item w3-button">Contact Us</a>
		</div> -->
		<div class="w3-container" style="position:realtive;z-index:100;">
			<br><br><br>
			<div class="w3-card w3-white w3-mobile" style="display: block;width: 40%; margin: 0 auto; padding: 30px;">
				<form action="../auth/authenticate.php" method="POST">
					<table class="w3-table w3-mobile">
						<?php
							if(isset($_SESSION['login']) && !$_SESSION['login']) {
								echo '<tr><td colspan="2" class="w3-panel w3-red">Incorrect Username or Password</td></tr>';
							} else {
								echo '<tr><td colspan="2" style="display: none;" class="w3-panel w3-red">Incorrect Username or Password</td></tr>';
							}
						?>
						<tr>
							<td>Roll Number</td>
							<td><input style="border: 1px solid #8BC34A; border-radius: 5px;outline: none;" class="w3-input" type="text" name="roll_number" required></td>
						</tr>
						<tr>
							<td>Password :</td>
							<td><input style="border: 1px solid #8BC34A; border-radius: 5px;outline: none;" class="w3-input" type="password" name="password" required></td>
						</tr>
						<tr>
							<td></td>
							<td><input style="border: 1px solid #8BC34A; border-radius: 5px;outline: none;" class="w3-button w3-green" type="submit" value="Login"></td>
						</tr>
					</table>
				</form>
			</div>

		</div>
	</div>

</body>
</html>
