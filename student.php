<?php

include 'connect.php';

if(isset($_POST['submit'])){

$student_id = $_POST['student_id'];
$f_name = $_POST['f_name'];
$s_name = $_POST['s_name'];
$other_name=$_POST['other_name'];
$email = $_POST['email'];
$password = password_hash($_POST['password'], PASSWORD_DEFAULT);
$year_of_study = $_POST['year_of_study'];
$faculty = $_POST['faculty'];

$stmt = $conn->prepare("INSERT INTO student
(student_id,f_name,s_name,other_name,email,password,year_of_study,faculty)
VALUES (?,?,?,?,?,?,?,?)");

$stmt->bind_param("isssssss",$student_id,$f_name,$s_name,$other_name,$email,$password,$year_of_study,$faculty);

if($stmt->execute()){

echo "Student Registered Successfully";

}else{

echo $stmt->error;

}

}

?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<title>Student registration</title>
<style type="text/css">
<!--
.style1 {color: #FFFFFF}
.style2 {
	color: #CCCCCC;
	background-color: #000099;
	background-position: center center;
}
#wrapper {	background-color: #0000FF;
}
#wrapper #header #navbar a {
	background-color: #FFFFFF;
}
#wrapper #header #studentreg {
	background-color: #FFFFFF;
}
#wrapper #header #navbar a {
	background-color: #FFFFFF;
}
#form1 .style2 {
	background-color: #003300;
}
#form1 .style2 {
	color: #FFFFFF;
	background-color: #006600;
	border-top-style: none;
	border-right-style: none;
	border-bottom-style: none;
	border-left-style: none;
}
#wrapper #header #navbar a {
	background-color: #FF9900;
}
#wrapper #header #studentreg {
}
#wrapper #header #studentreg {
	background-color: #FF9900;
}
-->
</style>
</head>
<body>
<div id="wrapper">
  <div class="style1" id="header">
    <div align="center">
      <p>GUILD ONLINE VOTING SYSTEM </p>
      <div id="navbar">
      </div>
      <div class="style2" id="studentreg">STUDENT PAGE </div>
      <p>&nbsp;</p>
    </div>
  </div>
</div>
<h1>Student Registration</h1>

<form method="POST">

Student ID:<input type="number"name="student_id"required><br><br>

First Name:<input type="text"name="f_name"required><br><br>

Second Name:<input type="text"name="s_name"required><br><br>
Other Name:<input type="text"name="other_name"><br><br>

Email:<input type="email"name="email"required><br><br>

Password:<input type="password"name="password"required><br><br>

Year Of Study:<select name="year_of_study">

<option value="Year 1">Year 1</option>
<option value="Year 2">Year 2</option>
<option value="Year 3">Year 3</option>
<option value="Year 4">Year 4</option>

</select><br><br>

Faculty:<input type="text"name="faculty"required>

<br><br>
<p align="center">
<input type="submit"name="submit"value="Register Student">
</p>
</form>

</body>
</html>