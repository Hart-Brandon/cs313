<?php

function recipe_list() {
    global $db;
    $query = 'SELECT * FROM recipe
              ORDER BY recipeName';
    $statement = $db->prepare($query);
    $statement->execute();
    return $statement;
}

?>