<?php

session_start();

$f_name = $_POST['f_name'];
$l_name = $_POST['l_name'];
$email = $_POST['email'];
$password = $_POST['password'];
$m_number = $_POST['m_number'];
$id = $_SESSION['id'];

$con = mysqli_connect('localhost','root');
mysqli_select_db($con,'course_reg');

$q = "UPDATE user_info set f_name = '$f_name' where id = $id ;";
mysqli_query($con,$q);
$q = "UPDATE user_info set l_name = '$l_name' where id = $id ;";
mysqli_query($con,$q);
$q = "UPDATE user_info set email = '$email' where id = $id ;";
mysqli_query($con,$q);
$q = "UPDATE user_info set password = '$password' where id = $id ;";
mysqli_query($con,$q);
$q = "UPDATE user_info set m_number = $m_number where id = $id ;";
mysqli_query($con,$q);

mysqli_close($con);
header('location:http://localhost/course_reg/profile.php');

/*
echo $f_name;
echo $l_name;
echo $m_number;
echo $password;
echo $email;*/
?>