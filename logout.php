<?php
	session_start();
	session_destroy();
	unset($_SESSION['username']);
	header('location:http://localhost/course_reg/index.php');
?>