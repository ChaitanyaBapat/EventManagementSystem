<?php
	if (!isset($_SESSION)) {
		session_start();
		if(!isset($_SESSION['login'])) {
			header("location:../index.php");
			exit();
		} 
	}
	class user {
		var $username;
		var $password;
		var $first_name;
		var $middle_name;
		var $last_name;
		var $year;
		var $division;
		var $batch;
		var $email;
		var $mobile;
		var $connection_variable;
		function __construct ($username, $password, $first_name, $middle_name, $last_name, $year, $division, $batch, $email, $mobile, $connection_variable ) {

			$this->connection_variable = $connection_variable;
			$this->username = ($this->sanitize_regular($username));
			$this->password = md5($this->sanitize_regular($password));
			$this->first_name = $this->sanitize_regular($first_name);
			$this->middle_name = $this->sanitize_regular($middle_name);
			$this->last_name = $this->sanitize_regular($last_name);
			$this->year = $this->sanitize_regular($year);
			$this->division = $this->sanitize_regular($division);
			$this->batch = $this->sanitize_regular($batch);
			$this->email = $this->sanitize_regular($email);
			$this->mobile = $this->sanitize_regular($mobile);
			$this->mobile = $this->sanitize_number($this->mobile);
		}

		private function sanitize_regular ($string) {
			return (mysqli_real_escape_string($this->connection_variable,$string));
		}

		private function sanitize_number ($string) {
			return (intval($string,10));
		}

		public function insert_user_into_database () {
			$select = "SELECT ROLL_NO FROM USER WHERE ROLL_NO = '$this->username'";
			$result = $this->connection_variable->query($select);
			if($result->num_rows > 0) {
				return "Sorry, this account already exists";
			} else {
				$insert = "INSERT INTO USER VALUES ('$this->username','$this->password','$this->first_name','$this->middle_name','$this->last_name','$this->year','$this->division','$this->batch','$this->email','$this->mobile')";
				if($result = $this->connection_variable->query($insert)) {
					return "Account successfully created";
				} else {
					echo $this->connection_variable->error;
					return "Sorry, there seems to be a problem";;
				}

			}
		}
	}	
?>