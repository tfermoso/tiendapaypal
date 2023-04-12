<?php 
//print_r($_GET);
include("global/config.php");
$Login=curl_init("https://api-m.sandbox.paypal.com/v1/oauth2/token");
curl_setopt($Login,CURLOPT_RETURNTRANSFER,true);
curl_setopt($Login,CURLOPT_USERPWD,CLIENTIDPAYPAL.":".SECRETPAYPAL);
curl_setopt($Login,CURLOPT_POSTFIELDS,"grant_type=client_credentials");

$result=json_decode(curl_exec($Login));
print_r($result->access_token);
?>