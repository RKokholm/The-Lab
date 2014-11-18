<?php
include_once('core/database.php');


$query = mysql_query("SELECT * FROM users WHERE username='$username' and password='$password'");
$numrows = mysql_num_rows($query);