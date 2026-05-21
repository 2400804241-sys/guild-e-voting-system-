<?php

session_start();
include 'connect.php';

if(!isset($_SESSION['student_id'])){
header("Location: login.php");
exit();
}

$student_id = $_SESSION['student_id'];
$studentFaculty = $_SESSION['faculty'];
$activeElection =mysqli_query($conn, "SELECT * FROM election WHERE election_status='Active'");
if(mysqli_num_rows($activeElection)==0){
die("Voting Is Closed");
}
$checkVote = mysqli_query($conn,
"SELECT * FROM student WHERE student_id='$student_id'");

$voteData = mysqli_fetch_assoc($checkVote);

if($voteData['has_voted']=='Yes'){
die("You Have Already Voted");
}

if(isset($_POST['submit_vote'])){

foreach($_POST['vote'] as $position_id => $candidate_id){

mysqli_query($conn,
"INSERT INTO vote(student_id,position_id,candidate_id)
VALUES('$student_id','$position_id','$candidate_id')");

}

mysqli_query($conn,
"UPDATE student SET has_voted='Yes'
WHERE student_id='$student_id'");

echo "Voting Successful";

}
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<title>CAST VOTE</title>
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
      <div class="style2" id="studentreg">VOTING PAGE </div>
      <p>&nbsp;</p>
    </div>
  </div>
</div>

<h1>Vote Here</h1>

<form method="POST">

<?php

$positions = mysqli_query($conn,
"SELECT * FROM positions
WHERE position_status='Active'");

while($position = mysqli_fetch_assoc($positions)){

$position_id = $position['position_id'];

$position_type = $position['position_type'];

$position_faculty = $position['faculty'];

if($position_type == 'Faculty' && $position_faculty != $studentFaculty){
continue;
}
echo "<h2>".$position['position_name']."</h2>";

$candidates = mysqli_query($conn,
"SELECT * FROM candidate
WHERE position_id='$position_id'
AND approval_status='Approved'");

while($candidate = mysqli_fetch_assoc($candidates)){

?>

<input type="radio"name="vote[<?php echo $position_id; ?>]"value="<?php echo $candidate['candidate_id']; ?>"required>

<?php echo $candidate['candidate_name']; ?>

<br>

<img src="uploads/<?php echo $candidate['photo']; ?>"
width="100">

<br><br>

<?php

}

}

?>
<p align="center">
<input type="submit" name="submit_vote" value="Submit Vote">
</p>
</form>

</body>
</html>