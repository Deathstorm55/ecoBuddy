
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Create Facility</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f9;
            margin: 0;
            padding: 20px;
        }
        .form-container {
            max-width: 600px;
            margin: 0 auto;
            background-color: #fff;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
        }
        .form-container h2 {
            margin-bottom: 20px;
            text-align: center;
            color: #333;
        }
        .form-group {
            margin-bottom: 15px;
        }
        label {
            display: block;
            margin-bottom: 5px;
            font-weight: bold;
            color: #555;
        }
        input[type="text"], input[type="number"], textarea, select {
            width: 100%;
            padding: 10px;
            border: 1px solid #ddd;
            border-radius: 4px;
            font-size: 14px;
        }
        textarea {
            resize: none;
            height: 80px;
        }
        button {
            display: block;
            width: 100%;
            padding: 10px;
            background-color: #007bff;
            color: #fff;
            border: none;
            border-radius: 4px;
            font-size: 16px;
            cursor: pointer;
            margin-top: 20px;
        }
        button:hover {
            background-color: #0056b3;
        }
    </style>
</head>
<body>
    <div class="form-container">
        <h2>Create Facility</h2>
        <form action="../../controller/ProcessFacility.php" method="POST">
            <div class="form-group">
                <label for="title">Title</label>
                <input type="text" id="title" name="title" required>
            </div>
            <div class="form-group">
                <label for="category">Category</label>
                <select id="category" name="category" required>
                    <option value="">Select a Category</option>
                    <?php
                    require_once '../../Model/db_conn.php';
                    require_once('../../controller/session.php');

                    try {
                        $db = new Database();
                        $pdo = $db->getConnection();

                        // Fetch categories from `ecocategories` table
                        $sql = "SELECT id, name FROM ecocategories ORDER BY name ASC";
                        $stmt = $pdo->prepare($sql);
                        $stmt->execute();
                        $categories = $stmt->fetchAll(PDO::FETCH_ASSOC);

                        foreach ($categories as $category) {
                            echo "<option value='{$category['id']}'>{$category['name']}</option>";
                        }
                    } catch (Exception $e) {
                        echo "<option value=''>Error loading categories</option>";
                    }
                    ?>
                </select>
            </div>
            <div class="form-group">
                <label for="description">Description</label>
                <textarea id="description" name="description" required></textarea>
            </div>
            <div class="form-group">
                <label for="houseNumber">House Number</label>
                <input type="text" id="houseNumber" name="houseNumber">
            </div>
            <div class="form-group">
                <label for="streetName">Street Name</label>
                <input type="text" id="streetName" name="streetName" required>
            </div>
            <div class="form-group">
                <label for="county">County</label>
                <input type="text" id="county" name="county" required>
            </div>
            <div class="form-group">
                <label for="town">Town</label>
                <input type="text" id="town" name="town" required>
            </div>
            <div class="form-group">
                <label for="postcode">Postcode</label>
                <input type="text" id="postcode" name="postcode" required>
            </div>
            <div class="form-group">
                <label for="lng">Longitude</label>
                <input type="text" id="lng" name="lng" required>
            </div>
            <div class="form-group">
                <label for="lat">Latitude</label>
                <input type="text" id="lat" name="lat" required>
            </div>
            
            <input type="hidden" name="contributor" value="<?php echo $session_id; ?>">
            <button type="submit">Submit</button>
        </form>
    </div>
</body>
</html>
