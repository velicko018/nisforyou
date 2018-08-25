<script type="text/javascript">
	var linkovi = document.getElementsByClassName('linkovi');
	var tip="";
	<?php if(isset($_GET['tip'])){ ?>
	tip = "<?php echo $_GET['tip']?>";
	<?php }?>
	switch(tip)
	{
		
		case "sport" : linkovi[0].style = "text-decoration:underline"; break;
		case "muzika" : linkovi[1].style = "text-decoration:underline"; break;
		case "kultura" : linkovi[2].style = "text-decoration:underline"; break;
		case "drugo" : linkovi[3].style = "text-decoration:underline"; break;
		case "dodaj" : linkovi[4].style = "text-decoration:underline"; break;
		default: linkovi[0].style = "text-decoration:underline"; break;
	}
	
</script>