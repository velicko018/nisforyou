<?php
class Lokal
{
    public $id;
    public $ime;
    public $adresa;
    public $ocena;
    public $opis;
    public $gmaps;
    public $slika;
    public $tip;
    public $telefon;
    public $info;
    public $komentari = array();

    

    function __construct($id, $ime, $adresa, $ocena, $opis, $gmaps, $slika, $tip, $telefon, $info, $komentari)
    {
        $this->id = $id;
        $this->ime = $ime;
        $this->adresa = $adresa;
        $this->ocena = $ocena;
        $this->opis = $opis;
        $this->gmaps = $gmaps;
        $this->slika = $slika;
        $this->tip = $tip;
        $this->telefon = $telefon;
        $this->info = $info;
        $this->komentari = $komentari;
    }

    function DrawBox($lng)
    {
        if ($lng == "srb") {
           
           echo "<div class='sportbox boks'>";
            echo "<li>";
            echo "<a  href='nightlife.php?tip=$this->tip&id=$this->id'>";
            echo "<img alt='' src=$this->slika>";
            echo "<p>";
            echo "$this->ime";
            echo "</p>";   
            echo "</a>";
            echo "</div>";
        }
        if ($lng == "eng") {
            echo "<div class='sportbox boks'>";
            echo "<li>";
            echo "<a  href='nightlife.php?tip=$this->tip&id=$this->id'>";
            echo "<img    alt='' src=$this->slika>";
            echo "<p class='text' >";
            echo "$this->ime";
            echo "</p>";
            echo "</a>";
            echo "</div>";
        }
    }






    function DrawForm($lng)
    {
        $komentari = array();
        $conn = mysqli_connect("localhost", "root", "", "nisforyou");
        $conn->set_charset("utf8");
        // Check connection
        if ($conn->connect_error) {
            die("Connection failed: " . $conn->connect_error);
        }
        $sql4 = "select * from komentarinl where id=$this->id";
        $result4 = $conn->query($sql4);
        if ($result4 && $result4->num_rows > 0) {
            $m = 0;
            while ($row4 = mysqli_fetch_assoc($result4)) {

                $komentari[$m++] = new Komentar($row4['idd'], $row4['id'], $row4['username'], $row4['komentar']);
            }
        }
        $this->komentari = $komentari;
        if ($lng == "srb") 
        {
            $datum = "Izaberite datum";
            $tiplokala = "Izaberite tip objekta";
            $lokal = "Izaberite lokal";
            $tipsedenja = "Izaberite kategoriju mesta";
            $vreme = "Upišite vreme dolaska (primer: 23:30)";
            $brojosoba = "Broj osoba";
            $ime = "Ime i prezime na koje želite da glasi rezervacija";
            $telefon = "Kontakt telefon na koji želite da vam potvrdimo rezervaciju";
            $rezervacija = "Rezervacija";
            $dugme = "Rezerviši";
            $Tip = array("Klubovi", "Kafane", "Kafići", "Pivnice");
            $Osobe = array("1 osoba", "2 osobe", "4 osobe", "5 do 6 osoba", "7 do 9 osoba", "10 i više osoba");
            $Ocena = "Ocena: ";
            $tel = "Telefon: "; 
            $lokacija = "Adresa: ";
        }
        if ($lng == "eng") 
        {
            $datum = "Choose date";
            $tiplokala = "Choose type of the place";
            $lokal = "Choose place";
            $tipsedenja = "Choose type of the table";
            $vreme = "Enter the arrival time (e.g. 22:30)";
            $brojosoba = "How many people";
            $ime = "Full name";
            $telefon = "Phone number";
            $rezervacija = "Reservation";
            $dugme = "Reserve";
            $Tip = array("Clubs", "Taverns", "Cafe", "Pubs");
            $Osobe = array("1 person", "2 persons", "4 persons", "5-6 persons", "7-9 persons", "10+ persons");
            $Ocena = "Rate: ";
            $tel = "Phone: "; 
            $lokacija = "Location: ";   
        }
        echo "<center><div class='nl'>";
            echo "<div class='nlbox'>";
            echo "<h>$this->ime</h><br>";
            if($_SESSION['lng']== "srb")
                echo "<p>$this->opis</p>";
            if($_SESSION['lng'] == "eng")
                echo "<p>$this->info</p>";
           
            echo "</div>";
            echo '<div class="row">
            <div class="box">
            
                <div class="col-lg-12 text-center">
                    <div id="carousel-example-generic" class="carousel slide">
                       
                        <ol class="carousel-indicators hidden-xs">
                            <li data-target="#carousel-example-generic" data-slide-to="0" class="active"></li>
                            <li data-target="#carousel-example-generic" data-slide-to="1"></li>
                            <li data-target="#carousel-example-generic" data-slide-to="2"></li>
                            <li data-target="#carousel-example-generic" data-slide-to="3"></li>
                            <li data-target="#carousel-example-generic" data-slide-to="4"></li>
                            <li data-target="#carousel-example-generic" data-slide-to="5"></li>
                            <li data-target="#carousel-example-generic" data-slide-to="6"></li>
                        </ol>

                        
                        <div class="carousel-inner">';
                        echo '<div class="item active">
                                <img class="img-responsive img-full" src="img/strana/'.$this->id.'/1.jpg" alt="">
                            </div>';
                        for ($i=2; $i <8 ; $i++) 
                        { 

                            echo '<div class="item">
                                <img class="img-responsive img-full" src="img/strana/'.$this->id.'/'.$i.'.jpg" alt="">
                            </div>';
                        }
                        echo '</div>
                            
                       
                         
                        <a class="left carousel-control" href="#carousel-example-generic" data-slide="prev">
                            <span class="icon-prev"></span>
                        </a>
                        <a class="right carousel-control" href="#carousel-example-generic" data-slide="next">
                            <span class="icon-next"></span>
                        </a>
                    </div>
                    
                    
                </div>
            </div>
        </div>';
        
        echo "<iframe src='$this->gmaps'></iframe>";
        echo "<p><strong>".$Ocena."</strong> $this->ocena </p>";
        echo "<p><strong>".$tel." </strong> $this->telefon </p>";
        echo "<p><strong>".$lokacija." </strong> $this->adresa </p>";
        echo "</div></center>";
        echo '<button type="button" id="rezbtn" data-toggle="modal" data-target="#myModal">'.$rezervacija.'</button>';

        echo '<div id="myModal" class="modal fade" role="dialog">
                <div class="modal-dialog">

                    <!-- Modal content-->
                    <div class="modal-content">
                        <div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal">&times;</button>
                            <h4 class="modal-title">'.$rezervacija.'</h4>
                        </div>
                    <div class="modal-body">
                        <center class="reservationbox">
            
                            <ul id="reservationlist" class="">            
                                <li class="listared">   
                                    <label class="labela col-xs-12" for="datumdog">'.$datum.'<span class="obavezno">*</span></label>
                                    <div class="red">
                                        <select name="datum" id="datumdog" class=" col-xs-12 ">
                                            <option value="" selected="selected"></option>
                                            <option value="2016-07-01">01. Jul - PETAK</option>
                                            <option value="2016-07-02">02. Jul - SUBOTA</option>
                                        </select>
                                    </div>
                                </li>
                                <li class="listared">   
                                    <label class="labela col-xs-12" for="tiplokala">'.$tiplokala.'<span class="obavezno">*</span></label>
                                    <div class="red">
                                        <select name="tiplokala" id="tiplokalaf" class=" col-xs-12 " >
                                            <option value="" selected="selected"></option>
                                            <option value="club">'.$Tip[0].'</option>
                                            <option value="tavern">'.$Tip[1].'</option>
                                            <option value="caffe">'.$Tip[2].'</option>
                                            <option value="pub">'.$Tip[3].'</option>
                                        </select>
                                    </div>
                                </li>
                                <li class="listared"> 
                                    <label class="labela  col-xs-12" for="lokal">'.$lokal.'<span class="obavezno">*</span></label>
                                         <div class="red">
                                         <select name="lokal" id="lokal" class=" col-xs-12 ">
                                             <option value="" selected="selected"></option>
                                         </select>
                                     </div>
                                </li>
                                <li class="listared">
                                <label class="labela  col-xs-12" for="tipsedenja">'.$tipsedenja.'<span class="obavezno">*</span>
                                </label>
                                    <div class="red">                                                   
                                        <select name="tipsedenja" id="tipsedenja" class="-8 col-xs-12 ">
                                            <option value="" selected="selected"></option>
                                        </select>
                                    </div>
                                </li> 
                                <li class="listared">
                                    <label class="labela" for="timet">'.$vreme.'<span class="obavezno">*</span></label>
                                    <div class="">
                                        <input name="timet" id="timet" value="" class=" col-xs-12" type="text">
                                    </div>
                                </li>
                                <li class="listared">               
                                    <label class="labela " for="brojosoba">'.$brojosoba.'<span class="obavezno">*</span></label>
                                    <div class="red">
                                        <select name="brojosoba" id="brojosoba" class=" col-xs-12 ">
                                           <option value="" selected="selected"></option>
                                           <option value="1 osoba">'.$Osobe[0].'</option>
                                           <option value="2 osobe">'.$Osobe[1].'</option>
                                           <option value="4 osobe">'.$Osobe[2].'</option>
                                           <option value="5 do 6 osoba">'.$Osobe[3].'</option>
                                           <option value="7 do 9 osoba">'.$Osobe[4].'</option>
                                           <option value="10 i više osoba">'.$Osobe[5].'</option>  
                                       </select>
                                    </div>
                                </li>
                                <li class="listared">
                                   <label class="labela" for="name">'.$ime.'<span class="obavezno">*</span></label>
                                   <div class="">
                                       <input name="name" id="name" value="" class=" col-xs-12" type="text">
                                   </div>
                                </li>
                                <li class="listared">
                                    <label class="labela" for="phone">'.$telefon.'<span class="obavezno">*</span></label>
                                    <div class="">
                                        <input name="phone" id="phone" value="" class=" col-xs-12" type="text">
                                    </div>
                                </li>                                      
                            </ul>
                            <input type="submit" id= "rezbtnmodal" value="'.$dugme.'">
                        </center>
                        <div id="result1"></div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" id="rezbtnmodalclose" class="" data-dismiss="modal">Close</button>
                    </div>
                </div>
            </div>
        </div>';

        $id=$this->id;
        echo '<input type="hidden"  value="'.$id. '"id="product_id">';
        echo'   <div class="containerStar">
                    <div id="star-container">
                        <i class="fa fa-star fa-3x star" id="star-1"></i>
                        <i class="fa fa-star fa-3x star" id="star-2"></i>
                        <i class="fa fa-star fa-3x star" id="star-3"></i>
                        <i class="fa fa-star fa-3x star" id="star-4"></i>
                        <i class="fa fa-star fa-3x star" id="star-5"></i>
                    </div>
                    <div id="result"></div>
                </div>';
     
        $num = 0;
        foreach($this->komentari as $tmp) $num++;
        if($lng=="eng")
        echo "<hr><h4 id='broj_komentara'>Comments ($num)</h3><hr>";
        if($lng=="srb")
        echo "<hr><h4 id='broj_komentara'>Komentari ($num)</h4><hr>";
        echo "<div id='mesto_za_komentare'>";

        if(!isset($_GET['PrikaziSveKomentare']))
        {
            $broj_prikazanih_komentara = 0;
            foreach ($this->komentari as $tmp)
            {
                if($broj_prikazanih_komentara<4)
                {
                    echo "<div class='komentar'>";
                    if(isset($_SESSION['user']) && ($_SESSION['user']->admin == 1))
                    {
                        echo "<a href='?id=$this->id&komentar=$tmp->idd'><img src='images/delete.png'></img></a>"; 
                    }
                    echo "<p1>$tmp->username</p1><br>";
                    echo "<p id='komentar'>$tmp->komentar</p><br>";
                    echo "</div>";
                    $broj_prikazanih_komentara++;
                }
            }
            if($broj_prikazanih_komentara == 4)
            {
                    echo "<form method = 'get' action=''>";
                        echo "<input type = 'hidden' name='tip' value = $this->tip>";
                        echo "<input type = 'hidden' name='id' value = $this->id>";
                        echo "<input type = 'hidden' name='PrikaziSveKomentare' value = '1'>";
                        if($_SESSION['lng']=="eng")
                        echo "<input type = 'submit' value = 'Show all'>";
                        if($_SESSION['lng']=="srb")
                        echo "<input type = 'submit' value = 'Prikaži sve'>";
                    echo "</form>";
            }
        }
        else
        {
            foreach ($this->komentari as $tmp)
            {
                    echo "<div class='komentar'>";
                    if(isset($_SESSION['user']) && ($_SESSION['user']->admin == 1))
                    {
                        
                        echo "<a href='?id=$this->id&komentar=$tmp->idd'><img src='images/delete.png'></img></a>"; 
                    }
                    echo "<p1>$tmp->username</p1><br>";
                    echo "<p id='komentar'>$tmp->komentar</p><br>";
                    echo "</div>"; 
            }   
        }

        echo "</div>";
        echo "<hr>";
        echo "<form method='post' onsubmit='return postComment();' id='leaveacomment'>";
            echo "<div class='komentar komentarisanje' >";
            if($lng=="eng")
            echo "<p1>Leave a comment:</p1>";
            if($lng=="srb")
            echo "<p1>Ostavi komentar:</p1>";
            echo "<input type=hidden  id='ajaxid' value=$this->id>";
            echo "<textarea rows='5' id='textarea'></textarea>";
            echo "<input type=submit id='submit' value=submit>";
            echo "</div>";
        echo "</form>";

       
    }
}

function DrawMenuNightLife($lng)
{
            if($lng=="srb") echo'
                <li><a class="linkovi" href="nightlife.php?tip=club">Klubovi</a></li>
                <li><a class="linkovi" href="nightlife.php?tip=pub">Pivnice</a></li>
                <li><a class="linkovi" href="nightlife.php?tip=caffe">Kafići</a></li>
                <li><a class="linkovi" href="nightlife.php?tip=tavern">Kafane</a></li>';
            if($lng=="eng") echo'
                <li><a class="linkovi" href="nightlife.php?tip=club">Clubs</a></li>
                <li><a class="linkovi" href="nightlife.php?tip=pub">Pubs</a></li>
                <li><a class="linkovi" href="nightlife.php?tip=caffe">Cafe</a></li>
                <li><a class="linkovi" href="nightlife.php?tip=tavern">Taverns</a></li>';
}

function DrawAll($tip,$lng,$crtaj)
{
    $lokali = array();
    $conn = mysqli_connect("localhost", "root", "", "nisforyou");
    $conn->set_charset("utf8");
    // Check connection
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }
    $sql = "select * from nllokali where tip='$tip'";
    $result = $conn->query($sql);
    if ($result->num_rows > 0) {
        while ($row = mysqli_fetch_assoc($result)) {
            $id = $row['idres'];
            $lokali[$id] = new Lokal($id, $row['ime'], $row['adresa'], $row['ocena'], $row['opis'], $row['gmaps'], $row['slika'], $row['tip'], $row['telefon'], $row['info'], null);
        }
    }
    if($crtaj === true)
    foreach ($lokali as $tmp) {
        $tmp->DrawBox($lng);
    }

    return $lokali;
}
function DeleteCommentNl($idd)
{
    $conn = mysqli_connect("localhost", "root", "", "nisforyou");
    $conn->set_charset("utf8");
        // Check connection
        if ($conn->connect_error) 
        {
            die("Connection failed: " . $conn->connect_error);
        }
    $sql = "delete from komentarinl where idd = '$idd'";
        
    if($result = $conn->query($sql))
    {
        echo "<script>Alert('Izbrisano');</script>";
    }
    else
    {
        echo "<script>Alert('Nije izbrisano');</script>";
    }
}


function postaviKomentarNL()
{
    include_once "php/nightlife/comments.php";
    if(isset($_POST['komentar']))
    {
        echo "<script>alert('uso sam')</script>";
        $username = null;
        if(isset($_SESSION['user']))
        {
            $username =  $_SESSION['user']->name;
            $conn = mysqli_connect("localhost", "root", "", "nisforyou");
             $conn->set_charset("utf8");
            // Check connection
            if ($conn->connect_error) 
            {
                die("Connection failed: " . $conn->connect_error);
            }
            $id = $_POST['id'];
            $komentar = $_POST['komentar'];
            $sql = "insert into komentarinl (id,username,komentar) values ('$id','$username','$komentar')";
            if($conn->query($sql)){}
                $conn->close();
        }
        else
        {
            if($_SESSION['lng']=="eng")
           {
               echo "<script>alert('Please login.');</script>";
           }
           if($_SESSION['lng']=="srb")
           {
               echo "<script>alert('Molimo vas da se ulogujete.');</script>";
           }
        }
    }
}