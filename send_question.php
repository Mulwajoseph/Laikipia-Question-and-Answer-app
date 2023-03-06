<?php
include("db_connect.php");

$date=date("Y/m/d");

$time=date("h:i:sa");
$user_id=$_GET['id'];
$question=$_GET['question'];
$sql="INSERT INTO questions (sender_id,question,datee,timee) VALUES('$user_id','$question','$date','$time')";
$query=mysqli_query($connect,$sql);
?>