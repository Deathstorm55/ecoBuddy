<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Search</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f9;
            margin: 0;
            padding: 20px;
        }
        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 20px;
            background-color: #fff;
            box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1);
        }
        thead {
            background-color: #007bff;
            color: #fff;
        }
        th, td {
            padding: 12px 15px;
            text-align: left;
            border: 1px solid #ddd;
        }
        th {
            font-size: 16px;
        }
        tr:nth-child(even) {
            background-color: #f9f9f9;
        }
        tr:hover {
            background-color: #f1f1f1;
        }
        td a {
            text-decoration: none;
            color: #007bff;
        }
        td a:hover {
            text-decoration: underline;
        }
        .dropdown-menu {
            list-style: none;
            margin: 0;
            padding: 0;
        }
        .dropdown-menu li {
            margin: 0;
        }
    </style>
</head>
<body>
<table>
    <thead>
        <tr>
            <th>Id</th>
            <th>Description</th>
            <th>Category Id</th>
            <th>Address</th>
            <th>Category</th>
            <th>Postcode</th>
            <th>Status</th>
            <th>Action</th>
        </tr>
    </thead>
    <tbody>
    <?php 
    require_once './db_conn.php'; // Use the Database class for connection

    try {
        // Create a Database object and get the PDO connection
        $db = new Database();
        $pdo = $db->getConnection();

        // Fetch all facilities and their statuses using a JOIN query
        $sql = "
            SELECT 
                ef.id, ef.description, ef.category, ef.streetName, ef.town, ef.title, ef.postcode, es.statusComment
            FROM 
                ecofacilities ef
            LEFT JOIN 
                ecofacilitystatus es
            ON 
                ef.id = es.id
            ORDER BY 
                ef.id ASC
        ";
        $stmt = $pdo->prepare($sql);
        $stmt->execute();

        // Fetch all rows and render the table
        $facilities = $stmt->fetchAll(PDO::FETCH_ASSOC);

        if (!empty($facilities)) {
            foreach ($facilities as $row) {
                echo "<tr>
                    <td>{$row['id']}</td>
                    <td>{$row['description']}</td>
                    <td>{$row['category']}</td>
                    <td>{$row['streetName']}, {$row['town']}</td>
                    <td>{$row['title']}</td>
                    <td>{$row['postcode']}</td>
                    <td>{$row['statusComment']}</td>
                    <td>
                        <div>
                            <ul class='dropdown-menu'>
                                <li><a href='./update_status.php?id={$row['id']}'>Edit Status</a></li>
                            </ul>
                        </div>
                    </td>
                </tr>";
            }
        } else {
            echo "<tr><td colspan='8'>No records found.</td></tr>";
        }

    } catch (Exception $e) {
        // Handle errors gracefully
        echo "<tr><td colspan='8'>An error occurred: " . htmlspecialchars($e->getMessage()) . "</td></tr>";
    }
    ?>
    </tbody>
</table>
</body>
</html>
