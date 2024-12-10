<?php
require_once('../../controller/session.php');
require_once('../../Model/db_conn.php');
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Welcome <?php echo $session_fullname; ?></title>
    <style>
        body {
            font-family: Arial, sans-serif;
            text-align: center;
            margin: 0;
            padding: 0;
            background-color: #f4f4f9;
        }
        header {
            padding: 20px;
            background-color: #007BFF;
            color: white;
        }
        nav {
            margin: 20px;
        }
        nav a {
            margin: 0 15px;
            text-decoration: none;
            color: #007BFF;
            font-size: 18px;
        }
        nav a:hover {
            text-decoration: underline;
        }
        form {
            margin: 15px 0;
        }
        form input[type="text"] {
            width: 60%;
            padding: 10px;
            font-size: 16px;
            border: 1px solid #ccc;
            border-radius: 5px;
            outline: none;
            transition: all 0.3s ease-in-out;
        }
        form input[type="text"]:focus {
            border-color: #007BFF;
            box-shadow: 0 0 5px rgba(0, 123, 255, 0.5);
        }
        footer {
            margin-top: 20px;
            padding: 10px;
            background-color: #007BFF;
            color: white;
            position: fixed;
            bottom: 0;
            width: 100%;
        }
    </style>
</head>
<body>
<header>
    <h1>Dear <?php echo $session_fullname; ?></h1>
    <h1>Welcome to Our EcoBuddy!</h1>
    <p>Your one-stop platform for managing data efficiently.</p>
</header>

<nav>
    <form action="./search.php" method="post" name="search">
    <input type="text" name="search" placeholder="Search for title, description, category, postcode, address..." required>
    </form>
    <a href="./inventory.php">Inventory</a>
    <a href="./create_facility.php">Create Facility</a>
</nav>

<footer>
    <p>&copy; <?php echo date("Y"); ?> EcoBuddy. All rights reserved.</p>
</footer>
</body>
</html>