<?php
require_once '../Model/db_conn.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    try {
        $db = new Database();
        $pdo = $db->getConnection();

        // Insert form data into `ecofacilities` table
        $sql = "INSERT INTO ecofacilities (title, category, description, houseNumber, streetName, county, town, postcode, lng, lat, contributor)
                VALUES (:title, :category, :description, :houseNumber, :streetName, :county, :town, :postcode, :lng, :lat, :contributor)";
        
        $stmt = $pdo->prepare($sql);
        $stmt->execute([
            ':title' => $_POST['title'],
            ':category' => $_POST['category'], // Assuming category ID is passed from the dropdown
            ':description' => $_POST['description'],
            ':houseNumber' => $_POST['houseNumber'],
            ':streetName' => $_POST['streetName'],
            ':county' => $_POST['county'],
            ':town' => $_POST['town'],
            ':postcode' => $_POST['postcode'],
            ':lng' => $_POST['lng'],
            ':lat' => $_POST['lat'],
            ':contributor' => $_POST['contributor']
        ]);

        echo "Record successfully added!";
    } catch (Exception $e) {
        echo "Error: " . $e->getMessage();
    }
}
?>
