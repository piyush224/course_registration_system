<?php
	session_start();
	$branch = $_POST['branch'];
	$year = $_POST['year'];
	$sem = $_POST['sem'];
	$course_id = $_POST['course_id'];
	
	$con = mysqli_connect('localhost','root');
  	mysqli_select_db($con,'course_reg');
  	$q = "SELECT * FROM courses_detail where course_id = $course_id and year = $year and sem = $sem;";
  	$result = mysqli_query($con,$q);
  	mysqli_close($con);
  	$num = mysqli_num_rows($result);

?>
<!DOCTYPE html>
<html>
<head>
	<title>Select course</title>
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
 	 <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
  	<script>
  		
  		function validation(){
  			var num = '<?php echo $num?>'
  			var cbs = document.getElementsByClassName('checks');
  			var count = 0;
  			for (i = 0; i < num ; i++ ){
  				if (cbs[i].checked == true){
  					count = count + 1;
  				}
  			}
  			if(count > 4){
  				alert('Please Select Only 4 Choice');
  				return false;
  			}
  			else if(count < 4){
  				alert('Please Select atleast 4 Choice');
  				return false;
  			}
  			else{
  				alert('Please check your choice carefully first')
  				var c = confirmpop('Do you want to continoue?');
  				if(c==true)
  					return(true);
  				else
  					return(false);

  			}

  		}

  	</script>
</head>
<body>
	<div class = 'container'>
	<form action='http://localhost/course_reg/submit_choice.php' method='post' onsubmit="return validation();">	
	<table class = 'table table-striped table-bordered table-hover'>
					<caption><h2>Available Subject</h2></caption>
					<thead>
						<tr>
							<th>Select</th>
							<th>Subject</th>
							<th>course id</th>
							<th>Year</th>
							<th>Sem</th>
						</tr>
					</thead>
					<?php
							for ($i=1;$i<=$num;$i++){
								$row = mysqli_fetch_array($result);
					?>

					<tbody>
						<tr><td><input type='checkbox' name=<?php echo 'sbj'.$i;?> 
							value=<?php echo $row['id'];?> class='checks'></td>
							<td><?php echo $row['subject'];?></td>
							<td><?php echo $row['course_id'];?></td>
							<td><?php echo $row['year']?></td>
							<td><?php echo $row['sem']?></td>
						</tr>
					</tbody>
					<?php
							}
					?>
					
	</table>
	<input type='submit' class='btn btn-primary' value='Submit'>
	<input type='reset' class='btn btn-success' value='Reset'>
	</form>
	<div class='alert alert-warning' style='margin-top: 10px;'>
			<strong>Note:-</strong> Please select only 4 subjects.
		</div>
	</div>
</body>
</html>

