<?php include ('r_view/header.php') ?>
        <title>View Recipes</title>
    </head>
        <body>
            <?php include ('r_view/top_nav.php') ?>
            <h1>View Recipe Instructions</h1>

            <?php foreach ($recipe_instructions as $result) : ?>
                <?php echo $result['recipeName'] ?>
            <?php endforeach; ?>            

            <?php echo "<br/><br/> Submitted By: " . $user_name['userName'] ?>

            <p><?php foreach ($recipe_instructions as $result) : ?>
                <?php echo $result['instructions'] ?>
            <?php endforeach; ?></p>

            <?php foreach ($recipe_ingredients as $result) : ?>
                <li>
                        <?php echo $result['ingredientName'] . "&nbsp;&nbsp;&nbsp;&nbsp;" . $result['ingredientAmount']; ?>
                </li>
            <?php endforeach; ?>
            <br/>
            <a href="?action=edit&amp;recipeID=<?php echo $recipe_id ?>">Edit Recipe</a>
<?php include ('r_view/footer.php') ?>