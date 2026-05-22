<?php

session_start();
include 'connect.php';

if($_SESSION['role'] != 'candidate'){
die("Access Denied");
}

if(isset($_POST['submit'])){

$student_id = $_POST['student_id'];
$position_id = $_POST['position_id'];
$candidate_name = $_POST['candidate_name'];
$manifesto = $_POST['manifesto'];
$slogan = $_POST['slogan'];

$photo = $_FILES['photo']['name'];
$temp_name = $_FILES['photo']['tmp_name'];

move_uploaded_file($temp_name,"uploads/".$photo);

$invoice = $_POST['invoice'];
$amount_paid = $_POST['amount_paid'];
$amount_due = $_POST['amount_due'];
$nomination_date = $_POST['nomination_date'];
$declaration = $_POST['declaration'];

$checkStudent = mysqli_query($conn,
"SELECT * FROM student WHERE student_id='$student_id'");

if(mysqli_num_rows($checkStudent)==0){
die("Student ID Not Found");
}

$studentData = mysqli_fetch_assoc($checkStudent);

if($studentData['year_of_study']=='Year 4'){
die("Year 4 Students Cannot Contest");
}
if($studentData['criminal_record']=='Yes'){
die("Candidate Has Criminal Record");
}

$stmt = $conn->prepare("INSERT INTO candidate
(student_id,position_id,candidate_name,manifesto,slogan,photo,invoice,amount_paid,amount_due,nomination_date,declaration)
VALUES (?,?,?,?,?,?,?,?,?,?,?)");

$stmt->bind_param(
"iisssssddss",
$student_id,
$position_id,
$candidate_name,
$manifesto,
$slogan,
$photo,
$invoice,
$amount_paid,
$amount_due,
$nomination_date,
$declaration
);

if($stmt->execute()){

echo "Candidate Registered Successfully";

}else{

echo $stmt->error;

}

}

?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<title>Candidate registration</title>
<style type="text/css">
<!--
.style1 {color: #FFFFFF}
.style2 {
	color: #CCCCCC;
	background-color: #000099;
	background-position: center center;
}
#wrapper {	background-color: #000099;
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
      <div class="style2" id="studentreg">CANDIDATE PAGE  </div>
      <p>&nbsp;</p>
    </div>
  </div>
</div>
<h1>Candidate Registration</h1>

<form method="POST" enctype="multipart/form-data">

Student ID:<input type="number" name="student_id" required><br><br>

Position ID:<input type="number" name="position_id" required><br><br>

Candidate Name:<input type="text" name="candidate_name" required><br><br>

Manifesto:<textarea name="manifesto"></textarea><br><br>

Slogan:<input type="text" name="slogan" required><br><br>

Photo:<input type="file" name="photo" required><br><br>

Invoice:<input type="text" name="invoice" required><br><br>

Amount Paid:<input type="number" step="0.01" name="amount_paid" required><br><br>

Amount Due:<input type="number" step="0.01" name="amount_due" required><br><br>

Nomination Date:<input type="date" name="nomination_date" required><br><br>

Declaration:<textarea name="declaration"></textarea><br><br>

<p align="center"><input type="submit" name="submit" value="Register Candidate">
<p/>
</form>

</body>
</html>