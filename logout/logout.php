<?php
	if (!isset($_SESSION)) {
		session_start();
	}
	require '../auth/connection.php';
	$connection_variable->close();
	session_destroy();
	header("location:../index.php");
	exit();
?>