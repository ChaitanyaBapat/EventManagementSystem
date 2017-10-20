<?php

	session_start();

	//This file controls the login of the user

	//If a user is already logged in, redirect him to index.php 

	if(isset($_SESSION['login']) && $_SESSION['login']) {
		header("location:../index.php");
		exit();
	}

	//If an admin is logged in, redirct him to events/index.php
	//From there he is redirected to the admin homepage

	if(isset($_SESSION['admin_login']) && $_SESSION['admin_login']) {
		header("location:../events/index.php");
		exit();
	}

	//If this page is requested through a POST method,

	if($_SERVER['REQUEST_METHOD'] == 'POST') {

		//connection.php has a function connect_to_the_database to generate a connection variable
		// CLass LoginUser provides methods to log in the user

		require './connection.php';
		require '../classes/classes_login_user.php';

		$connection_variable = connect_to_the_database();

		//If the database connection is successful,

		if(isset($_SESSION['database_connection']) && $_SESSION['database_connection']) {

			$login = new LoginUser($_POST['roll_number'],$_POST['password'],$connection_variable);
			
			//If the user credentials are correct,
			
			if ($login->check()) {

				$_SESSION['login'] = true;
				$_SESSION['roll_number'] = $login->roll_number;
				header("location:../index.php");
				exit();

			}
			//If the user credentials are incorrect,

			else {

				$_SESSION['login'] = false;
				header("location:../login/login.php");
				exit();

			}
		
		}

	}

?>
