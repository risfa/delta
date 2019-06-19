<?php
require('../dbconnect.php');
$post_id = $_GET['post_id'];
//echo $_GET['post_id'];

mysql_query("UPDATE news SET post_hits = post_hits + 1 WHERE ID = '$post_id' ");
 ?>

