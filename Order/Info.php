<?php 
require_once 'init.php';

if(isset($_POST['name']))
{
    $name=$_POST['name'];
$query= $db->query("SELECT * FROM user where user.username='{$name}';");
$result=$query->fetch_object();
$uuname=$result->username;
$upass=$result->password;
$uname=$result->name;
$uemail=$result->email;
$utelephone=$result->telephone;
$uaddress=$result->address;
   
$niz=[$uuname,$upass,$uname,$uemail,$uaddress,$utelephone];
echo json_encode($niz);
}

?>