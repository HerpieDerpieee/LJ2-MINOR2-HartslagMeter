<?php

if ($_SERVER["REQUEST_METHOD"] == "POST") {
	require_once "db.php";

	$bpm = $_POST["bpm"];
	
	// Use prepared statements to prevent SQL injection
	$stmt = $conn->prepare("UPDATE IOT_Scores SET lastBPM=? WHERE id=(SELECT MAX(id) FROM IOT_Scores)");
	$stmt->bind_param("i", $bpm);
	
	if ($stmt->execute()) {
		echo "New record created successfully: ".$bpm;
	} else {
		echo "Error: " . $stmt->error;
	}

	$stmt->close();
	$conn->close();
} else {
	echo "Invalid request method";
}
?>
