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
    if(isset($_GET['komentar']))
    {
        if($_SESSION['user']!=null){
            $user = $_SESSION['user']->username;
            
            DeleteCommentHrana($_GET['komentar']);
        }
    }
    postaviKomentarFD();
    tryToLogin();
?>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">
        <link rel="stylesheet" type="text/css" href="php/nightlife/rating/styleStar.css">
            <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.4.0/css/font-awesome.min.css">


    <title>Niš for you - Food </title>

    <!-- Bootstrap Core CSS -->
    <link href="css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom CSS -->
    <link href="css/main.css" rel="stylesheet">
    <link href="css/nightlife.css" rel="stylesheet">
    <link href="css/food.css" rel="stylesheet">
  

</head>

<body>

   <?php NavBar($_SESSION['lng']); ?>
<center>
    <div id="kontejner">
        <div id="cont">
        <center>
            <hr>
            
            <?php
                if($_SESSION['lng']=="eng") echo '<h id ="desavanja">Food in Niš</h><br>';
                if($_SESSION['lng']=="srb") echo '<h id ="desavanja">Hrana u Nišu</h><br>';
            ?>
            <hr>
            <!-- Collect the nav links, forms, and other content for toggling -->
            <div class="eventsbar" href="index.php">
            <ul>
            <?php
            if($_SESSION['lng']=="srb") echo'
                <li><a class="linkovi"  href="food.php?tip=brza hrana">Brza Hrana</a></li>
                <li><a class="linkovi"  href="food.php?tip=restoran">Restorani</a></li>
                <li><a class="linkovi"  href="food.php?tip=kafana">Kafane</a></li>';
            if($_SESSION['lng']=="eng") echo'
                <li><a class="linkovi"  href="food.php?tip=brza hrana">Fast Food</a></li>
                <li><a class="linkovi"  href="food.php?tip=restoran">Restaurants</a></li>
                <li><a class="linkovi" href="food.php?tip=kafana">Taverns</a></li>';
             ?>
            </ul>   
            <hr>
            </div>
                
        
    <?php 
              include "php/food/foodbar.php";
                if(empty($_GET))
                {
                    $_SESSION['kategorijaFood'] = KategorijeFood("brza hrana",$_SESSION['lng']);
                    foreach($_SESSION['kategorijaFood'] as $tmp)
                     $tmp->DrawBox($_SESSION['lng']);

                }
                if(isset($_GET['tip']))
                {
                    $_SESSION['kategorijaFood'] = KategorijeFood($_GET['tip'],$_SESSION['lng']);
                }
                if(isset($_GET['tip']) && !isset($_GET['idres']))
                {
                    $_SESSION['kategorijaFood'] = KategorijeFood($_GET['tip'],$_SESSION['lng']);
                    foreach($_SESSION['kategorijaFood'] as $tmp)
                     $tmp->DrawBox($_SESSION['lng']);

                }
                if(isset($_GET['idres']) && !isset($_GET['tiphrana']))
                {
                    $tip = $_GET['tip'];
                    $idres = $_GET['idres'];
                    $_SESSION['kategorijaFood'][$idres]->drawForm($_SESSION['lng']);
                    
                     $_SESSION['kategorijaFood'][$idres]->drawMeni($tip,$idres);
                     echo "<hr>";
                    

                    if($_SESSION['lng']=="eng") echo "<h3>Menu</h3>";
                     if($_SESSION['lng']=="srb") echo "<h3>Meni</h3>";

                    if(strcmp($_GET['tip'],"brza hrana")==0)
                        $_SESSION['hrana'] = Hranameni("pica",$_SESSION['lng'],$_GET['idres']);
                    if(strcmp($_GET['tip'],"restoran")==0)
                        $_SESSION['hrana'] = Hranameni("pica",$_SESSION['lng'],$_GET['idres']);
                    if(strcmp($_GET['tip'],"kafana")==0)
                        $_SESSION['hrana'] = Hranameni("specijalitet",$_SESSION['lng'],$_GET['idres']);

                     foreach($_SESSION['hrana'] as $tmp){
                    $tmp->DrawBoxHrana($_SESSION['lng']);
                    }
                    $_SESSION['kategorijaFood'][$idres]->drawKomentari($_SESSION['lng']);

                }
                 if(isset($_GET['idres']) && isset($_GET['tiphrana']) && !isset($_GET['idhrana']))
                {
                    $tip = $_GET['tip'];
                    $idres = $_GET['idres'];
                    $_SESSION['kategorijaFood'][$idres]->drawForm($_SESSION['lng']);
                     
                     $_SESSION['kategorijaFood'][$idres]->drawMeni($tip,$idres);
                     echo "<hr>";
                            
                         if($_SESSION['lng']=="eng") echo "<h3>Menu</h3>";
                     if($_SESSION['lng']=="srb") echo "<h3>Meni</h3>";
                     
                    $_SESSION['hrana'] = Hranameni($_GET['tiphrana'],$_SESSION['lng'],$_GET['idres']);

                    foreach($_SESSION['hrana'] as $tmp){
                    $tmp->DrawBoxHrana($_SESSION['lng']);
                    }
                    $_SESSION['kategorijaFood'][$idres]->drawKomentari($_SESSION['lng']);
                    
                }


                if(isset($_GET['idhrana']))
                {
                    $hrana = Hranameni($_GET['tiphrana'],$_SESSION['lng'],$_GET['idres']);
                    Naruci($hrana[$_GET['idhrana']],$_SESSION['lng'],$hrana[$_GET['idhrana']]->tip);
                }

                if(isset($_POST['Dodajukorpu']))
                {
                    HUKorpu($_SESSION['lng']);
                }
            ?>
            </center>
        </div>
    </div>
    </center>


    <!-- jQuery -->
    
    <script src="js/jquery.js"></script>
    <!-- Bootstrap Core JavaScript -->
    <script src="js/bootstrap.min.js"></script>
    
    <script type="text/javascript" src="js/food/mainStarfd.js"></script>

    <?php
        include_once "php/loginscript.php";
        if(isset($_POST['komentar']) || isset($_GET['komentar']))
        {
             echo "<script type='text/javascript'>document.getElementById( 'leaveacomment' ).scrollIntoView(); </script>";
        }
        if(isset($_GET['tiphrana']))
            echo "<script type='text/javascript'>document.getElementById('meni').scrollIntoView(); </script>";
?>

</body>

</html>
