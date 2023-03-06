<?php
session_start();//this function starts a session
//include database connection
include("db_connect.php");
if(isset($_POST["submit"]))//checks if form has been submitted
{
//if submitted proceed
	//getting the form inputs
	$firstname=mysqli_real_escape_string($connect,$_POST["firstname"]);
	$middlename=mysqli_real_escape_string($connect,$_POST["middlename"]);

	$surname=mysqli_real_escape_string($connect,$_POST["surname"]);
	$email=mysqli_real_escape_string($connect,$_POST["email"]);
	$contact=mysqli_real_escape_string($connect,$_POST["contact"]);
	$username=mysqli_real_escape_string($connect,$_POST["username"]);
	$password=mysqli_real_escape_string($connect,$_POST["password"]);
	$gender=mysqli_real_escape_string($connect,$_POST["gender"]);
	$confirm_password=mysqli_real_escape_string($connect,$_POST["confirm_password"]);
	$text_no='+254'.$contact;

	//check if a user with similar email exists
	$sql="SELECT * FROM users WHERE email='$email'";
	$select=mysqli_query($connect,$sql);
	$count=mysqli_num_rows($select);
	if($count>0){
		echo '<script>alert("Looks like we have a user with a similar email");history.back();</script>';
	}else{
		//proceed
		if($password!=$confirm_password){
			echo '<script>alert("Your passwords do not match");history.back();</script>';
		}else{
			//proceed
			$hashed_password=hash("MD5",$password);//encrypts password
			$sql2="INSERT INTO users(firstname,middlename,surname,email,username,password,gender,contact,profile_image,status) VALUES('$firstname','$middlename','$surname','$email','$username','$hashed_password','$gender','$contact','profile_pic_dir/no-image.gif','I Focus on success only')";
			$insert=mysqli_query($connect,$sql2);
			if($insert){
				//assign email address to that session
				$_SESSION["active_user"]=$email;
				$active_user=$_SESSION["active_user"];


				echo '<script>alert("Registered successfully");
				window.location.assign("dashboard.php");</script>';

								//Sending Messages using sender id/short code
				require_once('AfricasTalkingGateway.php');
				$username   = "steveforum";
				$apikey     = "32c26f5246175f83b06ea4f9e65f89dc864e80de83bdee9618911c0e2908ffd6";
				$recipients = $text_no;
				$message    = "Hello ".$firstname." Thank you for registering with Zalego Quick Fix. Your Login details are: email is ".$email." and your password is ".$password.". It's recommended you keep your password secret";
				// Specify your AfricasTalking shortCode or sender id
				
				$gateway    = new AfricasTalkingGateway($username, $apikey);
				try 
				{
				   
				   $results = $gateway->sendMessage($recipients, $message);
				       /*     
				  foreach($results as $result) {
				    echo " Number: " .$result->number;
				    echo " Status: " .$result->status;
				    echo " StatusCode: " .$result->statusCode;
				    echo " MessageId: " .$result->messageId;
				    echo " Cost: "   .$result->cost."\n";
				  }*/
				}
				catch ( AfricasTalkingGatewayException $e )
				{
				  echo "Encountered an error while sending: ".$e->getMessage();
				}
				// DONE!!! 
				//paybill 525900
				//df82b7cb53491d4b49e27bcd32e2eedd08282e2cc4375e968a2247f997e5480a



			}else{
				echo '<script>alert("Unable to register");history.back();</script>';
			}
		}
	}
}
else{
	echo '<script>alert("Form has not been submiteed");</script>';
}
?>