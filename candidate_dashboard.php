<?php

session_start();

if(!isset($_SESSION['role'])){
header("Location: login.php");
exit();
}

if($_SESSION['role'] != 'candidate'){
die("Access Denied");
}

?>

<!DOCTYPE html>
<html>
<head>
<title>Candidate Dashboard</title>
</head>
<body>

<h1>Candidate Dashboard</h1>

<a href="candidate.php">Candidate Registration</a><br><br>
<a href="view_candidates.php">View Candidates</a><br><br>
<a href="cast_vote.php">Vote</a><br><br>
<a href="logout.php">Logout</a>

</body>
</html>