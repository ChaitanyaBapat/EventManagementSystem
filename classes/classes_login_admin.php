<?php
	class LoginAdmin {
		var $username;
		var $password;
		var $connection_variable;
		function __construct ($username, $password, $connection_variable) {
			$this->username = $username;
			$this->password = $password;
			$this->connection_variable = $connection_variable;
			$this->sanitize();
			$this->encrypt_password();
		}
		
		private function sanitize() {
			$this->username = mysqli_real_escape_string($this->connection_variable,$this->username);
			$this->username = trim($this->username);
		    $this->username = stripslashes($this->username);
		    $this->username = htmlspecialchars($this->username);
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
			$sql = "SELECT USERNAME, PASSWORD FROM ADMIN WHERE USERNAME = '$this->username' AND PASSWORD = '$this->password'";
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