<?php
	session_start();
	if(!isset($_SESSION['username'])){
		header('location:http://localhost/course_reg/index.php');
	}

	else{
	$email = $_SESSION['username'];
	$con = mysqli_connect('localhost','root');
	mysqli_select_db($con,'course_reg');
	$q = "SELECT id,f_name,confirm_status FROM user_info where email = '$email';";
	$result = mysqli_query($con,$q);
	mysqli_close($con);
	$row = mysqli_fetch_array($result);
	$name = $row['f_name'];
	$_SESSION['name'] = $name;
  $_SESSION['id'] = $row['id'];
	if($row['confirm_status']!=1){
		header('location:http://localhost/course_reg/index.php');
	}
   }	
?>
<!DOCTYPE html>
<html>
<head>
	<title>Home</title>
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
 	 <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
</head>
<body>
	<nav class="navbar navbar-default navbar-fixed-top">
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
        		<li class="active"><a>Home</a></li>
        		<li><a href="http://localhost/course_reg/profile.php">
        			<?php
        			echo $name
        			?>
        		</a></li>
       			 <li><a href="http://localhost/course_reg/courses.php">Courses</a></li>
      		</ul>
      		<ul class="nav navbar-nav navbar-right">
        		<li><a href="http://localhost/course_reg/logout.php"><span class="glyphicon glyphicon-log-out"></span> Log Out</a></li>
      		</ul>
    	</div>
  	</div>
	</nav>
	<div class="container" style ='margin-top: 80px;'  >
		<div class="jumbotron" >
			<div class="page-header" >
				<h1>Course Registration System</h1>
			</div>
			<p>This website is designed by:<strong>Piyush Dutt Acharya</strong><br>
		</div>
		<div id="myCarousel" class="carousel slide" data-ride="carousel" >
    		<!-- Indicators -->
    		<ol class="carousel-indicators">
      			<li data-target="#myCarousel" data-slide-to="0" class="active"></li>
      			<li data-target="#myCarousel" data-slide-to="1"></li>
      			<li data-target="#myCarousel" data-slide-to="2"></li>
      			<li data-target="#myCarousel" data-slide-to="3"></li>
      			<li data-target="#myCarousel" data-slide-to="4"></li>
      			<li data-target="#myCarousel" data-slide-to="5"></li>
    		</ol>

    		<!-- Wrapper for slides -->
   			<div class="carousel-inner" >

      			<div class="item active">
        			<img src="1.jpg" alt="Los Angeles" style="width:100%; height:400px;">
        			<div class="carousel-caption">
          				<h3>Civil Engineering</h3>
        			</div>
      			</div>

      			<div class="item">
        			<img src="2.jpg" alt="Chicago" style="width:100%; height:400px;">
        			<div class="carousel-caption">
          				<h3>Computer Science</h3>
        			</div>
      			</div>
    
      			<div class="item">
        			<img src="3.jpg" alt="New York" style="width:100%; height:400px;">
        			<div class="carousel-caption">
          				<h3>Communication Engineering</h3>
        			</div>
      			</div>
      			<div class="item">
        			<img src="4.jpg" alt="New York" style="width:100%; height:400px;">
        			<div class="carousel-caption">
          				<h3>Electrical Engineering</h3>
        			</div>
      			</div>
      			<div class="item">
        			<img src="5.jpg" alt="New York" style="width:100%; height:400px;">
        			<div class="carousel-caption">
          				<h3>Mechanical Engineering</h3>
        			</div>
      			</div>
  				<div class="item">
        			<img src="6.jpg" alt="New York" style="width:100%; height:400px;">
        			<div class="carousel-caption">
          				<h3>Information Technology</h3>
        			</div>
      			</div>	
    		</div>

    		<!-- Left and right controls -->
    		<a class="left carousel-control" href="#myCarousel" data-slide="prev">
      			<span class="glyphicon glyphicon-chevron-left"></span>
      			<span class="sr-only">Previous</span>
    		</a>
    		<a class="right carousel-control" href="#myCarousel" data-slide="next">
      			<span class="glyphicon glyphicon-chevron-right"></span>
      			<span class="sr-only">Next</span>
    		</a>
    </div>
    <div class= 'container' style="margin-top: 20px; margin-bottom: 20px;">
    <div class='row'>
    	<div class='col-md-4'>
    		<p><strong>Civil Engineering :</strong>Civil engineering is a professional engineering discipline that deals with the design, construction, and maintenance of the physical and naturally built environment, including works like roads, bridges, canals, dams, airports, sewerage systems, pipelines and railways.
    		</p>
    	</div>
    	<div class='col-md-4'>
    		<p><strong>Computer Science: </strong>Computer engineering is a discipline that integrates several fields of electrical engineering and computer science required to develop computer hardware and software. Computer engineers usually have training in electronic engineering (or electrical engineering), software design, and hardware–software integration instead of only software engineering or electronic engineering.</p>
    	</div>
    	<div class='col-md-4'>
    		<p><strong>Communication :</strong>Telecommunications engineering is an engineering discipline centered on electrical and computer engineering which seeks to support and enhance telecommunication systems. The work ranges from basic circuit design to strategic mass developments.</p>
    	</div>
    </div>
    <div class='row'>
    	<div class='col-md-4'>
    		<p><strong>Electrical Engineering :</strong>Electrical engineering is a professional engineering discipline that generally deals with the study and application of electricity, electronics, and electromagnetism. This field first became an identifiable occupation in the later half of the 19th century after commercialization of the electric telegraph, the telephone, and electric power distribution and use.
    		</p>
    	</div>
    	<div class='col-md-4'>
    		<p><strong>Mechanical Engineering : </strong>The mechanical engineering field requires an understanding of core areas including mechanics, dynamics, thermodynamics, materials science, structural analysis, and electricity. In addition to these core principles, mechanical engineers use tools such as computer-aided design (CAD), and product life cycle management to design and analyze manufacturing plants, industrial equipment and machinery, heating and cooling systems, transport systems, aircraft, watercraft, robotics, medical devices, weapons, and others</p>
    	</div>
    	<div class='col-md-4'>
    		<p><strong>Information Technology :</strong>Information technology (IT) is the application of computers to store, retrieve, transmit and manipulate data, or information, often in the context of a business or other enterprise.IT is considered to be a subset of information and communications technology (ICT). In 2012, Zuppo proposed an ICT hierarchy where each hierarchy level "contain some degree of commonality in that they are related to technologies that facilitate the transfer of information and various types of electronically mediated communications"</p>
    	</div>
    </div>
    </div>
	</div>
	<footer class="container-fluid" style="background-color: #555;color: white;padding: 15px;">
		<p style="text-align: right; margin-top: 10px">&copy piyushDuttAcharya</p>
	</footer>
</body>
</html>