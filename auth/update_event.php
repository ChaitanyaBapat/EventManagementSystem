<?php
	session_start();
	if(isset($_SESSION['login']) && $_SESSION['login']) {
		header("location:../login/login.php");
		exit();
	}
	if(isset($_SESSION['admin_login']) && !$_SESSION['admin_login']) {
		header("location:../events/index.php");
		exit();
	}
	if($_SERVER['REQUEST_METHOD'] === "POST") {
		include './connection.php';
		$connection_variable = connect_to_the_database();
		$e_id = mysqli_real_escape_string($connection_variable,$_POST['e_id']);
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

		date_default_timezone_set('asia/kolkata');
		$query = "UPDATE events set name='$evtname',short_desc='$Sdesc',long_desc='$Ddesc',s_date='$s_date',e_date='$e_date',s_time='$s_time',e_time='$e_time',c_no1='$c_no1',c_no2='$c_no2',place='$place' where e_id=$e_id";
		$result = mysqli_query($connection_variable,$query);
		if($result)
		{	
			echo 'Loading';
			header( "refresh:1;url=../events/index.php" );
			echo"<script>alert('event updated successfully')</script>";
		}
		else{
			echo $connection_variable->error;
		}
	}
?>
