<?php
	session_start();
	if (isset($_SESSION['admin_login']) && !$_SESSION['admin_login']) {
		header("location:../login/login.php");
		exit();
	}
	if($_SERVER['REQUEST_METHOD'] === "POST") {
		require '../auth/connection.php';
		$roll_number = 0;
		$connection_variable = connect_to_the_database();
		$roll_number = trim(mysqli_real_escape_string($connection_variable, $_POST['roll_number']));
		$sql = "SELECT * FROM USER WHERE ROLL_NO = '$roll_number'";
		$result = $connection_variable->query($sql);
		if($result->num_rows === 1) {
			$e_id = trim(mysqli_real_escape_string($connection_variable, $_POST['e_id']));
			$file_name = $e_id.".json";
			$row = $result->fetch_assoc();
			foreach ($row as $key => $value) {
				echo $key."--->".$value."<br>";
			}
			$json_object = new StdClass();
			$json_object->e_id = $e_id;
			$roll_numbers = array($roll_number);
			$first_names = array($row['FIRST_NAME']);
			$middle_names = array($row['MIDDLE_NAME']);
			$last_names = array($row['LAST_NAME']);
			$years = array($row['YEAR']);
			$divisions = array($row['DIVISION']);
			$batches = array($row['BATCH']);
			$emails = array($row['EMAIL']);
			$mobiles = array($row['MOBILE_NUMBER']);
			if(!file_exists($file_name)) {
				$json_object->roll_numbers = $roll_numbers;
				$json_object->first_names = $first_names;
				$json_object->middle_names = $middle_names;
				$json_object->last_names = $last_names;
				$json_object->years = $years;
				$json_object->divisions = $divisions;
				$json_object->batches = $batches;
				$json_object->emails = $emails;
				$json_object->mobiles = $mobiles;
				$json = json_encode($json_object);
				$file = fopen($file_name,"w");
				fwrite($file, $json);
				fclose($file);
				echo "registered successfully";
			} else {
				$json_object = new StdClass();
				$file = fopen($file_name,"a");
				$json_raw = file_get_contents($file_name);
				$json_object = json_decode($json_raw);
				for($i = 0; $i < count($json_object->roll_numbers); $i++) {
					if($json_object->roll_numbers[$i] === $roll_number) {
						echo "You are already registered for this event<br>";
						exit();
					}
				}
				array_push($json_object->roll_numbers, $roll_number);
				array_push($json_object->first_names, $row['FIRST_NAME']);
				array_push($json_object->middle_names, $row['MIDDLE_NAME']);
				array_push($json_object->last_names, $row['LAST_NAME']);
				array_push($json_object->divisions, $row['DIVISION']);
				array_push($json_object->years, $row['YEAR']);
				array_push($json_object->batches, $row['BATCH']);
				array_push($json_object->emails, $row['EMAIL']);
				array_push($json_object->mobiles, $row['MOBILE_NUMBER']);
				$json_object  =json_encode($json_object);
				$file = fopen($file_name,"w");
				fwrite($file, $json_object);
				fclose($file);
				echo "registered successfully";
			}
		} else {
			echo 'No such user found';
		}
		
	}

?>
