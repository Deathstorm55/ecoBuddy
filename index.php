<?php
include('db_conn.php');
$sql1 = "SELECT * FROM ecousertypes";
$result1 = mysqli_query($conn, $sql1);
$rows = mysqli_fetch_array($result1)
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <title>Sign-UP Page</title>
</head>
<body>
    <div class="container">
        <h1> Sign-UP </h1>
        <div class="form">

            <form action="" method="post" class="form_">
                <?php
                    if (isset($_REQUEST['submit'])) {
                        // $email = trim(stripslashes($_REQUEST['email']));
                        $username = trim(stripslashes($_REQUEST['name']));
                        $password = trim(stripslashes($_REQUEST['password']));
                        $valipassword = trim(stripslashes($_REQUEST['valiadtepass']));
                        $usertype = $_REQUEST['category'];
                        // Validate password strength
                        if (strlen($password) < 12 || !preg_match('/[A-Z]/', $password) || 
                        !preg_match('/[a-z]/', $password) || 
                        !preg_match('/[0-9]/', $password) || 
                        !preg_match('/[\W]/', $password)) {
                        die("<script>alert('Password requires Require a mix of uppercase letters, lowercase letters, numbers, and special characters and must be passwords that are at least 12-14 characters long..'); location.href='./'</script>");
                    }else{
                           $check = mysqli_query($conn, "SELECT * FROM ecouser WHERE  username='$username'");
							$checkrows= mysqli_num_rows($check);
							if($checkrows>0){
								echo"<script>alert('Username already taken!!');location.href='./'</script>";
							}
                            else{
                                if($password == $valipassword){
                            
                                    $hashed_password = password_hash($password, PASSWORD_DEFAULT);
                                    $stmt = $conn->prepare("INSERT INTO ecouser (`username`, `password`, `usertype`) VALUES (?, ?, ?)");
                                    $stmt->bind_param("sss", $username, $hashed_password, $usertype);
                                    if ($stmt->execute()) {
                                        echo "<script>alert('User Registered succesfully!!');</script>";
                                    } else {
                                        echo "Error: " . $stmt->error;
                                    }
                                    $stmt->close();
                                    $conn->close();
                                }else{
                                    echo "<script>alert('Incorrect password!!');</script>";
                                }
                            }
                         
                    }
                   
                    }
                    
                    
                ?>
                <!-- <label for="email">Enter your email:</label><br>
                <input type="email" name="email" id="" required><br> -->
                
                <label for="name">Enter your name:</label><br>
                <input type="text" name="name" id="" required><br>

                <label for="password">Enter your Password:</label><br>
                <input type="password" name="password" id="" required><br>
                <label for="validatepass">Validate your Password:</label><br>
                <input type="password" name="valiadtepass" id="" required><br>
                <select name="category" id="" required>
                
                    <option value="">Choose your category</option>
                    <?php
                     include('db_conn.php');
                     $sql2 = "SELECT * FROM ecousertypes ";
                     $result2 = mysqli_query($conn, $sql2);
                     if (mysqli_num_rows($result2) > 0) {
                            while ($row = mysqli_fetch_array($result2)) {
                                    ?>
                    <option value=" <?php echo $row['usertype']; ?>" name="usertype"> <?php echo $row['name']; ?></option><?php }}?>
                    
                </select>
                
                
                <br><br>
                <button type="submit" name="submit">Submit</button><br>
                <p>Already a member? <a href="./login.php"><p>Login</p></a></p>
            </form>
        </div>
    </div>
</body>
</html>