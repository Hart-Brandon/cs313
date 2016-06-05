<?php include ('r_view/header.php') ?>
        <title>View Recipes</title>
    </head>
        <body>
            <?php include ('r_view/top_nav.php') ?>
    <h1>Recipe List</h1>
    <ol>
    <?php foreach ($results as $result) : ?>
        <li id="list">
            <a href="?action=view_recipe&amp;recipeID=<?php echo $result['recipeID']; ?>">
                <?php echo $result['recipeName']; ?>
            </a>
        </li>
    <?php endforeach; ?>
    </ol>
<?php include ('r_view/footer.php') ?>