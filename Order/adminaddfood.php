<?php
$db= new mysqli('localhost','root','','nisforyou') or die("Could not Connect!");
session_start();
 $idlokal= $_SESSION['user1']->id; //id
if(isset($_POST['namefood']) && isset($_POST['descrfood'])&& isset($_POST['typefood'])&& isset($_POST['tagfood']) && isset($_POST['picfood']) && isset($_POST['picfood']))
{
$name=$_POST['namefood'];
$type=$_POST['typefood'];
$tag=$_POST['tagfood'];
$pic=$_POST['picfood'];
$descr=$_POST['descrfood'];
$price=$_POST['price'];
 if($db->connect_error)
    {
        print("GRESKA!");
    }
$query=$db->query("INSERT INTO hrana (idres,ime,opis,slika,tip,tag) VALUES ('$idlokal','$name','$descr','$pic','$type','$tag') ;");

$query2=$db->query("SELECT idhrana FROM hrana WHERE idres='$idlokal' AND ime='$name';");
$row = mysqli_fetch_assoc($query2);
$id = $row['idhrana'];
$query1=$db->query("INSERT INTO cenahrana (idhrane,cena) VALUES ('$id','$price');");
  
  $db->close();
 header('Location: OrderTable.php');
}
?>