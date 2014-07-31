<?php 
session_start();
require_once( 'socialSDK/facebook/src/Facebook/FacebookSession.php' );
require_once( 'socialSDK/facebook/src/Facebook/FacebookRedirectLoginHelper.php' );
require_once( 'socialSDK/facebook/src/Facebook/FacebookRequest.php' );
require_once( 'socialSDK/facebook/src/Facebook/FacebookResponse.php' );
require_once( 'socialSDK/facebook/src/Facebook/FacebookSDKException.php' );
require_once( 'socialSDK/facebook/src/Facebook/FacebookRequestException.php' );
require_once( 'socialSDK/facebook/src/Facebook/FacebookOtherException.php' );
require_once( 'socialSDK/facebook/src/Facebook/FacebookAuthorizationException.php' );
require_once( 'socialSDK/facebook/src/Facebook/GraphObject.php' );
require_once( 'socialSDK/facebook/src/Facebook/GraphSessionInfo.php' );
require_once( 'socialSDK/facebook/src/Facebook/FacebookServerException.php' );

use Facebook\FacebookSession;
use Facebook\FacebookRedirectLoginHelper;
use Facebook\FacebookRequest;
use Facebook\FacebookResponse;
use Facebook\FacebookSDKException;
use Facebook\FacebookRequestException;
use Facebook\FacebookAuthorizationException;
use Facebook\GraphObject;
use Facebook\GraphSessionInfo;
 
// init app with app id (APPID) and secret (SECRET)
FacebookSession::setDefaultApplication('351141688344396','73d9cbc141d02aebeb5d3e6d544e43d5');
 
// login helper with redirect_uri
$helper = new FacebookRedirectLoginHelper( 'http://www.vmp-clan.de/' );
 
try {
  $session = $helper->getSessionFromRedirect();
} catch( FacebookRequestException $ex ) {
  // When Facebook returns an error
} catch( Exception $ex ) {
  // When validation fails or other local issues
}
 
// see if we have a session
if($session) {

  try {

    $response = (new FacebookRequest(
      $session, 'POST', '/me/feed', array(
        'link' => 'www.example.com ',
        'message' => 'User provided message'
      )
    ))->execute()->getGraphObject();

    echo "Posted with id: " . $response->getProperty('id');

  } catch(FacebookRequestException $e) {

    echo "Exception occured, code: " . $e->getCode();
    echo " with message: " . $e->getMessage();

  }   

}
?>