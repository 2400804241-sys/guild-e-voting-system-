<?php

session_start();

if(!isset($_SESSION['role'])){
header("Location: login.php");
exit();
}

if($_SESSION['role'] != 'admin'){
die("Access Denied");
}

?>

<!DOCTYPE html>
<html>
<head>
<title>Admin Dashboard</title>
</head>
<body>

<h1>Admin Dashboard</h1>

<a href="position.php">Add Position</a><br><br>
<a href="view_students.php">View Students</a><br><br>
<a href="view_positions.php">View Positions</a><br><br>
<a href="view_candidates.php">View Candidates</a><br><br>
<a href="view_votes.php">View Votes</a><br><br>
<a href="vote_results.php">Election Results</a><br><br>
<a href="logout.php">Logout</a>

</body>
</html>
