<?php
$con = mysql_connect("127.0.0.1", "root", "") or die("Could not connect to MySQL");
mysql_select_db("path-cert",$con) or die("Could not select db");
?>