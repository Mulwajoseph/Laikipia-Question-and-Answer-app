<?php
session_start(); 
include("db_connect.php");

if(isset($_POST["submit"])){

	//proceed with login
	$email=mysqli_real_escape_string($connect,$_POST["email"]);
	$password=mysqli_real_escape_string($connect,$_POST["password"]);

	$hashed_password=hash("MD5",$password);

	//check if user exists
	$sql="SELECT *FROM users WHERE email='$email' AND password='$hashed_password'";
	$select=mysqli_query($connect,$sql);
	$count=mysqli_num_rows($select);

	if($count>0){
		$_SESSION["active_user"]=$email;
		$active_user=$_SESSION["active_user"];

		echo '<script>window.location.assign("dashboard.php");</script>';
	}else{
		echo '<script>alert("Unable to login");history.back();</script>';
	}

}
else
{
	//alert user form has not been submitted
	echo '<script>alert("Form has not been submitted");history.back();</script>';
}

?>