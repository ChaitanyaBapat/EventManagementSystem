<?php
		function check_alphanumeric ($string) {
			if (preg_match("/^[a-zA-Z0-9]+/",$string)) {
	      		return True;
	    	} else {
	    		return False;
	    	}
		}
		if($_SERVER['REQUEST_METHOD'] == "POST") {
			echo "here-> ";
			echo check_alphanumeric($_POST['a']);
		}
	?>