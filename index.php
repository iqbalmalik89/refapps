<!DOCTYPE html>
<html>
<head>
	<title>fb app</title>
	<script src="//connect.facebook.net/en_US/all.js"></script>
    <script src="js/jquery-1.10.js" type="text/javascript" ></script>
	<script src="js/config.js"></script>    
</head>
<body>


<div id="fb-root"></div>    
    
<script type="text/javascript" >

$(document).ready(function() {
    
	FB.init({appId: applicationId, status: true, cookie: true, xfbml: true, oauth: true});
(function() {
 var e = document.createElement('script');
 e.src = document.location.protocol + '//connect.facebook.net/en_US/all.js';
 e.async = true;
 document.getElementById('fb-root').appendChild(e);
}());
	
});


// FB LOgin 
function FBlogin() {
	 
	   FB.login(function(response) {
    if (response.status === 'connected') 
	{
      var access_token = FB.getAuthResponse()['accessToken']; /*response.authResponse.access_token;*/
	  FB.api('/me', function(resp) {
		  		  
		  var userId = response.authResponse.userID;
		  if(userId > 0)
	$.get("https://graph.facebook.com/me?access_token="+access_token, function(data)
		{	
			getFriends(access_token,userId);
								
		}, "json");
		  
		  });
    }
	
  }, {scope: 'user_location, read_friendlists'});
 
}

function getFriends(access_token,userId) {
	var user_friends = new Array();
    FB.api('/me/friends', function(response) {
        if(response.data) {
            $.each(response.data,function(index,friend) {
			    user_friends[index] = friend.id;
 				//friends[] = friend.name + ' has id:' + friend.id+'index:'+index;
            }
			);
				console.log(response);
		
        } else {
            alert("Error!");
        }
    });
}

function FBlogout()
{
FB.logout(function(response) {
  // user is now logged out
  alert('u r logged out!');
  window.location = "http://vegatechnologies.net/self/index.php";
});
}


</script>



<div class="topbar">


 
</div>

<div class="section">
    <div id="demo">	
     	Demo App
    </div>
    
    <div id="para">
   		 Facebook login. 
    </div>
</div>

<div class="container" style="width:80px;height:50px;margin-top:30px;font-size:15px;">

</div>

<div id="button" >
	<input type="button" name="btn" class="btn primary large" onClick="FBlogin();" value="Login via Facebook" ></a>
    <a href="#" class="btn primary " onClick="FBlogout();" >Logout</a>
 </div>

<div class="fb-like" data-send="true" data-width="450" data-show-faces="true" style="margin-top:20px;margin-left:160px;" ></div>

<div id="response" >
</div>

</body>
</html>