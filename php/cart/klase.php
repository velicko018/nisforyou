<?php
include_once "php/mail.php";
function upisiKupljeneKarte($ukorpu,$user)
{
        if($_SESSION['user']!= null)
        {

        	$servername = "localhost";
                $username = "root";
                $password = "";
                $dbname = "nisforyou";
                $conn = mysqli_connect($servername, $username, $password, $dbname);
                $conn->set_charset("utf8");
                
                $bilogreske = false;
                foreach ($ukorpu as $tmp) 
                {
                    $email = "";
                    $result = $conn->query("select organizator from dogadjaj where id = $tmp->id");
                    if($result && $result->num_rows>0)
                    {
                        //echo "<script>alert('uso sam');</script>";
                        $row = mysqli_fetch_assoc($result);
                        $email = $row['organizator'];
                    }
                    $date = date("Y-m-d");
                	$sql = "Insert into naruceneKarte (username_narucioca,id_dogadjaja,pozicija,cena,kolicina,vreme,email) values ('$user',$tmp->id,'$tmp->pozicija',$tmp->cena,$tmp->kolicina,'$date','$email')";
                	if($conn->query($sql))
                	{
                        
                	}
                	else
                	{
                        $bilogreske = true;
                        unset($_POST);
                		echo "<script>alert('Problem prilikom narucivanja');</script>";
                	}
                }
                if(!$bilogreske)
                {
                    if($_SESSION['lng']=="eng")
                        {
                            $subject = "Tickets on nisforyou";
                            $body = "You have ordered:<br><br>";
                            
                            $ukupno = 0;
                            foreach ($ukorpu as $tmp) 
                            {
                                $body.=$tmp->name. " , x".$tmp->kolicina . " for " .$tmp->cena."<br><hr>";
                                $ukupno+=$tmp->kolicina*$tmp->cena; 
                            }
                            $body.="<br><br>
                            In total: ".$ukupno." RSD <br><br>";
                            
                            $body.="If a problem occurs you will receive notification from administrator.";
                            
                        }
                

                        if($_SESSION['lng']=="srb")
                        {
                            $subject = "Karte sa nisforyou";
                            $body = "Narucili ste: <br><br>";
                            
                            $ukupno = 0;
                            foreach ($ukorpu as $tmp) 
                            {
                                $body.=$tmp->name. " , x".$tmp->kolicina . " for " .$tmp->cena."<br><hr>";
                                $ukupno+=$tmp->kolicina*$tmp->cena; 
                            }
                            $body.="<br><br>
                            Ukupno: ".$ukupno." RSD <br>";
                            
                            $body.= "Ako dodje do problema dobicete obavestenje od  administraotra.";
                            
                        }

                        $to = $_SESSION['user']->email;
                        sendMail($subject,$body,$to);
                        posaljiDogadjajima($ukorpu);

                    if($_SESSION['lng']=='eng')
                                echo "<script>alert('Successful shoping. Go to your email to check details.');</script>";
                        else echo "<script>alert('Uspešna kupovina. Proverite email za detalje.');</script>";   
                }
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
                    echo "<script>alert('Molimo vas da se prijavite.');</script>";
                }
        }
}
function upisiKupljenuHranu($ukorpu,$user,$lng)
{
        $servername = "localhost";
        $username = "root";
        $password = "";
        $dbname = "nisforyou";
        $conn = mysqli_connect($servername, $username, $password, $dbname);
        $conn->set_charset("utf8");        

        if($ukorpu != null)
            $bilogreske = false;
        foreach ($ukorpu as $tmp) 
        {
            $idr=$tmp->hrana->idres;
            //$email = "";
            $result = $conn->query("select mail from lokal where idres = $idr");
            if($result && $result->num_rows>0)
            {
                $row = mysqli_fetch_assoc($result); 
                $email = $row['mail'];
            }

            $idh=$tmp->hrana->idhrana;
            $date = date("Y-m-d");
            
            $sql = "insert into narucenahrana (restoran, idhrana, dostava,cena,dodaci,username_narucioca,vreme, email,kolicina) VALUES($idr,$idh,'$tmp->dostava','$tmp->cena','$tmp->dodaci','$user','$date','$email',$tmp->kolicina);";
            if($conn->query($sql))
            {
                
            }
            else
            {
                $bilogreske = true;
                 if($lng=='eng')
                            echo "<script>alert('Error');</script>";
                    else echo "<script>alert('Greska');</script>";   
            }
        }
        if(!$bilogreske)
        {
            if($_SESSION['lng']=="eng")
                        {
                            $subject = "Food ordered from nisforyou";
                            $body = "You have ordered:<br><br>";
                            $ukupno = 0;
                            foreach ($ukorpu as $tmp) 
                            {
                                $body.=$tmp->hrana->imehrane. " , x".$tmp->kolicina . " for " .$tmp->cena."<br>";
                                $body.="Adds: ".$tmp->dodaci."<br>";
                                $body.=$tmp->dostava."<br><hr><br>";

                                $ukupno+=$tmp->kolicina*$tmp->cena; 
                            }
                            $body.="<br><br>
                            In total: ".$ukupno." RSD <br>";
                            $body.="If a problem occurs you will receive notification from administrator.";
                        }

                        if($_SESSION['lng']=="srb")
                        {
                            $subject = "Hrana narucena sa nisforyou";
                            $body = "Narucili ste: <br><br>";
                            $ukupno = 0;
                            foreach ($ukorpu as $tmp) 
                            {
                                $body.=$tmp->hrana->imehrane. " , x".$tmp->kolicina . " for " .$tmp->cena."<br>";
                                $body.="Dodaci:".$tmp->dodaci."<br>";
                                $body.=$tmp->dostava."<br><hr><br>";

                                $ukupno+=$tmp->kolicina*$tmp->cena; 
                            }
                            $body.="<br><br>
                            Ukupno: ".$ukupno." RSD <br>";
                            $body. "Ako dodje do problema dobicete obavestenje od  administraotra.";
                        }


                        $to = $_SESSION['user']->email;
                        sendMail($subject,$body,$to);
                        posaljiLokalima($ukorpu);


                    if($_SESSION['lng']=='eng')
                                echo "<script>alert('Successful shoping. Go to your email to check details.');</script>";
                        else echo "<script>alert('Uspešna kupovina. Proverite email za detalje.');</script>";  
        }
        $conn->close();
}
function vratiSLiku($id,$tabela)
{
        $servername = "localhost";
        $username = "root";
        $password = "";
        $dbname = "nisforyou";
        $conn = mysqli_connect($servername, $username, $password, $dbname);




        if($tabela == 'hrana')  $sql = "Select slika from $tabela where idhrana=$id";
        else $sql = "Select slika from $tabela where id=$id";
        $result = $conn->query($sql);
        if($result->num_rows>0)
        {
                $row = mysqli_fetch_assoc($result);
                $url = $row ['slika'];
                return $url;
        }
        else return null;
}
function getMail($tabela,$id)
{
    $conn = mysqli_connect("localhost","root","","nisforyou");
    $conn->set_charset("utf-8");
    if(strcmp($tabela,"dogadjaj")==0)
        $sql = "select organizator from dogadjaj where id=$id";
    else $sql = "select mail from lokal where idres = $id";
    $result = $conn->query($sql);
    if($result && $result->num_rows>0)
    {
        $row = mysqli_fetch_assoc($result);
        if(strcmp($tabela,"dogadjaj")==0)
            return $row['organizator'];
        else return $row['mail'];
    }
    return "nisforyou12345@gmail.com";
}
function posaljiDogadjajima($ukorpu)
{
    $kome_sve = array();
    $i=0;
    foreach ($ukorpu as $key) 
    {
        $kome_sve[$i++] = $key->id;
    }
    $kome_sve = array_unique($kome_sve);
    foreach ($kome_sve as $tmp)
    {
        $body = "Nova narudzbina:<br><br>";
        $ukupno = 0;
        foreach ($ukorpu as $uk) 
        {   
            if($tmp == $uk->id)
            {
                $body.=$uk->name. " , x".$uk->kolicina . " for " .$uk->cena."<br><hr>";
                $ukupno+=$uk->kolicina*$uk->cena;
            } 
        }
        $body.="Upupno $ukupno<br><br>";
        $body.="Podaci o naruciocu:<br>";
        $body.=$_SESSION['user']->name."<br>Adresa: ".$_SESSION['user']->address."<br>Telefon: ".$_SESSION['user']->telephone."<br>".$_SESSION['user']->email;
        $email = getMail("dogadjaj",$tmp);
        sendMail("Narudzbina sa nisforyou",$body,$email);
    }
    
}
function posaljiLokalima($ukorpu)
{
    $kome_sve = array();
    $i=0;
    foreach ($ukorpu as $key) 
    {
        $kome_sve[$i++] = $key->hrana->idres;
    }
    $kome_sve = array_unique($kome_sve);
    foreach ($kome_sve as $tmp)
    {
        $body = "Nova narudzbina:<br><br>";
        $ukupno = 0;
        foreach ($ukorpu as $uk) 
        {   
            if($tmp == $uk->hrana->idres)
            {
                $body.=$uk->hrana->imehrane. " , x".$uk->kolicina . " for " .$uk->cena."<br>";
                                $body.="Dodaci: ".$uk->dodaci."<br>";
                                $body.=$uk->dostava."<br><hr><br>";

                $ukupno+=$uk->kolicina*$uk->cena; 
            }
        }
        $body.= "Upupno: $ukupno<br><br>";
        $body.="Podaci o naruciocu:<br>";
        $body.=$_SESSION['user']->name."<br>Adresa: ".$_SESSION['user']->address."<br>Telefon: ".$_SESSION['user']->telephone."<br>".$_SESSION['user']->email;
        $email = getMail("lokal",$tmp);
        sendMail("Narudzbina sa nisforyou",$body,$email);
    }
}