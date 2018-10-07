<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8" />

    <title>Home</title>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
    <link rel="stylesheet" href="http://appserver-01.alunos.di.fc.ul.pt/~asw011/etapa2/codeigniter/assets/css/style.css">

</head>
    
<body>

    <div id="header"> 
        <div id="logo">Pandemic</div>
    </div>
    
    <div id="user_back"></div>
    
    <div id="user_bar"> 
    
        <p style="font-size: 30px;color: white;margin-left: 5%;">
            Welcome Back:
        </p>
    
    </div>
		
	<div id="create">Criar Jogo
		<br>
		<br>
		<br>
			<p id="name">Name</p>
			<input class="create_form" name="game_players" id="n" type="text">
			<br>
			
        
            <p id="players">Players</p>
                    <select class="create_form" name="game_name" id="pl">
                        <option>2</option>
                        <option>3</option>
                        <option>4</option>
                    </select>
            <input type="checkbox" class="create_form" name="inicio" id="p2" value="inicio"><h4 id="inicio">Dar Inicio</h4>
        
        <p id="descricao">Description</p>
			<textarea lass="create_form" name="game_players" id="descr" cols="20" rows="2"></textarea>
			<br>


			<button id="create_button" class="create_form" type="submit">create</button>
	</div>

	<div id="create_back"></div>
	
	
	<div id="enter" >Entrar Jogo
		<br>
		<table class="table">
		<thead>
		  <tr>
			<th>Name</th>
			<th>Players</th>
			
		  </tr>
		</thead>
		<tbody id="tbody">
		  
		</tbody>
	  </table>
	</div>
	
	<div id="enter_back"></div>
	<div id="enter_game"></div>
    
    
</body>
    
</html>
<script>

$(document).ready(function(){
    
    function load_games(){
        $.ajax({
			url:baseURL+'Welcome/gamesList',
			method:'GET',
		   	success:function(data){
				var da = jQuery.parseJSON(data);
				for(var i = 0;i < da.length; i++){
					$("tbody").append("<tr  class='listtr' >");
					$("tbody").append("<td class='list_names'><a href="+baseURL+"lobby/"+da[i].name+">"+da[i].name+"</a></td>");
					$("tbody").append("<td class='list_players'>"+da[i].players+"</td>");
				}
		   }
		});
    }
    
	var baseURL= "<?php echo site_url();?>"+'/';
    load_games();
    console.log("<?php echo site_url();?>");
    
	$("#create_button").click(function(){
		var name= $("#n").val();
        var players= $("#pl").val();
        var descricao = $("#descr").val();
        var inicio = $("#p2").is(':checked');
			$.ajax({
				url:baseURL+'Welcome/create_game',
				method:'POST',
				data:{
					'name':name,
					'players':players,
					'descricao':descricao,
                    'inicio':inicio
			},
		   success:function(data){
			   $(data).appendTo("#create");
		   },
            erro:function(){
                $("<p id='create_insuccess'>Error!</p>").appendTo("#create");
            }    
		});
        
 	});	
	window.setInterval(function(){
		$.ajax({
			url:baseURL+'Welcome/gamesList',
			method:'GET',
		   	success:function(data){
				var da = jQuery.parseJSON(data);
				for(var i = 0;i < da.length; i++){
					$("tbody").append("<tr  class='listtr' >");
					$("tbody").append("<td class='list_names'><a href="+baseURL+"lobby/"+da[i].name+">"+da[i].name+"</a></td>");
					$("tbody").append("<td class='list_players'>"+da[i].players+"</td>");
				}
		   }
		});
	},5000);
    
    

	window.setInterval(function(){
  		$("#tbody tr").remove();
		$("#tbody td").remove();
		$("#create_success ").remove();
		$("#create_insuccess").remove();

	}, 5000);
	

});
	

</script>