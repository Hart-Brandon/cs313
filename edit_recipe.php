<?php include ('r_view/header.php') ?>
<script src="functions.js" type="text/javascript"></script>
        <title>Add New Recipe</title>
    </head>
        <body>
            
            <?php foreach ($r_instructions as $result) : ?>
                <?php $e_id = $result['recipeID'] ?>
                <?php $e_name = $result['recipeName'] ?>
                <?php $e_instructions = $result['instructions'] ?>
            <?php endforeach; ?>
            
            <?php 
            $e_iName = array();
            $e_iAmount = array();
            ?>
            
            <?php foreach ($r_ingredients as $results) {
                array_push($e_iName, $results['ingredientName']);
                array_push($e_iAmount, $results['ingredientAmount']);
            }
            ?>
            
            <?php include ('r_view/top_nav.php') ?>
        <h1>Edit Recipe</h1>
        <form action='?action=update&amp;recipeID=<?php echo $e_id ?>' method='post'>
            Recipe Name: <input type='text' value="<?php echo $e_name; ?>" name='r_name'><br/><br/>
            Instructions: <br/><textarea rows ='5' cols='74' name='r_instructions'> <?php echo $e_instructions ?> </textarea><br/><br/>
            <?php echo $r_instructions['recipeName']; ?>
            
            <?php for($i=0; $i<count($e_iName); $i++) : ?>
                Ingredient Name: <input type='text' value='<?php echo $e_iName[$i] ?>' name='r_ingredient[]'>
                &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                Amount: <input type='text' value='<?php echo $e_iAmount[$i] ?>' name='r_amount[]'><br/>
            <?php endfor; ?>
                
            <br/>
            
            <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.7.1/jquery.min.js"></script>
            <script src="http://ajax.googleapis.com/ajax/libs/jqueryui/1.9.1/jquery-ui.min.js"></script>
            
            <div id="main">
                Button not working. Should be adding extra text boxes. <br/>
                <input type="button" id="btAdd" value="Add Ingredient" class="bt">
                <!--<input type="button" id="btRemove" value="Remove Element" class="bt" />-->
                <input type="button" id="btRemoveAll" value="Clear All" class="bt">
                
            </div>
            
            <script>
                $(document).ready(function() {

                    var iCnt = 0;
                    // CREATE A "DIV" ELEMENT AND DESIGN IT USING JQUERY ".css()" CLASS.
                    var container = $(document.createElement('div')).css({
                        padding: '5px', margin: '20px', width: '170px'
                    });

                    $('#btAdd').click(function() {
                        if (iCnt <= 19) {

                            iCnt = iCnt + 1;

                            // ADD TEXTBOX.
                            $(container).append('Ingredient Name: <input type=text name="r_ingredient[]" class="input" id=tb' + iCnt + ' ' +
                                        'value="New Ingredient ' + iCnt + '" > \n\
                            Amount: <input type=text name="r_amount[]" class="input" id=tb' + iCnt + ' ' +
                                        'value="New Amount ' + iCnt + '" > <br/><br/>');

                            // DOESN'T ADD jQUERY SUBMIT BUTTON.
                            if (iCnt < 1) {

                                var divSubmit = $(document.createElement('div'));
                                $(divSubmit).append('<input type=submit class="bt"' + 
//                                    'onclick="GetTextValue()"' + 
                                        'id=btSubmit value=Update />');

                            }

                            // ADD BOTH THE DIV ELEMENTS TO THE "main" CONTAINER.
                            $('#main').after(container, divSubmit);
                        }
                        // AFTER REACHING THE SPECIFIED LIMIT, DISABLE THE "ADD" BUTTON.
                        // (20 IS THE LIMIT WE HAVE SET)
                        else {      
                            $(container).append('<label>Reached the limit</label>'); 
                            $('#btAdd').attr('class', 'bt-disable'); 
                            $('#btAdd').attr('disabled', 'disabled');
                        }
                    });

                    // REMOVE ELEMENTS ONE PER CLICK.
//                    $('#btRemove').click(function() {
//                        if (iCnt != 0) { $('#tb' + iCnt).remove(); iCnt = iCnt - 1; }
//
//                        if (iCnt == 0) { 
//                            $(container)
//                                .empty() 
//                                .remove(); 
//
//                            $('#btSubmit').remove(); 
//                            $('#btAdd')
//                                .removeAttr('disabled') 
//                                .attr('class', 'bt') 
//
//                        }
//                    });

                    // REMOVE ALL THE ELEMENTS IN THE CONTAINER.
                    $('#btRemoveAll').click(function() {
                        $(container)
                            .empty()
                            .remove(); 

                        //$('#btSubmit').remove(); 
                        iCnt = 0; 

                        $('#btAdd')
                            .removeAttr('disabled') 
                            .attr('class', 'bt');
                    });
                });

                // PICK THE VALUES FROM EACH TEXTBOX WHEN "SUBMIT" BUTTON IS CLICKED.
                var divValue, values = '';

                function GetTextValue() {

                    $(divValue) 
                        .empty() 
                        .remove(); 

                    values = '';

                    $('.input').each(function() {
                        divValue = $(document.createElement('div')).css({
                            padding:'5px', width:'200px'
                        });
                        values += this.value + '<br />'
                    });
                }
            </script>
            
            <input type ='submit' value='Update'><br />
            
            <br/>
        </form>
<?php include ('r_view/footer.php') ?>