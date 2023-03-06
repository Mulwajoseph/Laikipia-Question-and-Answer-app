<?php
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
$replier_id=$row["user_id"];

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
	<script type="text/javascript" src="js/send_qn.js"></script>
	

	<style type="text/css">
	body, html{
		overflow-x: hidden;
	} 
		#profile-panel{
			background-image: url(images/9.jpg);
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


	<script type="text/javascript">
		function show(){
			$("#form").fadeIn(1500);
		}

		function hide(){
			$("#form").fadeOut(1500);
		}
	</script>
	
			
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
         <li><a href="#" data-toggle="modal" data-target="#registerModal"><img src="<?php echo $row["profile_image"]; ?>" width="30px" height="30px" class="img-circle w3-card-4" style="margin-top: -8px;">&nbspLogged in as: <?php echo $row["username"];?></a></li>
         <li><a href="logout.php">Logout</a></li>
               
      </ul>
    </div>
  </div>
</nav>
<br><br><br><br>

<div class="w3-content" style="max-width: 1100px;">

	<div class="row w3-row-padding">

		<div class="col-sm-5">
			<center>
			<div id="profile-panel" class="w3-card-8" style="background-image: url('<?php echo "$row[profile_image]"; ?>');">
				<div id="profile-layer">
					<center>
						<img src="<?php echo $row['profile_image'];?>" class="img-circle w3-card-4" width="105px" height="105px" alt="profile-icon" style="margin-top: 30px;">
					</center><br><br>
					<div id="info-wrapper">
					<div class="table-responsive" style="border-color: transparent !important";>
						<table class="table" id="profile-table">
							<tr>
								<td>Names</td>
								<td><?php echo $row["firstname"]." ".$row["surname"]; ?></td>
							</tr>
							<tr>
								<td>Email</td>
								<td><?php echo $row["email"]; ?></td>
							</tr>
							<tr>
								<td>Contacts</td>
								<td><?php echo $row["contact"];?></td>
							</tr>
							<tr>
								<td>Gender</td>
								<td><?php echo $row["gender"];?></td>
							</tr>
						</table>
					</div>

					<center>
					<span style="font-size: 20px;"><i><?php echo $row['status'];?></i></span><br>
				</center>
					<center>
					<button class="btn btn-info btn-md" onclick="show()">Edit your info</button>
				</center>
				</div>
				<br>
				<form class="well w3-white" method="POST" enctype="multipart/form-data" style="display: none;" id="form" action="update_profile.php">
					<span onclick="hide()" class="text-danger" style="cursor: pointer;">&times Close</span>
					<div class="form-group">
					<input class="w3-input w3-animate-input" type="text" placeholder="Your status" name="status" style="width: 50%;">
					</div>

					<div class="form-group">
						<label>Pick a photo:</label>
						<input type="file" name="profile">
					</div>	
						<button class="btn btn-sm btn-info" name="submit" type="submit">Update</button>			
				</form>

				</div>
			</div>
		</center>
		</div>

		<div class="col-sm-7" style="padding-top: 20px;">
			<div class="well">
				<span class="text-primary">Hello <?php echo $row["username"];?>!! Any question today?</span><br><br>
				<form id="question_form">
					<input type="hidden" name="user_id" id="user_id" value="<?php echo $row["user_id"];?>">
					<input type="hidden" name="name_id" id="name_id" value="<?php echo $row["username"];?>">
					<div class="alert alert-danger" id="empty_error" style="display: none;">
						Hello <?php echo $row["username"];?>, what is your question?, you haven't asked anything!
					</div>
				<textarea class="form-control" id="question" name="question"></textarea><br>
				<button type="submit" class="btn btn-default btn-sm" style="border-color: #39ac73; color:#39ac73;" id="submit_qn">Ask<i>!!</i></button><button type="submit" class="btn btn-sm btn-success" id="loader" style="display: none;"><img src="images/loader.gif" width="20px" height="20px" style="margin-top: -10px;" ></button>&nbsp<button type="reset" class="btn btn-sm btn-danger">Reset</button>
				
			</form>

			<br><br>
			
			<span id="questions_module">
				<center>
				<img src="images/loader2.gif" width="40px" height="40px" style="margin-top: -10px;" >
			</center>
			</span>

			</div>
		</div>

	</div>

</div>
	</body>
	</html>