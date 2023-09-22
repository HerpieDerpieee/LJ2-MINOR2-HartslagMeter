<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title></title>
    <?php
    function secondsToString($seconds){
        $minutesWithDecimal = $seconds/60;
        $minutes = floor($minutesWithDecimal);
        $secondsInDecimal = $minutesWithDecimal-$minutes;
        $seconds = str_pad(($secondsInDecimal*60), 2, '0', STR_PAD_LEFT);

        return "$minutes:$seconds";
    }
    ?>
</head>
<body>
<table>
    <thead>
    <tr>
        <th>Place</th>
        <th>Username</th>
        <th>Peak BPM</th>
        <th>Duration</th>
    </tr>
    </thead>
    <tbody>
    <?php
    require_once "db.php";

    $sql = "SELECT * FROM IOT_Scores ORDER BY peakBPM ASC";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        $i=1;
        while($row = $result->fetch_assoc()) {


            echo '
                    <tr>
                        <td>'.$i.'</td>
                        <td>'.$row["username"].'</td>
                        <td>'.$row["peakBPM"].'</td>
                        <td>'.secondsToString($row["duration"]).'</td>
                    </tr>
                    ';
            $i+=1;
        }
    } else {
        echo "0 results";
    }
    $conn->close();
    ?>
    </tbody>
</table>
</body>
