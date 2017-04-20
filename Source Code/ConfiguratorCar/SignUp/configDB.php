<?php

$hostname = "93.125.105.134";
$username = "root";
$password = "root123654";
$dbname = "loginCC";

$connection = mysql_connect($hostname, $username, $password);

/* Connect to MySQL */
$connection = mysql_connect($hostname, $username, $password) or die ('Unable to connect to MySQL server.<br><br>Please make sure your MySQL login details are correct.');
$db = mysql_select_db($dbname, $connection) or die ('request "Unable to select database."');

?>