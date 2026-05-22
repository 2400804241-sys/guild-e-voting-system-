<?php

session_start();
include 'connect.php';

$message = "";

if(isset($_POST['login'])){

    $email = $_POST['email'];
    $password = $_POST['password'];

    $stmt = $conn->prepare("SELECT * FROM student WHERE email=?");
    $stmt->bind_param("s", $email);
    $stmt->execute();

    $result = $stmt->get_result();

    if($result->num_rows > 0){

        $row = $result->fetch_assoc();

        if(password_verify($password, $row['password'])){

            $_SESSION['student_id'] = $row['student_id'];
            $_SESSION['role'] = $row['role'];
            $_SESSION['faculty'] = $row['faculty'];

            if($row['role'] == 'admin'){

                header("Location: admin_dashboard.php");

            }elseif($row['role'] == 'candidate'){

                header("Location: candidate_dashboard.php");

            }else{

                header("Location: voter_dashboard.php");
            }

            exit();

        }else{

            $message = "Wrong Password!";
        }

    }else{

        $message = "User Not Found!";
    }
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">

<title>Login Page</title>

<style>

*{
    margin:0;
    padding:0;
    box-sizing:border-box;
    font-family:Arial, Helvetica, sans-serif;
}

body{
    background:linear-gradient(to right, #003366, #0066cc);
    height:100vh;
    display:flex;
    justify-content:center;
    align-items:center;
}

.login-box{
    width:380px;
    background:white;
    padding:35px;
    border-radius:12px;
    box-shadow:0 5px 15px rgba(0,0,0,0.3);
}

.login-box h1{
    text-align:center;
    color:#003366;
    margin-bottom:10px;
}

.login-box p{
    text-align:center;
    color:#666;
    margin-bottom:25px;
}

.input-group{
    margin-bottom:20px;
}

.input-group label{
    display:block;
    margin-bottom:6px;
    font-weight:bold;
    color:#333;
}

.input-group input{
    width:100%;
    padding:12px;
    border:1px solid #ccc;
    border-radius:6px;
    font-size:15px;
}

.input-group input:focus{
    border-color:#0066cc;
    outline:none;
}

.btn{
    width:100%;
    padding:12px;
    border:none;
    background:#0066cc;
    color:white;
    font-size:16px;
    border-radius:6px;
    cursor:pointer;
    transition:0.3s;
}

.btn:hover{
    background:#004c99;
}

.message{
    text-align:center;
    color:red;
    margin-bottom:15px;
    font-weight:bold;
}

.footer{
    text-align:center;
    margin-top:20px;
    color:#777;
    font-size:14px;
}

</style>

</head>

<body>

<div class="login-box">

    <h1>Guild Voting System</h1>
    <p>Login to continue</p>

    <?php
    if($message != ""){
        echo "<div class='message'>$message</div>";
    }
    ?>

    <form method="POST">

        <div class="input-group">
            <label>Email Address</label>
            <input type="email" name="email" placeholder="Enter your email" required>
        </div>

        <div class="input-group">
            <label>Password</label>
            <input type="password" name="password" placeholder="Enter your password" required>
        </div>

        <input type="submit" name="login" value="Login" class="btn">

    </form>

    <div class="footer">
        © 2026 Guild Online Voting System
    </div>

</div>

</body>
</html>