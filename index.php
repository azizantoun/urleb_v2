<?php include('config/rs.php'); include('functions.php'); ?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=0" name="viewport">
<script language="javascript" src="<?php echo $path ?>scripts/jquery-1.10.1.min.js"></script>
<link rel="icon" type="image/ico" href="favicon.ico">
<head>
    

    
    
<script>
  (function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
  (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
  m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
  })(window,document,'script','//www.google-analytics.com/analytics.js','ga');
  ga('create', 'UA-46830771-1', 'urleb.me');
  ga('send', 'pageview');
</script>

    
    
    <script>
  // This is called with the results from from FB.getLoginStatus().
  function statusChangeCallback(response) {
    console.log('statusChangeCallback');
    console.log(response);
    // The response object is returned with a status field that lets the
    // app know the current login status of the person.
    // Full docs on the response object can be found in the documentation
    // for FB.getLoginStatus().
    if (response.status === 'connected') {
      // Logged into your app and Facebook.
      testAPI();
    } else if (response.status === 'not_authorized') {
      // The person is logged into Facebook, but not your app.
      document.getElementById('status').innerHTML = 'Please log ' +
        'into this app.';
    } else {
      // The person is not logged into Facebook, so we're not sure if
      // they are logged into this app or not.
      document.getElementById('status').innerHTML = 'Please log ' +
        'into Facebook.';
    }
  }
  function checkLoginState() {
    FB.getLoginStatus(function(response) {
      statusChangeCallback(response);
    });
  }

  window.fbAsyncInit = function() {
  FB.init({
    appId      : '660528030708094',
    cookie     : true,  // enable cookies to allow the server to access 
                        // the session
    xfbml      : true,  // parse social plugins on this page
    version    : 'v2.0' // use version 2.0
  });

  FB.getLoginStatus(function(response) {
    statusChangeCallback(response);
  });

  };

  // Load the SDK asynchronously
  (function(d, s, id) {
    var js, fjs = d.getElementsByTagName(s)[0];
    if (d.getElementById(id)) return;
    js = d.createElement(s); js.id = id;
    js.src = "//connect.facebook.net/en_US/sdk.js";
    fjs.parentNode.insertBefore(js, fjs);
  }(document, 'script', 'facebook-jssdk'));

  // Here we run a very simple test of the Graph API after login is
  // successful.  See statusChangeCallback() for when this call is made.
  function testAPI() {
    console.log('Welcome!  Fetching your information.... ');
    FB.api('/me', function(response) {
      console.log('Successful login for: ' + response.name);
      document.getElementById('status').innerHTML =
        'Thanks for logging in, ' + response.name + '!';
    });
  }
  
  function fb_login(){
    FB.login(function(response) {

        if (response.authResponse) {
            console.log('Welcome!  Fetching your information.... ');
            //console.log(response); // dump complete info
            access_token = response.authResponse.accessToken; //get access token
            user_id = response.authResponse.userID; //get FB UID

            FB.api('/me', function(response) {
                user_email = response.email; //get user email
          // you can store this data into your database             
            });

        } else {
            //user hit cancel button
            console.log('User cancelled login or did not fully authorize.');

        }
    }, {
        scope: 'publish_stream,email'
    });
}

  
  
  
</script>



<?php
$url = mysql_escape_string($_GET['link']);
$search  = "http://urleb.me/".$url;
if(isset($_GET['link'])){
$query = "SELECT * FROM `links` where cancelled = 0 AND short_link = '$search'";	
$result = mysql_query($query) or die(mysql_error());
$row = mysql_fetch_assoc($result);
mysql_num_rows($result);
if(mysql_num_rows($result)>0){
header('Location: '.$row[original_link]);
exit;
}else{
echo "<div class'error' style='position:absolute; width:100%; top:10px; text-align:center; color: #fff; font-size:12px;'>Error... Your url is not valid</div>";
}
	
}?> 
    
<title>URLEB -  Url Shortener </title> 
<meta name="description" content="URL shortening is a technique on the World Wide Web in which a Uniform Resource Locator (URL) may be made substantially shorter in length and still direct to the required page. This is achieved by using an HTTP Redirect on a domain name that is short, which links to the web page that has a long URL."/>     
<meta name="keywords" content="Url shortening - Url - Lebanon - Aziz Antoun - Multimedia Engineer - Web Developer - Lebanese Multimedia Engineer  - Multimedia Engineering in Lebanon - Web Developer in Lebanon - Web Developer - Freelancer">


<!-- for Twitter -->          
<meta name="twitter:card" content="URLEB - Lebanese Url Shortener" />
<meta name="twitter:title" content="URLEB - Lebanese Url Shortener" />
<meta name="twitter:description" content="by Aziz Antoun" />
<meta name="twitter:image" content="http://www.urleb.me/images/fblogo.jpg" />





<meta name="og:url" property="og:url" content="http://www.urleb.me" /> 
        <meta property="og:image" content="http://www.urleb.me/images/fblogo.jpg"/>        
        <meta name="og:title" property="og:title" content="URLEB - Lebanese Url Shortener" /> 
        <meta name="og:description" property="og:description" content="URL shortening is a technique on the World Wide Web in which a Uniform Resource Locator (URL) may be made substantially shorter in length and still direct to the required page. This is achieved by using an HTTP Redirect on a domain name that is short, which links to the web page that has a long URL." /> 
        <meta name="og:site_name" property="og:site_name" content="URLEB.ME" /> 
        <meta name="og:type" property="og:type" content="website" />
        <meta name="fb:admins" property="fb:admins" content="aziz.antoun" />    


<meta http-equiv="content-type" content="text/html;charset=UTF-8"/>
<?php  $path = $_SERVER['HOME']; ?>
<link href="<?php echo $path ?>css/css.css" rel="stylesheet" type="text/css" />
</head>

<body>
    
    

    <div class='menu'>
        <div class="logo_small"><img src="images/logo_small.png" alt="Urleb" width="40"/></div> 
        <ul class='menuInner'>
            
            <li><a href="">Home</a></li>
            <li>|</li>
            <li><a href="">Login with Facebook</a></li>
            <li>|</li>
            <li><a href="http://www.azizantoun.com" target="_blank">Contact</a></li>
        </ul>
        
    </div>

<div class="wrapper">



<div id="status">
</div>
<div class="center">
<img src="images/logo.png" id="logo">
  
<form name="shorten" method="post" id="shortenForm">
        <div class="error">The url can't be empty</div>

        <input type="text" name="original_link" id="long_url" placeholder="PASTE YOUR URL HERE" required="required" />
 <div>
<input class="button" id="shorten" type="submit" value="Quick Shortening!" />

    <fb:login-button style="opacity: 0 !important;" scope="public_profile,email" onlogin="checkLoginState();">
</fb:login-button>

<input class="button" id="login" scope="public_profile,email" onclick="fb_login();" onlogin="checkLoginState();" type="button" value="Login to track your url" src="images/login.png"/></div>

</form>
 
    <div class="result_div">
        
    <div class="copyMessage">
        <span>Congratulations! Your URL was successfully shortened. Press Ctrl+C to Copy</span>
        <input type="text" class="result" readonly />
        <div class="clear"></div>
        <a class="shareItem" id="fb" target="_blank">Share on Facebook</a>
         <a class="shareItem" id="tw" target="_blank">Share on Twitter</a>
    </div>

    
    
    </div>

</div>

    
    <div class="sign"> <a target="_blank" href="http://www.azizantoun.com">by  &copy;  Aziz Antoun</a></div>
</div>

    
    

    
    
    
    
    
<script> 
    
  

$("#shortenForm").submit(function() {
    
    if($('#long_url').val()==''){
    $('.error').stop().animate({'opacity':'1'});
            return false;
    }
    
    $('.error').stop().animate({'opacity':'0'});
    $.ajax({
           type: "POST",
           url: 'query.php',
           data: $("#shortenForm").serialize(), // serializes the form's elements.
           success: function(data)
           {
               $('.result').val(data);
               $('.shareItem#fb').attr('href',"https://www.facebook.com/sharer/sharer.php?u="+data+"");
               $('.shareItem#tw').attr('href',"https://twitter.com/share?url="+data+"");
               $('.copyMessage').fadeIn('fast');
               $('.result').select();
           }
         });

    return false;
});


</script>

</body>
</html>