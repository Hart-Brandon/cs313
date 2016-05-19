<?php

    /**
     * Localhost connection settings
     */
//    $dsn = 'mysql:host=localhost;dbname=my_guitar_shop1';
//    $username = 'mgs_user';
//    $password = 'pa55word';

    /**
     * Production connection settings
     */    
    $dsn = 'mysql:host=localhost;dbname=hartscre_recipes';
    $username = 'hartscre_admin';
    $password = 'Simalaya1';

    try {
        $db = new PDO($dsn, $username, $password);
    } catch (PDOException $e) {
        echo $error_message = $e->getMessage();
        include('database_error.php');
    }
?>