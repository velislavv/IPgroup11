<?Php
//Start session
session_start();
//Get users ID
$ID = $_SESSION['ID'];
//include functinos and connect to the database
include 'functions.php';
include 'opendb.php';

//Get information about user based on thier ID
$sql = "SELECT * FROM members WHERE id='$ID'";
$query = mysql_query($sql);
$data = mysql_fetch_array($query);
$level = $data['level'];
$firstName = $data['fname'];
$lastName = $data['lname'];
$age = $data['age'];
$location = $data['location'];
$gender = $data['gender'];
$occupation = $data['occupation'];
$email = $data['contact'];

//Echo out users information
echo("ID: $ID <br>");
echo("Level: $level <br>");
echo("Name: $firstName $lastName<br>");
echo("Age: $age <br>");
echo("Location: $location <br>");
echo("Gender: $gender <br>");
echo("Occupation: $occupation <br>");
echo("Email: $email <br>");
if(level == 1){
	echo("User Type: Admin");
}else if(level == 2){
	echo("User Type: Member");
}


?>
<br>
<a href="logout.php">Log Out</a>
<a href="editprofile.php">Edit Profile</a>