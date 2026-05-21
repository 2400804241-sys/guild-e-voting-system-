<?php

session_start();

if(!isset($_SESSION['role'])){
header("Location: login.php");
exit();
}

if($_SESSION['role'] != 'student'){
die("Access Denied");
}

?>

<!DOCTYPE html>
<html>
<head>
<title>Voter Dashboard</title>
</head>
<body>

<h1>Voter Dashboard</h1>

<a href="cast_vote.php">Cast Vote</a><br><br>
<a href="view_candidates.php">View Candidates</a><br><br>
<a href="logout.php">Logout</a>

</body>
</html>