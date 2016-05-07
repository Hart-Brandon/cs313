<!DOCTYPE html>
<html>
    <head>
        <link rel="stylesheet" type="text/css" href="../main.css">
        <title>Group Form</title>
        <meta charset="UTF-8">
    </head>
    <body>
        <form action="display_input.php" method="post">
            <br/>
            Name: <input type="text" name="name"><br/>
            <br/>
            E-mail: <input type="text" name="email"><br/>
            <br/>
            Select a Major:<br/>
            <input type="radio" name="major" value="Computer Science">Computer Science<br/>
            <input type="radio" name="major" value="Web Development and Design">Web Development and Design<br/>
            <input type="radio" name="major" value="Computer Information Technology">Computer Information Technology<br/>
            <input type="radio" name="major" value="Computer Engineering">Computer Engineering<br/>
            <br/>
            Select the continents you have visited:<br/>
            <input type="checkbox" name="visit[]" value="North America">North America<br/>
            <input type="checkbox" name="visit[]" value="South America">South America<br/>
            <input type="checkbox" name="visit[]" value="Europe">Europe<br/>
            <input type="checkbox" name="visit[]" value="Asia">Asia<br/>
            <input type="checkbox" name="visit[]" value="Australia">Australia<br/>
            <input type="checkbox" name="visit[]" value="Africa">Africa<br/>
            <input type="checkbox" name="visit[]" value="Antarctica">Antarctica<br/>
            <br/>
            Add any comments below:<br/>
            <textarea rows="15" cols="75" name="comments"> </textarea>
            <br/>
            <input type="submit" value="Submit">
        </form>
    </body>
</html>