<?php

    include "php/navbar.php";
    include "php/User.php";
    include "php/connection.php";
    
    
    
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
    postaviKomentarNL();
    tryToLogin();
?>
<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="stylesheet" type="text/css" href="css/styleStar.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.4.0/css/font-awesome.min.css">
    <title>Niš for you - Night life</title>
</head>

<body>

<?php NavBar($_SESSION['lng']); ?>


<center>
    <div id="kontejnernl">
        <div id="cont">
        <center>
            <hr>
            <?php
                if($_SESSION['lng']=="eng") echo '<h id ="desavanja">Nightlife in Niš</h><br>';
                if($_SESSION['lng']=="srb") echo '<h id ="desavanja">Noćni život u Nišu</h><br>';
            ?>
            <hr>
            
            <div class="nightlifebar">
            <ul>
            <?php DrawMenuNightLife($_SESSION['lng']);?>
            </ul>   
            <hr>
            </div>

            <?php 
            include_once "php/nightlife/nightlifebar.php";
                if(!isset ($_GET['tip']) && !isset($_GET['id']))
                {
                   $kategorija =  DrawAll("club",$_SESSION['lng'],true);
                   $_SESSION['kategorija']=$kategorija;
                   
                }
                else if(isset($_GET['tip']) && !isset($_GET['id']))
                {
                    $kategorija = DrawAll($_GET['tip'],$_SESSION['lng'],true);
                    $_SESSION['kategorija']=$kategorija;
                }
                else if(isset($_GET['tip']) && isset($_GET['id']))
                {
                    $kategorija = DrawAll($_GET['tip'],$_SESSION['lng'],false);
                    $_SESSION['kategorija']=$kategorija;
                }

                if(isset($_GET['id']))
                {
                    if(isset($_SESSION['kategorija']))
                    {
                        $kategorija= $_SESSION['kategorija'];
                        $kategorija[$_GET['id']]->DrawForm($_SESSION['lng']);
                        $tmp=$kategorija[$_GET['id']];
                    }
                }
                if(isset($_GET['komentar']))
                {
                    if($_SESSION['user']!=null)
                    {
                        $user = $_SESSION['user']->username;
                        DeleteCommentNl($_GET['komentar']);
                    }
                }
            ?>
        </center>
        </div>
    </div> 
</center>

<!-- /.container -->

<?php include_once "php/loginscript.php"; ?>

<!-- jQuery -->
<script src="js/jquery.js"></script>

<!-- Bootstrap Core JavaScript -->
<script src="js/bootstrap.js"></script>
<script type="text/javascript" src="js/nightlife/rating/mainStar.js"></script>
<script type="text/javascript" src="js/nightlife/reservation/dodajLokale.js"></script>
<script type="text/javascript" src="js/nightlife/reservation/rezervisi.js"></script>
</body>

</html>
