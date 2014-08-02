<?php
// require codebird
require_once('/socialSDK/twitter/src/codebird.php');
 
// get current time - configure appropriately, depending to how you store dates in your database
$now =  date("YmdHis");
 
// initialize
//$share_topics = array();
 
// initialize Codebird (using your access tokens) - establish connection with Twitter
\Codebird\Codebird::setConsumerKey("zAMCKSyNQ3NTq8YuGaXiJneWn", "It9Nc2zGuWtuFztBzcXOzsWgk68KLFmRRRhydmpTq9PCdL5xwG");
$cb = \Codebird\Codebird::getInstance();
$cb->setToken("244468649-ZGCSmULXQPiDlc92Fy2IPjAMPMloiROuPNpnFV0n", "bQbB1BucBt5KZlc9ySIzZHF1pVdh2WmguUdFuIE5XerRf");
 
// AUTOMATIC TWEET EACH TOPIC

$params = array(
  'status' => 'Test Tweet 2'
);
$reply = $cb->statuses_update($params);
?>