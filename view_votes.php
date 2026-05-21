<?php

session_start();
include 'connect.php';

if($_SESSION['role'] != 'admin'){
die("Access Denied");
}

$result = mysqli_query($conn,
"SELECT vote.vote_id,
student.f_name,
student.s_name,
positions.position_name,
candidate.candidate_name,
vote.vote_time

FROM vote

INNER JOIN student
ON vote.student_id = student.student_id

INNER JOIN positions
ON vote.position_id = positions.position_id

INNER JOIN candidate
ON vote.candidate_id = candidate.candidate_id
");

?>

<!DOCTYPE html>
<html>
<head>
<title>View Votes</title>
</head>
<body>

<h1>Votes Cast</h1>

<table border="1" cellpadding="10">

<tr>
<th>Vote ID</th>
<th>Voter</th>
<th>Position</th>
<th>Candidate</th>
<th>Time</th>
</tr>

<?php

while($row=mysqli_fetch_assoc($result)){

?>

<tr>
<td><?php echo $row['vote_id']; ?></td>
<td><?php echo $row['f_name']; ?> <?php echo $row['s_name']; ?></td>
<td><?php echo $row['position_name']; ?></td>
<td><?php echo $row['candidate_name']; ?></td>
<td><?php echo $row['vote_time']; ?></td>
</tr>

<?php

}

?>

</table>

</body>
</html>