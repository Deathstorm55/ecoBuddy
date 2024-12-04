<?php
include 'db_conn.php';
session_start();
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $username = $_POST['username'];
    $password = $_POST['password'];


    // Fetch user record
    $stmt = $conn->prepare("SELECT `password` FROM ecouser WHERE username = ?");
    $stmt->bind_param("s", $username);
    $stmt->execute();
    $stmt->store_result();
    $stmt->bind_result($password_hash);

    if ($stmt->num_rows > 0) {
        $stmt->fetch();
        if (password_verify($password, $password_hash)) {
            $_SESSION['username'] = $username;
            echo '<script type="text/javascript"> window.open("./home/home.php","_self");</script>'; 
        } else {
            echo "Invalid password.";
        }
    } else {
        echo "User not found.";
    }

    $stmt->close();
    $conn->close();
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <title>Login Page</title>
</head>
<body>
    <div class="container">
        <h1> LOGIN </h1>
        <div class="form">

            <form action="" method="post" class="form_">
                <label for="username">Enter your username:</label><br>
                <input type="username" name="username" id=""><br>

                <label for="password">Enter your Password:</label><br>
                <input type="password" name="password" id=""><br><br>
                <button type="submit" name="submit">Login</button><br>
                <p>not registered? <a href="./"><p>Sign-UP</p></a></p>
            </form>
        </div>
    </div>
</body>
</html>