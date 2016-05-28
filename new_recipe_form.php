<?php include ('view/r_footer.php') ?>
<script src="functions.js" type="text/javascript"></script>
        <title>Add New Recipe</title>
    </head>
        <body>
            <?php include ('r_view/top_nav.php') ?>
        <h1>Add New Recipe</h1>
        <form action='?action=add' method='post'>
            Recipe Name: <input type='text' name='r_name'><br/><br/>
            Instructions: <br/><input type='text' name='r_instructions'></textarea><br/><br/>
            
            Ingredient Name: <input type='text' name='r_ingredient[]'>
            &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
            Amount: <input type='text' name='r_amount[]'><br/>
<!--            <div id='ingredient_list'></div>
            <input type='button' value='Add Ingredient' id='button' onclick="add_ingredient();add_amount();">-->
            <br/><br/>
            <input type ='submit' value='Submit'>
        </form>
<?php include ('r_view/footer.php') ?>