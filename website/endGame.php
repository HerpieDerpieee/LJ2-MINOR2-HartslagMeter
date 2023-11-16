<?php

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    require_once "db.php";

    $duration = $_POST["duration"];

    // Use prepared statements to prevent SQL injection
    $stmt = $conn->prepare("UPDATE IOT_Scores SET duration=? WHERE id=(SELECT MAX(id) FROM IOT_Scores)");
    $stmt->bind_param("i", $duration);

    if ($stmt->execute()) {
        echo "New record created successfully: ".$duration;
    } else {
        echo "Error: " . $stmt->error;
    }

    $stmt->close();
    $conn->close();
} else {
    echo "Invalid request method";
}
?>
<?php
