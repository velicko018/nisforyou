$(document).ready(function(){

	$('#rezbtnmodal').click(function()
	{
		
		var timet = $('#timet').val();
			 
			 
		var	brojosoba = $("#brojosoba option:selected").text();
		var	result_div = $("#result1");
		var	lokal = $("#lokal option:selected").text();
		var	datum = $("#datumdog option:selected").text();
		var	tiplokala = $("#tiplokalaf option:selected").text();
		var	name = $("#name").val();
		var	phone = $("#phone").val();
		var lng = $("#lng option:selected").text();
		var	tipsedenja = $("#tipsedenja option:selected").text();
		var	rezervisilist = $(".reservationbox");
		if (timet == "" || datum == "" || phone=="" || brojosoba == "" || lokal == "" || name=="" || tiplokala =="" ) 
		{
			if(lng == "SRB")
			result_div.show().html("<b class='r'> Morate popuniti sve podatke!</b>");
			else
				result_div.show().html("<b class='r'> Please fill in all of the required fields!</b>");
		}
		else
		{
			$.ajax(
			{
				url: "rezervisi.php",
				type: "POST",
				data: 
				{
					brojosoba:brojosoba,
					lokal:lokal,
					datum:datum,
					timet:timet,
					tiplokala:tiplokala,
					name:name,
					phone:phone,
					tipsedenja:tipsedenja,
					lng:lng
					
				},
				beforeSend: function()
				{
					rezervisilist.hide(); 
					result_div.show().html("Loading...");
				},
	
				success: function(data)
				{
					
					result_div.html(data);
				}
			});
		}
		
	});
});
