function sendInvitation()
{

	$.ajax({
	  type: 'POST',
	  url: API_URL,
	  dataType:"json",
	  data: $("#form").serialize(),
	  beforeSend:function(){

	  },
	  success:function(data){

	  },
	  error:function(){

	  }
	});	


}


    function Login()
    {
 
        FB.login(function(response) {
           if (response.authResponse)
           {
            var access_token = FB.getAuthResponse()['accessToken'];
            var userId = response.authResponse.userID;

      if(userId > 0)
      $.get("https://graph.facebook.com/me?access_token="+access_token, function(data)
      { 
      		getFriends(userId, access_token);
                
      }, "json");
                
            } else
            {
             console.log('User cancelled login or did not fully authorize.');
            }
         },{scope: 'read_friendlists'});
 
    }

    function getFriends(user_id,access_token)
    {
    	var friend_html = '';
		$.ajax({
		  type: 'POST',
		  url: API_URL,
		  dataType:"json",
	      data: { 'request_type':'get_user_friends',accesstoken: access_token , 'user_id': user_id  },
		  beforeSend:function(){

		  },
		  success:function(data){

		  	if(data.data.status == 'success')
		  	{
		  		var friend_count = data.data.length;
		  		for(var i=0;i<friend_count;i++)
		  		{
		  			console.log(data.data[i]);
			  		friend_html += '';		  			
		  		}

		  	}

		  },
		  error:function(){

		  }
		});	


    }