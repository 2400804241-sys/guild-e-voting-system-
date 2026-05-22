<?php
session_start();
?>

<!DOCTYPE html>
<html>
<head>
    <title>Guild E-Voting System</title>

    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <style>

        *{
            margin:0;
            padding:0;
            box-sizing:border-box;
            font-family:Arial, sans-serif;
        }

        body{
            background:#f4f4f4;
        }

        header{
            background:#003366;
            color:white;
            padding:20px;
            text-align:center;
        }

        .container{
            width:90%;
            max-width:1200px;
            margin:auto;
            padding:40px 20px;
        }

        .hero{
            background:white;
            padding:50px;
            border-radius:10px;
            text-align:center;
            box-shadow:0 0 10px rgba(0,0,0,0.1);
        }

        .hero h1{
            font-size:40px;
            margin-bottom:20px;
            color:#003366;
        }

        .hero p{
            font-size:18px;
            margin-bottom:30px;
            color:#555;
        }

        .buttons{
            display:flex;
            justify-content:center;
            gap:20px;
            flex-wrap:wrap;
        }

        .buttons a{
            text-decoration:none;
            padding:15px 30px;
            border-radius:5px;
            font-size:18px;
            transition:0.3s;
        }

        .register-btn{
            background:green;
            color:white;
        }

        .register-btn:hover{
            background:darkgreen;
        }

        .login-btn{
            background:#003366;
            color:white;
        }

        .login-btn:hover{
            background:#001f4d;
        }

        footer{
            background:#003366;
            color:white;
            text-align:center;
            padding:15px;
            margin-top:50px;
        }

        @media(max-width:768px){

            .hero h1{
                font-size:28px;
            }

            .hero p{
                font-size:16px;
            }

            .buttons a{
                width:100%;
                text-align:center;
            }

        }

    </style>

</head>

<body>

    <header>
        <h1>Guild E-Voting System</h1>
    </header>

    <div class="container">

        <div class="hero">

            <h1>Welcome To The Guild E-Voting System</h1>

            <p>
                This system enables students to register, apply as candidates,
                and vote securely online for guild leadership positions.
            </p>

            <div class="buttons">

                <a href="student.php" class="register-btn">
                    Student Registration
                </a>

                <a href="login.php" class="login-btn">
                    Login
                </a>

            </div>

        </div>

    </div>

</body>
</html>
