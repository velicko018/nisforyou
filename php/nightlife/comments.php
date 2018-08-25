<script type="text/javascript" src="js/jquery-1.11.1.min.js"></script>

<script type="text/javascript">
function postComment()
{
  var comment = document.getElementById("textarea").value;
  var id = document.getElementById("ajaxid").value;
  var username = document.getElementById('login1').innerHTML;
  if(username == "ACCOUNT" || username == "NALOG")
  {
  	alert("Niste prijavljeni.");
  	return;
  }
  if(comment && id)
  {
  	//alert('vidim');
    $.ajax
    ({
      type: 'post',
      url: 'nightlife.php',
      data: 
      {
         komentar:comment,
	     id:id
      },
      success: function (response) 
      {
	  
	  	var idd = 1;
	    iscrtaj(comment,username);
	    
      }
    });
  }
  
  return false;
}

function iscrtaj(comment,user)
{
	document.getElementById("textarea").value="";
	 var mesto_za_komentare = document.getElementById('mesto_za_komentare');

	    var komentar = document.createElement('div');
	    komentar.className = 'komentar';
	    mesto_za_komentare.appendChild(komentar);


	    var username = document.createElement('p1');
	    komentar.appendChild(username);
	    username.innerHTML = user;


	    var text = document.createElement('p');
	    text.id='komentar';
	    komentar.appendChild(text);
	    text.innerHTML = comment;

      var bk = document.getElementById('broj_komentara').innerHTML;
      var pocetak = bk.indexOf('(');
      var kraj = bk.indexOf(')');
      var broj =bk.substring(pocetak+1,kraj);
      
      broj = parseInt(broj);
      broj++;

      var lbk = document.getElementById('broj_komentara');
      lbk.innerHTML = lbk.innerHTML.substring(0,pocetak+1) + broj + ")";

}
</script>
