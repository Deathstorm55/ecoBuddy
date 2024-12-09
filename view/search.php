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
        require_once('../config/db_conn.php');

        try {
            // Initialize database connection
            $database = new Database();
            $pdo = $database->getConnection();

            if ($_POST) {
                $search = $_POST['search'];

                // Fetch facilities matching the search term
                $stmt = $pdo->prepare("
                    SELECT * FROM ecofacilities 
                    WHERE 
                        title LIKE :search1 
                        OR category LIKE :search2 
                        OR description LIKE :search3 
                        OR postcode LIKE :search4 
                        OR streetName LIKE :search5
                ");
                $stmt->execute([
                    'search1' => "%$search%",
                    'search2' => "%$search%",
                    'search3' => "%$search%",
                    'search4' => "%$search%",
                    'search5' => "%$search%"
                ]);

                if ($stmt->rowCount() > 0) {
                    while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
                        $uid = $row['id'];

                        // Fetch facility status
                        $statusStmt = $pdo->prepare("SELECT * FROM ecofacilitystatus WHERE id = :uid");
                        $statusStmt->execute(['uid' => $uid]);

                        if ($statusStmt->rowCount() > 0) {
                            while ($statusRow = $statusStmt->fetch(PDO::FETCH_ASSOC)) {
                                ?>
                                <tr>
                                    <td><?php echo htmlspecialchars($row['id']); ?></td>
                                    <td><?php echo htmlspecialchars($row['description']); ?></td>
                                    <td><?php echo htmlspecialchars($row['category']); ?></td>
                                    <td><?php echo htmlspecialchars($row['streetName'] . ', ' . $row['town']); ?></td>
                                    <td><?php echo htmlspecialchars($row['title']); ?></td>
                                    <td><?php echo htmlspecialchars($row['postcode']); ?></td>
                                    <td><?php echo htmlspecialchars($statusRow['statusComment']); ?></td>
                                    <td>
                                        <div>
                                            <ul class="dropdown-menu">
                                                <li><a href="update_status.php?id=<?php echo htmlspecialchars($row['id']); ?>">Edit</a></li>
                                            </ul>
                                        </div>
                                    </td>
                                </tr>
                                <?php
                            }
                        }
                    }
                } else {
                    echo "<tr><td colspan='8'>No Results Found!</td></tr>";
                }
            }
        } catch (Exception $e) {
            echo "<tr><td colspan='8'>Error: " . htmlspecialchars($e->getMessage()) . "</td></tr>";
        }
        ?>
    </tbody>
</table>
</body>
</html>
