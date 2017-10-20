<?php
	class LoginUser {
		var $roll_number;
		var $password;
		var $connection_variable;
		function __construct ($roll_number, $password, $connection_variable) {
			$this->roll_number = $roll_number;
			$this->password = $password;
			$this->connection_variable = $connection_variable;
			$this->sanitize();
			$this->encrypt_password();
		}
		
		private function sanitize() {
			$this->roll_number = mysqli_real_escape_string($this->connection_variable,$this->roll_number);
			$this->roll_number = trim($this->roll_number);
		    $this->roll_number = stripslashes($this->roll_number);
		    $this->roll_number = htmlspecialchars($this->roll_number);
		    $this->password = mysqli_real_escape_string($this->connection_variable,$this->password);
		    $this->password = trim($this->password);
		    $this->password = stripslashes($this->password);
		    $this->password = htmlspecialchars($this->password);
		}

		private function encrypt_password () {
			$this->password = md5($this->password);
		}
		function check () {
			echo $this->password;
			echo '<br>';
			$sql = "SELECT ROLL_NO, PASSWORD FROM USER WHERE ROLL_NO = '$this->roll_number' AND PASSWORD = '$this->password'";
			$result = $this->connection_variable->query($sql);
			if($result->num_rows === 1) {
				return true;
			} 
			else {
				return false;
			}
		}
	}
?>