<?php
	session_start();
	if(!isset($_SESSION['username'])){
		header('location:http://localhost/course_reg/index.php');
	}
  
  $email = $_SESSION['username'];
  $con = mysqli_connect('localhost','root');
  mysqli_select_db($con,'course_reg');
  $q = "SELECT * FROM user_info WHERE email = '$email';";
  $result = mysqli_query($con,$q);
  mysqli_close($con);
  $num = mysqli_num_rows($result);
  $row = mysqli_fetch_array($result);	
  $_SESSION['id'] = $row['id'];
?>
<!DOCTYPE html>
<html>
<head>
	<title>Edit User Info</title>
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
 	 <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
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
<body>
	<nav class="navbar navbar-default">
  	<div class="container">
    	<div class="navbar-header">
      		<button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#myNavbar">
        		<span class="icon-bar"></span>
        		<span class="icon-bar"></span>
        		<span class="icon-bar"></span>                        
      		</button>
      		<a class="navbar-brand" href="#">CourseRegSystem</a>
    	</div>
    	<div class="collapse navbar-collapse" id="myNavbar">
      		<ul class="nav navbar-nav">
        		<li><a href="http://localhost/course_reg/home.php">Home</a></li>
        		<li class="active"><a href="http://localhost/course_reg/profile.php">
            <?php echo $_SESSION['name']?>  
            </a></li>
       			 <li><a href="http://localhost/course_reg/courses.php">Courses</a></li>
      		</ul>
      		<ul class="nav navbar-nav navbar-right">
        		<li><a href="http://localhost/course_reg/logout.php"><span class="glyphicon glyphicon-log-out"></span> Log Out</a></li>
      		</ul>
    	</div>
  	</div>
	</nav>
  <div class="container">
    <form action="http://localhost/course_reg/change_user_info.php" method="post" onsubmit="return validation();">
    <table class  = 'table table-striped table-bordered'>
      <caption>User Information</caption>
      <tbody>
        <tr>
          <td>First Name: </td>
          <td><input type = 'text' name = 'f_name' value = '<?php echo $row['f_name'];?>'></td>
        </tr>
        <tr>
          <td>Last Name: </td>
          <td><input type = 'text' name = 'l_name' value = '<?php echo $row['l_name'];?>'></td>
        </tr>
        <tr>
          <td>Email: </td>
          <td><input type = 'text' name = 'email' value = '<?php echo $row['email'];?>'></td>
        </tr>
        <tr>
          <td>Password: </td>
          <td><input type = 'password' name = 'password' value = '<?php echo $row['password'];?>'></td>
        </tr>
        <tr>
          <td>Confirm Password: </td>
          <td><input type = 'password' name = 'c_password' value = '<?php echo $row['password'];?>'></td>
        </tr>
        <tr>
          <td>Mobile Number: </td>
          <td><input type = 'text' name = 'm_number' value = '<?php echo $row['m_number'];?>'></td>
        </tr>
      </tbody>
    </table>
    <input class="btn btn-primary" type='submit' value = 'Submit'>
    <input class="btn btn-success" type='reset' value = 'Reset'>
  </form>
  </div>
 
</body>
</html>