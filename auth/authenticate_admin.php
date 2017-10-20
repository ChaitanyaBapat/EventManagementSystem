<?php
	session_start();
	if(isset($_SESSION['login']) && $_SESSION['login']) {
		header("location:../login/login.php");
		exit();
	}
	if(isset($_SESSION['admin_login']) && $_SESSION['admin_login']) {
		header("location:../events/index.php");
		exit();
	}
	if($_SERVER['REQUEST_METHOD'] == 'POST') {
		require './connection.php';
		require '../classes/classes_login_admin.php';
		$connection_variable = connect_to_the_database();
		if(isset($_SESSION['database_connection']) && $_SESSION['database_connection']) {
			$login = new LoginAdmin($_POST['roll_number'],$_POST['password'],$connection_variable);
			if ($login->check()) {
				$_SESSION['admin_login'] = true;
				header("location:../index.php");
				exit();
			}
			else {
				$_SESSION['admin_login'] = false;
				header("location:../login/admin_login.php");
				exit();
			}
		}
	}

?>
