<?php
    $dsn = 'mysql:host=localhost;dbname=group';
    $username = 'hartscre_admin';
    $password = 'Simalaya1';

    try {
        $db = new PDO($dsn, $username, $password);
        //echo "Connected successfully"; 
    } catch (PDOException $e) {
        echo $error_message = $e->getMessage();
        include('database_error.php');
    }

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