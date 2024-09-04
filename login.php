<?php
session_start();
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "joybasket";
$conn = new mysqli($servername, $username, $password, $dbname);
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
if (!empty($_POST['email']) && !empty($_POST['password'])) {
    $email = $_POST['email'];
    $password = $_POST['password'];
    $check_email_query = "SELECT * FROM users WHERE email = '$email'";
    $result = $conn->query($check_email_query);

    if ($result->num_rows > 0) {
        echo '<script>alert("Email is already registered. Please use a different email.");</script>';
    } else {
        $sql = "INSERT INTO users VALUES ('$email', '$password')";
        if ($conn->query($sql) === TRUE) {
            $_SESSION['email'] = $email; // Set the session variable
            echo '<script>alert("You are logged in!"); window.location.href = "joybasket.php?email=' . urlencode($email) . '";</script>';
        } else {
            echo '<script>alert("Error: ' . $conn->error . '");</script>';
        }
    }
}
$conn->close();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" href="logo.png">
    <title>Login</title>
    <style>
        body {
            display: flex;
            justify-content: space-evenly;
            flex-direction: column;
            background-color: white;
            margin: 0;
        }
        .head {
            display: flex;
            justify-content: center;
            align-items: center;
            height: 80px;
            background-color: rgb(236, 220, 247);
            text-shadow: 1.1px 1.1px 5px rgba(66, 3, 110, 0.6);
            font-size: 1.5rem;
            font-family: Arial, Helvetica, sans-serif;
            margin-bottom: 20px;
        }
        .body {
            display: flex;
            justify-content: center;
            align-items: center;
            background-repeat: no-repeat; 
            backdrop-filter: blur;
            padding-top: 30px;
            margin-bottom: 20px;
        }
        .email input, .Password input {
            border: 2px solid rgb(11, 3, 88);
            border-radius: 50px;
            color: black;
            width: 180px;
            padding: 5px;
            background-color: rgb(255, 255, 255);
        }
        .wrapper {
            background-color: white;
            font-family: calibri;
            text-align: center;
            border: 5px solid rgb(197, 191, 239);
            box-shadow: 2px 3px 3px black;
            border-radius: 15px;
            padding: 50px;
        } 
        .button:hover {
            background-color: rgb(218, 197, 239);
        }
        .button {
            width: 120px;
            height: 40px;
            background-color: white;
            border: 1px solid rgb(1, 1, 1);
            border-radius: 30px;
            font-weight: bold;
        }
        .foot-panel4 {
            width: 100%;
            height: 150px;
            background-color: #0f1111;
            color: white;
            text-align: center;
        }
        .pages a {
            font-size: 0.7rem;
            text-align: center;
            padding-top: 20px;
            color: white;
            text-decoration: none;
            margin: 0 10px;
        }
        .pages a:hover {
            text-decoration: underline;
        }
        .copywrite {
            font-size: 0.7rem;
            text-align: center;
            padding-top: 5px;
        }
    </style>
</head>
<body>
    <div class="head"><h1>JoyBasket</h1></div>
    <div class="body">
        <div class="wrapper">
            <h4>
                <div class="login"><label><h1>Sign-in</h1></label></div><br>
                <form action="login.php" method="post">
                    <div class="email">
                        <label>Email id </label>
                        <input type="email" name="email" required>
                    </div><br>
                    <div class="Password">
                        <label>Password</label>
                        <input type="password" name="password" required>
                    </div><br>
                    <div class="checkbox">
                        <input type="checkbox" name="tik" required> Remember me
                    </div><br>
                    <div>
                        <button class="button" type="submit">Login</button>
                    </div>
                </form>
            </h4>
        </div>
    </div>
    <div class="foot-panel4">
        <div class="pages">
            <a href="copywright.php" target="_blank">Conditions Of Use</a>
            <a href="privacy.php" target="_blank">Privacy Notice</a>
            <a href="copywright.php" target="_blank">Your Ads Privacy Choice</a>
            <div class="copywrite">
                © 2024-upcomig, JoyBasket.com, Inc. or its affiliates
            </div>
        </div>
    </div>
</body>
</html>
