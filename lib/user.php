<?php

/**
* User Class
* Contains the all methods related with users
*/

class User
{
	/**
	* Check user if user exist in database
	* @param int user facebook id 
	* @param string user facebook name
	* @param string user facebook email (optional)
	* @param datetime Time when user joined the app.
	* return error if user already exist
	* insert data if user doesn't exists
	*/

	public function addUser($id, $name, $email, $date_joined)
	{
		
	}


	/**
	* Check user exists in data base
	* @param int $user_id
	* return true false if user exists, return true if user doesn't exist
	*/

	public static function getUserFriends($user_id, $access_token,$fbapp_key,$fbapp_secret)
	{
		  $config = array(
		    'appId' => $fbapp_key,
		    'secret' => $fbapp_secret,
		    'allowSignedRequest' => false // optional but should be set to false for non-canvas apps
		  );

		  $facebook = new Facebook($config);
		  //var_dump($facebook);
		  $user_id = $facebook->getUser();


	    if($user_id) {

	      // We have a user ID, so probably a logged in user.
	      // If not, we'll get an exception, which we handle below.
	      try {

	        $user_friends = $facebook->api('/me/friends','GET');
	        $resp = array('status'=>'succes','data'=>$user_friends['data']);

	      } catch(FacebookApiException $e) {

	    	$resp = array('status'=>'error','msg'=>'There is some problem');

	      }   
	    } 
	    else 
	    {
	    	$resp = array('status'=>'error','msg'=>'There is some problem');
	    }

	    return $resp;
	}
}
?>