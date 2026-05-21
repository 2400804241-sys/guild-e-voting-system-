<?php

include 'connect.php';

$result = mysqli_query($conn,
"SELECT candidate.*, positions.position_name
FROM candidate
INNER JOIN positions
ON candidate.position_id = positions.position_id");

?>

<!DOCTYPE html>
<html>
<head>
<title>View Candidates</title>
</head>
<body>

<h1>Registered Candidates</h1>

<table border="1" cellpadding="10">

<tr>
<th>Photo</th>
<th>Candidate Name</th>
<th>Position</th>
<th>Manifesto</th>
<th>Slogan</th>
<th>Approval Status</th>
<th>Nomination Status</th>
</tr>

<?php

while($row=mysqli_fetch_assoc($result)){

?>

<tr>
<td>
<img src="uploads/<?php echo $row['photo']; ?>"
width="100">
</td>

<td><?php echo $row['candidate_name']; ?></td>
<td><?php echo $row['position_name']; ?></td>
<td><?php echo $row['manifesto']; ?></td>
<td><?php echo $row['slogan']; ?></td>
<td><?php echo $row['approval_status']; ?></td>
<td><?php echo $row['nomination_status']; ?></td>
</tr>

<?php

}

?>

</table>

</body>
</html>