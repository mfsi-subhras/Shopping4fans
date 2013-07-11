<?php
// Database variables
$host = "localhost"; //database location
$user = "nutricell"; //database username
$pass = "vansteamrottenclams"; //database password
$db_name = "nutricell"; //database name
$link = mysql_connect($host, $user, $pass);
if(!$link){
    die('Could not connect: ' . mysql_error());
}
mysql_select_db($db_name);
?>