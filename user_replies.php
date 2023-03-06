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
$question_id=$_GET['question_id'];
$sql="SELECT * FROM replies WHERE question_id='$question_id'";
$query=mysqli_query($connect,$sql);
$num_replies=mysqli_num_rows($query);


//get the asked question
	$sql6="SELECT * FROM questions WHERE question_id='$question_id'";
	$query6=mysqli_query($connect,$sql6);
	$row6=mysqli_fetch_assoc($query6);

$asker_id=$row6["sender_id"];
//get who asked that question
$sql2="SELECT *FROM users WHERE user_id='$asker_id'";
$query2=mysqli_query($connect,$sql2);
$row2=mysqli_fetch_assoc($query2);





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
      <a class="navbar-brand" href="#"><b><img src="images/logo.png" id="logo" width="30px" height="30px">&nbspZalego Quick Fix</b></a>
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

<div class="well w3-white w3-content" style="max-width: 900px;">

	<span style="color:#4da6ff;"><b><img src="<?php echo $row2["profile_image"]; ?>" width="30px" height="30px" class="img-circle w3-card-4" style="margin-top: -8px;">&nbsp<?php echo $row2["username"];?>&nbsp&nbsp<i class="fa fa-clock">&nbsp<?php echo $row6["timee"];?></i>&nbsp<i class="fa fa-calendar-alt">&nbsp<?php echo $row6["datee"];?></i> </b><br><br>&nbspAsked this: <span style="color: #e67300;"><?php echo $row6["question"];?></span></span><br>
	<br>
	<a href="dashboard.php" style="float: right; margin-top: -95px;">
	<button class="btn btn-sm btn-info"><i class="fa fa-home"></i></button>
	</a>
	<h6 class="text-info"><b>Replies</b></h6>
	<?php
	if($num_replies>0){
		while($row=mysqli_fetch_assoc($query)){
			//get the name of the replier
			$replier_id=$row["replier_id"];
			$sql4="SELECT *FROM users WHERE user_id='$replier_id'";
			$query4=mysqli_query($connect,$sql4);
			$row4=mysqli_fetch_assoc($query4);
			?>

			<div class="well">
				<span style="color: #7f8ea2;">
					<span><img src="<?php echo $row4["profile_image"]; ?>" width="30px" height="30px" class="img-circle w3-card-4" style="margin-top: -8px;">&nbspReplied by&nbsp<?php echo $row4["username"];?>&nbsp
					<i class="fa fa-clock">&nbsp<?php echo $row["timee"];?></i>&nbsp
					<i class="fa fa-calendar-alt">&nbsp<?php echo $row["datee"];?></i></span><br><br>
					<span><?php echo $row["reply"];?></span>

				</span>
			</div>

			<?php
		}
	}else{
		?>
		<div class="alert alert-info">
			This question has not been replied to yet
		</div>
		<?php
	}
	?>
<a href="reply.php?question_id=<?php echo $question_id; ?>&sender_id=<?php echo $asker_id; ?>"><button class="btn btn-default btn-sm" style="border-color: #46b8da; color: #46b8da;"><i class="fa fa-pencil-alt"></i>&nbspPost an answer</button></a>
</div>

	</body>
	</html>