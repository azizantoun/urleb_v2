<?php
# FileName="Connection_php_mysql.htm"
# Type="MYSQL"
# HTTP="true"
$hostname_rs = "localhost";
$database_rs = "azizanto_urleb";
$username_rs = "azizanto_urleb";
$password_rs = "urleb123!@#";
$rs = mysql_pconnect($hostname_rs, $username_rs, $password_rs) or trigger_error(mysql_error(),E_USER_ERROR); 

$db_selected = mysql_select_db('azizanto_urleb', $rs);
if (!$db_selected) {
    die ('Can\'t use db : ' . mysql_error());
}
?>