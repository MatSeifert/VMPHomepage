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

// Starten der Facebook Session 
session_start();

// App mit ID und Secret initialisieren  //App-ID		   // App-Secret
FacebookSession::setDefaultApplication( '351141688344396','73d9cbc141d02aebeb5d3e6d544e43d5' );

// Login-Helper mit Rediret URI
$helper = new FacebookRedirectLoginHelper( 'http://www.vmp-clan.de' );

// Prüfen, ob bereits eine Facebook Session besteht
if ( isset( $_SESSION ) && isset( $_SESSION['fb_token'] ) ) {
	// falls nicht, wird mit den Token eine neue Session gestartet
	$session = new FacebookSession( $_SESSION['fb_token'] );

	// Access Token validieren
	try {
		if ( !$session->validate() ) {
		  $session = null;
		}
	} 
	catch ( Exception $e ) {
		// Exceptions fangen
		$session = null;
	}
}  

if ( !isset( $session ) || $session === null ) {
// no session exists

	try {
		$session = $helper->getSessionFromRedirect();
	} catch( FacebookRequestException $ex ) {
		// When Facebook returns an error
		// handle this better in production code
		print_r( $ex );
	} catch( Exception $ex ) {
		// When validation fails or other local issues
		// handle this better in production code
		print_r( $ex );
	}

}

// see if we have a session
if ( isset( $session ) ) {

	// save the session
	$_SESSION['fb_token'] = $session->getToken();
	// create a session using saved token or the new one we generated at login
	$session = new FacebookSession( $session->getToken() );

	// graph api request for user data
	$request = new FacebookRequest( $session, 'GET', '/me' );
	$response = $request->execute();
	// get response
	$graphObject = $response->getGraphObject()->asArray();

	// print profile data
	echo '<pre>' . print_r( $graphObject, 1 ) . '</pre>';

	// print logout url using session and redirect_uri (logout.php page should destroy the session)
	echo '<a href="' . $helper->getLogoutUrl( $session, 'http://yourwebsite.com/app/logout.php' ) . '">Logout</a>';

} else {
	// show login url
	echo '<a href="' . $helper->getLoginUrl( array( 'email', 'user_friends' ) ) . '">Login</a>';
}






/*
function getPageData()
{
    $arRS = $this->facebook->api('/me/accounts');

    $pageData = new CFacebookClientPageData();
    foreach ($arRS['data'] as $dataSet)
    {
        if (array_key_exists('name', $dataSet) && preg_match('/any\s*fan\s*page/i', $dataSet['name']))
        {
            $pageData->sCategory = $dataSet['category'];
            $pageData->sName = $dataSet['name'];
            $pageData->sAccessToken = $dataSet['access_token'];
            $pageData->arPermissions = $dataSet['perms'];
            $pageData->iPageId = $dataSet['id'];
        }
    }

    return $pageData;
}

function uploadPhoto(CFacebookClientPageData $user, CFacebookPhotoData $photo)
{
    return $this->facebook->api('/' . $user->iPageId . '/photos',
                                'POST',
                                array(
                                      'source' => '@' . realpath($photo->sLocalPath),
                                      'message' => $photo->sMessage,
                                      'access_token' => $this->sAccessToken
                                      )
                                );
}    */