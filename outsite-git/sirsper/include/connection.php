<?php
$dbhost='localhost';
$dbuser='root';
$dbpassword='';
$dbname='knidcore_mandiri';
$koneksi=mysql_connect($dbhost,$dbuser,$dbpassword) or die(mysql_error());
$dbselect=mysql_select_db($dbname);
?>
