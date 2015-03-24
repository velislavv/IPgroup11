<?php
function reg_form(){
	echo "<form action='?act=register' method='post'>"
		."Username: <input type='text' name='username'><br>"
		."Password: <input type='text' name='password'><br>"
		."Confirm password: <input type='text' name='pass_conf'><br>"
		."Email: <input type='text' name='email'><br>"
		."<input type='hidden' name='level' value='2'><br>"
		."<input type='submit' value='register'>"
		."</form>";
	}

function register(){
	//Open database
	include 'opendb.php';

	$username = $_REQUEST['username'];
	$password = $_REQUEST['password'];
	$pass_con = $_REQUEST['pass_conf'];
	$email = $_REQUEST['email'];
	//$level = $_REQUEST['level'];

	//Check username isn't in use
	$user_check = mysql_query("SELECT username FROM members WHERE username='$username'");
	$do_user_check = mysql_num_rows($user_check);

	if(do_user_check > 0){
		die("Username is already in use!<br>");
	}

	//Check password match
	if($password != $pass_conf){
		die("Passwords do not match!<br>");
	}

	//Now register the user
	$insert = mysql_query("INSERT INTO members (username, password, contact) VALUES
		('$username', '$password', '$email')");

	if(!$insert){
		die("There has been a problem.. ".mysql_error());
	}

	echo $username.", you are now registered.";

}

switch($act){

default;
reg_form();
break;

case "register";
register();
break;

}


?>