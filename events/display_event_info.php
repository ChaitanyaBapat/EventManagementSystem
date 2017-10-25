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

			echo '<a class="w3-mobile w3-btn w3-hover-white w3-round-large w3-border-highway-green" style="float:left;font-size: 16px;" href="../logout/logout.php">Logout As Admin</a>';			

		}

		//If User is logged in, echo Logout Button
		//Else, echo Login and register buttons
		elseif( isset ( $_SESSION['login'] ) && $_SESSION['login'] ) {
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
		<!-- <div class="w3-col l2 w3-bar-block" style=" z-index:10;">
			<a href="#/" class="w3-bar-item w3-button">My Events</a>
			<a href="#/" class="w3-bar-item w3-button">Past Events</a>
			<a href="#/" class="w3-bar-item w3-button">Login</a>
			<a href="#/" class="w3-bar-item w3-button">Register</a>
			<a href="#/" class="w3-bar-item w3-button">Contact Us</a>
		</div> -->
		<div class="w3-container" style="z-index:100;">
			<br><br>
			<center>
			<?php

				if($_SERVER['REQUEST_METHOD'] === "GET") {
					require '../auth/connection.php';
					$connection_variable = connect_to_the_database();
					if(!isset($_GET['e_id'])) {
						header("location:../index.php");
						exit();
					}
					$e_id = trim(mysqli_real_escape_string($connection_variable,$_GET['e_id']));
					$sql = "SELECT * FROM EVENTS WHERE e_id = $e_id";
					$result = $connection_variable->query($sql);
					if($result->num_rows > 0) {
						while($row = $result->fetch_assoc()) {
							$views = $row['views'];
							$views = $views + 1;
							echo '<div class="w3-card w3-mobile" style="width:70%;">';

							echo '<div class="w3-container w3-blue">';

							echo '<h3>';
							echo $row['name'];
							echo '</h3>';
							echo '</div>';

							echo '<img src="../images/'.$row['img_name'].'" style="width:100%;">';

							echo '<table class="w3-table w3-border w3-bordered w3-mobile">';

							echo '<tr>';
							echo '<td>'.'Short Description'.'</td>';
							echo '<td>'.$row['short_desc'].'</td>';

							echo '</tr>';

							echo '<tr>';
							echo '<td>'.'Long Description'.'</td>';
							echo '<td>'.$row['long_desc'].'</td>';
							echo '</tr>';

							echo '<tr>';
							echo '<td>'.'Place'.'</td>';
							echo '<td>'.$row['place'].'</td>';
							echo '</tr>';

							echo '<tr>';
							echo '<td>'.'Start Date'.'</td>';
							echo '<td>'.$row['s_date'].'</td>';
							echo '</tr>';

							echo '<tr>';
							echo '<td>'.'Start Time'.'</td>';
							echo '<td>'.$row['s_time'].'</td>';
							echo '</tr>';

							echo '<tr>';
							echo '<td>'.'End Date'.'</td>';
							echo '<td>'.$row['e_date'].'</td>';
							echo '</tr>';

							echo '<tr>';
							echo '<td>'.'End Time'.'</td>';
							echo '<td>'.$row['e_time'].'</td>';
							echo '</tr>';

							echo '<tr>';
							echo '<td>'.'Contact Number 1'.'</td>';
							echo '<td>'.$row['c_no1'].'</td>';
							echo '</tr>';

							echo '<tr>';
							echo '<td>'.'Contact Number 2'.'</td>';
							echo '<td>'.$row['c_no2'].'</td>';
							echo '</tr>';

							if( isset( $_SESSION['login'] ) && $_SESSION['login'] && isset( $_SESSION['roll_number'] ) ) {

								echo '<form action="user_interested.php" method="POST">';
								echo '<tr><td></td><td>';
								echo '<input type="hidden" name="e_id" value="'.$row['e_id'].'"></input>';
								echo '<input type="hidden" name="roll_number" value="'.$_SESSION['roll_number'].'"></input>';

								echo '<input class="w3-container w3-button w3-green" style="font-size:18px; padding-top:4px;padding-bottom:4px;" type="submit" value="Interested ?"></input></tr></td></form>';

							}
							if( isset( $_SESSION['admin_login'] ) && $_SESSION['admin_login'] ) {

								echo '<tr><td></td><td>';

								echo '<form action="update_event.php" method="POST">';

								echo '<input type="hidden" name="e_id" value="'.$row['e_id'].'"></input>';

								echo '<input class="w3-half w3-button w3-highway-blue" style=" display:block; width:49.8%; font-size:18px; padding-top:8px;padding-bottom:8px; box shadow:5px 5px 5px solid #888888;border:3px solid white;" type="submit" value="Update Event"></input></form>';

								echo '<form action="get_log.php" method="POST">';

								echo '<input type="hidden" name="e_id" value="'.$row['e_id'].'"></input>';

								echo '<input class="w3-half w3-button w3-highway-blue" style=" display:block; width:49.8%; font-size:18px; padding-top:8px;padding-bottom:8px; box shadow:5px 5px 5px solid #888888;border:3px solid white;" type="submit" value="Get Log"></input></form></td></tr>';
							}
							echo '</table>';

							echo '</div>';
						}
						$insert = "UPDATE EVENTS SET views = $views WHERE e_id = $e_id";
						$insert_result = $connection_variable->query($insert);

					}
				}

			?>
		</center>
		</div>
	</div>

</body>
</html>
