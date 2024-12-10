<?php
	require_once('../Model/db_conn.php');
	require_once('../controller/AdminLogin.php');
?> 

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <title>Login Page</title>
</head>
<body>
    <div class="container">
        <h1> LOGIN </h1>
        <div class="form">

            <form action="" method="post" class="form_">
                <label for="username">Enter your username:</label><br>
                <input type="username" name="username" id=""><br>

                <label for="password">Enter your Password:</label><br>
                <input type="password" name="password" id=""><br><br>
                <button type="submit" name="submit">Login</button><br>
                
            </form>
        </div>
    </div>
</body>
</html>