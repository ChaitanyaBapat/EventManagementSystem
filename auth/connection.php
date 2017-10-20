<?php

	//This file is used to make a database connection
	//The function connect_to_the_database return a mysqli_connect variable

	function connect_to_the_database () {

		// start a session if it's not started already

		if (!isset($_SESSION)) {

			session_start();

		}

		$db_servername = 'localhost';
		$db_username = 'root';
		$db_password = '';
		$db_name = 'ems';
		
		$connection_variable = new mysqli($db_servername,$db_username,$db_password,$db_name);
		
		//If there is an error while connecting to the databse,

		if($connection_variable->connect_error) {

			$_SESSION['database_connection'] = false; 
		
		} 

		//If the connection is successful,

		else {

			$_SESSION['database_connection'] = true;
		
		}
		// Return the connection variable
		return $connection_variable;
	}
?>