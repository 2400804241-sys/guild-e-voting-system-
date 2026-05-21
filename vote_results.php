<?php

include 'connect.php';

$result = mysqli_query($conn,
"SELECT
positions.position_name,
candidate.candidate_name,
COUNT(vote.vote_id) AS total_votes

FROM vote

INNER JOIN candidate
ON vote.candidate_id = candidate.candidate_id

INNER JOIN positions
ON vote.position_id = positions.position_id

GROUP BY candidate.candidate_id

ORDER BY positions.position_name,
total_votes DESC
");

?>

<!DOCTYPE html>
<html>
<head>
<title>Election Results</title>
</head>
<body>

<h1>Election Results</h1>

<table border="1" cellpadding="10">

<tr>
<th>Position</th>
<th>Candidate</th>
<th>Total Votes</th>
</tr>

<?php

while($row=mysqli_fetch_assoc($result)){

?>

<tr>
<td><?php echo $row['position_name']; ?></td>
<td><?php echo $row['candidate_name']; ?></td>
<td><?php echo $row['total_votes']; ?></td>
</tr>

<?php

}

?>

</table>

</body>
</html>
