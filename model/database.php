<?php

    /**
     * Production connection settings
     */
    $dsn = 'mysql://$OPENSHIFT_MYSQL_DB_HOST:$OPENSHIFT_MYSQL_DB_PORT/;dbname=cs313';
    $username = 'adminlTPsP4X';
    $password = 'lNuWHc1u6wUc';

    /**
     * Localhost connection settings
     */    
//    $dsn = 'mysql:host=localhost;dbname=hartscre_recipes';
//    $username = 'hartscre_admin';
//    $password = 'Simalaya1';

    try {
        $db = new PDO($dsn, $username, $password);
        //echo "Connected successfully"; 
    } catch (PDOException $e) {
        echo $error_message = $e->getMessage();
        include('database_error.php');
    }
?>