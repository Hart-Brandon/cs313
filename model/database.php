<?php

    /**
     * Production connection settings
     */
    $dbHost = "";
    $dbPort = "";
    $dbUser = "";
    $dbPassword = "";

     $dbName = "cs313";

     $openShiftVar = getenv('OPENSHIFT_MYSQL_DB_HOST');

     if ($openShiftVar === null || $openShiftVar == "")
     {
          // Not in the openshift environment
          //echo "Using local credentials: "; 
          require("setLocalDatabaseCredentials.php");
     }
     else 
     { 
          // In the openshift environment
          //echo "Using openshift credentials: ";

          $dbHost = getenv('OPENSHIFT_MYSQL_DB_HOST');
          $dbPort = getenv('OPENSHIFT_MYSQL_DB_PORT'); 
          $dbUser = getenv('OPENSHIFT_MYSQL_DB_USERNAME');
          $dbPassword = getenv('OPENSHIFT_MYSQL_DB_PASSWORD');
     } 
     //echo "host:$dbHost:$dbPort dbName:$dbName user:$dbUser password:$dbPassword<br >\n";

     $db = new PDO("mysql:host=$dbHost:$dbPort;dbname=$dbName", $dbUser, $dbPassword);

     return $db;
     
    /**
     * Localhost connection settings
     */    
//    $dsn = 'mysql:host=localhost;dbname=hartscre_recipes';
//    $username = 'hartscre_admin';
//    $password = 'Simalaya1';
//
//    try {
//        $db = new PDO($dsn, $username, $password);
//        //echo "Connected successfully"; 
//    } catch (PDOException $e) {
//        echo $error_message = $e->getMessage();
//        include('database_error.php');
//    }
?>