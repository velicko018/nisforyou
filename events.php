<?php
    
    
    include "php/User.php";
    include "php/connection.php";
    include "php/navbar.php";
    
    session_start();
    
   if(!isset($_SESSION['user']))
   {
       $_SESSION['user'] = null;
       $_SESSION['loged'] = 0;
   }
   if(!isset($_SESSION['brojilo']))
    {
        $_SESSION['brojilo']=1;
    }
    if(!isset($_SESSION['lng']))
    {
        $_SESSION['lng']="srb";
    }
    if(isset($_POST['lng']))
    {
        $lng=$_POST['lng'];
        $_SESSION['lng']="$lng";
    }

    uKorpu();
    postaviKomentar();
    
     
    if(isset($_GET['komentar']))
    {
        if($_SESSION['user']!=null){
            $user = $_SESSION['user']->username;
            
            DeleteComment($_GET['komentar']);
        }
    }
    if(isset($_POST['imedogadjaja']))
    {
        $ime=$_POST['imedogadjaja'];
        $d=$_POST['datumdogadjaja'];
        $v=$_POST['vremedogadjaja'];
        $m=$_POST['mestodogadjaja'];
        $t=$_POST['tipdogadjaja'];
        $pt=$_POST['podtipdogadjaja'];
        $s=$_POST['slikadogadjaja'];
        $o=$_POST['opisdogadjaja'];
        $ed=$_POST['krajdogadjaja'];
        $tag=$_POST['tagdogadjaja'];

        if($ime!="" && $d!="" && $v!="" && $m!="" && $t!="" && $pt!="" && $s!="" && $ed!="" && $tag!="")
        {
            insertEvent($ime, $d, $v, $m, $t, $pt, $s, $o, $ed, $tag);
            $pozicije = array();
            for($i=0;$i<$_POST['brojac_za_pozicije'];$i+=2)
            {
                $j = $i+1;
                $pozicije["$j"] = new Pozicija($_POST["$i"], $_POST["$j"], "RSD");
            }
            DodajPozicijeDogadjaja($ime, $pozicije);
        }
    }
    tryToLogin();
?>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Niš for you - Events </title>
    
   
    
    <!-- Fonts -->
    <script type="text/javascript" src="js/events/events.js"></script>
    

</head>

<body>

   <?php NavBar($_SESSION['lng']); ?>
    
<center>
    <div id="kontejner">
        <div id="cont">
        <center>
            <hr>
            <?php
                if($_SESSION['lng']=="eng") echo '<h id ="desavanja">Events in Niš</h><br>';
                if($_SESSION['lng']=="srb") echo '<h id ="desavanja">Dešavanja u Nišu</h><br>';
            ?>
            <hr>

            <div class="eventsbar" >
            <ul>

            <?php
            if($_SESSION['lng']=="srb") echo'
                <li><a class="linkovi" href="events.php?tip=sport">Sport</a></li>
                <li><a class="linkovi" href="events.php?tip=muzika">Muzika</a></li>
                <li><a class="linkovi" href="events.php?tip=kultura">Kultura</a></li>
                <li><a class="linkovi" href="events.php?tip=drugo">Drugo</a></li>';
            if($_SESSION['lng']=="eng") echo'
                <li><a class="linkovi" href="events.php?tip=sport">Sport</a></li>
                <li><a class="linkovi" href="events.php?tip=muzika">Music</a></li>
                <li><a class="linkovi" href="events.php?tip=kultura">Culture</a></li>
                <li><a class="linkovi" href="events.php?tip=drugo">Other</a></li>';
            if(isset($_SESSION['user']) && $_SESSION['user']->admin == 1)
            {
                if($_SESSION['lng']=="srb")
                 echo '<li><a class="linkovi" href="events.php?tip=dodaj">Dodaj</a></li>';
                if($_SESSION['lng']=="eng")
                 echo '<li><a class="linkovi" href="events.php?tip=dodaj">Add</a></li>';
            }
             ?>
            </ul>   
            <hr>
            </div>
        
            <?php
            
                include "php/events/eventsbar.php";
            
                if(!isset ($_GET['tip']) && !isset($_GET['id']))
                {
                   $kategorija =  KategorijeEvents("sport",$_SESSION['lng'],true);
                   $_SESSION['kategorija']=$kategorija;
                   
                }
                else if(isset($_GET['tip']) && !isset($_GET['id']))
                {
                    $kategorija = KategorijeEvents($_GET['tip'],$_SESSION['lng'],true);
                    $_SESSION['kategorija']=$kategorija;
                }
                else if(isset($_GET['tip']) && isset($_GET['id']))
                {
                    $kategorija = KategorijeEvents($_GET['tip'],$_SESSION['lng'],false);
                    $_SESSION['kategorija']=$kategorija;
                }

                if(isset($_GET['id']))
                {
                    if(isset($_SESSION['kategorija']))
                    {
                        $kategorija= $_SESSION['kategorija'];
                        $kategorija[$_GET['id']]->DrawForm($_SESSION['lng']);
                    }
                }
                if(isset($_GET['tip']) && $_GET['tip']=='dodaj')
                {
                    DodajEvent();
                }

            ?>
        </center>
        </div>
    </div> 
</center>
    

    
    <!-- jQuery -->
    <script type="text/javascript">;
        $(window).on('beforeunload', function() {
    $(window).scrollTop(0);
});
    </script>
    
</body>
            
<script type="text/javascript" src="js/events/Listener.js"></script>
 <?php 
        include_once "php/loginscript.php";
        if(isset($_POST['komentar']) || isset($_GET['komentar']))
        {
             echo "<script type='text/javascript'>document.getElementById( 'leaveacomment' ).scrollIntoView(); </script>";
        }    
?>
</html>
