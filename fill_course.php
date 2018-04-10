<?php
	session_start();
	$id = $_SESSION['id'];
?>

<!DOCTYPE html>
<html>
<head>
	<title>Fill Course</title>
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
 	 <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
</head>
<body>
	<div class = 'container'>
		<h1>Online Course Registration</h1>
		<div style="margin-top: 50px;" class = 'jumbotron'>
			<h3>Please fill the following information:-</h3>
			<form action="http://localhost/course_reg/select_choice.php" method="post">
				<table class='table table-striped table-bordered'>
					<tbody>
						<tr>
							<td><strong>Branch</strong></td>
							<td><select name="branch" required>
									<option value="Civil">Civil</option>
									<option value="Computer Science">Computer Science</option>
									<option value="Communication">Communication</option>
									<option value="Electrical">Electrical</option>
									<option value="Mechanical">Mechanical</option>
									<option value="Information Technology">Information Technology</option>
								</select>
							</td>
						</tr>
						<tr>
							<td><strong>Course id</strong></td>
							<td>
								<select name="course_id" required>
									<option value="1">1</option>
									<option value="2">2</option>
									<option value="3">3</option>
									<option value="4">4</option>
									<option value="5">5</option>
									<option value="6">6</option>
								</select>
							</td>
						</tr>
						<tr>
							<td><strong>Year</strong></td>
							<td><select name="year" required>
									<option value="2">2</option>
									<option value="3">3</option>
									<option value="4">4</option>
								</select>
							</td>
						</tr>
						<tr>
							<td><strong>Semester</strong></td>
							<td>
								<select name="sem" required>
									<option value="3">3</option>
									<option value="4">4</option>
									<option value="5">5</option>
									<option value="6">6</option>
									<option value="7">7</option>
									<option value="8">8</option>
								</select>
							</td>
						</tr>
					</tbody>
				</table>
				<input class='btn btn-primary' type="submit" value='Submit'>
			</form>
		</div>
	</div>
</body>
</html>