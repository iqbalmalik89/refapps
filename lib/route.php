<?php

include('config.php');
include('user.php');
include('route.php');

/**
* Handles all the requests
*/

$request_type = $_REQUEST['request_type'];
$predefined_types = array('add_user','check_user','delete_user','get_user_friends');
$resp = array();

// If action exists in our request types, proceed
if(in_array($request_type, $predefined_types))
{
	if($request_type  === 'add_user')
	{
		// Validation
		// insert data
	}
}
else
{
	$resp = array('status'=>'error','msg'=>'Invalid request');
}
echo json_encode($resp)
?>