<?php
	//$id = $_GET['id'];
	if(isset($_POST['star']) )
	{
		
		$star = htmlentities($_POST['star']);

		//valid star id array
		$valid_star = array('1','2','3','4','5');

		
		
    	
    	$conn = mysqli_connect("localhost", "root", "", "nisforyou");
    	$conn->set_charset("utf8");
    	
    	if ($conn->connect_error) 
    	{
        	die("Connection failed: " . $conn->connect_error);
    	}
    	$sql = "INSERT INTO ratingnl (id,rating) VALUES({$id},{$star}";
    	$result = $conn->query($sql);
		if($_SESSION['lng']=="srb")
        echo "<b class=g'g'> Hvala! Ocenili ste ovaj lokal sa {$star} zvezdica.</b>";
        if($_SESSION['lng']=="eng")
		echo "<b class='g'>Thanks! You rated this local {$star} Stars.</b>";
	}
?>