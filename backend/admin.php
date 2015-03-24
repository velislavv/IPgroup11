<?Php
ob_start();
//Include functions and connect to the databse 
include 'opendb.php';
include 'functions.php';

/*
The following code checks the users level saves there username and password
in session variables to so once logged in each page can see which user is 
logged in and their level of authority.
*/

//Start sessions
session_start();

//Gat username and password from the inputs.
$username = $_POST['username'];
$password = $_POST['password'];

//Get users level and check username and password are correct
$level = mysql_result(mysql_query("SELECT level FROM members WHERE
	username='".mysql_real_escape_string($username)."' AND
	password='".mysql_real_escape_string($password)."'
	"), 0) or die('Incorrect Username or Password..');
//Get the users ID
$ID = mysql_result(mysql_query("SELECT id FROM members WHERE
	username='".mysql_real_escape_string($username)."' AND
	password='".mysql_real_escape_string($password)."'
	"), 0) or die('Incorrect Username or Password..');
//Save the users id as a Session cookie.
$_SESSION['ID'] = $ID;

//Check useres level to see which page to redirect them to.
//Level 1 is Admin. Level 2 is Member.
switch($level){
	case 1:
		echo("Thank you for logging in, $username. You are a Admin. Your ID is $ID");
		break;
	case 2:
		echo("Thank you for logging in, $username. You are a member. Your ID is $ID");
		Redirect('profile.php');
		//ob_end_flush();
		//die();
		break;

}



?>