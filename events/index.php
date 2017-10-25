<?php
	session_start();
	if(isset($_SESSION['login']) && $_SESSION['login']) {
		header("location:../index.php");
		exit();
	}
	if(isset($_SESSION['admin_login']) && $_SESSION['admin_login']) {
		header("location:admin_homepage.php");
		exit();
	} else {
		header("location:../index.php");
		exit();
	}

?>
