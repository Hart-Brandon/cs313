<?php

    /**
     * Production connection settings
     */
//    $dbHost = getenv('OPENSHIFT_MYSQL_DB_HOST'); 
//    $dbPort = getenv('OPENSHIFT_MYSQL_DB_PORT'); 
//    $dbUser = getenv('OPENSHIFT_MYSQL_DB_USERNAME'); 
//    $dbPassword = getenv('OPENSHIFT_MYSQL_DB_PASSWORD');

    $dsn = 'mysql:host=//$OPENSHIFT_MYSQL_DB_HOST;dbname=cs313';
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