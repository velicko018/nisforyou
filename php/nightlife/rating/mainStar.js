$(document).ready(function(){
	
	$('.star').on("mouseover",function(){
		//get the id of star
		var star_id = $(this).attr('id');
		switch (star_id){
			case "star-1":
				$("#star-1").addClass('star-checked');
				break;
			case "star-2":
				$("#star-1").addClass('star-checked');
				$("#star-2").addClass('star-checked');
				break;
			case "star-3":
				$("#star-1").addClass('star-checked');
				$("#star-2").addClass('star-checked');
				$("#star-3").addClass('star-checked');
				break;
			case "star-4":
				$("#star-1").addClass('star-checked');
				$("#star-2").addClass('star-checked');
				$("#star-3").addClass('star-checked');
				$("#star-4").addClass('star-checked');
				break;
			case "star-5":
				$("#star-1").addClass('star-checked');
				$("#star-2").addClass('star-checked');
				$("#star-3").addClass('star-checked');
				$("#star-4").addClass('star-checked');
				$("#star-5").addClass('star-checked');
				break;
		}
	}).mouseout(function(){
		//remove the star checked class when mouseout
		$('.star').removeClass('star-checked');
	});

	
	$('.star').click(function()
	{
		
		var star_index = $(this).attr("id").split("-")[1],
			product_id = $("#product_id").val(), 
			star_container = $(this).parent(), 
			
			result_div = $("#result"),
			lng = $("#lng option:selected").text(),
			user = $("#login1").text();
		
		$.ajax(
		{
			url: "store_rating.php",
			type: "POST",
			data: 
			{
				star:star_index,
				product_id:product_id,
				lng:lng,
				user:user
			},
			beforeSend: function()
			{
				star_container.hide(); 
				result_div.show().html("Loading...");
			},

			success: function(data)
			{
				
				result_div.html(data);
			}
		});
	});

});