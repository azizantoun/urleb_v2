<?php include('config/rs.php'); include('functions.php'); ?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<script language="javascript" src="<?php echo $path ?>scripts/jquery-1.10.1.min.js"></script>
<head>
    

    
    
<script>
  (function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
  (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
  m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
  })(window,document,'script','//www.google-analytics.com/analytics.js','ga');

  ga('create', 'UA-46830771-1', 'urleb.me');
  ga('send', 'pageview');

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
include('meta.php');?>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title><?php echo $tags['title'].$meta_og_title;?> </title> 
<meta name="description" content="<?php echo $tags['description'];  ?>"/> 
<?php
echo "<script>window.location='".$row[original_link]."'</script>";
}else{
echo "<div class'error' style='position:absolute; width:100%; top:10px; text-align:center; color: #fff; font-size:12px;'>Error... Your url is not valid</div>";
}
	
}else{?> 
    
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>URLEB -  Url Shortener </title> 
<meta name="description" content="URL shortening is a technique on the World Wide Web in which a Uniform Resource Locator (URL) may be made substantially shorter in length and still direct to the required page. This is achieved by using an HTTP Redirect on a domain name that is short, which links to the web page that has a long URL."/>     
<meta name="keywords" content="Url shortening - Url - Lebanon - Aziz Antoun - Multimedia Engineer - Web Developer - Lebanese Multimedia Engineer  - Multimedia Engineering in Lebanon - Web Developer in Lebanon - Web Developer - Freelancer">

<meta name="og:url" property="og:url" content="http://www.urleb.me" /> 
        <meta property="og:image" content="http://www.urleb.me/images/logo.jpg"/>        
        <meta name="og:title" property="og:title" content="URLEB -  Url Shortener" /> 
        <meta name="og:description" property="og:description" content="URL shortening is a technique on the World Wide Web in which a Uniform Resource Locator (URL) may be made substantially shorter in length and still direct to the required page. This is achieved by using an HTTP Redirect on a domain name that is short, which links to the web page that has a long URL." /> 
        <meta name="og:site_name" property="og:site_name" content="URLEB.ME" /> 
        <meta name="og:type" property="og:type" content="website" />
        <meta name="fb:admins" property="fb:admins" content="aziz.antoun" />    
<?php    

    
}
?>    


<meta http-equiv="content-type" content="text/html;charset=UTF-8"/>
<?php  $path = $_SERVER['HOME']; ?>
<link href="<?php echo $path ?>css/css.css" rel="stylesheet" type="text/css" />
</head>

<body>
<div class="wrapper">

   
    
    
<div class="center">
    <h2>UR<span class="red">L</span>EB<span>.me</span>
        <div> URL SHORTENER</div>
    </h2>
  
<form name="shorten" method="post" id="shortenForm">
    <div class="text">Paste your url here:</div> 
        <div class="error">The url can't be empty</div>

    <input type="text" name="original_link" id="long_url" />
   <input class="button"  type="submit" value="SHORTEN!" />
</form>
 
    <div class="result_div">
    <div class="copyMessage">Press Ctrl+C to Copy</div>
<input type="text" class="result" disabled/>
    </div>


</div>

    
    <div class="sign"> <a target="_blank" href="http://www.azizantoun.com">by &copy; Aziz Antoun</a></div>
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
               $('.result').select();
               $('.copyMessage').fadeIn('fast');
           }
         });

    return false;
});


</script>

</body>
</html>