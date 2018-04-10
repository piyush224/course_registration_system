<?php
	session_start();
?>
<!DOCTYPE html>
<html>
<head>
	<title>Create Account</title>
	<link rel="stylesheet" type="text/css" href="create_acc.css">
	<script>
	function validation(){
		var val;
		var x = document.getElementsByName('email')[0].value;
		var p = document.getElementsByName('password')[0].value;
		var cp = document.getElementsByName('c_password')[0].value;
		var atIndex = x.indexOf('@');
		var dotIndex = x.lastIndexOf('.');
		if(atIndex < 1 || dotIndex >= x.length -2 || dotIndex-atIndex < 3 || p.length < 8 ){
			val = false;
			alert('invallid email or password');
		}
		else if(p != cp){
			val = false;
			alert('password does not match');
		}
		else{
			val = true;
		}
				
		return(val);
	}
					
	</script>
</head>
<body style="background: url(create_acc_bg_img.jpg);background-repeat: no-repeat;">

	<div id = 'form' >
		<form action="http://localhost://course_reg/acc_validation.php" method="post" onsubmit= 'return validation()'>					
			<input style="margin-top: 15px;" type = "text" name="f_name" placeholder="First Name" required>
			<br>
			<input type = "text" name="l_name" placeholder="Last Name" required>
			<br>
			<input type = "text" name="email" placeholder="Email" required>
			<br>
			<input type = "password" name="password" placeholder="Password(minimum 8 char)" required>
			<br>
			<input type = "password" name="c_password" placeholder='Confirm password' required>
			<br>
			<input type = "text" name="m_number" placeholder="Mobile Number" required>
			<br>
			<input style = "background-color:#0288D1; height: 35px; width:305px;" type="submit" value = 'Submit'>
			<br>
			<input style = "background-color:#BA68C8; height: 35px; width:305px;" type = "reset" value = 'Reset'>
		</form>
	</div>
</body>
</html>
