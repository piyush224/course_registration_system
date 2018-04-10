<?php
	session_start();
?>
<!DOCTYPE html>
<html>
<head>
	<title>Login Window</title>
	<link rel="stylesheet" href="index.css" type = 'text/css'>	
</head>
<body style="background: url(bgimg.jpg);background-repeat: no-repeat;">
	<div class = 'parent'>
		<form  action="http://localhost/course_reg/login.php" method = 'post' action = '#' onsubmit= 'validation()'>
				<h4>LOG IN</h4><br>
				<input id = 'username' type="text" name="username"  placeholder="Email" required>
				<br>
				<input id = 'password' type="password" name="password"  placeholder="Password" required>
				<br>
				<input id = 'submit' type="submit" value="Login">
				<br>
				<input id = 'reset' type="reset" name="Reset" >			
		</form>
		<p id = 'linkp' ><a id ="link1" href = 'http://localhost/course_reg/create_acc.php' target="_self">create account</a>  	<a id = 'link2' href = 'http://localhost/course_reg/forget_pass.php' target="_self">forgot password</a></p>
	</div>
	
</body>
</html>