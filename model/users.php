<?php

function get_user($userID) {
    global $db;
    $query = 'SELECT userName FROM users
              WHERE userID = :userID'; 
    
    try {
        $statement = $db->prepare($query);
        $statement->bindValue(':userID', $userID);
        $statement->execute();
        $user_name=$statement->fetch();
        $statement->closeCursor();
        return $user_name;
    } catch (PDOException $e) {
        $error_message = $e->getMessage();
        display_db_error($error_message);
    }
}

function add_user($userName, $userPW) {
    global $db;
    $query = 'INSERT INTO users (userName, userPW, dateCreated)
              VALUES ($userName, $userPW, CURRENT_TIMESTAMP)';
    
    try {
        $statement = $db->prepare($query);
        $statement->bindValue(':userName', $userName);
        $statement->bindValue(':userPW', $userPW);
        $statement->execute();
        $statement->closeCursor();
        // Get last user ID that was automatically generated
        $user_id = $db->lastInsertID();
        return $user_id;
    } catch (PDOException $e) {
        $error_message = $e->getMessage();
        display_db_error($error_message);
    }
}

?>