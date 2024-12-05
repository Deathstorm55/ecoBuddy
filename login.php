<?php
	include('db_conn.php');
	session_start();
    // If form submitted, insert values into the database.
    if (isset($_POST['username'])){

		$username = stripslashes($_REQUEST['username']); // removes backslashes
		$username = mysqli_real_escape_string($conn,$username); //escapes special characters in a string
		$password = stripslashes($_REQUEST['password']);
		$password = mysqli_real_escape_string($conn,$password);



	//Checking is user existing in the database or not
        $query = "SELECT * FROM ecouser WHERE username='$username' AND password='$password'";
		$result = mysqli_query($conn,$query) or die(mysqli_error($conn));
		$rows = mysqli_num_rows($result);
        if($rows==1){
			$_SESSION['username'] = $username;
			echo '<script type="text/javascript"> window.open("./home/home.php","_self");</script>'; // Redirect user to index.php
            }{
    echo "<script>alert('Invalid login credentials ')
	location.href='./login.php'</script>";
   }
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