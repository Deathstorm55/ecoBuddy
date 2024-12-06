<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>search</title>
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
                                                <th> Id</th>
                                                <th>Description</th>
                                                <th>Category Id</th>
                                                <th>Address</th>
                                                <th>Category</th>
                                                <th>Postcode</th>
                                                <th>Status</th>
                                                <th> Action</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                        <?php 
include('../db_conn.php'); 

$sql = "SELECT * FROM ecofacilities ORDER BY `id` ASC";

$result = mysqli_query($conn, $sql);

if (mysqli_num_rows($result) > 0) {
 while($row = mysqli_fetch_array($result)){
    $uid = $row['id'];
    $query = "SELECT * FROM ecofacilitystatus 
    WHERE `id`='$uid'";
    $results = mysqli_query($conn, $query);
    if(mysqli_num_rows($results)>0){
        while($rows = mysqli_fetch_array($results)){
?>  
                                            <tr class="">
                                                <td><?php echo $row['id'];?></td>
                                                <td><?php echo $row['description'];?></td>
                                                <td><?php echo $row['category']?></td>
                                                <td><?php echo $row['streetName'];?>, <?php echo $row['town']; ?></td>
                                                <td><?php echo $row['title'];?></td>
                                                <td><?php echo $row['postcode'];?></td>
                                                <td><?php echo $rows['statusComment'];?></td>    
                                                <td><div>
                                        <ul class="dropdown-menu">
                                            <li><a href="./update_status.php?id=<?php echo $row['id'];?>">Edit Status</a>
                                        </li>
                                        </ul>
                                    </div></td>
                                            </tr>
                                            <?php  
}
}
 }
}



?>
                                            
                                    </table>
</body>
</html>