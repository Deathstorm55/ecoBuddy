<?php
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
			header("Location: http://localhost/ecoBuddy/home/home.php"); 
            exit();// Redirect user to home.php;
            }{
        header("Location: http://localhost/ecoBuddy/login.php");
        exit();
   }
    }
?>