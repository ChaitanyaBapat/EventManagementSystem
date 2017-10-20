<?php

	//This file controls the login of an admin

	session_start();

	//If a normal user is logged, redirect him to index.php

	if(isset($_SESSION['login']) && $_SESSION['login']) {

		header("location:../index.php");
		exit();

	}

	//If an admin is already logged in, redirect him to events/index.php
	//From there he, will be directed to admin_homepage.php

	if(isset($_SESSION['admin_login']) && $_SESSION['admin_login']) {

		header("location:../events/index.php");
		exit();

	}

	//If this page is requested through a POST method,

	if($_SERVER['REQUEST_METHOD'] == 'POST') {

		//connection.php has a function connect_to_the_database to generate a connection variable
		// CLass LoginAdmin provides methods to log in the user

		require './connection.php';
		require '../classes/classes_login_admin.php';
		$connection_variable = connect_to_the_database();

		//If the database connection is successful,

		if(isset($_SESSION['database_connection']) && $_SESSION['database_connection']) {

			$login = new LoginAdmin($_POST['roll_number'],$_POST['password'],$connection_variable);
			
			//If the admin credentials are correct,

			if ($login->check()) {

				$_SESSION['admin_login'] = true;
				header("location:../index.php");
				exit();
			
			}

			//If the admin credentials are incorrect,

			else {

				$_SESSION['admin_login'] = false;
				header("location:../login/admin_login.php");
				exit();
			
			}
		
		}
	
	}

?>
