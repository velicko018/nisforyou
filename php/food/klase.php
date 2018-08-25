<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
class LLokal
{
    public $id;
    public $ime;
    public $adresa;
    public $ocena;
    public $opis;
    public $mail;
    public $slika;
    public $tag;
    public $tip;
    public $komentari;

    function __construct($id,$ime,$adresa,$ocena,$opis,$mail,$slika,$tag,$tip,$komentari) 
    {
        $this->id=$id;
        $this->ime=$ime;
        $this->adresa=$adresa;
        $this->ocena=$ocena;
        $this->opis=$opis;
        $this->mail=$mail;
        $this->slika=$slika;
        $this->tag=$tag;
        $this->tip=$tip;
        $this->komentari = $komentari;
    }
    public function DrawBox($lng)
    {
        if($lng=="srb")
        {
            echo "<div class='sportbox'>";
            echo "<a href='food.php?tip=$this->tip&idres=$this->id'>";
            echo "<img src='$this->slika'></img>";
                 echo "<h><strong>$this->ime</strong></h>";
                 echo "<p>Ocena: $this->ocena</p>";
                 echo "<p>$this->adresa</p>";
                 echo "</a>";
            echo "</div>";
        }
        if($lng=="eng")
        {
            echo "<div class='sportbox'>";
            echo "<a href='food.php?tip=$this->tip&idres=$this->id'>";
                echo "<img src='$this->slika'></img>";

                 echo "<h><strong>$this->ime</strong></h>";
                 echo "<p>Mark: $this->ocena</p>";
                 echo "<p>$this->adresa</p>";
                 echo "</a>";

            echo "</div>";
        }
    }

    public function DrawForm($lng)
    {

        if($lng=="srb")
        {
            // echo "<center>";
                echo "<div class='hranabox'>";
                    echo "<h>$this->ime</h><br>";
                    echo "<img id='slikaKadOtvoris' src='$this->slika'></img>";
                    echo "<p>Ocena: $this->ocena</p>";
                    echo "<p>$this->adresa</p>";
                    echo "<p>$this->opis</p>";
                echo "</div>";
            // echo "</center>";
        }
        if($lng=="eng")
        {
            // echo "<center>"; 
                echo "<div class='hranabox'>";
                    echo "<h>$this->ime</h><br>";
                    echo "<img id='slikaKadOtvoris' src='$this->slika'></img>";
                    echo "<p>Rating: $this->ocena</p>";
                    echo "<p>$this->adresa</p>";
                    echo "<p>$this->opis</p>";
                echo "</div>";
            // echo "</center>";
        }
        //echo "<hr>";
        $id=$this->id;
        if($_SESSION['lng']=="eng") echo "<p>Rate:</p>";
        if($_SESSION['lng']=="srb") echo "<p>Oceni: </p>";
        echo '<input type="hidden"  value="'.$id. '"id="product_id">';
        echo'        <div class="containerStar">
                    <div id="star-container">
                        <i class="fa fa-star fa-3x star" id="star-1"></i>
                        <i class="fa fa-star fa-3x star" id="star-2"></i>
                        <i class="fa fa-star fa-3x star" id="star-3"></i>
                        <i class="fa fa-star fa-3x star" id="star-4"></i>
                        <i class="fa fa-star fa-3x star" id="star-5"></i>
                    </div>
                    <div id="result"></div>
                </div>';

        echo "<hr>";
    }
    function DrawKomentari($lng)
    {

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
    public function drawMeni($tip,$idres)
    {
        $conn = mysqli_connect("localhost","root","","nisforyou");
        $conn->set_charset('utf-8');
        
        $sql = "select distinct tip from hrana where idres=$this->id";
        
        $result = $conn->query($sql);
        $meni = array();
        $n=0;
        while($row = mysqli_fetch_assoc($result))
        {
            $meni[$n++] = $row['tip'];
        }

        if($_SESSION['lng']=="eng")
        {
            $meni_eng=array();
            $m=0;
            $sql = "select distinct type from hrana where idres=$this->id";
            $result = $conn->query($sql);
            while($row = mysqli_fetch_assoc($result))
            {
                $meni_eng[$m++] = $row['type'];
            }
        }
        echo "<div id='meni' class='eventsbar hranabar'><ul>";
            $i=0;
            while ( $i < $n) 
            {
                if($_SESSION['lng']=="srb")
                    $naziv = $meni[$i];
                else $naziv = $meni_eng[$i];
                echo "<li><a href='food.php?tip=$tip&idres=$idres&tiphrana=$meni[$i]'>$naziv</a></li>";
                $i++;
            }
        echo "</div>";
    }
}
 function Hranameni($tip,$lng,$res)
    {


    $meni=array();
    $conn = mysqli_connect("localhost", "root", "", "nisforyou");
    $conn->set_charset("utf8");
            // Check connection
            if ($conn->connect_error) 
            {
                die("Connection failed: " . $conn->connect_error);
            }
    $sql = "Select * from hrana where tip = '$tip' and idres='$res'";
    // echo "<script>alert('uso sam');</script>";
    $result = $conn->query($sql);
            if ($result->num_rows > 0)
            {
                while( $row = mysqli_fetch_assoc($result))
                {
                    // echo "<script>alert('uso sam');</script>";
                    if($_SESSION['lng']=="eng")
                        $opis = $row['opiseng'];
                    if($_SESSION['lng']=="srb")
                        $opis = $row['opis'];

                    $meni[$row['idhrana']] = new Hrana($row['idhrana'],$row['idres'],$row['ime'],$opis,$row['slika'],$row['tip']);
                }
            }
            return $meni;
            
    }

class Hrana
{
    public $idhrana;
    public $idres;
    public $imehrane;
    public $opis;
    public $slika;
    public $tip;
   // public $cena;

    function __construct($idhrana,$idres,$imehrane,$opis,$slika,$tip) 
    {
        $this->idhrana=$idhrana;
        $this->idres=$idres;
        $this->imehrane=$imehrane;
        $this->opis=$opis;
        $this->slika=$slika;
        $this->tip=$tip;
    }
    public function DrawBoxHrana($lng)
    {
        //echo "<script>alert('uso sam');</script>";
        $conn = mysqli_connect("localhost","root","","nisforyou");
        $conn->set_charset("utf8");
        $sql = "select tip from tiplokala where idlokala = $this->idres";
        $result = $conn->query($sql);
        if($result && $result->num_rows > 0)
        {
            $row = mysqli_fetch_assoc($result);
            $tip = $row['tip'];
            $tiphrane= $this->tip;
            if($lng=="srb")
            {
                
                echo "<div class='boxzahranu'>";
                echo "<img src='$this->slika'>";
                     echo "<h4><strong>$this->imehrane</strong></h4>";
                     echo "<p>Opis: $this->opis</p>";

                     echo "<a id='naruci' href='food.php?tip=$tip&idres=$this->idres&tiphrana=$tiphrane&idhrana=$this->idhrana'>Naruči</a>";

                echo "</div>";
            }
            if($lng=="eng")
            {   
                echo "<div class='boxzahranu'>";
                echo "<img src='$this->slika'>";
                     echo "<h4><strong>$this->imehrane</strong></h4>";
                     echo "<p>Opis: $this->opis</p>";
                     echo "<a id='naruci' href='food.php?tip=$tip&idres=$this->idres&tiphrana=$tiphrane&idhrana=$this->idhrana'>Order</a>";
                echo "</div>";
            }
        }
        $conn->close();
    }
}
function KategorijeFood($tip,$lng)
{
        $kategorija=array();
        $m=0;
        $conn = mysqli_connect("localhost", "root", "", "nisforyou");
        $conn->set_charset("utf8");
            // Check connection
            if ($conn->connect_error) 
            {
                die("Connection failed: " . $conn->connect_error);
            }
        $sql = "Select lokal.idres,lokal.ime,lokal.adresa,lokal.ocena,lokal.opis,lokal.opiseng,lokal.mail,lokal.slika,lokal.tag,tiplokala.tip from lokal inner join tiplokala on lokal.idres=tiplokala.idlokala where tiplokala.tip = '$tip'";
            
         $result = $conn->query($sql);
            if ($result->num_rows > 0)
            {
                while( $row = mysqli_fetch_assoc($result))
                {
                    $id = $row['idres'];
                    $komentari = array();
                     $sql4 = "select * from komentariFood where id=$id";
                        $result4 = $conn->query($sql4);
                        if($result4->num_rows>0)
                        {
                          $m=0;
                          while($row4 = mysqli_fetch_assoc($result4))
                          {
                             
                              $komentari[$m++] = new Komentar($row4['idd'],$row4['id'], $row4['username'],$row4['komentar']);
                          }
                        }

                    if($_SESSION['lng']=="eng")
                        $opis = $row['opiseng'];
                    if($_SESSION['lng']=="srb")
                        $opis = $row['opis'];
                        
                    $kategorija[$id] = new LLokal($id,$row['ime'],$row['adresa'],$row['ocena'],$opis,$row['mail'],$row['slika'],$row['tag'],$row['tip'],$komentari);
            }
        return $kategorija;
        }
}
class Dodatak
{
    public $iddod;
    public $imedodatka;
    public $cena;
    public $tip;

    function __construct($id,$ime,$cena,$tip) 
    {
        $this->iddod=$id;
        $this->imedodatka=$ime;
        $this->cena=$cena;
        $this->tip=$tip;
    }
}
function ImeRes($idhrana)
{
    $conn = mysqli_connect("localhost","root","","nisforyou");
        $conn->set_charset('utf-8');
        
        $sql = "select ime from lokal where idres=$idhrana";
        
        $result = $conn->query($sql);
        $row = mysqli_fetch_assoc($result);
        return $row['ime'];
}
function Naruci($hrana,$lng,$tip)
{
    echo '<script type="text/javascript" src="js/food/Listener.js"></script>';
    echo "<div class='forma'>";
    $imeres=ImeRes($hrana->idres);
    echo "<h><strong>$hrana->imehrane</strong></h><br>";
    echo "<img id='slikaKadOtvoris' src='$hrana->slika'></img><br><br>";
    echo "<p>Restoran: $imeres</p>";
    echo "<p>Opis: $hrana->opis</p>";
    echo "<form action='food.php' method='post' >";
    echo "<input type='hidden' name='idhrana' value='$hrana->idhrana'>";   
    echo "<input type='hidden' name='idres' value='$hrana->idres'>";
    echo "<input type='hidden' name='ime' value='$hrana->imehrane'>";
    //echo"<input type='hidden' name='user' value='$'>";
    echo "<hr>";
    echo "</center>";
    echo "<div class='leviIDesni'>";
    echo "<div class='levo'>";
    echo"<fieldset>";
    if($lng=="srb")
        echo'<legend>Izaberi:</legend>';
    else echo'<legend>Choose:</legend>';
    if($lng=="srb")
    {
        echo "<input type='radio' name='dostava' value='dostava' checked><span>Dostava</span><br>";
        echo "<input type='radio' name='dostava' value='narudzbina'><span>Narudzbina</span><br>";
    }
    else
    {
        echo "<input type='radio' name='dostava' value='dostava' checked><span>Delivery</span><br>";
        echo "<input type='radio' name='dostava' value='narudzbina'><span>Pick up</span><br>";
    }
    echo"</fieldset>";
    
    //echo "</div>";
    $conn = mysqli_connect("localhost", "root", "", "nisforyou");
        $conn->set_charset("utf8");
            // Check connection
            if ($conn->connect_error) 
            {
                die("Connection failed: " . $conn->connect_error);
            }
    $sql2 = "Select * from cenahrana where idhrane = $hrana->idhrana";
    $result2 = $conn->query($sql2);
            $cena = array();
           // echo "<div class='levo'>";
            echo"<fieldset>";
            if($lng=="srb")
                    echo'<legend>Cena:</legend>';
                else echo'<legend>Price:</legend>';
            if ($result2 && $result2->num_rows > 1)
                {                
                    $row = mysqli_fetch_assoc($result2);
                    $value = $row['cena'];
                    echo "<input type='radio' id='cena' name='cena' value='$value' checked>Mala  $value<br>";

                    $row = mysqli_fetch_assoc($result2);
                    $value  = $row['cena'];
                    echo "<input type='radio' id='cena1' name='cena' value='$value'>Velika   $value<br>";
                    echo "<br>";
                }
            if($result2->num_rows ==1)
                {
                    $row = mysqli_fetch_assoc($result2);
                    
                     $value = $row['cena'];
                    echo "<input type='radio' id='cena' name='cena' value='$value' checked> $value"; 
                     
                    
                }
            echo"</fieldset>";
            echo"</div>";
    $sql = "Select dodatak.iddod,dodatak.ime,dodatak.cena,dodatak.tiphrane from dodatak where dodatak.tiphrane like '%$hrana->tip%'";
    $result = $conn->query($sql);
            if ($result && $result->num_rows > 0)
            {                
                $dodaci = array();
                echo"<div class='desno'>";
                echo"<fieldset>";
                if($lng=="srb")
                    echo'<legend>Dodaci:</legend>';
                else echo'<legend>Adds:</legend>';
                while( $row = mysqli_fetch_assoc($result))
                {
                    $idd = $row['iddod'];
                    $dodaci[$idd] = new Dodatak($idd,$row['ime'],$row['cena'],$row['tiphrane']);
                    $string=$dodaci[$idd]->imedodatka;
                    $input_ime = parse_str($string);
                    echo "<input type='checkbox' name='dodatak[]' value='$string'><span>$string</span><br>";
                }
                 echo"</fieldset>";
                 
            }
            echo"</div></div>";
            // echo"<center>";

            echo "<div class='mestoZaKolicinu'>";

               if($_SESSION['lng']=="eng") echo "<p>Quantity:</p>";
               if($_SESSION['lng']=="srb") echo "<p>Količina:</p>";
                    echo '<div class="kolicina">    
                            <input id="qty" name="kolicina" value="1">
                            <button type="button" id="down" onclick="modify_qty(-1)">-1</button>
                            <button type="button" id="up" onclick="modify_qty(1)">+1</button>
                        </div>';
                    if($_SESSION['lng']=="eng") echo "<p>Price:</p>";
                    if($_SESSION['lng']=="srb") echo "<p>Cena:</p>";

                    echo "<input type='text' id='ukupno' disabled>";
            echo "</div>";


            echo "<br><div class='okvirZaDugme'><input type='submit' id='posalji' name='Dodajukorpu' value='Dodaj u korpu' ></div><br>";
            echo "</form>"; 
            echo"</div>";
}
class Cena
{
    public $idcena;
    public $idhrana;
    public $cena;

    function __construct($id,$hr,$cena) 
    {
        $this->idcena=$id;
        $this->idhrana=$hr;
        $this->cena=$cena;
    }
}
function HUKorpu($lng)
{
    $idhrana=$_POST["idhrana"];
    $idres=$_POST["idres"];
    $ime=$_POST["ime"];
    $dosnar=$_POST["dostava"];
    $cena=$_POST["cena"];
    $kolicina = $_POST['kolicina'];
    if($kolicina<1)
    {
        if($lng=="eng")
            echo "<script>alert('Quantity must be larger then 0');</script>";
        else echo "<script>alert('Kolicina mora biti veca od 0');</script>";
        return;
    }
    $dodaci="";
    if(isset($_POST['dodatak']))
    {
        $checkboxes = $_POST['dodatak'];
        if(!empty($checkboxes))
        {
            $n=count($checkboxes);
            for($i=0;$i<$n;$i++)
            {
                $dodaci=$dodaci." ".$checkboxes[$i];
            }
        }
    }
    $h= new HranaZaKorpu($_SESSION['hrana'][$idhrana],$kolicina,$dodaci,$cena,$dosnar);
    $_SESSION['hrana_u_korpi'][$h->id] = $h;

    if($lng=="eng")
    echo "<script>alert('Your order is now send to cart');</script>";
    else echo "<script>alert('Vaša narudžbina je poslata u korpu');</script>";
    
    // $sql2 = "insert into narucenahrana (restoran, idhrana,dostava,cena,dodaci,username_narucioca) VALUES('$imerestoran','$idhrana','$dosnar','$cena','$dodaci','$username');";
    // if($result = $conn->query($sql2))
    // {
    //     echo "<script>alert('Uspesna naruzdbina');</script>";
    // }
}

class HranaZaKorpu
{
    public $id;
    public $hrana;
    public $kolicina;
    public $cena;
    public $dodaci;
    public $dostava;

    public function __construct($hrana,$kolicina,$dodaci,$cena,$dostava)
    {
        $this->id=$_SESSION['brojac_za_hranu']++;   
        $this->hrana = $hrana;
        $this->kolicina = $kolicina;
        $this->dodaci = $dodaci;
        $this->dostava = $dostava;
        $this->cena = $cena;
    }
}
function postaviKomentarFD()
{
    include_once "php/food/comments.php";
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
            $sql = "insert into komentariFood (id,username,komentar) values ('$id','$username','$komentar')";
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
function DeleteCommentHrana($idd)
{
    $conn = mysqli_connect("localhost", "root", "", "nisforyou");
    $conn->set_charset("utf8");
        // Check connection
        if ($conn->connect_error) 
        {
            die("Connection failed: " . $conn->connect_error);
        }
    $sql = "delete from komentariFood where idd = '$idd'";
        
    if($result = $conn->query($sql)) {}
    // {
    //     echo "<script>alert('Izbrisano');</script>";
    // }
    // else
    // {
    //     echo "<script>alert('Nije izbrisano');</script>";
    // }
}
