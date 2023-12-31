<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport"
        content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>Scary Game Website</title>
    <?php
    function secondsToString($seconds){
        $minutesWithDecimal = $seconds/60;
        $minutes = floor($minutesWithDecimal);
        $secondsInDecimal = $minutesWithDecimal-$minutes;
        $seconds = str_pad(($secondsInDecimal*60), 2, '0', STR_PAD_LEFT);

        return "$minutes:$seconds";
    } ?>
  <link rel="stylesheet" href="./css/leaderboard.css">
  <link rel="stylesheet" href="css/blackscreen.css">
  <link rel="stylesheet" href="css/ingame.css">
  <script src="js/hartkloppingen.js" defer></script>
  <script src="js/ingame.js" defer></script>
  <script
          src="https://code.jquery.com/jquery-3.7.1.js"
          integrity="sha256-eKhayi8LEQwp4NKxN+CfCh+3qOVUtJn3QNZ0TciWLP4="
          crossorigin="anonymous">

  </script>


</head>
<body>
<div id="tablebody">
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

    $sql = "SELECT * FROM IOT_Scores ORDER BY peakBPM ASC LIMIT 25";
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


</div>

<div id="blackscreen"></div>

<div id="ingamebody">
  <div id="allpage">
    <div id="Username">PlaceHolder</div>
    <div id="grid">
      <div id="bpm"><p id='bpmtext' class='text'>0 BPM</p> <img id="hart" src="img/hart.png"> </div>
      <div id="time"><p id="tijd" class='text'>pl:ac</p> <img id="klok" src="img/clock.png"></div>
    </div>
  </div>

</div>

</body>
</html>