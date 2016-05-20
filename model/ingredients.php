<?php

function get_recipe_ingredients($recipeID) {
    global $db;
    $query = 'SELECT * FROM ingredients
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
