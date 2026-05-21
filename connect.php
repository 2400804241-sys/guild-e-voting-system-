<?php

$conn = new mysqli("localhost","root","","guildsystem",3308);

if($conn->connect_error){

die("Connection Failed: " . $conn->connect_error);

}

?>