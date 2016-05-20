<?php include ('view/r_footer.php') ?>
        <title>View Recipes</title>
    </head>
        <body>
            <?php include ('r_view/top_nav.php') ?>
    <h1>Recipe List</h1>
    <h3>IN PROGRESS &nbsp;&nbsp;&nbsp; :)</h3>
    <p>List from Database</p>
    <ol>
    <?php foreach ($results as $result) : ?>
        <li>
            <a href="?action=view_recipe&amp;recipeID=<?php echo $result['recipeID']; ?>">
                <?php echo $result['recipeName']; ?>
            </a>
        </li>
        <?php echo $result['instructions']; ?>
    <?php endforeach; ?>
    </ol>
<?php include ('r_view/footer.php') ?>