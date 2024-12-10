<?php
session_start();
require_once '../Model/db_conn.php'; // Include the Database class file

// Create a new Database object and get the connection
$db = new Database();
$conn = $db->getConnection();

// If form submitted, process the login
if (isset($_POST['username'])) {
    // Sanitize input to prevent SQL injection
    $username = trim($_POST['username']);
    $password = trim($_POST['password']);

    try {
        // Prepare the SQL query
        $query = "SELECT * FROM ecouser WHERE `username` = :username AND `password` = :password AND usertype = '1'";
        $stmt = $conn->prepare($query);
        $stmt->bindParam(':username', $username);
        $stmt->bindParam(':password', $password);
        $stmt->execute();

        // Check if a matching user was found
        if ($stmt->rowCount() == 1) {
            $_SESSION['username'] = $username;
            header("Location: /ecoBuddy/view/admin_home/home.php");
        } else {
            header("Location: /ecoBuddy/view/admin_login.php");
        }
    } catch (PDOException $e) {
        // Handle database query errors
        die("Database query error: " . $e->getMessage());
    }
}
?>
