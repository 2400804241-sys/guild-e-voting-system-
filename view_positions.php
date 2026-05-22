<?php

session_start();
include 'connect.php';

$result = mysqli_query($conn,
"SELECT * FROM positions");

?>

<!DOCTYPE html>
<html>
<head>
<title>View Positions</title>
</head>
<body>

<h1>Available Positions</h1>

<table border="1" cellpadding="10">

<tr>
<th>ID</th>
<th>Position Name</th>
<th>Description</th>
<th>Faculty</th>
<th>Position Type</th>
<th>Status</th>
</tr>

<?php

while($row=mysqli_fetch_assoc($result)){

?>

<tr>
<td><?php echo $row['position_id']; ?></td>
<td><?php echo $row['position_name']; ?></td>
<td><?php echo $row['description']; ?></td>
<td><?php echo $row['faculty']; ?></td>
<td><?php echo $row['position_type']; ?></td>
<td><?php echo $row['position_status']; ?></td>
</tr>

<?php

}

?>

</table>

</body>
</html>