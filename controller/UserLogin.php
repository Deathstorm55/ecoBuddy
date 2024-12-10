<?php 
session_start();
// require_once '../config/db_conn.php'; // Include the Database connection class

// If form is submitted, process the input
if (isset($_POST['username'])) {
    try {
        // Create a Database object and get the connection
        $db = new Database();
        $pdo = $db->getConnection();

        // Retrieve and sanitize user input
        $username = trim($_POST['username']);
        $password = trim($_POST['password']);

        // Prepare and execute a query to check user credentials
        $query = "SELECT * FROM ecouser WHERE username = :username AND password = :password";
        $stmt = $pdo->prepare($query);
        $stmt->execute(['username' => $username, 'password' => $password]);

        // Check if a user was found
        if ($stmt->rowCount() === 1) {
            $_SESSION['username'] = $username;
            header("Location: /ecoBuddy/view/home/home.php");
            exit(); // Redirect user to home.php
        } else {
            // If no user found, redirect to login page
            header("Location: /ecoBuddy/view/login.php");
            exit();
        }
    } catch (Exception $e) {
        // Handle any errors (optional)
        echo "An error occurred: " . $e->getMessage();
    }
}
?>
