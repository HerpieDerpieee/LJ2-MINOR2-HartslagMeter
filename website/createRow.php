<?php

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    require_once "db.php";

    $username = $_POST["username"];

    // Use prepared statements to prevent SQL injection
    $stmt = $conn->prepare("INSERT INTO IOT_Scores (startingTime, duration, username, lastBPM, peakBPM) VALUES (CURRENT_TIMESTAMP, 0, ?, 0, 0)");
    $stmt->bind_param("s", $username);

    if ($stmt->execute()) {
        echo "New record created successfully: ".$username;
    } else {
        echo "Error: " . $stmt->error;
    }

    $stmt->close();
    $conn->close();
} else {
    echo "Invalid request method";
}
?>