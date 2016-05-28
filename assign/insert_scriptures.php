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