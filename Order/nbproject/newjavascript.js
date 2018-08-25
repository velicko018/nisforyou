$('tbody tr').click(function () {
    var name=($(this).find('td:first').text());
    var rowCount = document.getElementById("127").innerHTML= "Number of orders: "+$('td:contains('+name+')').filter(function() {
    return $(this).index() == 0;}).length;
    
   $.ajax({
     type: "POST",
     url: "info.php",
     data: { 'name': name },
     cache: false,
     dataType: "json",
      success: function(data)          //on recieve of reply
      {
        
        var username = data[0];              //get id
        var password = data[1];
        var name = data[2];
        var email = data[3]; 
        var address = data[4]; 
        var telephone = data[5];
    
        //--------------------------------------------------------------------
        // 3) Update html content
        //--------------------------------------------------------------------
        $('#122').html("Korisnicko: "+username); 
        $('#123').html("Ime: "+name);
        $('#124').html("Email: "+email);
        $('#125').html("Adresa: "+address);
        $('#126').html("Telefon: "+telephone);
        
      } 
    
  });
    
    
    $('#myModal').modal('toggle');
    
}); 



