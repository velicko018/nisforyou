    $("#contactus").click(function(){
    $("#eror").empty();
    $("#mailform").empty();
    $("#mailmessage").empty();
    $element=document.getElementById("mailform");
    $tabela=document.createElement("table");
    $tform=document.createElement("form");
    $tabela.id="tabela1";
    $tform.name="contactform";
    $tform.method="post";
    $tform.id="formmail";
    
    
    $labelaniz = new Array();
    $labelaniz.push("Ime *");
    $labelaniz.push("Prezime *");
    $labelaniz.push("Email *");
    $labelaniz.push("Telefon");
    $labelaniz.push("Prouka *");
    
    $inputniz= new Array();
    $inputniz.push("first_name");
    $inputniz.push("last_name");
    $inputniz.push("email");
    $inputniz.push("telephone");
    $inputniz.push("comments");
    
    for (i = 0; len = $labelaniz.length, i < len; i++)
    {
    $tred=document.createElement("tr");
    $ttelo=document.createElement("td");
    $tlabela=document.createElement("label");
    $tinput=document.createElement("input");
    
    $tlabela.innerHTML=$labelaniz[i];
    $tlabela.for=$inputniz[i];
    $tinput.type="text";
    $tinput.name=$inputniz[i];
    $tinput.maxlength="50";
    $tinput.size="30";
    if(i==$labelaniz.length-1)
    {
        $tinput=document.createElement("textarea");
        $tinput.name=$inputniz[i];
        $tinput.rows="8";
        $tinput.cols="42";
         $tinput.maxlength="1000";
     
    }
    
    $ttelo.appendChild($tlabela);
    $ttelo.appendChild($tinput);
    $tred.appendChild($ttelo);
    $tabela.appendChild($tred);
    }
    $tred=document.createElement("tr");
    $ttelo=document.createElement("td");
    $tinput=document.createElement("input");
    $ttelo.colspan="2";
    $ttelo.style="text-align:center";
    $tinput.type="submit";
    $tinput.value="Submit";
    $tinput.id="submit";
    
    $ttelo.appendChild($tinput);
    $tred.appendChild($ttelo);
    $tabela.appendChild($tred);
    $tform.appendChild($tabela);
    $element.appendChild($tform); 
    
    /*
     *  $("#submit").click(function() 
    {
      alert("Message has been sent");
      $("#mailform").empty();
    });
     */
   
    
});