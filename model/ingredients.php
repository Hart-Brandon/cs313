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

function add_ingredients($recipeID, $ingredientName, $ingredientAmount) {
    global $db;
    $query = 'INSERT INTO ingredients (recipeID, ingredientName, ingredientAmount)
              VALUES (:recipeID, :ingredientName, :ingredientAmount)';

    try {
    $statement = $db->prepare($query);
    $statement->bindValue(':recipeID', $recipeID);
    $statement->bindValue(':ingredientName', $ingredientName);
    $statement->bindValue(':ingredientAmount', $ingredientAmount);
    $statement->execute();
    $statement->closeCursor();
    } catch (PDOException $e) {
    $error_message = $e->getMessage();
    display_db_error($error_message);
    }
}

function update_ingredients($recipeID, $ingredientName, $ingredientAmount) {
    global $db;
    $query = "UPDATE ingredients
              SET ingredientName = :ingredientName, 
                  ingredientAmount = :ingredientAmount
              WHERE recipeID = :recipeID";
    
    try {
        $statement = $db->prepare($query);
        $statement->bindValue(':recipeID', $recipeID);
        $statement->bindValue(':ingredientName', $ingredientName);
        $statement->bindValue(':ingredientAmount', $ingredientAmount);
        $statement->execute();
    } catch (PDOException $e) {
        $error_message = $e->getMessage();
        display_db_error($error_message);
    }
}