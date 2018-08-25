<link rel="stylesheet" type="text/css" href="css/food.css">
<link rel="stylesheet" type="text/css" href="css/nightlife.css">
<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */


function Search($tag)
{   
    $output="";
    $exists=0;
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
    $searching=$tag;
    // $searching=preg_replace("#[^0-9a-z]#i","",$searching);
    //========================================Events========================================================

    $query= $conn->query("SELECT * FROM dogadjaj WHERE tag LIKE '%$searching%'");
    $exists+=$query->num_rows;
    
    if($exists==0){}
    else
    {

       foreach($query as $row)
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
                $sql4 = "select * from komentari where id=$id";
                $result4 = $conn->query($sql4);
                if($result4 && $result4->num_rows>0) //da li postoji i da li je res veci od nule
                {
                  $m=0;
                  while($row4 = mysqli_fetch_assoc($result4))
                  {
                     
                      $komentari[$m++] = new Komentar($row4['idd'],$row4['id'], $row4['username'],$row4['komentar']);
                  }
                }
                $kategorija = new Dogadjaj($row['id'],$row['ime'],$row['datum'],$row['end_date'],$row['vreme'],$row['mesto'],$row['tip'],$row['podtip'],$row['slika'],$row['opis'],$pozicije,$rejtovi,$komentari,$row['videourl'],$row['organizator'],$row['url_eventa']);
                $kategorija->DrawBox($_SESSION["lng"]);             
        }
    }
 //========================================</Events>============================================================

//===================================================================================================
    //food restorani

    $sql = "Select * from lokal where tag like '%$searching%'";
              
         $result = $conn->query($sql);
         $exists+=$result->num_rows;
            if ($result && $result->num_rows > 0)
            {
              
                while( $row = mysqli_fetch_assoc($result))
                { 

                    $id = $row['idres'];
                   // echo "<script>alert('$id');</script>";
                    $sql1 = "select tip from tiplokala where idlokala = $id";
                    $result1 = $conn->query($sql1);

                    if($result1 && $result1->num_rows > 0)
                    {
                      //echo "<script>alert('uso sam ovde');</script>";
                      $tip = mysqli_fetch_assoc($result1);
                    }
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
                    $kategorija1[$id] = new LLokal($id,$row['ime'],$row['adresa'],$row['ocena'],$row['opis'],$row['mail'],$row['slika'],$row['tag'],$tip['tip'],$komentari);
                }
                foreach($kategorija1 as $tmp)
                      $tmp->DrawBox($_SESSION["lng"]);
            }
    //hrana
     $sql = "Select * from hrana where tag like '%$searching%'";
              
         $result = $conn->query($sql);
         $exists+=$result->num_rows;
          
            if ($result->num_rows > 0)
            {
                while( $row = mysqli_fetch_assoc($result))
                {
                    // echo "<script>alert('uso sam');</script>";
                    $meni[$row['idhrana']] = new Hrana($row['idhrana'],$row['idres'],$row['ime'],$row['opis'],$row['slika'],$row['tip']);
                }
            
            
                foreach($meni as $tmp)
                      $tmp->DrawBoxHrana($_SESSION["lng"]);
            }           


    //==================================================================
  //================================NightLife=======================================================
    $sql = "SELECT * FROM nllokali WHERE tag LIKE '%$searching%'";
    $result = $conn->query($sql);
    $exists+=$result->num_rows;
    $lokali = array();
    $komentari = array();
    if ($result && $result->num_rows > 0) 
      {
        while ($row = mysqli_fetch_assoc($result))
        {
            $id = $row['idres'];
            $sql4 = "select * from komentarinl where id=$id";
                $result4 = $conn->query($sql4);
                if($result4 && $result4->num_rows>0) //da li postoji i da li je res veci od nule
                {
                  $m=0;
                  while($row4 = mysqli_fetch_assoc($result4))
                  {
                     
                      $komentari[$m++] = new Komentar($row4['idd'],$row4['id'], $row4['username'],$row4['komentar']);
                  }
                }
            $id = $row['idres'];
            $lokali[$id] = new Lokal($id, $row['ime'], $row['adresa'], $row['ocena'], $row['opis'], $row['gmaps'], $row['slika'], $row['tip'], $row['telefon'],$row['info'],$komentari);
        
      }
    foreach ($lokali as $tmp) {
        $tmp->DrawBox($_SESSION['lng']);
    }
  }
///krajjj==========================================
   if($exists==0)
    {
       if($_SESSION['lng']=='eng') echo "<p>There is no results.</p>";
       if($_SESSION['lng']=='srb') echo "<p>Nema rezultata.</p>";
    }
  
} 
function SearchForm()
{
       echo '<form class="search visiblesearch" method="post">
            <input type="text" name="search" placeholder="Search..">
          </form>';
}