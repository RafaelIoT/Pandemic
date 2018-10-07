

$(document).ready(function(){
	var baseURL= "<?php echo base_url();?>";

	$("#create_button").click(function(){
		var name= $("#n").val();
        var players= $("#pl").val();
		$.ajax({
			url:'create.php',
			method:'POST',
			data:{
				name:name,
				players:players
			},
		   success:function(data){
			   $(data).appendTo("#create");
		   }
		});
 	});	
	$("#enter").hover(function(){
		$.ajax({
			url:baseURL+'Welcome/gamesList',
			method:'GET',
		   	success:function(data){
				var da = jQuery.parseJSON(data)
				for(var i = 0;i < da.length; i++){
					$("tbody").append("<tr  class='listtr' >");
					$("tbody").append("<td class='list_names'>"+da[i].name+"</td>");
					$("tbody").append("<td class='list_players'>"+da[i].players+"</td>");
				}
		   }
		});
	});
	window.setInterval(function(){
  		$("#tbody tr").remove();
		$("#tbody td").remove();
}, 5000);
		
});