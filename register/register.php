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
				<a href="#/" class="open-side-navigation-bar"><img src="../images/hamburger_white.png" class="header-hamburger-img" width="30px"></a>
				<!-- Open Nav Bar Button for mobile Screens -->
				<a href="#/" class="open-side-navigation-bar-mobile"><img src="../images/hamburger_white.png" class="header-hamburger-img" width="30px"></a>
				<a href="#/" class="close-side-navigation-bar"><img src="../images/hamburger_white.png" class="header-hamburger-img" width="30px"></a>
				<!-- Open Nav Bar Button for mobile Screens -->
				<a href="#/" class="close-side-navigation-bar-mobile"><img src="../images/hamburger_white.png" class="header-hamburger-img" width="30px"></a>
			</div>
			<!-- Website Title -->
			<div class="header-website-title">
				<span>Event Management System</span>
			</div>
			<!-- Title Menu -->
			<div class="title-menu-container">
				<div class="title-menu">
					<div class="title-menu-item"><a href="#/" class="title-menu-item-a">Contact Us</a></div>
					<div class="title-menu-item"><a href="#/" class="title-menu-item-a">Login</a></div>
					<div class="title-menu-item"><a href="#/" class="title-menu-item-a">Register</a></div>
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
		<div>
			<form method="POST" action="../auth/new_user.php">
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
				<table>
					<tr>
						<td>Username (Your Roll Number) : </td>
						<td><input type="text" name="username"></td>
					</tr>
					<tr>
						<td>Password : </td>
						<td><input type="password" name="password"></td>
					</tr>
					<tr>
						<td>Confirm Password : </td>
						<td><input type="password" name="confirm_password"></td>
					</tr>
					<tr>
						<td>First Name : </td>
						<td><input type="text" name="first_name"></td>
					</tr>
					<tr>
						<td>Middle Name : </td>
						<td><input type="text" name="middle_name"></td>
					</tr>
					<tr>
						<td>Last Name : </td>
						<td><input type="text" name="last_name"></td>
					</tr>
					<tr>
						<td>Year  : </td>
						<td>
							<input type="radio" name="year" value="fe">First Year<br>
							<input type="radio" name="year" value="se">Second Year<br>
							<input type="radio" name="year" value="te">Third Year<br>
							<input type="radio" name="year" value="be">Fourth Year
						</td>
					</tr>
					<tr>
						<td>Division : </td>
						<td><input type="text" name="division"></td>
					</tr>
					<tr>
						<td>Batch  : </td>
						<td>
							<input type="radio" name="batch" value="one">1<br>
							<input type="radio" name="batch" value="two">2<br>
							<input type="radio" name="batch" value="three">3
						</td>
					</tr>
					<tr>
						<td>Email : </td>
						<td><input type="email" name="email"></td>
					</tr>
					<tr>
						<td>Mobile Number : </td>
						<td><input type="text" name="mobile"></td>
					</tr>
					<tr>
						<td></td>
						<td><input type="submit" name="submit" value="Login"></td>
					</tr>
				</table>
			</form>
		</div>
	</div>
</body>	
