<?php
	if (!isset($_SESSION)) {
		session_start();
	}
	require 'connection.php';
	$connection_variable = connect_to_the_database();
	require '../classes/user.php';
	if($_SERVER['REQUEST_METHOD'] == 'POST') {
		if($_SESSION['database_connection'] === 'connected' && !isset($_SESSION['login']) && !empty($_POST['username']) && !empty($_POST['password'])) {
			$u = mysqli_real_escape_string($connection_variable, $_POST['username']);
			$p = md5(mysqli_real_escape_string($connection_variable, $_POST['password']));
			$select = "SELECT ROLL_NO, PASSWORD FROM USER WHERE ROLL_NO = '$u' AND PASSWORD = '$p'";
			$result = $connection_variable->query($select);
			if($result->num_rows == 1) {
				$_SESSION['login'] = 'successful';
				$_SESSION['client'] = $u;
				unset($_SESSION['wrong_login_info']);
				header("location:../index.php");

			} else {
				unset($_SESSION['login']);
				$_SESSION['wrong_login_info'] = 'true';
				header("location:../login/login.php");
			}
		} else {
			unset($_SESSION['login']);
			$_SESSION['wrong_login_info'] = 'true';
			header("location:../index.php");
			exit();
		}
	}
	else {
		unset($_SESSION['login']);
		$_SESSION['wrong_login_info'] = 'true';
		header("location:../index.php");
		exit();
	}
?>