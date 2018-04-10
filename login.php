<?php 
	session_start();
	$username = $_POST['username'];
	$password = $_POST['password'];
	$_SESSION['username'] = $username;
	$con = mysqli_connect('localhost','root');
	

	mysqli_select_db($con,'course_reg');

	//$q = "INSERT INTO user (name,password) VALUES ('$username','$password');";
	$q = "SELECT email,password FROM user_info WHERE email = '$username' and password = '$password';";


	$result = mysqli_query($con,$q);
	mysqli_close($con);

	$row = mysqli_fetch_array($result);
	if($row['email']==$username && $row['password'] == $password){
		header('location:http://localhost/course_reg/home.php');
	}
	else{
		echo '<h4>email: "'.$username.'" or password "'.$password.'" does not match from any account</h4>';
		session_destroy();
	}
?>