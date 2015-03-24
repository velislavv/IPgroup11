<?Php
ob_start();
//Start Session
session_start();
//Include functions and connect to database
include 'functions.php';
include 'opendb.php';
//Get user id
$ID = $_SESSION['ID'];
//Get users new infomration
$username = $_POST['username'];
$password = $_POST['password'];
$firstName = $_POST['firstName'];
$lastName = $_POST['lastName'];
$age = $_POST['age'];
$location = $_POST['location'];
$gender = $_POST['gender'];
$occupation = $_POST['occupation'];
$contact = $_POST['contact'];

//Update Users infomration
$query = "UPDATE members SET username = '$username',
	password = '$password',
	fname = '$firstName',
	lname = '$lastName',
	age = '$age',
	location = '$location',
	gender = '$gender',
	occupation = '$occupation',
	contact = '$contact'
	 WHERE id = '$ID'";
mysql_query($query);

//Redirect back to the profile page
Redirect('profile.php');
break;

?>