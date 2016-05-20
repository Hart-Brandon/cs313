<?php

function get_recipe_list() {
    global $db;
    $query = 'SELECT * FROM recipes';
    
    try {
        $statement = $db->prepare($query);
        $statement->execute();
        $result = $statement->fetchAll();
        $statement->closeCursor();
        return $result;
    } catch (PDOException $e) {
        $error_message = $e->getMessage();
        display_db_error($error_message);
    }
}

function get_recipe_instructions($recipeID) {
    global $db;
    $query = 'SELECT * FROM recipes
              WHERE recipeID = :recipeID';
    try {
        $statement = $db->prepare($query);
        $statement->bindValue(':recipeID', $recipeID);
        $statement->execute();
        $result = $statement->fetchAll();
        $statement->closeCursor();
        return $result;
    } catch (PDOException $e) {
        $error_message = $e->getMessage();
        display_db_error($error_message);
    }
}
?>