<?Php
//Function to redirect page
function Redirect($url, $permanent = false){
	if(headers_sent() === false){
		header('Location: ' . $url, true, ($permanent === true) ? 301 : 302);
	}
	exit();
}

function reg_form(){
	echo "<form action='?act=register' method='post'>"
		."Username: <input type='text' name='username'><br>"
		."Password: <input type='text' name='password'><br>"
		."Confirm password: <input type='text' name='password'><br>"
		."Email: <input type='text' name='email'><br>"
		."<input type='hidden' name='level' value='2'><br>"
		."<input type='submit value='Register'>"
		."</form>";
}

?>