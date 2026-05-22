<?php

session_start();
include 'connect.php';

if($_SESSION['role'] != 'admin'){
die("Access Denied");
}

$result = mysqli_query($conn,
"SELECT * FROM student");

?>

<!DOCTYPE html>
<html>
<head>
<title>View Students</title>
</head>
<body>

<h1>Registered Students</h1>

<table border="1" cellpadding="10">

<tr>
<th>Student ID</th>
<th>First Name</th>
<th>Last Name</th>
<th>Other Name</th>
<th>Email</th>
<th>Year</th>
<th>Faculty</th>
<th>Criminal Record</th>
<th>Role</th>
</tr>

<?php

while($row = mysqli_fetch_assoc($result)){

?>

<tr>
<td><?php echo $row['student_id']; ?></td>
<td><?php echo $row['f_name']; ?></td>
<td><?php echo $row['s_name']; ?></td>
<td><?php echo $row['other_name']; ?></td>
<td><?php echo $row['email']; ?></td>
<td><?php echo $row['year_of_study']; ?></td>
<td><?php echo $row['faculty']; ?></td>
<td><?php echo $row['criminal_record']; ?></td>
<td><?php echo $row['role']; ?></td>
</tr>

<?php

}

?>

</table>

</body>
</html>