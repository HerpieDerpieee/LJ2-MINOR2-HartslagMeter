<?php

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    require_once "db.php";

    $username = $_POST["username"];

    // Use prepared statements to prevent SQL injection
    $stmt = $conn->prepare("INSERT INTO IOT_Scores (startingTime, duration, username, lastBPM, peakBPM) VALUES (CURRENT_TIMESTAMP, 0, ?, 0, 0)");
    $stmt->bind_param("s", $username);
    $stmand = $conn->prepare("UPDATE IOT_Running SET running = 1 ");

   


    if ($stmt->execute()) {
        echo "New record created successfully: ".$username;
    } else {
        echo "Error: " . $stmt->error;
    }
    if ($stmand->execute()) {
        echo "New record created successfully: spel start :)";
    } else {
        echo "Error: " . $stmand->error;
    }

    $stmt->close();
    $stmand->close();
    $conn->close();
} else {
    echo "Invalid request method";
}
?>