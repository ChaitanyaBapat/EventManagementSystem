<!DOCTYPE html>
<html>
<head>
	<title>Event Management System</title>
	<meta name="viewport" content="width=device-width, initial-scale=1" />
	<!-- CSS File -->
	<link rel="stylesheet" type="text/css" href="css/styles.css">
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
					$(".rest-of-the-body").css('margin-left', '15%');
					$(".header").css('width','100%');
			});
			$(".side-navigation-bar-content-close-a").click(function() {
					$(".side-navigation-bar").css('width', '0px');
					$(".rest-of-the-body").css('width', '100%');
					$(".rest-of-the-body").css('margin-left', '0px');
					$(".header").css('width','100%');
			});	
			$(".open-side-navigation-bar-mobile").click(function () {
					$(".side-navigation-bar").css('width', '50%');
					$(".rest-of-the-body").css('width', '100%');
					$(".rest-of-the-body").css('overflow-x', 'hidden');
					$(".rest-of-the-body").css('margin-left', '20%');
					$(".header").css('width','100%');
			});
			var headerHeight = $(".header").height();
			$(".side-navigation-bar-close").css('min-height', headerHeight+ 'px');
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
		<!-- close btn -->
		<div class="side-navigation-bar-close">
			<a href="#/" class="side-navigation-bar-content-close-a">Close</a>
		</div>		
		<div class="side-navigation-bar-content">
			<a href="#/" class="side-navigation-bar-content-a"> </a>
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
	</div>
</body>	
