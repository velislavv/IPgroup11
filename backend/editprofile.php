<?Php
//Start Session
session_start();
//Get users ID
$ID = $_SESSION['ID'];
//Include functions and connect to database
include 'function.php';
include 'opendb.php';
//Get Information about user that can be edited.
$sql = "SELECT * FROM members WHERE id='$ID'";
$query = mysql_query($sql);
$data = mysql_fetch_array($query);
?>
<FORM action="edituser.php" method="POST">
	<input type=text name="ID" value="<?php echo $data['id'] ?>"><br>
	<input type=text name="username" value="<?php echo $data['username'] ?>"><br>
	<input type=text name="password" value="<?php echo $data['password'] ?>"><br>
	<input type=text name="firstName" value="<?php echo $data['fname'] ?>"><br>
	<input type=text name="lastName" value="<?php echo $data['lname'] ?>"><br>
	<input type=text name="age" value="<?php echo $data['age'] ?>"><br>
	<input type=text name="location" value="<?php echo $data['location'] ?>"><br>
	<input type=text name="gender" value="<?php echo $data['gender'] ?>"><br>
	<input type=text name="occupation" value="<?php echo $data['occupation'] ?>"><br>
	<input type=text name="contact" value="<?php echo $data['contact'] ?>"><br>

	<input type=submit value="Update">
</FORM>