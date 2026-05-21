<?php

session_start();

include 'connect.php';

if(isset($_POST['login'])){

$email = $_POST['email'];
$password = $_POST['password'];

$stmt = $conn->prepare("SELECT * FROM student WHERE email=?");

$stmt->bind_param("s",$email);

$stmt->execute();

$result = $stmt->get_result();

if($result->num_rows > 0){

$row = $result->fetch_assoc();

if(password_verify($password,$row['password'])){

$_SESSION['student_id'] = $row['student_id'];
$_SESSION['role'] = $row['role'];
$_SESSION['faculty'] = $row['faculty'];

if($row['role'] == 'admin'){

header("Location: admin_dashboard.php");

}
elseif($row['role'] == 'candidate'){

header("Location: candidate_dashboard.php");

}
else{

header("Location: voter_dashboard.php");

}

exit();

}else{

echo "Wrong Password";

}

}else{

echo "User Not Found";

}

}

?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<title>LOGIN</title>
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
      <div class="style2" color=black id="studentreg">LOGIN PAGE  </div>
      <p>&nbsp;</p>
    </div>
  </div>
</div>

<h1>Login</h1>

<form method="POST">

Email:<input type="email"name="email"required>

Password:<input type="password"name="password"required>
<p align="center">
<input type="submit"name="login"value="Login">
</p>
</form>

</body>
</html>