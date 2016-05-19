<?php
//require(database models);

$action = filter_input(INPUT_GET, 'action');

//initialize error messages array
$errors = array();

if ($action == NULL) {
    $action = filter_input(INPUT_GET, 'action');
    if ($action == NULL) {
        $action = 'recipe';
    }
}

switch ($action) {    
    case 'recipe':
        (include 'r_home.php');
        break;
}
?>