<?php include('config/rs.php'); include('functions.php'); 
if(isset($_POST['original_link'])){
$original_link = mysql_escape_string($_POST['original_link']);
$short_link = 'http://urleb.me/'.generateRandomString();
$ip = $_SERVER[SERVER_ADDR];
$date = date("Y-m-d H:i:s", time());  




$query_check = "SELECT * FROM links WHERE original_link ='$original_link'";
$result_check = mysql_query($query_check) or die(mysql_error());
if(mysql_num_rows($result_check)>0){
$row_check = mysql_fetch_assoc($result_check);
$short_link = $row_check['short_link'];	
echo $short_link;
}
 
else{
$query = "SELECT * FROM links WHERE short_link='$short_link' AND cancelled = 0";
$result = mysql_query($query) or die(mysql_error());
$total = mysql_num_rows($result);

if($total>0){
$short_link = 'http://urleb.me/'.generateRandomString();
}
else{
$insert = "INSERT INTO `links` VALUES('','$original_link','$short_link','$ip','$date','0')";

if(mysql_query($insert)){
	
echo $short_link;
}else{
die(mysql_error());
}
	

}

}
}else{
exit();
}
?>