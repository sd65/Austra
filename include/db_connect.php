<?php

include "config/db_info.php";

$bdd = new PDO("mysql:host=". $db_host . ";dbname=". $db_name . ";charset=utf8", $db_username, $db_password);
