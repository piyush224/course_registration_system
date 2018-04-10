<?php
	session_start();
	$f_name = $_POST['f_name'];
	$l_name = $_POST['l_name'];
	$email = $_POST['email'];
	$password = $_POST['password'];
	$m_number = $_POST['m_number'];
	$code_status = 0;
	$code = rand();
	$_SESSION['username'] = $email;
	$_SESSION['code'] = $code;
	$_SESSION['f_name'] = $f_name;
	$_SESSION['l_name'] = $l_name;
	$_SESSION['mobile'] = $m_number;

	$con = mysqli_connect('localhost','root');
	mysqli_select_db($con,'course_reg');
	$q = "INSERT INTO user_info (f_name,l_name,email,password,m_number,confirm_status,con_code,date)
	 VALUES ('$f_name','$l_name','$email','$password',$m_number,$code_status,$code,NOW()) ;";
	mysqli_query($con,$q);

	$msg = 'Your Confirmation Code is '.$code;
	mail($email, 'Confirmation code', $msg,'From: acharyapiyush224@gmail.com');

?>
<!DOCTYPE html>
<html>
	<head>
		<title>Email Confirmation</title>
		
	</head>
	<body>
		<h1 >Conferm your email address</h1>
		<p>Please check your email account and write the varification code below</p>
		<form action='http://localhost/course_reg/code.php' method = 'post' >
			<input type="text" name = 'user_code' required>
			<input type="submit" value="submit">
		</form>
		
	</body>
</html>


