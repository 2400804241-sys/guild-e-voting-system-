<?php

session_start();
include 'connect.php';

if($_SESSION['role'] != 'admin'){
die("Access Denied");
}

if(isset($_POST['submit'])){

$election_id = $_POST['election_id'];
$position_name = $_POST['position_name'];
$description = $_POST['description'];
$maximum_candidates = $_POST['maximum_candidates'];
$position_type = $_POST['position_type'];
if($position_type=='Universal'){
$faculty= NULL;
}else{
$faculty = $_POST['faculty'];
if(empty($faculty)){
die("Faculty Required");
}
}
$position_status = $_POST['position_status'];
$checkElection =mysqli_query($conn, "SELECT * FROM election WHERE election_id='$election_id' AND election_status='Active'");
if(mysqli_num_rows($checkElection)==0){
die("Election Is Not Active");
}

$stmt = $conn->prepare("INSERT INTO positions
(election_id,position_name,description,maximum_candidates,faculty,position_type,position_status)
VALUES (?,?,?,?,?,?,?)");

$stmt->bind_param(
"ississs",
$election_id,
$position_name,
$description,
$maximum_candidates,
$faculty,
$position_type,
$position_status
);

if($stmt->execute()){

echo "Position Added Successfully";

}else{

echo $stmt->error;

}

}

?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<title>Add Position</title>
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
      <div class="style2" id="studentreg">POSITION PAGE  </div>
      <p>&nbsp;</p>
    </div>
  </div>
</div>

<h1>Add Position</h1>

<form method="POST">

Election ID:<input type="number" name="election_id" required><br><br>

Position Name:<input type="text" name="position_name" required><br><br>

Description:<textarea name="description"></textarea><br><br>

Maximum Candidates:<input type="number" name="maximum_candidates" required><br><br>

Faculty:<input type="text" name="faculty"><br><br>

Position Type:
<select name="position_type">
<option value="Universal">Universal</option>
<option value="Faculty">Faculty</option>
</select><br><br>

Status:
<select name="position_status">
<option value="Active">Active</option>
<option value="Inactive">Inactive</option>
</select><br><br>

<p align="center"><input type="submit" name="submit" value="Save Position">
</p>
</form>

</body>
</html>