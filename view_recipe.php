<?php include ('r_view/header.php') ?>
        <title>View Recipes</title>
    </head>
        <body>
            <?php include ('r_view/top_nav.php') ?>
            <h1>

            <?php foreach ($recipe_instructions as $result) : ?>
                <?php echo $result['recipeName'] ?>
            <?php endforeach; ?>            

            </h1>
            <!--?php echo "<br/><br/> Submitted By: " . $user_name['userName'] ?>-->
            <h3>Instructions</h3>
            <p><?php foreach ($recipe_instructions as $result) : ?>
                <?php echo $result['instructions'] ?>
            <?php endforeach; ?></p>
            <h3>Ingredients</h3>
            <?php foreach ($recipe_ingredients as $result) : ?>
                <li>
                        <?php echo $result['ingredientName'] . "&nbsp;&nbsp;&nbsp;&nbsp;" . $result['ingredientAmount']; ?>
                </li>
            <?php endforeach; ?>
            <br/>
            <a href="?action=edit&amp;recipeID=<?php echo $recipe_id ?>">Edit Recipe</a>
<?php include ('r_view/footer.php') ?>