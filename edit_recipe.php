<?php include ('view/r_footer.php') ?>
<script src="functions.js" type="text/javascript"></script>
        <title>Add New Recipe</title>
    </head>
        <body>
            
            <?php foreach ($r_instructions as $result) : ?>
                <?php $e_id = $result['recipeID'] ?>
                <?php $e_name = $result['recipeName'] ?>
                <?php $e_instructions = $result['instructions'] ?>
            <?php endforeach; ?>
            
            <?php foreach ($r_ingredients as $results) : ?>
                <?php $e_iName = $results['ingredientName'] ?>
                <?php $e_iAmount = $results['ingredientAmount'] ?>
            <?php endforeach; ?>
            
            <?php include ('r_view/top_nav.php') ?>
        <h1>Edit Recipe</h1>
        <form action='?action=update&amp;recipeID=<?php echo $e_id ?>' method='post'>
            Recipe Name: <input type='text' value="<?php echo $e_name; ?>" name='r_name'><br/><br/>
            Instructions: <br/><input type='text' value='<?php echo $e_instructions ?>' name='r_instructions'><br/><br/>
            <?php echo $r_instructions['recipeName']; ?>
            Ingredient Name: <input type='text' value='<?php echo $e_iName ?>' name='r_ingredient'>
            &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
            Amount: <input type='text' value='<?php echo $e_iAmount ?>' name='r_amount'><br/>
<!--        <div id='ingredient_list'></div>
            <input type='button' value='Add Ingredient' id='button' onclick="add_ingredient();add_amount();">-->
            <br/><br/>
            <input type ='submit' value='Update'>
        </form>
<?php include ('r_view/footer.php') ?>