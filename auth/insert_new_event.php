<?php
	
	//This file inserts a new event into the database.
	//Only admin can create an event

	session_start();

	//If a normal user is logged in, redirect him to index.php

	if(isset($_SESSION['login']) && $_SESSION['login']) {

		header("location:../login/login.php");
		exit();

	}

	//If an admin is logged in, and the page was requested via a POST method,

	if($_SERVER['REQUEST_METHOD'] === "POST" && isset($_SESSION['admin_login']) && $_SESSION['admin_login']) {

		//connection.php has a function connect_to_the_database to generate a connection variable

		include 'connection.php';
		$connection_variable = connect_to_the_database();

		//If the database connection is successful,

		if(isset($_SESSION['database_connection']) && $_SESSION['database_connection']) {
			
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

			//Get the file extension 
			//Explode function resturns an array of strings from a original string divide by "." character
			//end function returns the last element of the array

			$extension = end(explode(".", $_FILES["evtimg"]["name"]));

			//If the file type is either
			//1. gif
			//2. jpeg
			//3. jpg
			//4. png

			if ((($_FILES["evtimg"]["type"] == "image/gif") || ($_FILES["evtimg"]["type"] == "image/jpeg") || ($_FILES["evtimg"]["type"] == "image/jpg") || ($_FILES["evtimg"]["type"] == "image/png"))) {

				//If there is some error

				if ($_FILES["evtimg"]["error"] > 0) {

					//Echo the corrsponding error

					echo "Return Code: " . $_FILES["evtimg"]["error"] . "<br>";
					echo "click <a href='../events/add_event.php'>here</a> to go back ";

				}

				//If the file upload and validation is successful,

				else {

					date_default_timezone_set('asia/kolkata');

					//Insert the event into database, 

					$query = "INSERT INTO events(name,short_desc,long_desc,place,s_date,e_date,s_time,e_time,published_date,c_no1,c_no2)
					VALUES ('$evtname','$Sdesc','$Ddesc','$place','$s_date','$e_date','$s_time','$e_time',CURDATE(),'$c_no1','$c_no2')";

					$result = $connection_variable->query($query);

					//If the insert operation is successful,

					if($result) {

						//Insert the filename and extension of image file in the database

						$id = mysqli_insert_id($connection_variable);
						$imgname = $id.".".$extension;
						$img_update="UPDATE events set img_name='$imgname' where e_id='$id'";
						$connection_variable->query($img_update);
						move_uploaded_file($_FILES["evtimg"]["tmp_name"], "../images/".$id.".".$extension);
						
						//redirect to admin_homepage.php

						header("refresh:2;url=../events/index.php");
						echo"<script>alert('event uploaded successfully')</script>";
						exit();

					}
					else {

						//Echo the corresponding error

						echo $connection_variable->error;

					}
				
				}
			
			}

			//Else if the file has an invalid extension

			else {

				echo "Invalid file";
				echo $_FILES["evtimg"]["type"] ;
			
			}
		
		}
	
	}

?>
