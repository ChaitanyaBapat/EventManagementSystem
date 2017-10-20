<?php
	session_start();
	if(isset($_SESSION['login']) && $_SESSION['login']) {
		header("location:../index.php");
		exit();
	}
	if(!isset($_SESSION['admin_login'])) {
		header("location:../login/admin_login.php");
		exit();
	}
	elseif (isset($_SESSION['admin_login']) && !$_SESSION['admin_login']) {
		header("location:../login/admin_login.php");
		exit();
	}
	if($_SERVER['REQUEST_METHOD'] === "POST") {
		require '../auth/connection.php';
		$connection_variable = connect_to_the_database();

		$e_id = mysqli_real_escape_string($connection_variable,$_POST["e_id"]);
		if(isset($e_id)) {
			$query = "SELECT * FROM events WHERE e_id = $e_id";
			$result = $connection_variable->query($query);
			if($result->num_rows === 1) {
				$row = mysqli_fetch_array($result);
				$name = $row["name"];
				$s_date = $row["s_date"];
				$e_date = $row["e_date"];
				$s_time = $row["s_time"];
				$e_time = $row["e_time"];
				$place = $row["place"];
				$short_desc = $row["short_desc"];
				$long_desc = $row["long_desc"];
				$c_no1 = $row["c_no1"];
				$c_no2 = $row["c_no2"];
			}
		} else {
			header("location:admin_homepage.php");
			exit();
		}
	}
	else {
		header("location:admin_homepage.php");
		exit();
	}	
?>

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
	<div class="w3-container" >

	<form action="../auth/update_event.php" method="post" class="w3-input" enctype="multipart/form-data" >
        <div style="padding:10px; align-content:center" class="border">
            Event Name :<span style='color: red;'> *</span> <br>
            <input id="evtname" name="evtname" class="w3-input" type="text" style="margin-bottom:10px;width:100%" required value="<?php echo $name; ?>" /><br><br>
            Event Start Date:<span style='color: red;'> *</span> <br>
            <input id="evtdate" name="s_date" class="w3-input" type="date" style="margin-bottom:10px;width:100%" required value="<?php echo $s_date; ?>" /><br><br>
			      Event End Date:<span style='color: red;'> *</span> <br>
            <input id="evtdate" name="e_date" class="w3-input" type="date" style="margin-bottom:10px;width:100%" required value="<?php echo $e_date ?>" /><br><br>
            Event Start Time: <span style='color: red;'> *</span><br>
            <input id="evttime" name="s_time" class="w3-input" type="time" style="margin-bottom:10px;width:100%" required value="<?php echo $s_time ?>" /><br><br>
			      Event End Time: <span style='color: red;'> *</span><br>
            <input id="evttime" name="e_time" class="w3-input" type="time" style="margin-bottom:10px;width:100%" required value="<?php echo $e_time ?>" /><br><br>
            Place:<span style='color: red;'> *</span><br>
            <textarea id="place" name="place" rows="2" cols="50" style="margin-bottom:10px;width:100%" maxlength="2000" required ><?php echo $place; ?></textarea><br><br>
            Short Description:<span style='color: red;'> *</span>(max 1000 characters. Displayed in the list of events)<br>
            <textarea id="Sdesc" name="Sdesc" rows="2" cols="50" style="margin-bottom:10px;width:100%" maxlength="1000" reuired ><?php echo $short_desc; ?></textarea><br><br>
            Detailed Descrition:<span style='color: red;'> *</span><br>
            <textarea id="Ddesc" name="Ddesc" rows="10" cols="50" style="margin-bottom:10px;width:100%" minlength = "100" required ><?php echo $long_desc ?></textarea><br><br>
            Contact number 1:<span style='color: red;'> *</span><br>
            <input id="c_no1" name="c_no1" class="w3-input" type="text" style="margin-bottom:10px;width:100%" required value="<?php echo $c_no1 ?>" /><br><br>
            Contact number 2:(optional) <br>
            <input id="c_no2" name="c_no2" class="w3-input" type="text" style="margin-bottom:10px;width:100%" value="<?php echo $c_no2 ?>" /><br><br>
            <input type="hidden" name="e_id" value="<?php echo $e_id; ?>">
			<input id="submit" type="submit" value="Submit" class="w3-btn w3-teal w3-round-xlarge "/>
        </div>
    </form>
</div></div>
</div>
</body>
</html>
