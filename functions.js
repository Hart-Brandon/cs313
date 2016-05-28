function add_ingredient() {
    // Add extra ingredient text box
    var i_text = document.createTextNode('Ingredient Name:');
    document.body.appendChild(i_text);
    var ingredient = document.createElement("input");
    
    ingredient.setAttribute("type", "text");
    ingredient.setAttribute("name", "r_ingredient[]");
    
    var new_ing = document.body.appendChild(ingredient);
    new_ing.appendChild(ingredient);
}

function add_amount() {
    // AMOUNT TEXTBOX DOESN'T DISPLAY... NEED TO FIX!!!!
    
    // Add extra amount text box
    var a_text = document.createTextNode('Amount:');
    document.body.appendChild(a_text);
    var amount = document.createElement("input");
    
    amount.setAttribute("type", "text");
    amount.setAttribute("name", "r_amount[]");
    
    var new_amt = document.body.appendChild(amount);
    new_amt.appendChild(amount);
}