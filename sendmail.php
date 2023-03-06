<?php
require_once('AfricasTalkingGateway.php');
				$username   = "sandbox";
				$apikey     = "aa6f6ae799c019e14ff8e92ef6fea4735271042b7b9bd1d15d174825eb92792f";
				$recipients = '+254704372166';
				$message    = "Hello  Thank you for registering with zalego quick fix it. Your Login details are: email isand your password is ";
				// Specify your AfricasTalking shortCode or sender id
				
				$gateway    = new AfricasTalkingGateway($username, $apikey);
				try 
				{
				   
				   $results = $gateway->sendMessage($recipients, $message);
				            
				  foreach($results as $result) {
				    echo " Number: " .$result->number;
				    echo " Status: " .$result->status;
				    echo " StatusCode: " .$result->statusCode;
				    echo " MessageId: " .$result->messageId;
				    echo " Cost: "   .$result->cost."\n";
				  }
				}
				catch ( AfricasTalkingGatewayException $e )
				{
				  echo "Encountered an error while sending: ".$e->getMessage();
				}
				// DONE!!! 
				//paybill 525900
				//df82b7cb53491d4b49e27bcd32e2eedd08282e2cc4375e968a2247f997e5480a


?>