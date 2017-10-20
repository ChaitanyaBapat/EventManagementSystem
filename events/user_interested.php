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
		$e_id = trim(mysqli_real_escape_string($connection_variable, $_POST['e_id']));
		$file_name = $e_id.".json";
		if(!file_exists($file_name)) {
			$json_object = new StdClass();
			$json_object->e_id = $e_id;
			$array = array($roll_number);
			$json_object->interested = $array;
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
			for($i = 0; $i < count($json_object->interested); $i++) {
				if($json_object->interested[$i] === $roll_number) {
					echo "You are already registered for this event<br>";
					exit();
				}
			}
			array_push($json_object->interested, $roll_number);
			$json_object  =json_encode($json_object);
			$file = fopen($file_name,"w");
			fwrite($file, $json_object);
			fclose($file);
			echo "registered successfully";
		}
	}

?>
