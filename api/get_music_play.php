<?php
require('../dbconnect.php');
$id_music = $_GET['music_id'];
$ip_address = $_GET['ip_address'];
$action = $_GET['action'];
mysql_query("INSERT INTO logs_listen(id_music,ip,action) VALUES('$id_music','$ip_address','$action')");
 ?>

