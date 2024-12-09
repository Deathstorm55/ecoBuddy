<?php
    if (isset($_POST['submit'])) {
        $update_status = $_POST['update_status'];

        try {
            $stmt = $pdo->prepare("UPDATE ecofacilitystatus SET statusComment = :statusComment WHERE facilityId = :facilityId");
            $stmt->execute([
                'statusComment' => $update_status,
                'facilityId' => $id,
            ]);

            header("Location: http://localhost/ecoBuddy/view/inventory.php");
            exit();
        } catch (PDOException $e) {
            echo "Error updating record: " . htmlspecialchars($e->getMessage());
        }
    }
?>