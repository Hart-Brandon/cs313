<?php

function get_recipe_list() {
    global $db;
    $query = 'SELECT * FROM recipes
              ORDER BY recipeName';
    
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

function add_recipe_instructions($userID, $recipeName, $instructions) {
    global $db;
    $query = 'INSERT INTO recipes (userID, recipeName, instructions)
                  VALUES (:userID, :recipeName, :instructions)';
        
    try {
        $statement = $db->prepare($query);
        $statement->bindValue(':userID', $userID);
        $statement->bindValue(':recipeName', $recipeName);
        $statement->bindValue(':instructions', $instructions);
        $statement->execute();
        $statement->closeCursor();
        $recipe_id = $db->LastInsertID();
        return $recipe_id;
    } catch (PDOException $e) {
        $error_message = $e->getMessage();
        display_db_error($error_message);
    }
}

function get_user_id($recipeID) {
    global $db;
    $query = 'SELECT userID FROM recipes
              WHERE recipeID = :recipeID';
    
    try {
        $statement = $db->prepare($query);
        $statement->bindValue(':recipeID', $recipeID);
        $statement->execute();
        $userID = $statement->fetch();
        $statement->closeCursor();
        return $userID;
    } catch (PDOException $e) {
        $error_message = $e->getMessage();
        display_db_error($error_message);
    }
}

function update_recipe($recipeID, $recipeName, $recipeInstructions) {
    global $db;
    $query = 'UPDATE recipes
              SET recipeName = :recipeName
              SET recipeInstructions = :recipeInstructions
              WHERE recipeID = :recipeID';
    
    try {
        $statement = $db->prepare($query);
        $statement->bindValue(':recipeName', $recipeName);
        $statement->bindValue(':recipeInstructions', $recipeInstructions);
        $statement->execute();
        $statement->closeCursor();
    } catch (PDOException $e) {
        $error_message = $e->getMessage();
        display_db_error($error_message);
    }
}
?>