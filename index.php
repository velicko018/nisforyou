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
    if(!isset($_SESSION['brojac_za_hranu']))
    {
        $_SESSION['brojac_za_hranu']=0;
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
  
   tryToRegister();
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

    <title>Nis for you</title>

    <!-- Bootstrap Core CSS -->
   
     <link href="css/bootstrap.min.css" rel="stylesheet">
    <!-- Custom CSS -->
    <link href="css/main.css" rel="stylesheet">

    <!-- Fonts -->
    
    <script type="text/javascript" src="js/skrol.js"></script>
</head>

<body>

<?php

    NavBar($_SESSION['lng']);

    echo '<div class="brand">Niš for you</div>
    <div class="address-bar">';
    if($_SESSION['lng']=="eng") {echo 'This is place where you can find everything about Niš';}
              else echo 'Ovo je mesto na kome možete naći sve o Nišu';
              echo "</div><br><br>";
?>
     

<div id="sadrzaj">
    <div class="container">
        <div class="row">
            <div class="box">
               <a href="http://www.accuweather.com/en/rs/nis/299758/weather-forecast/299758" class="aw-widget-legal">
<!--
By accessing and/or using this code snippet, you agree to AccuWeather’s terms and conditions (in English) which can be found at http://www.accuweather.com/en/free-weather-widgets/terms and AccuWeather’s Privacy Statement (in English) which can be found at http://www.accuweather.com/en/privacy.
-->
</a><div id="awcc1464130164601" class="aw-widget-current"  data-locationkey="299758" data-unit="c" data-language="en-us" data-useip="false" data-uid="awcc1464130164601"></div><script type="text/javascript" src="http://oap.accuweather.com/launch.js"></script>
            </div>
        </div>
        <div class="row">
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
                            <li data-target="#carousel-example-generic" data-slide-to="7"></li>
                            <li data-target="#carousel-example-generic" data-slide-to="8"></li>
                        </ol>

                        
                        <div class="carousel-inner">
                            <div class="item active">
                                <img class="img-responsive img-full" src="img/strana/23/1.jpg" alt="">
                            </div>
                            <div class="item">
                                <img class="img-responsive img-full" src="img/slide-2.jpg" alt="">
                            </div>
                            <div class="item">
                                <img class="img-responsive img-full" src="img/most.jpg" alt="">
                            </div>
                            <div class="item">
                                <img class="img-responsive img-full" src="img/lea.jpg" alt="">
                            </div>
                            <div class="item">
                                <img class="img-responsive img-full" src="img/kapija.jpg" alt="">
                            </div>
                            <div class="item">
                                <img class="img-responsive img-full" src="img/strana/23/2.jpg" alt="">
                            </div>
                            <div class="item">
                                <img class="img-responsive img-full" src="img/trg.jpg" alt="">
                            </div>
                            <div class="item">
                                <img class="img-responsive img-full" src="img/strana/32/7.jpg" alt="">
                            </div>
                            <div class="item">
                                <img class="img-responsive img-full" src="img/strana/32/5.jpg" alt="">
                            </div>
                        </div>
                       
                         
                        <a class="left carousel-control" href="#carousel-example-generic" data-slide="prev">
                            <span class="icon-prev"></span>
                        </a>
                        <a class="right carousel-control" href="#carousel-example-generic" data-slide="next">
                            <span class="icon-next"></span>
                        </a>
                    </div>
                    <h2 class="brand-before">
                        <?php if($_SESSION['lng']=="eng")echo '<small>Welcome to</small>';
                                if($_SESSION['lng']=="srb")echo '<small>Dobrodošli na</small>';
                        ?>
                    </h2>
                    <h1 class="brand-name">Niš for you</h1>
                    <hr class="tagline-divider">
                    <h2>
                        <small>By
                            <strong>Team 12345</strong>
                        </small>
                    </h2>
                </div>
            </div>
        </div>

        <div class="row">
            <div class="box">
                <div class="col-lg-12">
                    <hr>
                    <h2 class="intro-text text-center">
                        <?php if($_SESSION['lng']=="eng")echo 'Looking for  
                        <strong>food, entertainment, events</strong>?';
                        if($_SESSION['lng']=="srb")echo 'Tražite  
                        <strong>hranu, događaje, zabavu</strong>?';
                        ?>
                    </h2>
                    <hr>
                    <img class="img-responsive img-border img-left" src="img/intro-pic.jpg" alt="">
                    <hr class="visible-xs">
                    <?php if($_SESSION['lng']=="srb") echo '
                    <p>Ovo je mesto na kome se možete informisati o raznim događajima u Nišu. </p>
                    <p>Ako ste gladni ovde možete poručiti hranu od nekoliko restorana i prodavnica brze hrane.</p>
                    <p>Ovde možete kupiti karte za sportske događaje, koncerte, pozorište..</p>
                    <p>Ako tražite dobar provod, ovo je mesto za vas. Kod nas se možete informisati o klubovima, kafićima, pabovima, kafanama i sličnim objektima i rezervisati mesta u istim.</p>';
                    if($_SESSION['lng']=="eng") echo '
                    <p>This is place where you can inform about various events in Niš. </p>
                    <p>If you are hungry here you can order food from restaurants and fast food shops.</p>
                    <p>Here are available tickets for sports, concerts, theatre..</p>
                    <p>If you seek a good time this is place for you. Here you can inform about clubs, bars, taverns, pubs and simular objects, and book a place in them.</p>';
                    ?>
                </div>
            </div>
        </div>

        <div class="row">
            <div class="box">
                <div class="col-lg-12">
                    <hr>
                    <h2 class="intro-text text-center">
                        <?php
                            if($_SESSION['lng']=="eng") echo 'Want to register?';
                            if($_SESSION['lng']=="srb") echo 'Hoćete li da se registruješ?';
                        ?>
                    </h2>
                    <hr>
                    <center>
                        <?php
                            // if($_SESSION['lng']=="srb") echo '<p>Stalni korisnici mogu ostvariti rane popuste i pogodnosti. Preporučujemo vam da se registrujete.</p>'; 
                            // if($_SESSION['lng']=="eng") echo '<p>Standing users can achieve early discounts and benefits. We encourage you to register.</p>'; 
                        
                            if($_SESSION['lng']=="eng") echo '<button id="regbtn" class="regbtn" onclick="javascript:Reg()">Register here</button><br>'; 
                            if($_SESSION['lng']=="srb") echo '<button id="regbtn" class="regbtn" onclick="javascript:Reg()">Registruj se ovde</button><br>'; 
                            RegistrationForm();
                        ?>
                    </center>
                </div>
            </div>
        </div>

    </div>
    </div>
    <!-- /.container -->

    <!-- <script>
    $('.carousel').carousel({
        interval: 5000 //changes the speed
    })
    </script> -->
</body>
<footer>
    <center>
    <br>
        <?php
            if($_SESSION['lng']=="eng")
            {

                echo "<p2>Want to use our services?</p2><br><br><br>";
               echo  "<a class='button' style='padding:10px;' href='Order/index.php'>Open admin page</a>";
            }
            if($_SESSION['lng']=="srb")
            {
                echo "<p2>Hoćete li da koristite naše usluge?</p2><br><br><br>";
               echo  "<a class='button' style='padding:10px;'  href='Order/index.php'>Otvori administratorsku stranu</a>";
            }  
        ?>

        <p>Copyright Team12345</p>
        
    </center>
</footer>
  <?php
        
    include_once "php/loginscript.php";

    ?>  
    
 <!-- jQuery -->
    <script src="js/jquery.js"></script>

    <!-- Bootstrap Core JavaScript -->
    <script src="js/bootstrap.min.js"></script>
    <!-- Script to Activate the Carousel -->
        <?php 
            if(isset($_GET['regform']))
            {
                echo "<script>skrol();</script>";
            }
            if(isset($_SESSION['skroliklik']) && $_SESSION['skroliklik']==1)
            {
                echo "<script>skroliklik();</script>";
                $_SESSION['skroliklik']=0;
            }
        ?>
    
</html>     
