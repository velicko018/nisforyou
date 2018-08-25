/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */


//document.getElementById('position').addEventListener("change", function() {
    $("#position").change(function(){
        
    var qty = document.getElementById('qty').value;
    var new_qty = parseInt(qty,10);
    document.getElementById('post_pozicija').value = this.options[this.selectedIndex].text;
    document.getElementById('cena').value = parseInt(this.value*new_qty);
 
    }); 
function modify_qty(val) {
    var qty = document.getElementById('qty').value;
    var new_qty = parseInt(qty,10) + val;
    
    if (new_qty < 0) {
        new_qty = 0;
    }
    if(new_qty >20)
    {
        new_qty=20;
    }
    
    document.getElementById('qty').value = new_qty;
    document.getElementById('cena').value = parseInt(document.getElementById('position').value)*new_qty;
    
   // return new_qty;
}