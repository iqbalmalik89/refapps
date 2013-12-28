

<html>
<body>
<div id="fb-root"></div>
<script type="text/javascript" src="js/config.js"></script>
<script type="text/javascript" src="js/jquery-1.10.js"></script>
<script>
  window.fbAsyncInit = function() {
    FB.init({
      appId      : applicationId, // Set YOUR APP ID
      //channelUrl : 'http://hayageek.com/examples/oauth/facebook/oauth-javascript/channel.html', // Channel File
      status     : true, // check login status
      cookie     : true, // enable cookies to allow the server to access the session
      xfbml      : true  // parse XFBML
    });
 
     
    };
 
    function Login()
    {
 
        FB.login(function(response) {
           if (response.authResponse)
           {
                getUserInfo();
            } else
            {
             console.log('User cancelled login or did not fully authorize.');
            }
         },{scope: 'email,user_photos,user_videos'});
 
    }
 
  function getUserInfo() {

        FB.api('/me/friends', function(response) {
 			//console.log(response.data);
 			friends = response.data;
 			var friendList = "";
     $.each(response.data,function(index,friend)
						{
						   //console.log(friend.name + ' has id:' + friend.id);
						   friendName	=	friend.name.split(" ");
						   userImg	=	"http://graph.facebook.com/"+friend.id+"/picture?width=50&height=50";
						   
						   friendList	+=	'<h5>'+friend.id+ '</h5>'+friendName[0]+' <span>'+friendName[1]+'</span></h5>';   
						   
						   
					   });
          
          //str +="<input type='button' value='Logout' onclick='Logout();'/>";
          $("#status").append(friendList);
 
    });
    }
    function getPhoto()
    {
      FB.api('/me/picture?type=normal', function(response) {
 
          var str="<br/><b>Pic</b> : <img src='"+response.data.url+"'/>";
          document.getElementById("status").innerHTML+=str;
 
    });
 
    }
    function Logout()
    {
        FB.logout(function(){document.location.reload();});
    }
 
  // Load the SDK asynchronously
  (function(d){
     var js, id = 'facebook-jssdk', ref = d.getElementsByTagName('script')[0];
     if (d.getElementById(id)) {return;}
     js = d.createElement('script'); js.id = id; js.async = true;
     js.src = "//connect.facebook.net/en_US/all.js";
     ref.parentNode.insertBefore(js, ref);
   }(document));
 
</script>
<div align="center">
<h2>Facebook OAuth Javascript Demo</h2>
 
<div id="status">

<input type="button" value="login" onclick="Login()"/>
</div>
 
<br/><br/><br/><br/><br/>
 
<div id="message">
</div>
 
</div>
</body>
</html>
