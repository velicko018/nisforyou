<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
include "php/events/comments.php";

class Pozicija implements JsonSerializable
{
    public $pozicija;
    public $cena;
    public $valuta;
    
    function __construct($ime,$cena,$valuta) 
    {
        $this->cena=$cena;
        $this->pozicija=$ime;
        $this->valuta=$valuta;
    }

    public function jsonSerialize() {
        return array(
            'cena'=>$this->cena,
            'pozicija'=>$this->pozicija,
            'valuta'=>$this->valuta
            );
    }

}

class Dogadjaj implements JsonSerializable
{
    public $id;
    public $ime;
    public $datum;
    public $kraj_datum;
    public $vreme;
    public $mesto;
    public $tip;
    public $podtip;
    public $slika;
    public $opis;
    public $pozicije = array();
    public $rejtovi = array();
    public $komentari = array();
    public $videourl;
    public $organizator;
    public $url_eventa;
            
    function __construct($id,$ime,$datum,$kraj,$vreme,$mesto,$tip,$podtip,$slika,$opis,$pozicije,$rejtovi,$komentari,$videourl,$organizator,$url_eventa) 
    {
        $this->id=$id;
        $this->ime=$ime;
        $this->datum=$datum;
        $this->kraj_datum=$kraj;
        $this->vreme=$vreme;
        $this->mesto=$mesto;
        $this->tip = $tip;
        $this->podtip=$podtip;
        $this->slika=$slika;
        $this->opis=$opis;
        $this->pozicije=$pozicije;
        $this->komentari = $komentari;
        $this->rejtovi = $rejtovi;
        $this->videourl = $videourl;
        $this->organizator = $organizator;
        $this->url_eventa = $url_eventa;
    }
    public function jsonSerialize()
    {
        return array(
            'id'=>$this->id,
            'ime'=>$this->ime,
            'datum'=>$this->datum,
            'vreme'=>$this->vreme,
            'mesto'=>$this->mesto,
            'podtip'=>$this->podtip,
            'slika'=>$this->slika,
            'opis'=>$this->opis,
            'pozicije'=>$this->pozicije
        
    );
        
    }
    function DrawBox($lng)
    {
        if($lng=="srb")
        {
            echo "<div class='sportbox'>";
                echo "<a href='events.php?tip=$this->tip&id=$this->id'>";
                 echo "<img src='$this->slika'>";
                 echo "<p>$this->podtip</p>";
                 echo "<h><strong>$this->ime</strong></h>";
                 if($this->datum == $this->kraj_datum)
                     echo "<p>$this->datum</p>";
                 else echo "<p>$this->datum - $this->kraj_datum</p>";
                 echo "<p id='mestasce'>$this->mesto</p>";
                 echo "</a>";
            echo "</div>";
        }
        if($lng=="eng")
        {
            echo "<div class='sportbox'>";
                 echo "<a href='events.php?tip=$this->tip&id=$this->id'>";
                 echo "<img src='$this->slika'>";
                 echo "<p>$this->podtip</p>";
                 echo "<h><strong>$this->ime</strong></h>";
                 if($this->datum == $this->kraj_datum)
                     echo "<p>$this->datum</p>";
                 else echo "<p>$this->datum - $this->kraj_datum</p>";
                 echo "<p id='mestasce'>$this->mesto</p>";
                 echo "</a>";

            echo "</div>";
        }
    }
    function DrawForm($lng)
    {           $komentari=array();
                $conn = mysqli_connect("localhost", "root", "", "nisforyou");
                $conn->set_charset("utf8");
                    // Check connection
                    if ($conn->connect_error) 
                    {
                        die("Connection failed: " . $conn->connect_error);
                    }
                $sql4 = "select * from komentariEvents where id=$this->id";
                $result4 = $conn->query($sql4);
                if($result4->num_rows>0)
                {
                  $m=0;
                  while($row4 = mysqli_fetch_assoc($result4))
                  {
                     
                      $komentari[$m++] = new Komentar($row4['idd'],$row4['id'], $row4['username'],$row4['komentar']);
                  }
                }
               $this->komentari = $komentari;
        if($lng=="srb")
        {
            echo "<center><div class='karte'>"; 
                echo "<div class='kartebox'><center>";
                    echo "<h>$this->ime</h><br>";
                    if($this->datum == $this->kraj_datum)
                    {
                        echo "<p>Datum: $this->datum</p>";
                        echo "<p>Vreme: $this->vreme</p>";
                    }
                    else echo "<p>Datum: $this->datum - $this->kraj_datum</p>";
                    // echo "<p>Organizator: $this->organizator</p>";
                    echo "<img src='$this->slika'>";
                    echo "<p id='opis'>$this->opis</p><br>";
                    if($this->url_eventa != "")
                    echo "<p>Više o ovome možete pročitati <a href='$this->url_eventa'>ovde</a>.</p>";
                     if($this->videourl != "")
                    {
                        $url = $this->videourl;
                        // $url.="&output=embed";
                        echo "<div class='kartebox'><iframe src='$url' crolling='auto' align='center'></iframe></div><br>";
                    }
                echo "</center></div>";
               
           if(count($this->pozicije) > 0)
                     {
                echo "<div class='kartebox'>";
                    echo "<p>Rezerviši ulaznice:</p>";
                    echo "<form action='events.php?id=$this->id' method = 'post'>";
                    echo "<p>Izaberi mesto:</p>";
                   // echo "<script>alert('$this->pozicije.count()');</script>";
                     
                        echo "<select name='cena' id='position'>";
                               echo "<option>Izaberi..</option>";

                              foreach($this->pozicije as $tmp)
                                  echo "<option value=$tmp->cena>$tmp->pozicija</option>";
                        echo "</select>";
         
                    echo "<p>Količina:</p>";
                    echo '<div class="kolicina">    
                            <input id="qty" name="kolicina" value="1">
                            <button type="button" id="down" onclick="modify_qty(-1)">-</button>
                            <button type="button" id="up" onclick="modify_qty(1)">+</button>
                        </div>';
                    echo "<p id='labelcena'>Cena:</p>";
                    echo "<input type='text' name='cena' id='cena' disabled>";
                    echo "<input type='hidden' name='ime' value='$this->ime'>";
                    echo "<input type='hidden' name='id' value=$this->id>";
                    echo "<input type='hidden' name='pozicija' id='post_pozicija'>";
                    echo "<input type='submit' class='button' name='ukorpu' value='Dodaj u korpu'>";
                    echo "</form>";
                echo "</div>";
                
            echo "</div></center>";
        }
         else echo "<p>Ulaz je besplatan.</p>";
        }
        if($lng=="eng")
        {
            echo "<center><div class='karte'>"; 
                echo "<div class='kartebox'>";
                    echo "<h>$this->ime</h><br>";
                    echo "<p>Date: $this->datum</p>";
                    echo "<p>Time: $this->vreme</p>";
                    // echo "<p>Organizer: $this->organizator</p>";
                    echo "<img src='$this->slika'><br>";
                    echo "<p id='opis'>$this->opis</p><br>";
                    if($this->url_eventa != "")
                    echo "<p>More about this can be read <a href='$this->url_eventa'>here</a>.</p>";
                     if($this->videourl != "")
                    {
                        $url = $this->videourl;
                        // $url.="&output=embed";
                        echo "<center><iframe src='$url' scrolling='auto' align='center'></iframe></center><br>";
                    }
                echo "</div>";  
            if(count($this->pozicije) > 0)
             {                     
                echo "<div class='kartebox'>";
                    echo "<p>Reserve tickets:</p>";
                    echo "<form action='events.php?id=$this->id' method = 'post'>";
                    echo "<p>Choose position:</p>";
                    echo "<select name='cena' id='position'>";
                           echo "<option>Choose..</option>";
                          foreach($this->pozicije as $tmp)
                              echo "<option value=$tmp->cena>$tmp->pozicija

                                    </option>";
                    echo "</select>";

                    echo "<p>Quantity:</p>";
                    echo '<div class="kolicina">    
                            <input id="qty" name="kolicina" value="1">
                            <button type="button" id="down" onclick="modify_qty(-1)">-1</button>
                            <button type="button" id="up" onclick="modify_qty(1)">+1</button>
                        </div>';
                    echo "<p>Price:</p>";
                    echo "<input type='text'  id='cena' disabled>";
                    echo "<input type='hidden' name='ime' value='$this->ime'>";
                     echo "<input type='hidden' name='id' value=$this->id>";
                     echo "<input type='hidden' name='pozicija' id='post_pozicija'>";
                    echo "<input type='submit' class='button' name='ukorpu' value='Add to Cart'>";
                    echo "</form>"; 
                echo "</div>";
            echo "</div></center>";
        } else echo "<p>Admission is free</p>";
        }
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


function KategorijeEvents($tip,$lng,$crtaj)
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
    $sql = "Select * from dogadjaj where dogadjaj.tip = '$tip'";
        
    $result = $conn->query($sql);
        if ($result->num_rows > 0)
        {
            while( $row = mysqli_fetch_assoc($result))
            {
                $id = $row['id'];
                $pozicije = array();
                $rejtovi = array();
                $komentari = array();
                
                $sql2 = "select cena, mesto,valuta from pozicija where id=$id";
                $result2 = $conn->query($sql2);
                if($result2->num_rows>0)
                {
                  $m=0;
                  while($row2 = mysqli_fetch_assoc($result2))
                  {
                     
                      $pozicije[$m++] = new Pozicija($row2['mesto'], $row2['cena'],$row2['valuta']);
                  }
                }
                $sql3 = "select * from rateing where id=$id";
                $result3 = $conn->query($sql3);
                if($result3->num_rows>0)
                {
                  $m=0;
                  while($row3 = mysqli_fetch_assoc($result3))
                  {
                     
                      $rejting[$m++] = new Rejting($row3['id'], $row3['username'],$row3['ocena']);
                  }
                }
                $sql4 = "select * from komentariEvents where id=$id";
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
                    $opis = $row['opis_eng'];
                if($_SESSION['lng']=="srb")
                    $opis = $row['opis'];

                $kategorija[$id] = new Dogadjaj($row['id'],$row['ime'],$row['datum'],$row['end_date'],$row['vreme'],$row['mesto'],$tip,$row['podtip'],$row['slika'],$opis,$pozicije,$rejtovi,$komentari,$row['videourl'],$row['organizator'],$row['url_eventa']);
            }
        }
        if($crtaj === true)
        foreach($kategorija as $tmp)
        $tmp->DrawBox($lng);
        return $kategorija;
}

function DeleteComment($idd)
{
    $conn = mysqli_connect("localhost", "root", "", "nisforyou");
    $conn->set_charset("utf8");
        // Check connection
        if ($conn->connect_error) 
        {
            die("Connection failed: " . $conn->connect_error);
        }
    $sql = "delete from komentariEvents where idd = '$idd'";
        
    if($result = $conn->query($sql)) {}
    // {
    //     echo "<script>alert('Izbrisano');</script>";
    // }
    // else
    // {
    //     echo "<script>alert('Nije izbrisano');</script>";
    // }
}


function DodajEvent()
{
    echo "<form action='' method='post' class='dodajevent'>";
            echo '<p>Ime dogadjaja:</p>';
            echo "<input type='text' name='imedogadjaja'>";
            echo '<p>Datum:</p>';
            echo "<input type='text' name='datumdogadjaja'>";
            echo '<p>Datum kraja:</p>';
            echo "<input type='text' name='krajdogadjaja'>";
            echo '<p>Vreme:</p>';
            echo "<input type='text' name='vremedogadjaja'>";
            echo '<p>Mesto:</p>';
            echo "<input type='text' name='mestodogadjaja'>";
            echo '<p>Tip:</p>';
            echo "<input type='text' name='tipdogadjaja'>";
            echo '<p>podtip:</p>';
            echo "<input type='text' name='podtipdogadjaja'>";
            echo '<p>Tagovi:</p>';
            echo "<input type='text' name='tagdogadjaja'>";
            echo "<p>organizator</p>";
            echo "<input type='text' name='organizator'>";
            echo "<p>Url slike:</p>";
            echo "<input type = 'text' name = 'slikadogadjaja'>";
            echo "<hr>";
            echo "<p>Dodaj pozicije:</p>";
            echo "<p>Pozicija:</p><input type='text' name='pozicija' id='pozicija'>";
            echo "<p>Cena:</p><input type='text' name='cena' id='cena'><br>";
            echo "<input type='button'  value='Dodaj poziciju' onclick='dodaj_u_tabelu()' style='background-color:#444; color:white; margin-top:10px;'>";
               echo "<input type='hidden' name='brojac_za_pozicije' id ='brojac_za_pozicije' value='0'>";
                echo "<table name='tabela_pozicija'>";
                echo "<thead><th>Pozicija</th><th>Cena</th></thead>";
                echo "<tbody id='tabela_pozicija'></tbody>";
            echo "</table>";
            echo "<hr>";
            echo '<p>Opis:</p>';
            echo "<textarea rows='7' cols='55' name='opisdogadjaja'></textarea><br>";
            echo "<input type='submit' value='Ubaci u bazu' style='background-color:#444; color:white; margin-top:10px;'>";
    echo "</form>";
}
function insertEvent($i,$d,$v,$m,$t,$pt,$s,$o,$ed,$tag)
{
        $servername = "localhost";
        $username = "root";
        $password = "";
        $dbname = "nisforyou";

        $conn = mysqli_connect($servername, $username, $password, $dbname);
        $conn->set_charset("utf8");
        // Check connection
        if ($conn->connect_error) 
        {
            die("Connection failed: " . $conn->connect_error);
        } 
        $reg_date = date("Y-m-d");
    
        $sql = "INSERT INTO dogadjaj (ime,datum,vreme,mesto,tip,podtip,slika,opis,end_date,tag)"
                . "VALUES('$i','$d','$v','$m','$t','$pt','$s','$o','$ed','$tag')"; 
        if($result = $conn->query($sql))
        {
            echo "<script>alert('Dodato');</script>";
        }
        else
        {
            echo "<script>alert('Nije dodato');</script>";
        }
}
function DodajPozicijeDogadjaja($i,$pozicije)
{
        $servername = "localhost";
        $username = "root";
        $password = "";
        $dbname = "nisforyou";

    $conn = mysqli_connect($servername, $username, $password, $dbname);
    $conn->set_charset("utf8");
        // Check connection
        if ($conn->connect_error) 
        {
            die("Connection failed: " . $conn->connect_error);
        }
    $sql = "Select id from dogadjaj where dogadjaj.ime = '$i'";
        
    $result = $conn->query($sql);
    if ($result->num_rows > 0)
    {
        $row = mysqli_fetch_assoc($result);
        $id = $row['id'];
        echo $id;
       
        foreach ($pozicije as $tmp)
        {
            if($tmp!=null)
            {
            $sql = "insert into pozicija (id,cena,valuta,mesto) values ('$id','$tmp->cena','RSD','$tmp->pozicija')";
            if($conn->query($sql))
            {
                // echo "<script>alert('Uspesno upisano.');</script>";
            }
            else echo "<script>alert('Greska pri unisu pozicija u bazu.');</script>";
            }
        }
    }

    

}
function uKorpu()
{

    if(isset($_POST['ukorpu']))
    {
        
            if(!isset($_SESSION['cart']))
            {
                $_SESSION['cart']=array();
                $_SESSION['cart_counter']=0;
            }
            if($_SESSION['lng']=='eng')
                $ime="Tickets for ";
            if($_SESSION['lng']=='srb')
                $ime="Karte za ";
            $ime =$ime.$_POST['ime'];
            $ukorpu = new CartEventBOX($_POST['id'],$_POST['ime'],$_POST['kolicina'],$_POST['pozicija'],$_POST['cena'],"dogadjaj");
            if(strcmp($_POST['cena'],'Izaberi..')!= 0 && strcmp($_POST['cena'],'Choose..')!= 0  && $ukorpu->kolicina > 0)
            {
                if($_SESSION['cart'][$ukorpu->counter]= $ukorpu){} 
            }
            else 
            {
                if($_SESSION['lng']=="eng")
                {
                    echo "<script>alert('Invalid input.');</script>";
                }
                if($_SESSION['lng']=="srb")
                {
                    echo "<script>alert('Pogresan unos.');</script>";
                }
        
            }     
        
    }

}   
function postaviKomentar()
{
    if(isset($_POST['komentar']))
    {
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
            $sql = "insert into komentariEvents (id,username,komentar) values ('$id','$username','$komentar')";
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


function PrikaziSve()
{
    echo "<script>alert('radi')</script>";
}