<?php
$con = mysql_connect("localhost:3306", "upesc9pa_cert", "Nevertry") or die("Could not connect to MySQL");
mysql_select_db("upesc9pa_certification",$con) or die("Could not select db");
?>