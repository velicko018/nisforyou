    <?php
        
        include "php/User.php";
        include "php/connection.php";
        include "php/cart/klase.php";
        include "php/navbar.php";
        
        session_start();
        $user = NULL;

       if(!isset($_SESSION['user']))
       {
           $_SESSION['user']=$user;
           $_SESSION['loged']=false;
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
        if(!isset($_SESSION['cart']))
        {
            $_SESSION['cart']=array();
            $_SESSION['cart_counter']=0;
        }
        if(isset($_POST['counter']))
        {   
            unset($_SESSION['cart'][$_POST['counter']]);
        }
        if(isset($_POST['id_hrane_za_brisanje']))
        {   
            unset($_SESSION['hrana_u_korpi'][$_POST['id_hrane_za_brisanje']]);
        }
        
         tryToLogin();
        
    ?>
    <html>
        <head>
            <meta charset="UTF-8">
            <title>Nisforyou - Cart</title>
             <link rel="stylesheet" href="css/cart.css">
        </head>
        <body>
            <?php
            NavBar($_SESSION['lng']);
            ?>

                    <center>
                    <!-- <div class="pozadina"> -->
                    <!--  Events  -->
                    <div id='kontejner'>
                    <?php 
                        if($_SESSION['lng']=='eng') echo "<h3>Events cart</h3>";
                        if($_SESSION['lng']=='srb') echo "<h3>Korpa za događaje</h3>";
                    ?>
                        <div style="overflow-x:auto;">
                        <table>
                            <thead>
                            <?php 
                                if($_SESSION['lng']=="eng")
                                {
                                    echo "<th></th><th></th><th></th>";
                                    echo '<th>Quantity</th>';
                                    echo '<th>Price</th>';
                                    echo '<th></th>';
                                }
                                if($_SESSION['lng']=="srb")
                                {
                                    echo "<th></th><th></th><th></th>";
                                    echo '<th>Količina</th>';
                                    echo '<th>Cena</th>';
                                    echo '<th> </th>';
                                }
                            ?>
                            </thead>
                            <?php 
                                $ukupno=0;
                                if($_SESSION['cart']!=null)
                                {
                                    $ukorpi = $_SESSION['cart'];
                                    foreach ($ukorpi as $tmp)
                                    {

                                        $slika = vratiSLiku($tmp->id,$tmp->tip);
                                        echo "<tr>";
                                            echo "<td><img src='$slika' id='cartimg'></img></td>";
                                            echo "<form action='cart.php' method='post'>";
                                            if($_SESSION['lng']=='eng')
                                                    $ime="Tickets for ";
                                                if($_SESSION['lng']=='srb')
                                                    $ime="Karte za ";
                                                $ime =$ime.$tmp->name;
                                            echo "<td>$ime</td>";
                                            echo "<td>$tmp->pozicija</td>";
                                            echo "<td>$tmp->kolicina x</td>";
                                                
                                            echo "<td>$tmp->cena RSD</td>";
                                            echo "<input type=hidden name='counter' value=$tmp->counter>";
                                            if($_SESSION['lng']=="eng")
                                            echo "<td><input type='submit' value='Delete'></td>";
                                            if($_SESSION['lng']=="srb")
                                            echo "<td><input type='submit' value='Ukloni'></td>";
                                            echo "</form>";
                                        echo "</tr>";
                                        $ukupno+=$tmp->kolicina*$tmp->cena;
                                    }
                                }
                                echo "<tr><form action='' method='GET'>";
                                if($_SESSION['lng']=="srb")
                                {
                                    echo "<td></td><td></td><td></td><td>Ukupno:</td><td>$ukupno RSD</td>";
                                    echo "<td><input type='submit' name ='kupi' value = 'Kupi'></td>";
                                }
                                if($_SESSION['lng']=="eng")
                                {
                                    echo "<td></td><td></td><td></td><td>In total:</td><td>$ukupno RSD</td>";
                                    echo "<td><input type='submit' name ='kupi' value = 'Check out'></td>";
                                }
                                echo "</form></tr>";
                            ?>
                        </table></div><br>

                        <?php if(!isset($_SESSION['user']) || $_SESSION['user']==null)
                                {
                                    if($_SESSION['lng']=="eng")
                                        echo "<p id='nisam_prijavljen'>You are not loged.</p>";
                                    if($_SESSION['lng']=="srb")
                                        echo "<p id='nisam_prijavljen'>Niste prijavljeni.</p>";
                                    ?>
                                    <script>
                                        var p = document.getElementById('nisam_prijavljen');
                                        p.style.color = "red";
                                        var myVar = setInterval(myTimer, 2500);
                                        function myTimer() 
                                        {
                                            p.style.color = "#000";
                                            p.style.fontSize;
                                        }
                                    </script>
                        <?php
                                }
                        ?>
                          <!-- /Events-->
                          <hr>

                        <!-- Food-->
                        <?php 
                        if($_SESSION['lng']=='eng') echo "<h3>Food cart</h3>";
                        if($_SESSION['lng']=='srb') echo "<h3>Korpa za hranu</h3>";
                    ?>
                        <div style="overflow-x:auto;">
                        <table>
                             <thead>
                            <?php 
                                if($_SESSION['lng']=="eng")
                                {
                                    echo "<th></th><th></th><th></th><th></th>";
                                    echo '<th>Quantity</th>';
                                    echo '<th>Price</th>';
                                    echo '<th></th>';
                                }
                                if($_SESSION['lng']=="srb")
                                {
                                    echo "<th></th><th></th><th></th><th></th>";
                                    echo '<th>Količina</th>';
                                    echo '<th>Cena</th>';
                                    echo '<th> </th>';
                                }
                            ?>
                            </thead>
                            <tbody>
                                <?php
                                $ukupnoHrana = 0;
                                if(isset($_SESSION['hrana_u_korpi']) && $_SESSION['hrana_u_korpi']!=null)
                                {
                                    foreach ($_SESSION['hrana_u_korpi'] as $tmp) 
                                    {
                                        $slika = vratiSLiku($tmp->hrana->idhrana,"hrana");
                                        $imehrane = $tmp->hrana->imehrane;
                                        echo "<tr>";
                                        echo "<form action='cart.php' method='post'>";
                                            echo "<td><img src='$slika' id='cartimg'></img></td>";
                                            echo "<td>$imehrane</td>";
                                            echo "<td>$tmp->dodaci</td>";
                                            echo "<td>$tmp->dostava</td>";
                                            echo "<td>$tmp->kolicina x</td>";
                                             echo "<td>$tmp->cena RSD</td>";
                                            echo "<input type=hidden name='id_hrane_za_brisanje' value=$tmp->id>";
                                            if($_SESSION['lng']=="eng")
                                            echo "<td><input type='submit' value='Delete'></td>";
                                            if($_SESSION['lng']=="srb")
                                            echo "<td><input type='submit' value='Ukloni'></td>";
                                            echo "</form>";
                                        
                                        $ukupnoHrana+=$tmp->kolicina*$tmp->cena;
                                        echo "</form></tr>";
                                    } 
                                }
                                    echo "<tr><form action='' method='GET'>";
                                    if($_SESSION['lng']=="srb")
                                    {
                                        echo "<td></td><td></td><td></td><td></td><td>Ukupno:</td><td>$ukupnoHrana RSD</td>";
                                        echo "<td><input type='submit' name ='kupihr' value = 'Kupi'></td>";
                                    }
                                    if($_SESSION['lng']=="eng")
                                    {
                                        echo "<td></td><td></td><td></td><td></td><td>In total:</td><td>$ukupnoHrana RSD</td>";
                                        echo "<td><input type='submit' name ='kupihr' value = 'Check out'></td>";
                                    }
                                    echo "</form></tr>";
                                
                                ?>
                            </tbody>
                        </table></div>
                        <!-- /food-->

                        <br><br><br><br><br><br>
                    <!-- </div>  -->
                    </div>
                     </center> 

        
        <?php 
        include_once "php/loginscript.php";
            if(isset($_GET['kupi']))
        {
            if(isset($_SESSION['user']) && $_SESSION['user']!=null)
            {


                if( isset($_SESSION['cart']) && $_SESSION['cart']!= null)
                {
                    upisiKupljeneKarte($_SESSION['cart'],$_SESSION['user']->username);
                                  $_SESSION['cart'] = null;
                }
                else
                {
                    if($_SESSION['lng']=="srb") echo "<script>alert('Korpa je prazna.')</script>";
                    if($_SESSION['lng']=="eng") echo "<script>alert('Cart is empty.')</script>";
                }
            }
            else
            {   
                header("Location:cart.php");
                // if($_SESSION['lng']=="srb") echo "<script>alert('Ulogujte se.')</script>";
                // if($_SESSION['lng']=="eng") echo "<script>alert('Please login.')</script>";
            }
        }
        if(isset($_GET['kupihr']))
        {
            if($_SESSION['user']!=null)
            {
                if($_SESSION['hrana_u_korpi']!=null)
                {
                    upisiKupljenuHranu($_SESSION['hrana_u_korpi'],$_SESSION['user']->username,$_SESSION['lng']);
                    $_SESSION['hrana_u_korpi'] = null;
                }
                else
                {
                    if($_SESSION['lng']=="srb") echo "<script>alert('Korpa je prazna.')</script>";
                    if($_SESSION['lng']=="eng") echo "<script>alert('Cart is empty.')</script>";
                }
            }
            else
            {
                if($_SESSION['lng']=="srb") echo "<script>alert('Ulogujte se.')</script>";
                if($_SESSION['lng']=="eng") echo "<script>alert('Please login.')</script>";
                unset($_GET['kupihr']);
            }   
        }
        ?>
        </body>
    </html>
