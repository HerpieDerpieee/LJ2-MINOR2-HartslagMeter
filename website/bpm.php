<?php
include "db.php";

$SQLQ= "SELECT lastBPM, peakBPM FROM IOT_Scores ORDER BY 'id' DESC LIMIT 1";
$result = $conn->query($SQLQ);
$row = $result->fetch_assoc();
$bpm  = $row["lastBPM"];

echo $bpm." BPM";