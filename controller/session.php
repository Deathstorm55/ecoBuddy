<?php
require_once '../../Model/db_conn.php'; // Ensure this file is included only once

session_start();

// Check if the user is logged in
if (!isset($_SESSION['username'])) {
    header("Location: ../");
    exit();
}

$user_check = $_SESSION['username'];

try {
    // Create a Database object and get the connection
    $db = new Database();
    $pdo = $db->getConnection();

    // Prepare and execute a query to fetch user details
    $query = "SELECT * FROM ecouser WHERE username = :username";
    $stmt = $pdo->prepare($query);
    $stmt->execute(['username' => $user_check]);

    // Fetch user data
    $row = $stmt->fetch(PDO::FETCH_ASSOC);

    // Check if the user exists
    if (!$row) {
        // User not found, redirect to the login page
        header("Location: ../");
        exit();
    }

    // Store session-specific details
    $session_fullname = $row['username'];

} catch (Exception $e) {
    // Log errors (optional) and redirect to the login page
    error_log("Session error: " . $e->getMessage());
    header("Location: ../");
    exit();
}
?>
