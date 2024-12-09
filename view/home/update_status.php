<?php
require_once('../../controller/session.php');
require_once('../../Model/db_conn.php'); // Include the Database class
require_once('../../controller/FacilityController.php');
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Update Status</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f4;
            margin: 0;
            padding: 0;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
        }

        .container {
            width: 100%;
            max-width: 500px;
            background-color: #fff;
            padding: 20px;
            border-radius: 10px;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
        }

        .update_form {
            display: flex;
            flex-direction: column;
            gap: 15px;
        }

        .update_form label {
            font-size: 1.1rem;
            color: #333;
            margin-bottom: 5px;
        }

        .update_form select {
            padding: 10px;
            font-size: 1rem;
            border: 1px solid #ccc;
            border-radius: 5px;
            outline: none;
        }

        .update_form button {
            padding: 10px 20px;
            background-color: #4caf50;
            color: white;
            font-size: 1rem;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            transition: background-color 0.3s;
        }

        .update_form button:hover {
            background-color: #45a049;
        }

        .update_form button:disabled {
            background-color: #ccc;
            cursor: not-allowed;
        }

        .update_form select:focus {
            border-color: #4caf50;
        }
    </style>
</head>
<body>
    <div class="container">
        <div class="update_form">
            <form method="post">
                <?php
                // Update facility status
                require_once('../../Model/Facility.php');
                ?>
                <label for="update_status">Update your value</label>
                <select name="update_status" id="update_status" required>
                    <option value="" selected disabled>Select your value</option>
                    <option value="Not working">Not working</option>
                    <option value="Lots available">Lots available</option>
                    <option value="Amazing facility">Amazing facility</option>
                    <option value="Missing">Missing</option>
                </select>
                <button type="submit" name="submit">Submit</button>
            </form>
        </div>
    </div>
</body>
</html>
