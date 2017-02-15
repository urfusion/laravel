<?php

$db_host = "host_name";
$db_user = "user_name";
$db_pass = "user_password";
$db_name = "user_table";

$db_connect = mysql_connect($db_host, $db_user, $db_pass) or die ("Could not connect to MySQL");
$db_select = mysql_select_db($db_name) or die ("Could not connect to database");
?>
