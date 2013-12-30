var server		= window.location.hostname;
if (server=='localhost')
{
	canvas_url       = location.protocol+"//localhost/refapps/";
	var applicationId     = "510521435721725";
}
else if (server=='vegatechnologies.net')
{
	canvas_url       = location.protocol+"//vegatechnologies.net/refapps/";
	var applicationId     = "569437429805231";
}

var canvasPage = "http://apps.facebook.com/raags/";

var cUrl 		= window.location;
var sPath 		= window.location.pathname;
var sPage 		= sPath.substring(sPath.lastIndexOf('/') + 1);   //if(sPage == 'index.php')

var API_URL = canvas_url+'lib/route.php';
