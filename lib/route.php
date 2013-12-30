<?php

include('config.php');
include('utility.php');
include('user.php');
include('facebook-php-sdk-master/src/facebook.php');

/**
* Handles all the requests
*/

$request_type = $_REQUEST['request_type'];
$predefined_types = array('add_user','check_user','delete_user','get_user_friends','send_invitation');
$resp = array();

// If action exists in our request types, proceed
if(in_array($request_type, $predefined_types))
{
	if($request_type  === 'add_user')
	{
		// Validation
		// insert data
	}
	else if($request_type  === 'send_invitation')
	{
		$config = array(
		      'appId' => $fbapp_key,
		      'secret' => $fbapp_key,
		      'fileUpload' => false, // optional
		      'allowSignedRequest' => false, // optional, but should be set to false for non-canvas apps
		    );
		     
	       $facebook = new Facebook($config);
		   $app_access_token = $fbapp_key . '|' . $fbapp_secret;

		    $message = 'Someone anonymously identified you. Go to '.$web_url.' to confirm if you know this person.';
		 		  $response = $facebook->api('/100000515833657/notifications', 'POST', array(
		  'template' => $message,
		   'href' => 'hello.php',
		  'access_token' => $app_access_token ));    

	}
	else if($request_type  === 'get_user_friends')
	{
		$accesstoken = $_REQUEST['accesstoken'];
		$user_id = $_REQUEST['user_id'];
		$resp = User::getUserFriends($user_id, $accesstoken,$fbapp_key,$fbapp_secret);
	}	
}
else
{
	$resp = array('status'=>'error','msg'=>'Invalid request');
}
echo json_encode($resp)
?>