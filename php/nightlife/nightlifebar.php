<script type="text/javascript">
	var linkovi = document.getElementsByClassName('linkovi');
	var tip="";
	<?php if(isset($_GET['tip'])){ ?>
	tip = "<?php echo $_GET['tip']?>";
	<?php }?>
	switch(tip)
	{
		
		case "club" : linkovi[0].style = "text-decoration:underline"; break;
		case "pub" : linkovi[1].style = "text-decoration:underline"; break;
		case "caffe" : linkovi[2].style = "text-decoration:underline"; break;
		case "tavern" : linkovi[3].style = "text-decoration:underline"; break;
		case "dodaj" : linkovi[4].style = "text-decoration:underline"; break;
		default: linkovi[0].style = "text-decoration:underline"; break;
	}
	
</script>