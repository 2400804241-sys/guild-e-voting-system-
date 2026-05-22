<?php

session_start();
include 'connect.php';

if($_SESSION['role'] != 'admin'){
die("Access Denied");
}

if(isset($_GET['candidate_id'])){

$candidate_id = $_GET['candidate_id'];

mysqli_query($conn,
"UPDATE candidate
SET approval_status='Rejected'
WHERE candidate_id='$candidate_id'");

echo "Candidate Rejected";

}

?>