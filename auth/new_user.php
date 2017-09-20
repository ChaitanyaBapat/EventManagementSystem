<?php
	if (!isset($_SESSION)) {
		session_start();
	}
?>
<!DOCTYPE html>
<html>
<head>
	<title>Event Management System</title>
	<meta name="viewport" content="width=device-width, initial-scale=1" />
	<!-- CSS File -->
	<link rel="stylesheet" type="text/css" href="../css/styles.css">
	<!-- Google Fonts -->
	<link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">
	<link href="https://fonts.googleapis.com/css?family=Pacifico" rel="stylesheet">
	<!-- jQuery Script -->
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
	<!-- jQuery Functions for Side Navigation Bar -->
	<script type="text/javascript">
		$(document).ready(function() {
			$(".open-side-navigation-bar").click(function() {
				$(".side-navigation-bar").css('width', '15%');
				$(".rest-of-the-body").css('width', '85%');
				$(".rest-of-the-body").css('margin-left', '17%');
				$(".header").css('width','100%');
				$(".close-side-navigation-bar").css('display', 'inline-block');
				$(this).css('display', 'none');
			});
			$(".open-side-navigation-bar-mobile").click(function () {
				$(".side-navigation-bar").css('width', '50%');
				$(".rest-of-the-body").css('width', '50%');
				$(".rest-of-the-body").css('overflow-x', 'hidden');
				$(".rest-of-the-body").css('margin-left', '52%');
				$(".header").css('width','100%');
				$(".close-side-navigation-bar-mobile").css('display', 'inline-block');
				$(this).css('display', 'none');
			});
			$(".close-side-navigation-bar").click(function() {
				$(".side-navigation-bar").css('width', '0px');
				$(".rest-of-the-body").css('width', '100%');
				$(".rest-of-the-body").css('margin-left', '10px');
				$(".header").css('width','100%');
				$(".open-side-navigation-bar").css('display', 'inline-block');
				$(this).css('display', 'none');
			});	
			$(".close-side-navigation-bar-mobile").click(function() {
				$(".side-navigation-bar").css('width', '0px');
				$(".rest-of-the-body").css('width', '100%');
				$(".rest-of-the-body").css('margin-left', '10px');
				$(".header").css('width','100%');
				$(".open-side-navigation-bar-mobile").css('display', 'inline-block');
				$(this).css('display', 'none');
			});	
		});
	</script>
</head>
<body class="container"> 
	<!-- Header-->		
		<div class="header">
			<!-- Open nav bar btn -->
			<div class="header-hamburger">
				<a href="#/" class="open-side-navigation-bar"><img src="images/hamburger_white.png" class="header-hamburger-img" width="30px"></a>
				<!-- Open Nav Bar Button for mobile Screens -->
				<a href="#/" class="open-side-navigation-bar-mobile"><img src="images/hamburger_white.png" class="header-hamburger-img" width="30px"></a>
				<a href="#/" class="close-side-navigation-bar"><img src="images/hamburger_white.png" class="header-hamburger-img" width="30px"></a>
				<!-- Open Nav Bar Button for mobile Screens -->
				<a href="#/" class="close-side-navigation-bar-mobile"><img src="images/hamburger_white.png" class="header-hamburger-img" width="30px"></a>
			</div>
			<!-- Website Title -->
			<div class="header-website-title">
				<a href="index.php" id="website">Event Management System</a>
			</div>
			<!-- Title Menu -->
			<div class="title-menu-container">
				<div class="title-menu">
					<div class="title-menu-item"><a href="contact/contact.php" class="title-menu-item-a">Contact Us</a></div>
					<div class="title-menu-item"><a href="register/register.php" class="title-menu-item-a">Register</a></div>
					<?php
						if (!isset($_SESSION)) {
							session_start();
						}
						if (isset($_SESSION['login'])) {
							echo '<div class="title-menu-item"><a href="logout/logout.php" class="title-menu-item-a">Logout</a></div>';
						}
						else {
							echo '<div class="title-menu-item"><a href="login/login.php" class="title-menu-item-a">Login</a></div>';
						}
					?>
				</div>
			</div>
		</div>
	<!-- Side Navigation bar -->
	<div class="side-navigation-bar"> 	
		<div class="side-navigation-bar-content-top">
		</div>
		<div class="side-navigation-bar-content">
			<a href="#/" class="side-navigation-bar-content-a">Home</a>
		</div>
		<div class="side-navigation-bar-content">
			<a href="#/" class="side-navigation-bar-content-a">My Events</a>
		</div>
		<div class="side-navigation-bar-content">
			<a href="#/" class="side-navigation-bar-content-a">Past Events</a>
		</div>
		<div class="side-navigation-bar-content">
			<a href="#/" class="side-navigation-bar-content-a">CSI</a>
		</div>
		<div class="side-navigation-bar-content">
			<a href="#/" class="side-navigation-bar-content-a">IEEE</a>
		</div>
		<div class="side-navigation-bar-content">
			<a href="#/" class="side-navigation-bar-content-a">ISTE</a>
		</div>
		<div class="side-navigation-bar-content">
			<a href="#/" class="side-navigation-bar-content-a">Social Wing</a>
		</div>
		<div class="side-navigation-bar-content">
			<a href="#/" class="side-navigation-bar-content-a">ITSA</a>
		</div>
		<div class="side-navigation-bar-content">
			<a href="#/" class="side-navigation-bar-content-a">SUC</a>
		</div>
		<div class="side-navigation-bar-content">
			<a href="#/" class="side-navigation-bar-content-a">Kalaraag</a>
		</div>

	</div>
	<!-- Body Content -->
	<div class="rest-of-the-body"> 
		<!-- insert Body here -->
		<?php
			if (!isset($_SESSION)) {
				session_start();
			}
			if(isset($_SESSION['login'])) {
				echo "Logout of your existing account to register a new account.";
			}
			require 'connection.php';
			require '../classes/user.php';
			if($_SESSION['database_connection'] === 'connected') {
				$my_user = new user(
					$_POST['username'],
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
								echo $result_var_2;
								break;
							case 1:
								echo $my_user->error_string;
								echo "<br>";
								echo "Account registration has failed, try again.";
								break;
							case 2:
								echo "Invalid username.<br>Account registration has failed, try again.";
								break;
							case 3:
								echo "Username should contain only alphabets and numbers. Special characters are not allowed.<br>Account registration has failed, try again.";
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
						}
					}
					else {
						echo "The password and confirm password fields do not match.<br>Account Registration has failed. Try Again";
					}
				} else {
					echo "The password or confirm password fields cannot be empty.<br>Account Registration has failed. Try Again";
				}
			}
		?>
	</div>
</body>	