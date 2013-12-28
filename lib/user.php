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

	public function checkUser($user_id)
	{


	}
}
?>