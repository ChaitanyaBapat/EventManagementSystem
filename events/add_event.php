<?php

	session_start();
	if(isset($_SESSION['login']) && $_SESSION['login']) {
		header("location:../index.php");
		exit();
	}

?>

<!DOCTYPE html>
<html>
<head>

    <title>Event Manager HomePage</title>

    <!-- Meta Information -->
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <!-- W.CSS Stylesheet -->
    <link rel="stylesheet" type="text/css" href="../css/w3.css">
    <link rel="stylesheet" href="https://www.w3schools.com/lib/w3-colors-highway.css">
    <!-- Script For jQuery -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
        <style type="text/css">
            @media screen and (max-resolution:420dpi) and (max-device-width:720px) {
            .myclass {
                display: flex;
            }
        }
        </style>
</head>
<body>

    <div class="w3-row w3-highway-green" style="padding-top: 10px; padding-bottom: 10px; position: sticky;  top:0px;z-index:1000">

        <div class="w3-col l8 w3-container w3-highway-green" style="text-align: center;">
            <a href="#/" style="text-decoration: none; font-size: 30px;">Event Management System</a>
        </div>

        <div class="w3-col l4 w3-row w3-highway-green w3-mobile myclass">

        <?php

            // PHP Script For echoing Login/Register buttons or Logout Button

            //If User is logged in, echo Logout Button
            //Else, echo Login and register buttons
            if( isset ( $_SESSION['login'] ) && $_SESSION['login'] ) {
                header("location:../index.php");
                exit();

            }
            if ( isset ( $_SESSION['admin_login'] ) && $_SESSION['admin_login'] ) {

                echo '<a class="w3-mobile w3-btn w3-hover-white w3-round-large w3-border-highway-green" style="float:left;font-size: 16px;" href="login/login.php">Logout As Admin</a>';

            }
        ?>
        <a class="w3-mobile w3-btn w3-hover-white w3-round-large w3-border-highway-green" style="float:left;font-size: 16px;" href="#/">Contact Us</a>
        </div>
    </div>  









    <center>
	<div class="w3-container w3-mobile" style="width: 70%;">

		<form action="../auth/insert_new_event.php" method="post" class="w3-input" enctype="multipart/form-data" >
        <div style="padding:10px; align-content:center" class="border">
            Event Name :<span style='color: red;'> *</span> <br>
            <input id="evtname" name="evtname" class="w3-input" type="text" style="margin-bottom:10px;width:100%" required/><br><br>
            Event Start Date:<span style='color: red;'> *</span> <br>
            <input id="evtdate" name="s_date" class="w3-input" type="date" style="margin-bottom:10px;width:100%" required/><br><br>
			      Event End Date:<span style='color: red;'> *</span> <br>
            <input id="evtdate" name="e_date" class="w3-input" type="date" style="margin-bottom:10px;width:100%" required/><br><br>
            Event Start Time: <span style='color: red;'> *</span><br>
            <input id="evttime" name="s_time" class="w3-input" type="time" style="margin-bottom:10px;width:100%" required/><br><br>
			      Event End Time: <span style='color: red;'> *</span><br>
            <input id="evttime" name="e_time" class="w3-input" type="time" style="margin-bottom:10px;width:100%" required/><br><br>
            Place:<span style='color: red;'> *</span><br>
            <textarea id="place" name="place" rows="2" cols="50" style="margin-bottom:10px;width:100%" maxlength="2000" required></textarea><br><br>
            Short Description:<span style='color: red;'> *</span>(max 1000 characters. Displayed in the list of events)<br>
            <textarea id="Sdesc" name="Sdesc" rows="2" cols="50" style="margin-bottom:10px;width:100%" maxlength="1000" reuired ></textarea><br><br>
            Detailed Descrition:<span style='color: red;'> *</span><br>
            <textarea id="Ddesc" name="Ddesc" rows="10" cols="50" style="margin-bottom:10px;width:100%" minlength = "100" required ></textarea><br><br>
            Contact number 1:<span style='color: red;'> *</span><br>
            <input id="c_no1" name="c_no1" class="w3-input" type="text" style="margin-bottom:10px;width:100%" required /><br><br>
            Contact number 2:(optional) <br>
            <input id="c_no2" name="c_no2" class="w3-input" type="text" style="margin-bottom:10px;width:100%" /><br><br>
            Event Image : <br>
            <input type="file" name="evtimg" id="evtimg" required /><br><br>
            <input id="submit" type="submit" value="Submit" class="w3-btn w3-teal w3-round-xlarge "/>
        </div>
    </form>

	</div></center>
</body>
</html>
