/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */


//document.getElementById('position').addEventListener("change", function() {

    var cenica = document.getElementById('cena').value;
    var qty = document.getElementById('qty').value;
    var new_qty = parseInt(qty,10); 
    document.getElementById('ukupno').value = parseInt(cenica*new_qty);

    

    $("#cena").change(function(){
    var qty = document.getElementById('qty').value;
    var new_qty = parseInt(qty,10); 
    document.getElementById('ukupno').value = parseInt(this.value*new_qty);
 
    });
    $("#cena1").change(function(){
    var qty = document.getElementById('qty').value;
    var new_qty = parseInt(qty,10); 
    document.getElementById('ukupno').value = parseInt(this.value*new_qty);
 
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
    document.getElementById('ukupno').value = parseInt(document.getElementById('cena').value)*new_qty;
    
   // return new_qty;
}