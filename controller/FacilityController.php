<?php
// Initialize the Database class
$db = new Database();
$pdo = $db->getConnection();

// Fetch the user details based on the `id` parameter
$id = 1; // Default ID, replace with dynamic logic if necessary
$userData = [];

if (isset($_REQUEST['id'])) {
    $id = $_REQUEST['id'];

    // Fetch user data
    $stmt = $pdo->prepare("SELECT * FROM ecouser WHERE id = :id");
    $stmt->execute(['id' => $id]);
    $userData = $stmt->fetch(PDO::FETCH_ASSOC);
}

// Fetch the facility status based on the `id` parameter
$facilityData = [];
if (isset($_REQUEST['id'])) {
    $stmt = $pdo->prepare("SELECT * FROM ecofacilitystatus WHERE id = :id");
    $stmt->execute(['id' => $_REQUEST['id']]);
    $facilityData = $stmt->fetch(PDO::FETCH_ASSOC);
}
?>