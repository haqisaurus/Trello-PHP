<?php

session_start();


require_once('lib/trello.class.php');


$consumer_key = "####";
$consumer_secret = "####";


$callback_url = "#######";


$tum_oauth = new Trello($consumer_key, $consumer_secret);


$request_token = $tum_oauth->getRequestToken($callback_url);


$_SESSION['request_token'] = $token = $request_token['oauth_token'];
$_SESSION['request_token_secret'] = $request_token['oauth_token_secret'];


switch ($tum_oauth->http_code) {
  case 200:
      
    $url = $tum_oauth->getAuthorizeURL($token);
    
    
    header('Location: ' . $url);

	
    break;
default:

    echo 'Could not connect to Tumblr. Refresh the page or try again later.';
}
exit();

?>