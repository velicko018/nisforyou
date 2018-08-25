
<?php
include 'php/mail.php';
    $poslato = false;
    
    if(isset($_POST['name']) && isset($_POST['phone']) && isset($_POST['tipsedenja']) && isset($_POST['tiplokala']))
    {
        $brojosoba = htmlentities($_POST['brojosoba']);
        $lokal = htmlentities($_POST['lokal']);
        $datum = htmlentities($_POST['datum']);
        $vreme = htmlentities($_POST['timet']);
        $tiplokala = htmlentities($_POST['tiplokala']);
        $ime = htmlentities($_POST['name']);
        $telefon = htmlentities($_POST['phone']);
        $tipsedenja =htmlentities($_POST['tipsedenja']);
        $lng = htmlentities($_POST['lng']);
        
        
        $conn = mysqli_connect("localhost", "root", "", "nisforyou");
        $conn->set_charset("utf8");
        
        if ($conn->connect_error) 
        {
            die("Connection failed: " . $conn->connect_error);
        }
        $sql = "SELECT * FROM nllokali WHERE ime = '$lokal'";
        $result = $conn->query($sql);
        while($row = $result->fetch_assoc())
        {
            $mail = $row['mail'];

            $id = $row['idres'];
        }
        if($datum != "" && $tiplokala != "" && $lokal != "" && $vreme != "" && $tipsedenja != "" && $brojosoba != "" && $ime != "" && $telefon != "" )
        {
            $sql = "INSERT INTO rezervacijanl (ime, telefon, brojMesta, tipLokala, datum, lokal, tipMesta, mail, vreme) VALUES ('$ime','$telefon','$brojosoba','$tiplokala','$datum','$lokal','$tipsedenja','$mail','$vreme')";
                    
            $result = $conn->query($sql);
            $message = "Datum dogadjaja: ".$datum."<br>".
            "Ime: ".$ime."<br>".
            "Vreme dolaska: ".$vreme."<br>".
            "Broj mesta: ".$brojosoba."<br>".
            "Tip sedenja: ".$tipsedenja."<br>".
            "Kontakt telefon: ".$telefon."<br>";
            sendMail("Rezervacija",$message,"velicko018@live.com");
            //sendMail("Rezervacija",$message,$mail);
            $poslato = true;
            if ($lng == "SRB") {
                echo "<b class='g'> Usepešno ste rezervisali mesto.</b>";
            }
            if($lng == "ENG")
            {
                echo "<b class='g'> You have successfully reserve your seat.</b>";
            }
            return true;
        }
    }
    else
    {
        if($lng == "SRB")
        echo "<b class='r'> Greska!</b>"; 
    if($lng == "ENG")
        echo "<b class='r'> Error!</b>"; 
        return false;
    }

?>