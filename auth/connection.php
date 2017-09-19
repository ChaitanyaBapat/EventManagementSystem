<?php
	if (!isset($_SESSION)) {
		session_start();
	}
	$db_servername = 'localhost';
	$db_username = 'root';
	$db_password = '';
	$db_name = 'ems';
	$connection_variable = new mysqli($db_servername,$db_username,$db_password,$db_name);
	if($connection_variable->connect_error) {
		$_SESSION['database_connection'] = 'error';
	} else {
		$_SESSION['database_connection'] = 'connected';
	}
?>