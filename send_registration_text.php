<?php
//Sending Messages using sender id/short code
require_once('AfricasTalkingGateway.php');
$username   = "smspSckhools";
$apikey     = "df82b7cjb53491d4b49e27bcd32e2eedd08282e2cc4375e968a2247f997e5480a";
$recipients = "+254710259538";
$message    = "Hey this my first africas talking text. i like it";
// Specify your AfricasTalking shortCode or sender id
$from = "Sheng";
$gateway    = new AfricasTalkingGateway($username, $apikey);
try 
{
   
   $results = $gateway->sendMessage($recipients, $message, $from);
            
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