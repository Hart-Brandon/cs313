<?php
//require(database models);

$action = filter_input(INPUT_GET, 'action');

//initialize error messages array
$errors = array();

if ($action == NULL) {
    $action = filter_input(INPUT_GET, 'action');
    if ($action == NULL) {
        $action = 'home';
    }
}

switch ($action) {
    case 'home':
        (include 'home.php');
        break;
        
    case 'assignments':
        (include 'assignments.php');
        break;
    
    case 'project':
        (include 'project.php');
        break;
}
?>