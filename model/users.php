<?php

function get_user($userID) {
    global $db;
    $query = 'SELECT userName FROM users
              WHERE userID = :userID'; 
    
    try {
        $statement = $db->prepare($query);
        $statement->bindValue(':userID', $userID);
        $statement->execute();
        $result=$statement->fetch();
        $statement->closeCursor();
        return $result;
    } catch (PDOException $e) {
        $error_message = $e->getMessage();
        display_db_error($error_message);
    }
}

?>