<!DOCTYPE html>
<html>
    <head>
        <link rel="stylesheet" type="text/css" href="../main.css">
        <title>Group Form</title>
        <meta charset="UTF-8">
    </head>
    <body>
       <?php 
        echo("<br/>Name: " . $_POST['name'] . "<br/><br/>");
        echo("E-mail: <a href='mailto:'" . $_POST['email'] . ">" . $_POST['email'] . "</a><br/><br/>");
        echo("Major: " . $_POST['major'] . "<br/><br/>");
        echo("Continents You Have Visited: ");
            foreach($_POST['visit'] as $selected)
            {
                echo("<br/>$selected");
            }
        echo("<br/><br/>");
        echo("Comments:<br/> " .  $_POST['comments'] . "<br/><br/>");
       ?>
    </body>
</html>