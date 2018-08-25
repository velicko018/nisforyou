<?php
session_start();
if(isset($_SESSION['user1']))
{
	$_SESSION['user1']=null;
header("Location: index.php");
}
header("Location: index.php");
?>