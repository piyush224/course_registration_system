<?php
	session_start();
	if(!isset($_SESSION['username'])){
		header('location:http://localhost/course_reg/index.php');
	}

	$con = mysqli_connect('localhost','root');
  	mysqli_select_db($con,'course_reg');
  	$q = "SELECT * FROM courses;";
  	$result = mysqli_query($con,$q);
  	mysqli_close($con);
  	$num = mysqli_num_rows($result);
?>
<!DOCTYPE html>
<html>
<head>
	<title>Courses</title>
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
        		<li ><a href="http://localhost/course_reg/profile.php">
            <?php echo $_SESSION['name']?>  
            </a></li>
       			 <li class="active"><a>Courses</a></li>
      		</ul>
      		<ul class="nav navbar-nav navbar-right">
        		<li><a href="http://localhost/course_reg/logout.php"><span class="glyphicon glyphicon-log-out"></span> Log Out</a></li>
      		</ul>
    	</div>
  	</div>
	</nav>
	<div class = 'container'>
		<div class = 'row'>
			<div class = 'col-md-3'>
				<div class = 'jumbotron'>
					<a href='http://localhost/course_reg/fill_course.php'><u>Fill online course</u></a>
				</div>
			</div>
			<div class = 'col-md-9'>
				<table class = 'table table-striped table-bordered table-hover'>
					<caption>Available Branches</caption>
					<thead>
						<tr>
							<th>course id</th>
							<th>Branch</th>
							<th>Total seats</th>
						</tr>
					</thead>
					<?php
							for ($i=0;$i<$num;$i++){
								$row = mysqli_fetch_array($result);
					?>

					<tbody>
						<tr>
							<td><?php echo $row['course_id'];?></td>
							<td><?php echo $row['course_name'];?></td>
							<td><?php echo $row['total_seats']?></td>
						</tr>
					</tbody>
					<?php
							}
					?>
					
				</table>
				<div class='alert alert-success'>
					<strong>Note:-</strong> Please note the course-id carefully before filling course.
				</div>
				<div class='alert alert-success'>
					<strong>Note:-</strong> First year course [1st+2nd sem] is common for all branches.
				</div>
			</div>
		</div>
	</div>
</body>
</html>