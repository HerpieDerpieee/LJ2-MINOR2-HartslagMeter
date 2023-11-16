<?php
require_once "db.php";

$sql = "SELECT id, firstname, lastname FROM MyGuests";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    // output data of each row
    while($row = $result->fetch_assoc()) {
        $value = $row["running"];
        echo $value;
    }
} else {
    echo "0 results";
}
$conn->close();

?>