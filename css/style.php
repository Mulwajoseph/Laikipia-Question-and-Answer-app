
		<?php
    header("Content-type: text/css; charset: UTF-8");
    session_start();
error_reporting(0);
include("db_connect.php");
$active_user=$_SESSION["active_user"];
if($active_user==""){
	echo '<script>alert("You need to login first");window.location.assign("http://localhost/qaforum3/index2.html");</script>';
}
$sql="SELECT *FROM users WHERE email='$active_user'";
$select=mysqli_query($connect,$sql);
$num=mysqli_num_rows($select);
$row=mysqli_fetch_assoc($select);
$steve='"'.$row["profile_image"].'"';
?>
#profile-panel{
			
			background-image:url(<?php echo $steve;?>);
			height: 560px;
			max-width: 350px;
			background-size:100% 100%;
			position: relative;
			background-repeat: no-repeat;
			z-index: 1;
		}
