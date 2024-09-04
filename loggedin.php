<?php
session_start();
if (!isset($_SESSION['email'])) {
    header("Location: login.php");
    exit();
}

if (isset($_POST['logout'])) {
    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "joybasket";
    $conn = new mysqli($servername, $username, $password, $dbname);
     $email = $_GET['email'];
    $sql = "DELETE FROM users WHERE email = '$email'";
    $res=mysqli_query($conn,$sql);
    echo"<script>localStorage.clear()</script>";
     if ($res) {
        header("location:login.php");
     } 
    session_destroy();
    header("Location: login.php");
    exit();
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" href="logo.png">
    <title>Welcome to JoyBasket!</title>
    <style>
        body {
            display: flex;
            flex-direction: column;
            background-color: white;
            margin: 0;
            font-family: Arial, sans-serif;
            align-items: center;
            height: 100vh;
        }
        .head {
            display: flex;
            height: 80px;
            background-color: rgb(236, 220, 247);
            text-shadow: 1.1px 1.1px 5px rgba(66, 3, 110, 0.6);
            font-size: 1.5rem;
            font-family: Arial, Helvetica, sans-serif;
            margin-bottom: 20px;
            width: 100%;
        }
        .home{
            text-decoration:none;
            color:black;
        }
        .container {
            background-color: white;
            padding: 50px;
            border-radius: 10px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            width: 300px;
            text-align: center;
            border:1px solid black;
            border-radius:5px;
        }
        h1 {
            margin-top: 0;
        }
        .user-info {
            text-align: left;
            margin-top: 20px;
            color: rgb(11, 3, 88);
        }
        .copywrite {
            font-size: 0.7rem;
            text-align: center;
            padding-top: 5px;
            color: rgb(11, 3, 88);
        }
        .logout-btn {
            margin-top: 20px;
            padding: 10px 20px;
            background-color: rgb(11, 3, 88);
            color: white;
            border: none;
            border-radius: 5px;
            cursor: pointer;
        }
    </style>
</head>
<body>
    <div class="head">
        <a href="joybasket.php" class="home"><h1>JoyBasket</h1></a>
    </div>
    <div class="container">
        <h1>Welcome to JoyBasket!</h1>
        <div class="user-info">
            <?php
                if (isset($_SESSION['email'])) {
                    $email = $_SESSION['email'];
                    echo "<p>Your email: " . htmlspecialchars($email) . "</p>";
                    echo "<p>Your password: *****</p>";
                    echo "<script>localStorage.setItem('email', '" . htmlspecialchars($email) . "');</script>";
                }
            ?>
        </div>
        <form method="post" action="">
            <button type="submit" class="logout-btn" name="logout">Logout</button>
        </form>
    </div>
    <div class="foot-panel4">
        <div class="pages">
            <a href="copywright.html" target="_blank" style="color: white;">Conditions Of Use</a>
            <a href="privacy.html" target="_blank" style="color: white;">Privacy Notice</a>
            <a href="copywright.html" target="_blank" style="color: white;">Your Ads Privacy Choice</a>
            <div class="copywrite">
                © 2024-upcomig, JoyBasket.com, Inc. or its affiliates
            </div>
        </div>
    </div>
</body>
</html>