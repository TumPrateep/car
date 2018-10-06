var bFbStatus = false;
var fbID = "";
var fbName = "";
var fbEmail = "";

(function(d, s, id) {
    var js, fjs = d.getElementsByTagName(s)[0];
    if (d.getElementById(id)) return;
    js = d.createElement(s); js.id = id;
    js.src = 'https://connect.facebook.net/th_TH/sdk.js#xfbml=1&version=v3.1&appId=699132327152708&autoLogAppEvents=1';
    fjs.parentNode.insertBefore(js, fjs);
  }(document, 'script', 'facebook-jssdk'));