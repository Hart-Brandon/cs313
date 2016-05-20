<?php
require_once('model/database.php');
require('model/recipe.php');
require('model/ingredients.php');
require('model/users.php');

$action = filter_input(INPUT_GET, 'action');

//initialize error messages array
$errors = array();

if ($action == NULL) {
    $action = filter_input(INPUT_GET, 'action');
    if ($action == NULL) {
        $action = 'home';
    }
}

// Recipe variables
$results = get_recipe_list();
//$recipe_id = filter_input(INPUT_GET, 'recipe_id', FILTER_VALIDATE_INT);
//$recipe = get_recipe($recipe_id);
//$recipe_instructions = filter_input(INPUT_POST, 'recipe_instructions');
//$recipe_name = filter_input(INPUT_POST, 'recipe_name');
//$recipe_name = get_recipe_name($recipe_id);

switch ($action) {
    case 'home':
        (include 'home.php');
        break;
        
    case 'assignments':
        (include 'assignments.php');
        break;
    
    case 'recipe':
        (include 'r_home.php');
        break;
    
    case 'list':
        (include 'recipe_list.php');
        break;
    
    case 'add':
        (include 'new_recipe.php');
        break;
    
    case 'view_recipe':
        $recipe_id = filter_input(INPUT_GET, 'recipeID', FILTER_VALIDATE_INT);
        
        $user_name = get_user($recipe_id);
        $recipe_instructions = get_recipe_instructions($recipe_id);
        $recipe_ingredients = get_recipe_ingredients($recipe_id);
        
        (include 'view_recipe.php');
        break;
}
?>