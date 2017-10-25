<!DOCTYPE html>
<html>
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

		// PHP Script For echoing Login/Register buttons or Logout Button

		session_start();

		if ( isset ( $_SESSION['login'] ) && $_SESSION['login'] ) {

			header ( "location:../index.php" );
			exit ();

		}
		if( isset ( $_SESSION['admin_login'] ) && $_SESSION['admin_login'] ) {
			echo '<a class="w3-mobile w3-btn w3-hover-white w3-round-large w3-border-highway-green" style="float:left;font-size: 16px;" href="#/">Contact Us</a>
		</div>';
			echo '<a class="w3-mobile w3-btn w3-hover-white w3-round-large w3-border-highway-green" style="float:left;font-size: 16px;" href="logout/logout.php">Logout As Admin</a>';

		}
		else {
			header("location:../index.php");
			exit();
			
		}
	?>
	</div>				

	<!-- Main Body Starts Here -->
	<div class=" w3-mobile">
		<!-- <div class="w3-col l2 w3-bar-block" style="height: 100%;">
			<a href="#/" class="w3-bar-item w3-button">My Events</a>
			<a href="#/" class="w3-bar-item w3-button">Past Events</a>
			<a href="#/" class="w3-bar-item w3-button">Login</a>
			<a href="#/" class="w3-bar-item w3-button">Register</a>
			<a href="#/" class="w3-bar-item w3-button">Contact Us</a>
		</div> -->
		<center><div class="w3-container" style="z-index:100; border-left: 2px solid #AAAAAA;">
			<br><br><br>
				<?php
					
					if($_SERVER['REQUEST_METHOD'] === "POST") {
						include '../libraries/PHPExcel/Classes/PHPExcel.php';
						include '../libraries/PHPExcel/Classes/PHPExcel/Writer/Excel2007.php';
						require '../auth/connection.php';
						$connection_variable = connect_to_the_database();
						if($_SERVER['REQUEST_METHOD'] === "POST") {
							$e_id = trim(mysqli_real_escape_string($connection_variable,$_POST['e_id']));
							$file_name = trim(mysqli_real_escape_string($connection_variable,$_POST['e_id'])).".json";
							if(!file_exists($file_name)) {
								echo "No user has registered for this event";
								exit();
							}
							else {
								$objPHPExcel = new PHPExcel();
								$objPHPExcel->getProperties()->setTitle($e_id);
								$json_raw = file_get_contents($file_name);
								$json_object = json_decode($json_raw);
								$col = 0;
								$row = 1;
								$objPHPExcel->setActiveSheetIndex(0);
								for($i = 0; $i < count($json_object->roll_numbers); $i++ ) {
									$objPHPExcel->getActiveSheet()->setCellValueByColumnAndRow($col++, $row, $json_object->roll_numbers[$i]);
									$objPHPExcel->getActiveSheet()->setCellValueByColumnAndRow($col++, $row, $json_object->first_names[$i]);
									$objPHPExcel->getActiveSheet()->setCellValueByColumnAndRow($col++, $row, $json_object->middle_names[$i]);
									$objPHPExcel->getActiveSheet()->setCellValueByColumnAndRow($col++, $row, $json_object->last_names[$i]);
									$objPHPExcel->getActiveSheet()->setCellValueByColumnAndRow($col++, $row, $json_object->years[$i]);
									$objPHPExcel->getActiveSheet()->setCellValueByColumnAndRow($col++, $row, $json_object->divisions[$i]);
									$objPHPExcel->getActiveSheet()->setCellValueByColumnAndRow($col++, $row, $json_object->batches[$i]);
									$objPHPExcel->getActiveSheet()->setCellValueByColumnAndRow($col++, $row, $json_object->emails[$i]);
									$objPHPExcel->getActiveSheet()->setCellValueByColumnAndRow($col++, $row, $json_object->mobiles[$i]);
									$row++;
									$col = 0;
								}
								$objPHPExcel->getActiveSheet()->setTitle($e_id);
								$objWriter = new PHPExcel_Writer_Excel2007($objPHPExcel);
								$objWriter->save($e_id.".xlsx");
								echo '<center><a href="'.$e_id.'.xlsx" class="w3-container w3-button w3-highway-blue" style="font-size:22px;padding:10px;">Download Log</a></center>';
							}
						}
					}

				?>
	</div></div></div>
</body>
</html>
