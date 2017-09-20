<?php
	if (!isset($_SESSION)) {
		session_start();
	}
	require '../auth/connection.php';
	$connection_variable = connect_to_the_database();
	$connection_variable->close();
	session_destroy();
	header("location:../index.php");
	exit();
?>