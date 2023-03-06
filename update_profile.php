<?php
session_start();
include("db_connect.php");
$active_user=$_SESSION["active_user"];

if(isset($_POST["submit"])){

	$status=mysqli_real_escape_string($connect,$_POST["status"]);
	$image_folder="profile_pic_dir/";
	$image_name=$image_folder. basename($_FILES["profile"]["name"]);
	$image_type=strtolower(pathinfo($image_name,PATHINFO_EXTENSION));
	$valid_check=1;
	//check whether that image type is of valid type
	if($image_type!="jpg" && $image_type!="png" && $image_type!="jpeg" && $image_type!="gif"){
		echo '<script> alert("Invalid image, only jpg,jpeg,png,gif allowed"); history.back();</script>';
		$valid_check=0;
	}
	if($valid_check==1){
		if(move_uploaded_file($_FILES["profile"]["tmp_name"], $image_name)){
			$sql="UPDATE users SET profile_image='$image_name',status='$status' WHERE email='$active_user'";
			$update=mysqli_query($connect,$sql);
			if($update){
				echo '<script>alert("Profile pic has been set successfully");history.back();</script>';
			}else{
				echo '<script>alert("Unable to set profile pic");history.back();</script>';
			}
		}
	}

}else{
	echo '<script>alert("form has not been submitted");history.back();</script>';
}
?>