<?php
   if(!isset($_COOKIE["submitted"]))
   {
      setcookie("submitted","false");   
   }
   else
   {
   	if($_COOKIE["submitted"] == "true")
   	{
      	  header("Location:results.php");
   	}	
   }
?>

<!DOCTYPE html>
  <head> 
    <link rel="stylesheet" type="text/css" href="phpsurvey.css">
    <title>
	PHP Survey
    </title>
  </head>
  <body>
     <h1>PHP Survey</h1>
     <form  id="surveyForm" action="results.php" method="post" >
         
        What... is your quest?<br/>
	<input type="radio" class=left name="quest" value=0>I seek the Holy Grail<br/>
	<input type="radio" class=left name="quest" value=1>I seek enlightenment<br/>
	<input type="radio" class=left name="quest" value=2>I seek gainful employment<br/>
        <input type="radio" class=left name="quest" value=3>I seek the hand of a fair maiden<br/>
        <br/>
        
        What... is your favorite color?<br/>
	<input type="radio" class=left name="color" value=0>Blue<br/>
	<input type="radio" class=left name="color" value=1>Yellow<br/>
	<input type="radio" class=left name="color" value=2>All of them<br/>
        <input type="radio" class=left name="color" value=3>I don't have a favorite color<br/>
        <br/>
	
	What... is the capital of Assyria?<br/>
	<input type="radio" name="capital" value=0>Nineveh<br/>
	<input type="radio" name="capital" value=1>Ashur<br/>
	<input type="radio" name="capital" value=2>Caleh<br/>
	<input type="radio" name="capital" value=3>Dur Sharrukin<br/>
	<input type="radio" name="capital" value=4>I don't know that<br/>
        <br/>

	What... is the air-speed velocity of an unladen swallow?<br/>
	<input type="radio" name="swallow" value=0>African or European?<br/>
	<input type="radio" name="swallow" value=1>11 m/s<br/>
        <input type="radio" name="swallow" value=2>24 mph<br/>
	<input type="radio" name="swallow" value=3>Huh? I... I don't know that<br/>
        <br/>

        <input type = "submit" value="Submit &rarr;">
        <a href="results.php">See Results</a>
     </form>
  </body>
</html>