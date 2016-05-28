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

    if (!empty($_POST['new_topic']) && $_POST['new_topic']) {
    	$new_topic = filter_input(INPUT_POST, 'new_topic_name');
    	$db->query("INSERT INTO topics (name) VALUES ('$new_topic')");
    	$last_topic_id = $db->lastInsertID();
    }

    $book = filter_input(INPUT_POST, 'book');
    $chapter = filter_input(INPUT_POST, 'chapter');
    $verse = filter_input(INPUT_POST, 'verse');
    $content = filter_input(INPUT_POST, 'content');
    $topics = $_POST['topics'];
    if (!empty($last_topic_id)) {
    	$topics[] = $last_topic_id;
	}

    $query = "INSERT INTO scriptures (book, chapter, verse, content) VALUES ('$book', '$chapter', '$verse', '$content')";
    $db->query($query);

    $scripture_id = $db->lastInsertID();

    foreach ($topics as $topic) {
    	$query2 = "INSERT INTO scripturetopic (scripture_id, topic_id) VALUES ($scripture_id, $topic)";
    	$db->query($query2);
    }
?>

<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>Display Scriptures</title>
</head>

<body>
<?php
	foreach ($db->query("SELECT * FROM Scriptures") as $scripture) {
		echo "<b>" . $scripture['book'] . ' ';
		echo $scripture['chapter'] . ':';
		echo $scripture['verse'] . "</b>";
		echo " - \"" . $scripture['content'] . "\"<br>";
		echo "Topics:<ul>";
		$ids = $db->query("SELECT topic_id FROM ScriptureTopic WHERE scripture_id = " . $scripture['id']);
		foreach ($ids as $id_array) {
			$id = $id_array['topic_id'];
			$name_result = $db->query("SELECT name FROM Topics WHERE id = $id");
			$name_array = $name_result->fetch(PDO::FETCH_ASSOC);
			$name = $name_array['name'];
			echo "<li>$name</li>";
		}
		echo "</ul><br>";
	}

?>
<a href="insert_scriptures.php">Back to Insert Page</a>
</body>

</html>