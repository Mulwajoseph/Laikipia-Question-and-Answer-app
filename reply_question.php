<?php
include("db_connect.php");
if(isset($_POST["replyqn"])){

$sender_id=mysqli_real_escape_string($connect,$_POST["sender_id"]);
$replier_id=mysqli_real_escape_string($connect,$_POST["replier_id"]);
$question_id=mysqli_real_escape_string($connect,$_POST["question_id"]);
$reply_msg=mysqli_real_escape_string($connect,$_POST["reply_msg"]);

$datee=date("Y/m/d");
$timee=date("h:i:sa");

$sql="INSERT INTO replies (sender_id,question_id,replier_id,reply,datee,timee) VALUES('$sender_id','$question_id','$replier_id','$reply_msg','$datee','$timee')";
$query=mysqli_query($connect,$sql);
if(!$query){
	echo '<script>alert("Form has not been submitted");history.back();</script>';
}
}
?>