<?php
  if(isset($_POST["quest"]) && isset($_POST["color"]) && isset($_POST["capital"]) && isset($_POST["swallow"]))
  {
    setcookie("submitted","true");
    $vote1 = $_POST["quest"];
    $vote2 = $_POST["color"];
    $vote3 = $_POST["capital"];
    $vote4 = $_POST["swallow"];
    
    $myFile = fopen("voteResults.txt", "r") or die("failed to open the file");
    $votes = explode(" ",fgets($myFile));

    if ($vote1 === "0") {
        $votes[0] += 1;
    } elseif ($vote1 === "1") {
        $votes[1] += 1;
    } elseif ($vote1 === "2") {
        $votes[2] += 1;
    } elseif ($vote1 === "3") {
        $votes[3] += 1;
    }

    if ($vote2 === "0" ) {
        $votes[4] += 1;
    } elseif ($vote2 === "1" ) {
        $votes[5] += 1;
    } elseif ($vote2 === "2" ) {
        $votes[6] += 1;
    } elseif ($vote2 === "3" ) {
        $votes[7] += 1;
    }

    if ($vote3 === "0" ) {
        $votes[8] += 1;
    } elseif ($vote3 === "1" ) {
        $votes[9] += 1;
    } elseif ($vote3 === "2" ) {
        $votes[10] += 1;
    } elseif ($vote3 === "3" ) {
        $votes[11] += 1;
    } elseif ($vote3 === "4" ) {
        $votes[12] += 1;
    }

    if ($vote4 === "0") {
        $votes[13] += 1;
    } elseif ($vote4 === "1") {
        $votes[14] += 1;
    } elseif ($vote4 === "2") {
        $votes[15] += 1;
    } elseif ($vote4 === "3") {
        $votes[16] += 1;
    }

    fclose($myFile);
    $myFile2 = fopen("voteResults.txt", "w") or die("failed to open the file");
    fwrite($myFile2,"$votes[0] $votes[1] $votes[2] $votes[3] $votes[4] $votes[5] $votes[6] $votes[7] $votes[8] $votes[9] $votes[10] $votes[11] $votes[12] $votes[13] $votes[14] $votes[15] $votes[16]");
    fclose($myFile2);
  }
  $myFile = fopen("voteResults.txt", "r") or die("failed to open the file");
  $votes = explode(" ",fgets($myFile));
  fclose($myFile);
?>

<!DOCTYPE html>
<head>
    <link rel="stylesheet" type="text/css" href="phpsurvey.css">
    <title> 
        Results 
    </title>
</head>

<body>
    <h1>Vote Results</h1>

    <span>What... is your quest?</span>
    <table>
        <tr>
           <th>Options</th>
           <th># of Votes</th>
           <th>% of Votes</th>
        </tr>
        <tr>
           <td class='left'> Holy Grail </td>
           <td id='stat'> <?php echo($votes[0]) ?> </td>
           <td id='stat'> <?php echo(round(100*$votes[0]/($votes[0]+$votes[1]+$votes[2]+$votes[3])) . "%") ?> </td>
        </tr>	
        <tr>
           <td class='left'> Enlightenment </td>
           <td id='stat'> <?php echo($votes[1]) ?> </td>
           <td id='stat'> <?php echo(round(100*$votes[1]/($votes[0]+$votes[1]+$votes[2]+$votes[3])) . "%") ?> </td>
        </tr>	
        <tr>
           <td class='left'> Employment </td>
           <td id='stat'> <?php echo($votes[2]) ?> </td>
           <td id='stat'> <?php echo(round(100*$votes[2]/($votes[0]+$votes[1]+$votes[2]+$votes[3])) . "%") ?> </td>
        </tr>
        <tr>
           <td class='left'> A Fair Maiden </td>
           <td id='stat'> <?php echo($votes[3]) ?> </td>
           <td id='stat'> <?php echo(round(100*$votes[3]/($votes[0]+$votes[1]+$votes[2]+$votes[3])) . "%") ?> </td>
        </tr>
    </table>
    <br/><br/>

    <span>What... is your favorite color?</span>
    <table>	
        <tr>
           <th>Options</th>
           <th># of Votes</th>
           <th>% of Votes</th>
        </tr>
        <tr>
           <td class='left'>Blue</td>
           <td id='stat'> <?php echo($votes[4]) ?> </td>
           <td id='stat'> <?php echo(round(100*$votes[4]/($votes[4]+$votes[5]+$votes[6]+$votes[7])) . "%") ?> </td>
        </tr>	
        <tr>
           <td class='left'>Yellow</td>
           <td id='stat'> <?php echo($votes[5]) ?> </td>
           <td id='stat'> <?php echo(round(100*$votes[5]/($votes[4]+$votes[5]+$votes[6]+$votes[7])) . "%") ?> </td>
        </tr>
        <tr>
           <td class='left'>All of them</td>
           <td id='stat'> <?php echo($votes[6]) ?> </td>
           <td id='stat'> <?php echo(round(100*$votes[6]/($votes[4]+$votes[5]+$votes[6]+$votes[7])) . "%") ?> </td>
        </tr>
        <tr>
           <td class='left'>No favorite</td>
           <td id='stat'> <?php echo($votes[7]) ?> </td>
           <td id='stat'> <?php echo(round(100*$votes[7]/($votes[4]+$votes[5]+$votes[6]+$votes[7])) . "%") ?> </td>
        </tr>
    </table>
    <br/><br/>

    <span>What... is the capital of Assyria?</span>
    <table>
        <tr>
           <th>Options</th>
           <th># of Votes</th>
           <th>% of Votes</th>
        </tr>
        <tr>
           <td class='left'>Nineveh</td>
           <td id='stat'> <?php echo($votes[8]) ?> </td>
           <td id='stat'> <?php echo(round(100*$votes[8]/($votes[8]+$votes[9]+$votes[10]+$votes[11]+$votes[12])) . "%") ?> </td>
        </tr>	
        <tr>
           <td class='left'>Ashur</td>
           <td id='stat'> <?php echo($votes[9]) ?> </td>
           <td id='stat'> <?php echo(round(100*$votes[9]/($votes[8]+$votes[9]+$votes[10]+$votes[11]+$votes[12])) . "%") ?> </td>
        </tr>	
        <tr>
           <td class='left'>Caleh</td>
           <td id='stat'> <?php echo($votes[10]) ?> </td>
           <td id='stat'> <?php echo(round(100*$votes[10]/($votes[8]+$votes[9]+$votes[10]+$votes[11]+$votes[12])) . "%") ?> </td>
        </tr>
        <tr>
           <td class='left'>Dur Sharrukin</td>
           <td id='stat'> <?php echo($votes[11]) ?> </td>
           <td id='stat'> <?php echo(round(100*$votes[11]/($votes[8]+$votes[9]+$votes[10]+$votes[11]+$votes[12])) . "%") ?> </td>
        </tr>
        <tr>
           <td class='left'>I don't know that</td>
           <td id='stat'> <?php echo($votes[12]) ?> </td>
           <td id='stat'> <?php echo(round(100*$votes[12]/($votes[8]+$votes[9]+$votes[10]+$votes[11]+$votes[12])) . "%") ?> </td>
        </tr>
    </table>
    <br><br>

    <span>What... is the air-speed velocity of an unladen swallow?</span>
    <table>
        <tr>
           <th>Options</th>
           <th># of Votes</th>
           <th>% of Votes</th>
        </tr>
        <tr>
           <td class='left'>African or European?</td>
           <td id='stat'> <?php echo($votes[13]) ?> </td>
           <td id='stat'> <?php echo(round(100*$votes[13]/($votes[13]+$votes[14]+$votes[15]+$votes[16])) . "%") ?> </td>
        </tr>
        <tr>
           <td class='left'>11 m/s</td>
           <td id='stat'> <?php echo($votes[14]) ?> </td>
           <td id='stat'> <?php echo(round(100*$votes[14]/($votes[13]+$votes[14]+$votes[15]+$votes[16])) . "%") ?> </td>
        </tr>
        <tr>
           <td class='left'>24 mph</td>
           <td id='stat'> <?php echo($votes[15]) ?> </td>
           <td id='stat'> <?php echo(round(100*$votes[15]/($votes[13]+$votes[14]+$votes[15]+$votes[16])) . "%") ?> </td>
        </tr>
        <tr>
           <td class='left'>Huh? I... I don't know that</td>
           <td id='stat'> <?php echo($votes[16]) ?> </td>
           <td id='stat'> <?php echo(round(100*$votes[16]/($votes[13]+$votes[14]+$votes[15]+$votes[16])) . "%") ?> </td>
        </tr>
    </table>
</body>