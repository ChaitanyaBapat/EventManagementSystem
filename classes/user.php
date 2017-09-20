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
		var $error_string;
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
			$this->mobile = $this->sanitize_regular($this->mobile);
		}

		private function sanitize_regular ($string) {
			return (mysqli_real_escape_string($this->connection_variable,$string));
		}

		private function sanitize_number ($string) {
			return (intval($string,10));
		}

		public function check_requirements () {
			if($this->check_empty()) return 1;
			if(strlen($this->username) !== 8) return 2;
			if(!$this->check_alphanumeric($this->username)) return 3;
			if(strlen($this->password) < 8) return 4;
			if(!$this->check_alphabets($this->first_name)) return 5;
			if(!$this->check_alphabets($this->middle_name)) return 6;
			if(!$this->check_alphabets($this->last_name)) return 7;
			if(!$this->check_alphabets($this->year)) return 8;
			if(!$this->check_alphabets($this->division)) return 9;
			if(!$this->check_email($this->email)) return 10;
			return 0;
		}

		private function check_empty() {
			if(empty($this->username)) {
				$this->error_string = "username field cannot be left empty";
				return True;
			}
			if(empty($this->password)) {
				$this->error_string = "password field cannot be left empty";
				return True;
			}
			if(empty($this->first_name)) {
				$this->error_string = "first_name field cannot be left empty";
				return True;
			}
			if(empty($this->middle_name)) {
				$this->error_string = "middle_name field cannot be left empty";
				return True;
			}
			if(empty($this->last_name)) {
				$this->error_string = "last_name field cannot be left empty";
				return True;
			}
			if(empty($this->year)) {
				$this->error_string = "year field cannot be left empty";
				return True;
			}
			if(empty($this->division)) {
				$this->error_string = "division field cannot be left empty";
				return True;
			}
			if(empty($this->batch)) {
				$this->error_string = "batch field cannot be left empty";
				return True;
			}
			if(empty($this->email)) {
				$this->error_string = "email field cannot be left empty";
				return True;
			}
			if(empty($this->mobile)) {
				$this->error_string = "mobile field cannot be left empty";
				return True;
			}
		}

		private function check_alphanumeric ($string) {
			if (preg_match("/^[a-zA-Z0-9]+/",$string)) {
	      		return True;
	    	} else {
	    		return False;
	    	}
		}

		private function check_alphabets ($string) {
			if (ctype_alpha($string)) {
	      		return True;
	    	} else {
	    		return False;
	    	}
		}

		private function check_email ($string) {
			if (filter_var($string, FILTER_VALIDATE_EMAIL)) {
	      		return True;
	    	}
	    	else {
	    		return False;
	    	}
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