<?php
require_once '../Model/db_conn.php'; // Include the Database class file

try {
    // Create a Database object and get the PDO connection
    $db = new Database();
    $pdo = $db->getConnection();

    // Check if the ID is provided
    if (isset($_REQUEST['id']) && is_numeric($_REQUEST['id'])) {
        // Prepare the DELETE statement
        $sql = "DELETE FROM ecofacilities WHERE id = :id";
        $stmt = $pdo->prepare($sql);

        // Bind the ID parameter and execute the query
        $stmt->bindParam(':id', $_REQUEST['id'], PDO::PARAM_INT);
        if ($stmt->execute()) {
            // Redirect on success
            header("Location: /ecobuddy/view/admin_home/inventory.php");
            exit();
        } else {
            echo "Error deleting record.";
        }
    } else {
        echo "Invalid ID.";
    }
} catch (PDOException $e) {
    // Handle database errors gracefully
    echo "Error deleting record: " . htmlspecialchars($e->getMessage());
}
?>
