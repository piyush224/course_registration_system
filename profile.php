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
?>
<!DOCTYPE html>
<html>
<head>
	<title>Profile</title>
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
 	 <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
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
        		<li class="active"><a>
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
    <table class  = 'table table-striped table-bordered'>
      <caption>User Information</caption>
      <tbody>
        <tr>
          <td>First Name: </td>
          <td><?php echo $row['f_name'];?></td>
        </tr>
        <tr>
          <td>Last Name: </td>
          <td><?php echo $row['l_name'];?></td>
        </tr>
        <tr>
          <td>Email: </td>
          <td><?php echo $row['email'];?></td>
        </tr>
        <tr>
          <td>Password: </td>
          <td><?php echo $row['password'];?></td>
        </tr>
        <tr>
          <td>Mobile Number: </td>
          <td><?php echo $row['m_number'];?></td>
        </tr>
      </tbody>
    </table>
    <a href = 'http://localhost/course_reg/edit_user_info.php'><u>edit</u></a>
  </div>
  
</body>
</html>