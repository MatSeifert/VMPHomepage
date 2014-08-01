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
// FacebookSession::setDefaultApplication('351141688344396','73d9cbc141d02aebeb5d3e6d544e43d5');
 
define('FACEBOOK_APP_ID', '351141688344396'); #APPLICATION ID
define('FACEBOOK_SECRET', '73d9cbc141d02aebeb5d3e6d544e43d5'); #API-KEY

$params['message'] = 'This is a test';
		$params['access_token']=$cookie['access_token'];
		$url = 'https://graph.facebook.com/XXXXXXXXXXXXX/feed'; #XXXXXXXX = ID der Fanpage
		//print_r(makeRequest($url, $params));
	//	print_r(json_decode(file_get_contents($url)));
		print_r(makeRequest($url, $params));

function makeRequest($url, $params, $ch=null) {
if (!$ch) {
$ch = curl_init();
curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, FALSE);
curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, 2);
}

function get_facebook_cookie($app_id, $application_secret) {
	$args = array();
	parse_str(trim($_COOKIE['fbs_' . $app_id], '\"'), $args);
	ksort($args);
	$payload = '';
	foreach ($args as $key => $value) {
		if ($key != 'sig') {
			$payload .= $key . '=' . $value;
		}
	}
	if (md5($payload . $application_secret) != $args['sig']) {
		return null;
	}
	return $args;
}

$cookie = get_facebook_cookie(FACEBOOK_APP_ID, FACEBOOK_SECRET);
?>
<html><head></head><body>
<?php if ($cookie) { ?>
      Your user ID is <?= $cookie['uid'] ?>
    <?php } else { ?>
      <fb:login-button perms="publish_stream"></fb:login-button>
    <?php } ?>

    <div id="fb-root"></div>
<script>
//XXX = Facebook App - ID
  window.fbAsyncInit = function() {
    FB.init({
      appId  : 'XXXXXXXXXXXXXXXX', 
      status : true, // check login status
      cookie : true, // enable cookies to allow the server to access the session
      xfbml  : true  // parse XFBML
    });
  };

  (function() {
    var e = document.createElement('script');
    e.src = document.location.protocol + '//connect.facebook.net/en_US/all.js';
    e.async = true;
    document.getElementById('fb-root').appendChild(e);
  }());
</script>
</body>
</html>