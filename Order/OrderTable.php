
<!DOCTYPE html>
<html >
  <head>
    <meta charset="UTF-8">
    <title>Admistratorksa strana Nisforzou</title>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.2/jquery.min.js"></script>
    <script src="http://www.jacklmoore.com/colorbox/jquery.colorbox.js"></script>
    <script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
     <link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css">
    <link rel="stylesheet" href="Css/Search.css">
    <link rel="stylesheet" href="Css/NavigationBar.css">   
    <link rel="stylesheet" href="Css/index.css">
    <link rel="stylesheet" href="Css/modal.css">
    <link rel="stylesheet" href="Css/table.css">
    <link rel="stylesheet" href=" Css/footer-distributed-with-address-and-phones.css">     
  </head>
  <body>
      <div class="nav-bar">
<ul>
    <li><a class="active" href="OrderTable.php">Početna</a></li>
    <li><a id="132" href="../index.php">Web strana</a></li>
    <li><a><?php session_start(); if(isset($_SESSION['user1'])) {echo  $_SESSION['user1']->username;} else {echo "Nis4you"; } ?></a></li>
    <li><?php if(isset($_SESSION['user1'])){ if(($_SESSION['user1']->tip)==2) { echo('<a id="dugmezadodaj"  data-toggle="modal1" href="#myModal1">Dodaj hranu</a>'); } }?></li>
    <li><a href='OrderTable.php?delete=true'>Obrisi podatke iz tabele</a></li>
  <li><a  id="logout" href="logout.php">Log out</a></li>
  <li>  <form>
            <input id="search" type="text" name="search" placeholder="Pretraži tabelu...">
        </form>
  </li>
  
</ul>
      </div>
       <?php
 if (isset($_GET['delete'])) 
     {
     obrisibazu();
  }

function obrisibazu()
{
require_once 'init.php';
$tip=$_SESSION['user1']->tip;
$idlokal=$_SESSION['user1']->id;
$email=$_SESSION['user1']->email;
if($db->connect_error)
    {
        print("GRESKA!");
    }
    else
    {
    if($tip==2)
    {
        $query=$db->query("DELETE FROM narucenahrana Where email='$email'");
    }
    else if($tip==1)
    {
        $query=$db->query("DELETE FROM narucenekarte Where email='$email'");
    }
    else
    {
        $query=$db->query("Delete from rezervacijanl where mail='$email'");
    }
  
  $db->close();
 header('Location: OrderTable.php');
}
}

?>
      
<?php
        require_once 'init.php';
        if(isset($_SESSION['user1']))
        {
        $username=$_SESSION['user1']->username;
        $password=$_SESSION['user1']->password;
        $email=$_SESSION['user1']->email;
        $tip=$_SESSION['user1']->tip;
        $idlokal=$_SESSION['user1']->id;
        $allarticles=array();
        
        if($tip==1) // 1 - za evente 2 - za hranu 
        {
            //sql upit za evente
            $query= $db->query("select narucenekarte.id_narudzbine, narucenekarte.username_narucioca, dogadjaj.ime, narucenekarte.pozicija, narucenekarte.cena, narucenekarte.kolicina, dogadjaj.ime,dogadjaj.datum,dogadjaj.vreme,dogadjaj.mesto FROM narucenekarte,dogadjaj WHERE dogadjaj.id=narucenekarte.id_dogadjaja && narucenekarte.email='{$email}'");
            
            $exists=$query->num_rows;
            
         if($exists!=0)
            {
            while ($row = $query->fetch_object())
                {
                    $allarticles[]=$row;
                } 
            }
        }
        else if($tip==2)
        {
                 //sql upit za hranu
                $query= $db->query("Select narucenahrana.idnarudzbine, narucenahrana.username_narucioca, lokal.ime as Lokal, hrana.ime, narucenahrana.cena, narucenahrana.kolicina, narucenahrana.dostava, narucenahrana.dodaci,narucenahrana.vreme  FROM narucenahrana,hrana,lokal  WHERE narucenahrana.restoran=lokal.idres && narucenahrana.idhrana=hrana.idhrana && narucenahrana.email='{$email}'");
               
                $exists=$query->num_rows;
                   if($exists!=0)
                   {
                         while ($row = $query->fetch_object())
                             {
                                 $allarticles[]=$row;
                             }
                   }
        }
        else
        {
             $query= $db->query("select rezervacijanl.id, rezervacijanl.lokal, rezervacijanl.tipLokala, rezervacijanl.ime, rezervacijanl.telefon, rezervacijanl.tipMesta, rezervacijanl.brojMesta, rezervacijanl.datum, rezervacijanl.vreme FROM rezervacijanl where rezervacijanl.mail='{$email}'");
               
                $exists=$query->num_rows;
                   if($exists!=0)
                   {
                         while ($row = $query->fetch_object())
                             {
                                 $allarticles[]=$row;
                             }
                   }
            
        }
        }
        ?>
     
<!--First Modal -->
<div id="myModal" class="modal fade" role="dialog">
  <div class="modal-dialog">

    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title">=Information=</h4>
      </div>
      <div class="modal-body">
        <p id="122">Korisnicko:</p>
        <p id="123">Ime:</p>
        <p id="124">Email:</p>
        <p id="125">Adresa:</p>
        <p id="126">Telefon:</p>
        <p id="127">Broj porudzbina:</p>
        <hr>
        <form class="userform" action="sendmail.php" method="post" >
    Ime:<br>
    <input type="text" name="nameuser" placeholder="your name"><br>
    E-mail:<br>
    <input type="text" name="mailuser" placeholder="your email"><br>
    Poruka:<br>
    <input type="text" name="commentuser" placeholder="your comment" ><br><br>
    <input type="submit" value="Send">
    <input type="reset" value="Reset">
    </form>
      </div>      
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
      </div>
    </div>

  </div>
</div>

 <!-- Second Modal -->
 <div id="myModal1" class="modal fade" role="dialog">
  <div class="modal-dialog">

    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title">=Dodaj u Meni=</h4>
      </div>
      <div class="modal-body">
          <form action="adminaddfood.php" method="post">
    <fieldset>
    <legend>Dodaj hranu:</legend>
    Naziv:<br>
    <input type="text" name="namefood" placeholder="example: Nisforyou">
    <br>
    Opis:<br>
    <input type="text" name="descrfood" placeholder="example: Very tasty">
    <br>
     Tip hrane:<br>
    <input type="text" name="typefood" placeholder="example: Pizza,Toast">
    <br>
    Tag hrane:<br>
    <input type="text" name="tagfood" placeholder="example: tomato,cheese...">
    <br>
     Url slike:<br>
    <input type="text" name="picfood" placeholder="example:http://i.imgur.com/LVrDbQ5.mp4">
    <br>
     Cena:<br>
    <input type="text" name="price" placeholder="100,200,300...">
    <br>
    <input type="submit" value="Submit">
    </fieldset>
</form>
      </div>      
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
      </div>
    </div>

  </div>
</div>
  <!-- End Modal -->

      <div class="context">
          <div id="grpChkBox">
              <?php if(isset($_SESSION['user1'])): ?>
        
            <p><input type="checkbox" name="korisnik" /><?php if($tip==1) { echo ("Korisnik");} else if ($tip==2) {echo ("Korisnik");} else { echo ("Korisnik");}?></p>

            <p><input type="checkbox" name="pozicija" /> <?php if($tip==1) { echo ("Pozicija");} else if ($tip==2) {echo ("Hrana");} else { echo ("Telefon");}?> </p>
            <p><input type="checkbox" name="cena" /> <?php if($tip==1) { echo ("Cena");} else if ($tip==2) {echo ("Cena");} else { echo ("Tip Mesta");}?></p>
            <p><input type="checkbox" name="kolicina" /> <?php if($tip==1) { echo ("Kolicina");} else if ($tip==2) {echo ("Kolicina");} else { echo ("Broj Mesta");}?></p>
            <p><input type="checkbox" name="datum" /> <?php if($tip==1) { echo ("Datum");} else if ($tip==2) {echo ("Dostava");} else { echo ("Datum");}?></p>
            <p><input type="checkbox" name="vreme" /> <?php if($tip==1) { echo ("Vreme");} else if ($tip==2) {echo ("Dodaci");} else { echo ("Vreme Rezervacije");}?></p>
            <p><input type="checkbox" name="mesto" /> <?php if($tip==1) { echo ("Mesto");} else if ($tip==2) {echo ("Vreme");} else { echo ("ID"); }?></p>
            <?php endif; ?>
          </div>
        <table id="table" class="sortable table-fill" data-role="table" data-mode="columntoggle" class="ui-responsive ui-shadow"  data-filter="true" data-input="#filterTable-input" >
            <thead>
            <tr>
                <?php if(isset($_SESSION['user1'])): ?>
               
                <th  class="text-left korisnik"><?php if($tip==1) { echo ("Korisnik");} else if ($tip==2) {echo ("Korisnik");} else { echo ("Korisnik");}?></th> 

                <th  class="text-left pozicija"><?php if($tip==1) { echo ("Pozicija");} else if ($tip==2) {echo ("Hrana");} else { echo ("Telefon");}?></th>
                <th  class="text-left cena"><?php if($tip==1) { echo ("Cena");} else if ($tip==2) {echo ("Cena");} else { echo ("Tip Mesta");}?></th>
                <th  class="text-left kolicina"><?php if($tip==1) { echo ("Kolicina");} else if ($tip==2) {echo ("Kolicina");} else { echo ("Broj Mesta");}?></th>
                <th  class="text-left datum"><?php if($tip==1) { echo ("Datum");} else if ($tip==2) {echo ("Dostava");} else { echo ("Datum");}?></th>
                <th  class="text-left vreme"><?php if($tip==1) { echo ("Vreme");} else if ($tip==2) {echo ("Dodaci");} else { echo ("Vreme Rezervacije");}?></th>
                <th  class="text-left mesto"><?php if($tip==1) { echo ("Mesto");} else if ($tip==2) {echo ("Vreme");} else {  echo ("ID");}?></th>
                <?php endif; ?>
           </tr>
            </thead>
            <tbody class="table-hover">
        <?php if(isset($_SESSION['user1'])) { foreach($allarticles as $article): ?>
           <tr>

               <td class="text-left"><?php if($tip==1) {echo $article->username_narucioca;} else if ($tip==2) {echo $article->username_narucioca;} else {echo $article->ime;} ?></td>
               <td class="text-left"><?php if($tip==1) {echo $article->pozicija;}else if ($tip==2) {echo $article->ime;}else {echo $article->telefon;} ?></td>
               <td class="text-left"><?php if($tip==1) {echo $article->cena;}else if ($tip==2) {echo $article->cena;}else {echo $article->tipMesta;} ?></td>
               <td class="text-left"><?php if($tip==1) {echo $article->kolicina;}else if ($tip==2) {echo $article->kolicina;}else {echo $article->brojMesta;} ?></td>
               <td class="text-left"><?php if($tip==1) {echo $article->datum;}else if ($tip==2) {echo $article->dostava;}else {echo $article->datum;} ?></td>
               <td class="text-left"><?php if($tip==1) {echo $article->vreme;}else if ($tip==2) {echo $article->dodaci;}else {echo $article->vreme;} ?></td>
               <td class="text-left"><?php if($tip==1) {echo $article->mesto;}else if ($tip==2) {echo $article->vreme;}else {echo $article->id;} ?></td>
               
               
               
           </tr>
           
        <?php endforeach; }?>
            </tbody>
        </table>
      </div>
<footer class="footer-distributed">

			<div class="footer-left">

				<h3>Nis4you</h3>

				<p class="footer-links">
					<a href="index.php">Početna</a>
					·
					<a href="../index.php">Website</a>
					·
          <a href="../food.php">Food</a>
          ·
          <a href="../nightlife.php">Nightlife</a>
          ·
          <a href="../events.php">Events</a>
          ·

				</p>

				<p class="footer-company-name">Nisforyou © 2016</p>
			</div>

			<div class="footer-center">

				<div>
					<i class="fa fa-map-marker"></i>
					<p><span>Niš</span> 18 000 , Serbia</p>
				</div>

				<div>
					<i class="fa fa-phone"></i>
					<p>+1 555 123456</p>
				</div>

				<div>
					<i class="fa fa-envelope"></i>
					<p><a href="mailto:support@company.com">nis4zou.azurewebsites.net</a></p>
				</div>

			</div>

			<div class="footer-right">

				<p class="footer-company-about">
					<span>O strani Nis4you</span>
					Ovo je mesto na kome se možete informisati o raznim događajima u Nišu.
				</p>

				<div class="footer-icons">

                                    <a href="https://www.facebook.com/"><img src="Css/face.png" ></a>
                                    <a href="https://twitter.com/?lang=en"><img src="Css/twit.png" ></a>
                                    <a href="https://www.linkedin.com/uas/login
"><img src="Css/link.jpg" ></a>
                                    <a href="https://mail.google.com/"><img src="Css/email.png" ></a>

				</div>

			</div>

		</footer>
 


      
      
  <script src="sorttable.js"></script>
  <script>
$("#search").keyup(function () {
    var value = this.value.toLowerCase().trim();

    $("table tr").each(function (index) {
        if (!index) return;
        $(this).find("td").each(function () {
            var id = $(this).text().toLowerCase().trim();
            var not_found = (id.indexOf(value) == -1);
            $(this).closest('tr').toggle(!not_found);
            return not_found;
        });
    });
});

$(function () {
    var $chk = $("#grpChkBox input:checkbox"); 
    var $tbl = $("#table");
    var $tblhead = $("#table th");
    
    $chk.prop('checked', true); 
    
    $chk.click(function () {
        var colToHide = $tblhead.filter("." + $(this).attr("name"));
        var index = $(colToHide).index();
        $tbl.find('tr :nth-child(' + (index + 1) + ')').toggle();
    });
});


  </script>
  <script src="nbproject/newjavascript.js"></script>
  <script src="nbproject/adminaddfood.js"></script>
  <script src="nbproject/deletefromdb.js"></script>
  </body>
</html>