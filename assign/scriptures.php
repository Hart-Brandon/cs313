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
		<title>Scriptures</title>
	</head>

	<body>
		<h1>Scripture Resources</h1>
		<?php
		foreach ($db->query("SELECT book, chapter, verse, content FROM Scriptures") as $scripture) {
			echo "<b>" . $scripture['book'] . ' ';
			echo $scripture['chapter'] . ':';
			echo $scripture['verse'] . "</b>";
			echo " - \"" . $scripture['content'] . "\"<br><br>";
		}

		?>
	</body>
</html>   