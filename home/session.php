<?php
include('../db_conn.php');
session_start();
$user_check=$_SESSION['username'];

$sql = mysqli_query($conn,"SELECT * FROM ecouser WHERE username='$user_check' ");

$row= mysqli_fetch_array($sql,MYSQLI_ASSOC);


$session_fullname =$row['username'];


if(!isset($user_check))
{
header("Location: ../");
}
?>




