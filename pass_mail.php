<?php
	session_start();
	$email = $_POST["email"];
	$con = mysqli_connect('localhost','root');
	mysqli_select_db($con,'course_reg');
	$q = "SELECT email,password FROM user_info WHERE email = '$email';";
	$result = mysqli_query($con,$q);
	mysqli_close($con);
	$row = mysqli_fetch_array($result);
	if($row['email']==$email){
		$msg = 'Your password is '.$row['password'];
		mail($email, 'Confirmation code', $msg,'From: acharyapiyush224@gmail.com');
		echo "<script>alert('password sent successfuly.Check your email account');window.location='http://localhost/course_reg/index.php'</script>";
	}
	else{
		echo "<script>alert('Sorry!Incorrect Email Address');window.location='http://localhost/course_reg/forget_pass.php'</script>";
		
	}

?>