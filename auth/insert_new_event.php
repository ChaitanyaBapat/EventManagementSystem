<?php

	session_start();
	if(isset($_SESSION['login']) && $_SESSION['login']) {
		header("location:../login/login.php");
		exit();
	}
	if($_SERVER['REQUEST_METHOD'] === "POST" && isset($_SESSION['admin_login']) && $_SESSION['admin_login']) {
		include './connection.php';
		$connection_variable = connect_to_the_database();

		$evtname = mysqli_real_escape_string($connection_variable,$_POST['evtname']);
		$s_date = mysqli_real_escape_string($connection_variable,$_POST['s_date']);
		$e_date = mysqli_real_escape_string($connection_variable,$_POST['e_date']);
		$s_time = mysqli_real_escape_string($connection_variable,$_POST['s_time']);
		$e_time = mysqli_real_escape_string($connection_variable,$_POST['e_time']);
		$Sdesc = mysqli_real_escape_string($connection_variable,$_POST['Sdesc']);
		$Ddesc = mysqli_real_escape_string($connection_variable,$_POST['Ddesc']);
		$place = mysqli_real_escape_string($connection_variable,$_POST['place']);
		$c_no1 = mysqli_real_escape_string($connection_variable,$_POST['c_no1']);
		$c_no2 = mysqli_real_escape_string($connection_variable,$_POST['c_no2']);


		$extension = end(explode(".", $_FILES["evtimg"]["name"]));

		if ((($_FILES["evtimg"]["type"] == "image/gif") || ($_FILES["evtimg"]["type"] == "image/jpeg") || ($_FILES["evtimg"]["type"] == "image/jpg") || ($_FILES["evtimg"]["type"] == "image/png"))) {

			if ($_FILES["evtimg"]["error"] > 0) {

				echo "Return Code: " . $_FILES["evtimg"]["error"] . "<br>";
				echo "click <a href='addnewevent.php'>here</a> to go back ";

			}

			else {

				date_default_timezone_set('asia/kolkata');

				$query = "INSERT INTO events(name,short_desc,long_desc,place,s_date,e_date,s_time,e_time,published_date,c_no1,c_no2)
				VALUES ('$evtname','$Sdesc','$Ddesc','$place','$s_date','$e_date','$s_time','$e_time',CURDATE(),'$c_no1','$c_no2')";

				$result = $connection_variable->query($query);

				if($result) {
					$id = mysqli_insert_id($connection_variable);
					$imgname = $id.".".$extension;
					$img_update="UPDATE events set img_name='$imgname' where e_id='$id'";
					$connection_variable->query($img_update);
					move_uploaded_file($_FILES["evtimg"]["tmp_name"], "../images/".$id.".".$extension);

					header("refresh:2;url=../events/index.php");
					echo"<script>alert('event uploaded successfully')</script>";
					exit();
				}
				else {
					echo $connection_variable->error;
				}
			}
		}
		else {
			echo "Invalid file";
			echo $_FILES["evtimg"]["type"] ;
		}
	}
?>
