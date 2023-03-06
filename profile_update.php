<?php
session_start();
include("db_connect.php");
$active_user=$_SESSION["active_user"];
if(isset($_POST["submit"])){

$image_dir="profile_pic_dir/";
$uploaded_file=$image_dir.basename($_FILES['profile']['name']);

$imageFileType=strtolower(pathinfo($uploaded_file,PATHINFO_EXTENSION));
$uploaded_file_size=$_FILES['profile']['size'];
$valid_check=1;

if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
&& $imageFileType != "gif"){
	
	echo '<script>alert("Invalid image type, only jpg, jpeg, png allowed"); history.back();</script>';
	$valid_check=0;
}


if($valid_check==1){
if(move_uploaded_file($_FILES['profile']['tmp_name'],$uploaded_file )){
		
		$sql="UPDATE users SET profile_image='$uploaded_file' WHERE email='$active_user'";
		$update=mysqli_query($connect,$sql);
		if($update){
			echo '<script>alert("Profile pic set successfully"); history.back();</script>';
		}else{
			echo '<script>alert("Was unable to set profile pic"); history.back();</script>';
		}
	}	
}
	



}else{
	echo '<script>alert("Form not submitted"); history.back();</script>';
}
?>