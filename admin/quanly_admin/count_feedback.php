<?php
include_once '../../PRJ_Library/connect_DB.php';
$count = 0;
$sql7 = "SELECT * FROM feed_back WHERE con_rep IS NULL";
$result7 = mysqli_query($link, $sql7);
$rowcount = mysqli_num_rows($result7);
echo $rowcount;
?>