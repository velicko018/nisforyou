<?php 
     include 'php/events/klase.php';
     include 'php/food/klase.php';
     include 'php/nightlife/klase.php';
     include 'php/klase.php';
?>
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <!-- Custom CSS --> 
    <link href="css/main.css" rel="stylesheet">
    <link href="css/search.css" rel="stylesheet">
    <script src="js/jquery.js"></script>
    <!-- <script src="js/jquery.mixitup.min.js"></script> -->
    <!-- Bootstrap Core JavaScript -->
    <script src="js/bootstrap.min.js"></script>
    <link rel="stylesheet" href="css/events.css">
     <link href="css/nightlife.css" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="css/cart.css">
    <script type="text/javascript" src='js/jquery-1.11.1.min.js'></script>
    <script type="text/javascript" src="js/main.js"></script>
    
<?php function NavBar($lng)
{
    include 'php/search.php';
    //  echo '<div class="brand">Niš for you</div>
    // <div class="address-bar">';
    // if($lng=="eng") {echo 'This is place where you can find everything about Niš';}
    //           else echo 'Ovo je mesto na kome možete naći sve o Nišu';

   echo '<!-- Navigation -->
    <nav class="navbar navbar-default" role="navigation" id="nav_bar">
        <div class="container">
            <!-- Brand and toggle get grouped for better mobile display -->
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <!-- navbar-brand is hidden on larger screens, but visible when the menu is collapsed -->
                ';
                if($_SESSION['loged']==0)
                echo ' <a class="navbar-brand logindugme" href="?logujme=0">Login</a>';
               if(isset($_SESSION['user']) && $_SESSION['user']!=null)
                {
                    $user = $_SESSION['user']->username;
                    if($_SESSION['loged']==1)
                    echo "<a class='navbar-brand logindugme' href='?logujme=1'>Logout $user</a>";
                }
                   echo '
                         <form action="" method="POST" class="navbar-brand lngskriveni">
                        <select name="lng" id="lng" onchange="this.form.submit()">';
                            if($lng=="eng"){
                            echo '<option value="eng">ENG</option>
                                  <option value="srb">SRB</option>';
                            }
                            if($lng=="srb"){
                            echo '<option value="srb">SRB</option>
                                  <option value="eng">ENG</option>';
                            }
                       echo ' </select>
                        </form>
                        
                    <div class="navbar-brand skrivenisearch">
                    <form class="search" method="post">
                        <input type="text" name="search" placeholder="Search..">
                        </form>
                    </div>
                    
            </div>
                
            <!-- Collect the nav links, forms, and other content for toggling -->
            <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                <center><ul class="nav navbar-nav" id="navigacija">';
                    if($lng=="eng")
                    {
                       echo ' <li>
                            <a href="index.php">Home</a>
                        </li>
                        <li>
                            <a href="food.php">Food</a>
                        </li>
                        <li>
                            <a href="events.php">Events</a>
                        </li>
                        <li>
                            <a href="nightlife.php">Nightlife</a>
                        </li>
                        <li>
                            <a id="cartlabel" href="cart.php">Cart</a>
                        </li>
                        <li>';
                    }
                    if($lng=="srb")
                    {
                       echo ' <li>
                            <a href="index.php">Početna</a>
                        </li>
                        <li>
                            <a href="food.php">Hrana</a>
                        </li>
                        <li>
                            <a href="events.php">Događaji</a>
                        </li>
                        <li>
                            <a href="nightlife.php">Noćni život</a>
                        </li>
                        <li>
                            <a id="cartlabel" href="cart.php">Korpa</a>
                        </li>
                        <li>';
                    }
                        echo '<div class="dropdown">';
    if($lng=="eng") echo '<button class="dropbtn" id="login1">ACCOUNT</button>';
     if($lng=="srb") echo '<button class="dropbtn" id="login1">NALOG</button>';
         echo '<div class="dropdown-content" id="login">';
        LoginForm();
    echo ' </div></li>
                    <li>
                        <form action="" method="POST" class="lng" >
                        <select name="lng" id="lng" onchange="this.form.submit()">';
                            if($lng=="eng"){
                            echo '<option value="eng">ENG</option>
                                  <option value="srb">SRB</option>';
                            }
                            if($lng=="srb"){
                            echo '<option value="srb">SRB</option>
                                  <option value="eng">ENG</option>';
                            }
                       echo ' </select>
                        </form>
                    </li>
                    
                    <center><li>';
                       SearchForm();
                   echo ' </li></center>
                </ul></center>
            </div>
            <!-- /.navbar-collapse -->
        </div>
        <!-- /.container -->
    </nav>';
                   
    if(isset($_GET['logujme']))
    {
        if($_SESSION['loged']==0){
        echo '<center><div class="smallScreenLog">';
                LoginForm();
        echo '</div></center>';
        }

    }
    if(isset($_POST['search'])) 
    {
        echo '<center>
               <div id="kontejnerzaSearch">
                <div id="contzaSearch"><br><hr>';
               if($_SESSION['lng']=="eng") echo "<h2>Search results</h2><hr><br>";
               if($_SESSION['lng']=="srb") echo "<h2>Rezultati pretrage</h2><hr><br>";

                echo "<center>";
                 Search($_POST['search']);
        echo '</div></div></center>';
    }
}

function footer()
    {
//    echo '<footer>
//         <div class="container">
//            <div class="row">
//                <div class="col-lg-12 text-center">
//                    <p>Copyright &copy; Team12345, 2016</p>
//                </div>
//            </div>
//        </div>
//    </footer>';
}

?>  
