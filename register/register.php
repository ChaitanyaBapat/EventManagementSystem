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

	<div class="w3-row w3-highway-green" style="padding-top: 10px; padding-bottom: 10px; position: sticky;  top:0px;z-index:1000">

		<div class="w3-col l8 w3-container w3-highway-green" style="text-align: center;">
			<a href="../index.php" style="text-decoration: none; font-size: 30px;">Event Management System</a>
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
			echo '<a class="w3-mobile w3-btn w3-hover-white w3-round-large w3-border-highway-green" style="float:left;font-size: 16px;" href="../logout/logout.php">Logout</a>';

		}
		else {

			echo '<a class="w3-mobile w3-btn w3-hover-white w3-round-large w3-border-highway-green" style="float:left;font-size: 16px;" href="../login/login.php">Login</a>';
			echo '<a class="w3-mobile w3-btn w3-hover-white w3-round-large w3-border-highway-green" style="float:left;font-size: 16px;" href="../register/register.php">Register</a>';

		}
	?>
			<a class="w3-mobile w3-btn w3-hover-white w3-round-large w3-border-highway-green" style="float:left;font-size: 16px;" href="#/">Contact Us</a>
		</div>
	</div>				

	<!-- Main Body Starts Here -->
	<div class="w3-mobile">
		<!-- <div class="w3-col l2 w3-bar-block" style="position: sticky; top: 70px;">
			<a href="#/" class="w3-bar-item w3-button">My Events</a>
			<a href="#/" class="w3-bar-item w3-button">Past Events</a>
			<a href="#/" class="w3-bar-item w3-button">Login</a>
			<a href="#/" class="w3-bar-item w3-button">Register</a>
			<a href="#/" class="w3-bar-item w3-button">Contact Us</a>
		</div> -->
		<div class="w3-container" style="z-index:100;">
			<?php
				if (!isset($_SESSION)) {
					session_start();
				}
				if(isset($_SESSION['login'])) {
					echo 'Please log out of your existing account to register a new account.';
				}
				else {
					echo '<br><br><center><div class="w3-container w3-card" style="width:60%;">
					<form method="POST" action="../auth/register_new_user.php">
						<!-- Table inside the form tag -->
						<!-- This form contains the following info
						* Roll No
						* Password
						*Confirm password
						* First Name
						* Middle Name
						* Last Name
						* Year (FE,SE,TE,BE)
						* Division
						* Batch
						* Email
						* Mobile Number -->
						<table class="w3-table">
							<tr>
								<td colspan="2" class="w3-panel w3-blue" style="padding:20px;font-size:22px;"><center>Registration Form</center></td>
							</tr>
							<tr>
								<td>Username (Your Roll Number) : </td>
								<td><input class="w3-input" style="border:1px solid #8BC34A;outline:none;border-radius:5px;" type="text" name="roll_number" required></td>
							</tr>
							<tr>
								<td>Password :<br> (Minimum 8 characters long)</td>
								<td><input class="w3-input" style="border:1px solid #8BC34A;outline:none;border-radius:5px;" type="password" name="password" minlength="8" required></td>
							</tr>
							<tr>
								<td>Confirm Password : </td>
								<td><input class="w3-input" style="border:1px solid #8BC34A;outline:none;border-radius:5px;" type="password" name="confirm_password" minlength="8" required></td>
							</tr>
							<tr>
								<td>First Name : </td>
								<td><input class="w3-input" style="border:1px solid #8BC34A;outline:none;border-radius:5px;" type="text" name="first_name" required></td>
							</tr>
							<tr>
								<td>Middle Name : </td>
								<td><input class="w3-input" style="border:1px solid #8BC34A;outline:none;border-radius:5px;" type="text" name="middle_name" required></td>
							</tr>
							<tr>
								<td>Last Name : </td>
								<td><input class="w3-input" style="border:1px solid #8BC34A;outline:none;border-radius:5px;" type="text" name="last_name" required></td>
							</tr>
							<tr>
								<td>Year  : </td>
								<td>
									<input class="w3-radio" type="radio" name="year" value="FE" required>&nbsp;&nbsp;First Year<br>
									<input class="w3-radio" type="radio" name="year" value="SE" required>&nbsp;&nbsp;Second Year<br>
									<input class="w3-radio" type="radio" name="year" value="TE" required>&nbsp;&nbsp;Third Year<br>
									<input class="w3-radio" type="radio" name="year" value="BE" required>&nbsp;&nbsp;Fourth Year<br>
								</td>
							</tr>
							<tr>
								<td>Division : </td>
								<td><input class="w3-input" style="border:1px solid #8BC34A;outline:none;border-radius:5px;" type="text" name="division" required></td>
							</tr>
							<tr>
								<td>Batch  : </td>
								<td>
									<input class="w3-radio" type="radio" name="batch" value="1" required>&nbsp;&nbsp;1<br>
									<input class="w3-radio" type="radio" name="batch" value="2" required>&nbsp;&nbsp;2<br>
									<input class="w3-radio" type="radio" name="batch" value="3" required>&nbsp;&nbsp;3<br>
								</td>
							</tr>
							<tr>
								<td>Email : </td>
								<td><input class="w3-input" style="border:1px solid #8BC34A;outline:none;border-radius:5px;" type="email" name="email" required></td>
							</tr>
							<tr>
								<td>Mobile Number : </td>
								<td><input class="w3-input" style="border:1px solid #8BC34A;outline:none;border-radius:5px;" type="text" name="mobile" required></td>
							</tr>
							<tr>
								<td></td>
								<td><input class="w3-button w3-blue" style="padding:10px;font-size:22px;" type="submit" name="submit" value="Register" required></td>
							</tr>
						</table>
					</form>

				</div></center>';
				}
			?>
		</div>
	</div>

</body>
</html>
