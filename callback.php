<?php
       session_start();
       require_once('lib/trello.class.php');
       
       $consumer_key = "####";
       $consumer_secret = "####";
    
       $tum_oauth = new Trello($consumer_key, $consumer_secret,$_SESSION['request_token'],$_SESSION['request_token_secret']);
       $access_token = $tum_oauth->getAccessToken($_REQUEST['oauth_verifier']);  
     
      $parameters = array();
      $parameters['key'] = "###";
      $parameters['token'] =$access_token['oauth_token'];
      $url ='https://trello.com/1/members/my/boards?';
      $userinfo = $tum_oauth->get($url,$parameters);
       print_r($userinfo);