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
        $results = get_recipe_list();
        (include 'recipe_list.php');
        break;
    
    case 'add_form':
        (include 'new_recipe_form.php');
        break;
    
    case 'add':

        $user_id = 1;
        $recipe_name = $_POST['r_name'];  
        $instructions = $_POST['r_instructions'];
        $ingredient = $_POST['r_ingredient'];
        $amount = $_POST['r_amount'];
        
        $recipe_id = add_recipe_instructions($user_id, $recipe_name, $instructions);
        add_ingredients($recipe_id, $ingredient, $amount);
        
        $results = get_recipe_list();
        (include 'recipe_list.php');
        break;
    
    case 'edit':
        $r_id = filter_input(INPUT_GET, 'recipeID', FILTER_VALIDATE_INT);
        
        $u_id = get_user_id($r_id);
        $r_instructions = get_recipe_instructions($r_id);
        $r_ingredients = get_recipe_ingredients($r_id);
        
        (include 'edit_recipe.php');
        break;
    
    case 'view_recipe':
        $recipe_id = filter_input(INPUT_GET, 'recipeID', FILTER_VALIDATE_INT);
        
        $user_id = get_user_id($recipe_id);
        $user_name = get_user($user_id);
        $recipe_instructions = get_recipe_instructions($recipe_id);
        $recipe_ingredients = get_recipe_ingredients($recipe_id);
        
        (include 'view_recipe.php');
        break;
    
    case 'update':
        $u_recipe_id = filter_input(INPUT_GET, 'recipeID', FILTER_VALIDATE_INT);
        $recipe_name = $_POST['r_name'];  
        $instructions = $_POST['r_instructions'];
        $ingredient = $_POST['r_ingredient'];
        $amount = $_POST['r_amount'];
        
        update_recipe($u_recipe_id, $recipe_name, $instructions);
        update_ingredients($u_recipe_id, $ingredient, $amount);
        
        $results = get_recipe_list();
        (include 'recipe_list.php');
        break;
}
?>