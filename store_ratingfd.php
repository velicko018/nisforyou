<?php
	if(isset($_POST['star']) )
	{
		$star = htmlentities($_POST['star']);
		$product_id = htmlentities($_POST['product_id']);
		$lng = htmlentities($_POST['lng']);
		$user = htmlentities($_POST['user']);
		$valid_star = array('1','2','3','4','5');

		
		
    	
    	$conn = mysqli_connect("localhost", "root", "", "nisforyou");
    	$conn->set_charset("utf8");
    	
    	if ($conn->connect_error) 
    	{
        	die("Connection failed: " . $conn->connect_error);
    	}
    	if($user != "NALOG" && $user != "ACCOUNT")
    	{
    		$sql = "SELECT id FROM ratingfd where username='$user'";
    		$result = $conn->query($sql);
    		$ocenio = false;
    		if($result->num_rows>=0)
    		{
    			$ocenio = false;
	    		while($row = $result->fetch_assoc())
	    		{
	    			$postoji = $row['id'];
	    			if($postoji && $postoji == $product_id)
	    			{
	    				$ocenio = true;
	    			}
	    		}
	    		if($ocenio ==false)
	    		{
	    			$sql = "INSERT INTO ratingfd (id,rating,username) VALUES('$product_id','$star','$user')";
	    			$result = $conn->query($sql);
	    		
	    			$sql1 = "SELECT id, rating, AVG(rating) as Rating 
	        			FROM ratingfd WHERE id='$product_id}'";
	        		$result = $conn->query($sql1);
	        		if($result->num_rows>0)
	        		{
	        			$row = mysqli_fetch_assoc($result);
	        			$rejting = $row['Rating'];
	        			$sql1 = "UPDATE lokal set ocena='$rejting' where idres='$product_id'";
	        			$conn->query($sql1);
	        		}
	        		if($lng=="SRB")
	        			echo "<b class='g'> Hvala! Ocenili ste ovaj lokal sa {$star} zvezdica.</b>";
	        		if($lng=="ENG")
						echo "<b class='g'>Thanks! You rated this local {$star} Stars.</b>";
	    		}
	    		else
	    		{
					if($lng == "SRB")
						print_r("Vec ste ocenili!");
					if($lng == "ENG")
						print_r("You've already rated");
				}
			}
		}
		
		else
		{
			if($lng == "SRB")
				print_r("Morate biti ulogovani!");
			if($lng == "ENG")
				print_r("You have to log in!");
		}
	}
?>