<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8" />

    <title>Home</title>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
    <link rel="stylesheet" href="<?php echo base_url();?>assets/css/style.css">

</head>
    
<body>

    <div id="header"> 
        <div id="logo">Pandemic</div>
    </div>
    
    <div id="user_back"></div>
    
    <div id="user_bar"> 
    
         <p style="font-size: 30px;color: white;margin-left: 5%;">
        	Playing:
         </p>

    
    <div>
    	

    </div>
        
    </div>
	<div id='jogadas'>0</div>
	<div id="positions">
		<table>
			<thead>
				<tr>
					<th class="tname">Name</th>
					<th class="pname">Position</th>
					<th class="mname">Move To</th>
				</tr>
			</thead>
			<tbody id="pbody">
				
			</tbody>
		</table>
	</div>
    
    <div id="positions_back"></div>


    <div id="cards">
		<table>
			<thead>
				<tr>
					<th class="plname">Name</th>
					<th class="cards">Cards</th>
				</tr>
			</thead>
			<tbody id="cards_body">
				
			</tbody>
		</table>
	</div>
    
    <div id="cards_back"></div>

    <div id="centro">
    	<table>
			<thead>
				<tr>
					<th class="rs">Centros</th>
				</tr>
			</thead>
			<tbody id="rsbody">
				
			</tbody>
		</table>

    </div>
    <div id="centro_back"></div>

    <div id="show_map"> Show connections</div>
    <div id="show_map_back"></div>

    <div id="map"></div>
    <div id="map_back"><div id="closemap">X</div></div>

    <div id="cities">
		<table>
			<thead>
				<tr>
					<th class="cname">City</th>
					<th class="cubes">Cubes</th>
				</tr>
			</thead>
			<tbody id="cbody">
				
			</tbody>
		</table>
	</div>
    
    <div id="cities_back"></div>
    
</body>
    
</html>
<script>

$(document).ready(function(){
	var baseURL= "<?php echo site_url();?>"+'/';

    
    
	$(document).on('click', '#closemap', function(){
			event.stopPropagation();
			$("#map").css("display","none");
			$("#map_back").css("display","none");
		});

	$(document).on('click', '#show_map', function(){
			event.stopPropagation();
			$("#map").css("display","block");
			$("#map_back").css("display","block");
		});
    
    
    function show_state(){
        $.ajax({
				url:baseURL+'Welcome/show_moves',
				method:'GET',
			   	success:function(data){
			   		//alert(data);
				   	$("#user_bar").append(data);
			   	}
			});

		$.ajax({
			url:baseURL+'Welcome/can_create_station',
			method:'GET',
		   	success:function(data)
		   	{
		   		$("#user_bar").append(data);
			}
		});

		$.ajax({
			url:baseURL+'Welcome/can_cure',
			method:'GET',
		   	success:function(data)
		   	{
		   		//alert(data);
		   		if(data == 1)
		   		{
		   			$("#user_bar").append("<p id='cure_disease'>Find cure</p>");
		   		}
		   		
			}
		});
    }
    
    $(document).on('click', '#play', function(){
        $("#user_bar #moveto").remove();
		$("#user_bar #cure").remove();
		$("#user_bar #create_station").remove();
		$("#user_bar #cure_disease").remove();
		
        show_state();
	});
    

	$(document).on("click", ".moveto", function(){
		$("#user_bar #moveto").remove();
		$("#user_bar #cure").remove();
		$("#user_bar #create_station").remove();
		$("#user_bar #cure_disease").remove();
		$.ajax({
				url:baseURL+'Welcome/moveto/'+$(this).text(),
				method:'GET',
			   	success:function(data){
                    show_state();
                }
			});
        
		$("#jogadas").text(parseInt($("#jogadas").text())+1);

	});
    

	$(document).on("click", "#create_station", function(){
		$("#user_bar #create_station").remove();
		$.ajax({
				url:baseURL+'Welcome/create_station',
				method:'GET',
			   	success:function(data){
			   		//alert(data);
			   	}
			});
		$("#jogadas").text(parseInt($("#jogadas").text())+1);
	});

	$(document).on("click", "#cure_disease", function(){
		$("#user_bar #cure_disease").remove();
		$.ajax({
				url:baseURL+'Welcome/cure_disease',
				method:'GET',
			   	success:function(data){
			   		alert(data);
			   	}
			});
		$("#jogadas").text(parseInt($("#jogadas").text())+1);
	});





	$(document).on("click", "#cure", function(){
		$.ajax({
			url:baseURL+'Welcome/remove_cube',
			method:'GET',
		   	success:function(data){
		   		var d = data.replace(/^\s|\s+$/gm,'')
		   		turn(d);
		   	}
		});
	});

	


function turn(city)
{
	$("#user_bar #moveto").remove();
	$("#user_bar #cure").remove();
	$("#jogadas").text(parseInt($("#jogadas").text())+1);
	$.ajax({
			url:baseURL+'Welcome/moveto/'+city,
			method:'GET',
		   	success:function(data){},
		   	timeout: 500
		});
	$.ajax({
			url:baseURL+'Welcome/show_moves',
			method:'GET',
		   	success:function(data){
		   		//alert(data);
			   	$("#user_bar").append(data);
		   	}
		});
}

	function load_info()
	{
		$.ajax({
			url:baseURL+'Welcome/get_both',
			method:'GET',
		   	success:function(data)
		   	{
		   		$("#user_bar #outbreak").remove();
		   		$("#user_bar #irate").remove();
				$("#user_bar").append(data);
			}
		});

		$.ajax({
			url:baseURL+'Welcome/get_positions',
			method:'GET',
		   	success:function(data)
		   	{
				var da = jQuery.parseJSON(data);	
				$("#pbody .trr").remove();
				$("#pbody .tname").remove();		
				$("#pbody .ptname").remove();		
				$("#pbody .mname").remove();

				for( var key in da)
				{
					$("#pbody").append("<tr class='trr'>");
					$("#pbody").append("<td class='tname'>"+key+"</td>");
					$("#pbody").append("<td class='ptname'>"+da[key][0]+"</td>");
					$("#pbody").append("<td class='mname'>"+da[key][1]+"</td>");	
				}	   
			}
		});

		$.ajax({
				url:baseURL+'Welcome/get_cards',
				method:'GET',
			   	success:function(data)
			   	{
					$("#cards_body .trc").remove();
					$("#cards_body .cpname").remove();		
					$("#cards_body .ccname").remove();
					$("#cards_body").append(data);			   
				}
			});

		$.ajax({
				url:baseURL+'Welcome/display_cities',
				method:'GET',
			   	success:function(data)
			   	{
					$("#cbody .trc").remove();
					$("#cbody .cname").remove();		
					$("#cbody .cubes").remove();
					$("#cbody").append(data);		
				}
			});

		$.ajax({
				url:baseURL+'Welcome/get_stations',
				method:'GET',
			   	success:function(data)
			   	{
					$("#rsbody .trrs").remove();
					$("#rsbody .stations").remove();	
					$("#rsbody").append(data);		
				}
			});

		$.ajax({
				url:baseURL+'Welcome/get_date',
				method:'GET',
			   	success:function(data)
			   	{
					$("#user_bar #data").remove();		
					$("#user_bar").append(data);		
				}
			});

		$.ajax({
				url:baseURL+'Welcome/get_cured',
				method:'GET',
			   	success:function(data)
			   	{
			   		$("#user_bar #cures").remove();
					$("#user_bar").append(data);
				}
			});

	}
    

	window.setInterval(function(){
		if(($("#jogadas").text())>=4){
			$.ajax({
				url:baseURL+'Welcome/after_action',
				method:'GET',
			   	success:function(data)
			   	{
			   		//alert(data);
			   		$("#jogadas").text(0);
			   		$("#user_bar #moveto").remove();
			   		$("#user_bar .moveto").remove();
			   		$("#user_bar #cure").remove();
			    }
			 });
		}
  		$.ajax({
			url:baseURL+'Welcome/get_turn',
			method:'GET',
		   	success:function(data)
		   	{
				var d = data.replace(/^\s|\s+$/gm,'')
				if(d == '<button id="play">Play</button>')
		   		{
			   		$("#user_bar #play").remove();
			   		$("#user_bar").append(d);
			   		load_info();
		   		}
		   		else
		   		{
		   			$("#jogadas").text(0);
			   		$("#user_bar #moveto").remove();
			   		$("#user_bar .moveto").remove();
			   		$("#user_bar #cure").remove();
		   			$("#wait").remove();
			   		$("#user_bar").append(d);
		   		}

			}
		});
  		$.ajax({
			url:baseURL+'Welcome/get_head_turn',
			method:'GET',
		   	success:function(data)
		   	{
		   		$("#turn").remove();
		   		$("#user_bar").append(data);
			}
		});

	}, 500);

	load_info();

});

</script>