<?php
session_start();
error_reporting(0);
include("db_connect.php");
$active_user=$_SESSION["active_user"];
$sql9="SELECT *FROM users WHERE email='$active_user'";
$select9=mysqli_query($connect,$sql9);
$num9=mysqli_num_rows($select9);
$row9=mysqli_fetch_assoc($select9);
if($active_user==""){
	echo '<script>alert("You need to login first");window.location.assign("http://localhost/qaforum3/index2.html");</script>';
}
$sql="SELECT *FROM users WHERE email='$active_user'";
$select=mysqli_query($connect,$sql);
$num=mysqli_num_rows($select);
$row=mysqli_fetch_assoc($select);
$replier_id=$row["user_id"];
$sender_id=$_GET["sender_id"];
$question_id=$_GET["question_id"];

//getting the detailos of the person who sent the question
$sql2="SELECT * FROM users WHERE user_id='$sender_id'";
$query2=mysqli_query($connect,$sql2);
$row3=mysqli_fetch_assoc($query2);

//getting the sent question
$sql3="SELECT * FROM questions WHERE question_id='$question_id'";
$query3=mysqli_query($connect,$sql3);
$row4=mysqli_fetch_assoc($query3);

?>
<!DOCTYPE html>
<html>
<head>
	<title>Question and Answer forum</title>
	<link rel="stylesheet" type="text/css" href="css/bootstrap.css">
	<link rel="stylesheet" type="text/css" href="css/w3v3.css">
	<link rel="stylesheet" type="text/css" href="css/css/css/fontawesome-all.css">
	<link rel="stylesheet" type="text/css" href="css/qaforumstyles.css">

	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<script type="text/javascript" src="js/jquery-1.11.3.min.js"></script>
	<script type="text/javascript" src="js/bootstrap.min.js"></script>
	<script type="text/javascript" src="js/validations.js"></script>
	<script type="text/javascript" src="js/send_reply.js"></script>

	<style type="text/css">
	body, html{
		overflow-x: hidden;
	}
		#profile-panel{

			height: 500px;
			max-width: 350px;
			background-size:100% 100%;
			position: relative;
			background-repeat: no-repeat;
			z-index: 1;
		}
		#profile-layer{
			background-color:rgb(163, 163, 194,.92);
			position: absolute;
			width: 100%;
			height: 100%;
		}
		#info-wrapper{
			margin:0px 70px;
		}
		#info-wrapper span{
			color:white;
			font-weight: bold;
			margin-top:20px;
		}
		#dashboard-navbar{
			background-color:rgb(163, 163, 194,.8);
;
		}
		#dashboard-navbar li a{
			color:white !important;
		}
		#profile-table tr td{
			color: white;
			font-weight:bold;
			border-color: transparent;
		}
		::-webkit-scrollbar{
			width:3px;
			height: 5px;
}
::-webkit-scrollbar-track{
	background-color:rgb(163, 163, 194,.8);
}
::-webkit-scrollbar-thumb{
	background-color: rgb(0, 102, 153);
	background-color: rgb(0, 102, 153,.58);
	border-radius: 10px;
	height: 1px;
}
	</style>


	
	

</head>
<body>

	<!--navigation-->
	<!--navigation bar-->
<nav class="navbar navbar-default navbar-fixed-top" id="dashboard-navbar">

	<!--progress div-->

	<div id="progress"></div>
	
  <div class="container-fluid">
    <div class="navbar-header">
      <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#myNavbar">
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span> 
      </button>
      <a class="navbar-brand" href="#"><b><img src="images/logo.png" id="logo" width="30px" height="30px">&nbspLaikipia University Quick Fix</b></a>
    </div>
    <div class="collapse navbar-collapse" id="myNavbar">
      <ul class="nav navbar-nav" id="list">
        <li class="active"><a href="#home"><img src="images/home.png" alt="logo-icon" width="12px" height="12px" style="margin-top: -8.5px;">&nbspHome</a></li>
      
        <li><a href="#about"><img src="images/about.png" alt="logo-icon" width="17px" height="17px" style="margin-top: -8.5px;">&nbspGet to know us</a></li>  
        <li><a href="#contact"><img src="images/contact.png" alt="logo-icon" width="17px" height="17px" style="margin-top: -8.5px;">&nbspGet in touch</a></li> 
      </ul>
      <ul class="nav navbar-nav navbar-right" id="list">
         <li><a href="#" data-toggle="modal" data-target="#registerModal"><img src="<?php echo $row9["profile_image"]; ?>" width="30px" height="30px" class="img-circle w3-card-4" style="margin-top: -8px;">&nbspLogged in as: <?php echo $row9["username"];?></a></li>
         <li><a href="logout.php">Logout</a></li>
               
      </ul>
    </div>
  </div>
</nav>
<br><br><br><br>

<div class="well w3-content" style="max-width: 700px;">
<h5 class="text-primary">Reply to <?php echo $row3["username"] ?> Question</h5>
<a href="dashboard.php" style="float: right; margin-top: -20px;">
	<button class="btn btn-sm btn-info"><i class="fa fa-home"></i></button>
	</a>
<span class="text-primary"><b>Question:</b>&nbsp<span style="color: #e67300;"><?php echo $row4["question"];?></span></span>
<br>
<span class="text-primary"><b>Your Response:&nbsp</b><span id="response" style="color:#39ac73;"></span></span>

<form class="well w3-white" method="POST" action="reply_question.php">
	<input type="hidden" id="sender_id" name="sender_id" value="<?php echo $sender_id;?>">
	<input type="hidden" id="replier_id" name="replier_id" value="<?php echo $replier_id;?>">
	<input type="hidden" id="question_id" name ="question_id" value="<?php echo $question_id; ?>"><br>
	<div class="alert alert-danger" id="empty_error" style="margin-bottom:2px; display: none;">Hey you cannot send an empty response</div><br>
	<textarea class="form-control" id="reply_msg" name="reply_msg"></textarea>
	<br><br>
	<button class="btn btn-sm btn-success" id="loader" style="display: none;">
		<img src="images/loader.gif" width="18px" height="18px" style="margin-top: -5px;">
	</button>
	<button class="btn btn-default btn-sm" style="border-color: #46b8da; color: #46b8da;" id="reply_btn" name="replyqn">Post your Reply</button>&nbsp
	<button class="btn btn-sm btn-danger" type="reset">Reset</button>&nbsp

</form>
</div>

	</body>
	</html>