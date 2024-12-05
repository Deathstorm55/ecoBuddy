<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>search</title>
</head>
<body>
<table class="table table-striped table-bordered table-hover">
                                        <thead>
                                            <tr>
                                                <th>Headline</th>
                                                <th>content</th>
                                                <th>category</th>
                                                <th>Address</th>
                                                <th> Id</th>
                                                <th> Action</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                        <?php 
include('db_conn.php'); 
if($_POST){
$search=$_POST['search'];

$sql = "SELECT * FROM ecofacilities 
WHERE 
    `title` LIKE '%".$search."%' 
    OR `category` LIKE '%".$search."%' 
    OR `description` LIKE '%".$search."%' 
    OR `postcode` LIKE '%".$search."%' 
    OR `streetName` LIKE '%".$search."%';
";

$result = mysqli_query($conn, $sql);

if (mysqli_num_rows($result) > 0) {
 while($row = mysqli_fetch_array($result)){

	
?>  
                                            <tr class="">
                                                <td><?php echo $row['title'];?></td>
                                                <td><?php echo $row['description'];?></td>
                                                <td><?php echo $row['category']?></td>
                                                <td><?php echo $row['streetName'];?></td>
                                                <td><?php echo $row['id'];?></td>
                                                <td><div>
                                        <button> <span class="caret"></span></button>
                                        <ul class="dropdown-menu">
                                            <li><a href="updateb.php?id=<?php echo $row['id'];?>">Edit</a>
                                        </li>
                                            <li><a href="delete.php?id=<?php echo $row['id'];?>" onclick=" return confirm('are you sure to delete the record')">Delete</a></li>
                                        </ul>
                                    </div></td>     
                                                
                                            </tr>
                                            <?php  
}
}

}else{
    echo "<script> alert('no data');</script>";
}

?>
                                            
                                    </table>
</body>
</html>