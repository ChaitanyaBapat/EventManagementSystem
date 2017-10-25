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
			<a href="./index.php" style="text-decoration: none; font-size: 30px;">Event Management System</a>
		</div>

		<div class="w3-col l4 w3-row w3-highway-green w3-mobile myclass">

			<?php
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

					header ( "location:../index.php" );
					exit ();

				}
			?>
			<!-- Contact Us Button -->
			<a class="w3-mobile w3-btn w3-hover-white w3-round-large w3-border-highway-green" style="float:left;font-size: 16px;" href="#/">Contact Us</a>
			<a class="w3-mobile w3-btn w3-hover-white w3-round-large w3-border-highway-green" style="float:left;font-size: 16px;" href="../register/register.php">Register</a>
		</div>
	</div>				

	<!-- Main Body Starts Here -->

	<!-- Container For Body -->
	<div class="w3-mobile">
		<div class="w3-container">
<?php
	if (!isset($_SESSION)) {
		session_start();
	}
	if(isset($_SESSION['login'])) {
		echo "Logout of your existing account to register a new account.";
	}
	if($_SERVER['REQUEST_METHOD'] === "POST") {
		require './connection.php';
		$connection_variable = connect_to_the_database();
		require '../classes/classes_register_user.php';
		if(isset($_SESSION['database_connection']) && $_SESSION['database_connection']) {
			$my_user = new RegisterUser(
				$_POST['roll_number'],
				$_POST['password'],
				$_POST['first_name'],
				$_POST['middle_name'],
				$_POST['last_name'],
				$_POST['year'],
				$_POST['division'],
				$_POST['batch'],
				$_POST['email'],
				$_POST['mobile'],
				$connection_variable
			);

			if(!empty($_POST['password']) && !empty($_POST['confirm_password'])) {
				if($_POST['password'] === $_POST['confirm_password']) {
					$result_var = $my_user->check_requirements();
					switch($result_var) {
						case 0:
							$result_var_2 = $my_user->insert_user_into_database();
							if($result_var_2 === 1) {
								$_SESSION['login'] = true;
								$_SESSION['roll_number'] = $my_user->roll_number;
								header("location:../index.php");
								break;
							}
							else {
								$_SESSION['login'] = false;
								if($result_var_2 === 0) {
									echo 'Sorry, this account already exists';
								} else {
									echo 'There seems to be a problem, try again';
								}
								break;
							}
						case 1:
							echo $my_user->error_string;
							echo "<br>";
							echo "Account registration has failed, try again.";
							break;
						case 2:
							echo "Invalid roll_number.<br>Account registration has failed, try again.";
							break;
						case 3:
							echo "roll_number should contain only alphabets and numbers. Special characters are not allowed.<br>Account registration has failed, try again.";
							break;
						case 4:
							echo "Length of the password should be more than 8.<br>Account registration has failed, try again.";
							break;
						case 5:
							echo "First Name should contain only alphabets. Special characters and numbers are not allowed.<br>Account registration has failed, try again.";
							break;
						case 6:
							echo "Middle Name should contain only alphabets. Special characters and numbers are not allowed.<br>Account registration has failed, try again.";
							break;
						case 7:
							echo "Last Name should contain only alphabets. Special characters and numbers are not allowed.<br>Account registration has failed, try again.";
							break;
						case 8:
							echo "Year Name should contain only alphabets. Special characters and numbers are not allowed.<br>Account registration has failed, try again.";
							break;
						case 9:
							echo "Division Name should contain only alphabets. Special characters and numbers are not allowed.<br>Account registration has failed, try again.";
							break;
						case 10:
							echo "Invalid E-mail adress.<br>Account registration has failed, try again.";
							break;
						case 100:
						echo 'Sorry, this account already exists';
							break;	
					}
				}
				else {
					echo "The password and confirm password fields do not match.<br>Account Registration has failed. Try Again";
				}
			} else {
				echo "The password or confirm password fields cannot be empty.<br>Account Registration has failed. Try Again";
			}
		}
	}
?></div></div>
</body>