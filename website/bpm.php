<?php
include "db.php";

$SQLQ= "SELECT * FROM `IOT_Scores` ORDER BY `IOT_Scores`.`id` DESC;";
$result = $conn->query($SQLQ);
$row = $result->fetch_assoc();
$bpm  = $row["lastBPM"];

echo $bpm." BPM";