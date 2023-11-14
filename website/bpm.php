<?php

include "db.php";

$SQLQ= "SELECT * FROM `IOT_Scores` ORDER BY `IOT_Scores`.`id` DESC;";
$result = $conn->query($SQLQ);
$row = $result->fetch_assoc();
$bpm = $row["lastBPM"];
$highestbpm = $row["peakBPM"];

echo $bpm." BPM";

if ($highestbpm<$bpm){
    $highestbpm = $bpm;
    $SQLS= "UPDATE `IOT_Scores` SET `peakBPM`= ".$highestbpm." WHERE id=(SELECT MAX(id) FROM `IOT_Scores`);";
    $sent = $conn->query($SQLS);
}elseif ($highestbpm>$bpm){
echo "<script> console.log(".$highestbpm.")</script>";
}