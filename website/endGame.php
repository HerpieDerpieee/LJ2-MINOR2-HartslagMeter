<?php

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    require_once "db.php";

    $duration = $_POST["duration"];

    // Use prepared statements to prevent SQL injection
    $stmt = $conn->prepare("UPDATE IOT_Scores SET duration=? WHERE id=(SELECT MAX(id) FROM IOT_Scores)");
    $stmt->bind_param("i", $duration);
    $stmand = $conn->prepare("UPDATE IOT_Running SET running=0 ");

    if ($stmt->execute()) {
        echo "New record created successfully: ".$duration;
    } else {
        echo "Error: " . $stmt->error;
    }
    if ($stmand->execute()) {
        echo "New record created successfully: spel stop :(";
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
<?php
