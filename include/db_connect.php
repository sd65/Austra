<?php

include "config/db_info.php";

//$bdd = new PDO("mysql:host=". $db_host . ";dbname=". $db_name . ";charset=utf8", $db_username, $db_password);


$db = mysql_connect($db_host, $db_username , $db_password); 

mysql_select_db($db_name,$db);