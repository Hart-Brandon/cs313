<?php
    $dbHost = "";
    $dbPort = "";
    $dbUser = "";
    $dbPassword = "";

     $dbName = "group";

     $openShiftVar = getenv('OPENSHIFT_MYSQL_DB_HOST');

     if ($openShiftVar === null || $openShiftVar == "")
     {
          // Not in the openshift environment
          //echo "Using local credentials: "; 
          require("setLocalDatabaseCredentials.php");
     }
     else 
     { 
          // In the openshift environment
          //echo "Using openshift credentials: ";

          $dbHost = getenv('OPENSHIFT_MYSQL_DB_HOST');
          $dbPort = getenv('OPENSHIFT_MYSQL_DB_PORT'); 
          $dbUser = getenv('OPENSHIFT_MYSQL_DB_USERNAME');
          $dbPassword = getenv('OPENSHIFT_MYSQL_DB_PASSWORD');
     } 
     //echo "host:$dbHost:$dbPort dbName:$dbName user:$dbUser password:$dbPassword<br >\n";

     $db = new PDO("mysql:host=$dbHost:$dbPort;dbname=$dbName", $dbUser, $dbPassword);

    $query = "SELECT * FROM Scriptures";
    $statement = $db->prepare($query);
    $statement->execute();
    $results = $statement->fetch();
    $statement->closeCursor(); 
?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>Insert Scriptures</title>
</head>

<body>
<form action="display_scriptures.php" method="post">
	Book: <input type="text" name="book"><br>
	Chapter: <input type="text" name="chapter"><br>
	Verse: <input type="text" name="verse"><br>
	Content:<br>
	<textarea name="content"></textarea><br>
	<?php
	foreach ($db->query("SELECT * FROM Topics") as $topic) {
		echo "<input type='checkbox' name='topics[]' value='"
			. $topic['id'] . "'>";
		echo $topic['name'] . "<br>";
	}
	?>
    <input type="checkbox" name="new_topic"><input type="text" name="new_topic_name" placeholder="New topic..."><br>
    <input type="submit" value="Add Scripture">
</form>
</body>

</html>