<?php
	session_start();
	$u_code = $_POST['user_code'];
	$email = $_SESSION['username'];
	if($u_code == $_SESSION['code']){
		$con = mysqli_connect('localhost','root');
		mysqli_select_db($con,'course_reg');
		$q = "UPDATE user_info SET confirm_status = 1 where email = '$email';";
		$res = mysqli_query($con,$q);
		header('location:http://localhost/course_reg/home.php');
	}
	else{
		header('location:http://localhost/course_reg/create_acc.php');
	}
?>
