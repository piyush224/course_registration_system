<?php
	session_start();
	$student_id = $_SESSION['id'];

	$size = sizeof($_POST);
	$j = 1;
	for($i = 1;$i<=$size;$i++,$j++){
		$index = "sbj".$j;
		if(isset($_POST[$index]))
			$id[$i] = $_POST[$index];
		else
			$i--;
	}
	
	$con = mysqli_connect('localhost','root');
  	mysqli_select_db($con,'course_reg');
  	for($k = 1; $k < 5;$k++){
  		$q = "SELECT subject FROM courses_detail where id = $id[$k];";
  		$result = mysqli_query($con,$q);
  		$row = mysqli_fetch_array($result);
  		$subject = $row['subject'];
  		$q2 = "INSERT into student_choice (course_name,student_id) VALUES ('$subject',$student_id);";
  		mysqli_select_db($con,'student_choice');
  		mysqli_query($con , $q2);
  	}

  	mysqli_select_db($con,'student_choice');
  	$q = "SELECT * FROM student_choice where student_id = $student_id;";
  	$result = mysqli_query($con,$q);
  	mysqli_close($con);
  	$num = mysqli_num_rows($result);
  	


?>

<!DOCTYPE html>
<html>
<head>
	<title>Print Form</title>
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
 	 <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
  	<script>
  		function printlayer(Layer)
  		{
  			var generator = window.open(",name,");
  			var layetext = document.getElementById(Layer);
  			generator.document.write(layetext.innerHTML.replace("Print Me"));

  			generator.document.close();
  			generator.print();
  			generator.close();
  		}

  	</script>
  	</head>
<body>

	<div class = 'container' id = 'div-id-name'>
		<a href = 'http://localhost/course_reg/home.php'><u>Home</u></a><br>
		<table class = 'table table-striped table-bordered table-hover'>
					<caption>Selected Subjects</caption>
					<thead>
						<tr>
							<th>id</th>
							<th>course name</th>
							<th>student id</th>
						</tr>
					</thead>
					<?php
							for ($i=0;$i<$num;$i++){
								$row = mysqli_fetch_array($result);
					?>

					<tbody>
						<tr>
							<td><?php echo $row['id'];?></td>
							<td><?php echo $row['course_name'];?></td>
							<td><?php echo $row['student_id']?></td>
						</tr>
					</tbody>
					<?php
							}
					?>
					
		</table>
		<button class = 'btn btn-primary' onclick="javascript:printlayer('div-id-name');">print</button>
		
	</div>
</body>
</html>