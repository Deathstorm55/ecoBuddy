<?php
    $conn= new mysqli("localhost", "ecouser", "eco123", "ecoBuddy" );
    if(mysqli_connect_errno()){
        printf("connect failed:%s\n", mysqli_connect_error());
        exit();
    }
?>