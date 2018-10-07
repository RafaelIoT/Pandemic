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
        	Players in:
        </p>

        <table id="players_ready">
        	<tr>

        	</tr>
        </table>

        <a id="leave" href="<?php echo base_url().'index.php/leave_lobby';?>">Leave Lobby</a>

    </div>
		
	
    <div id="chat_back"></div>
    <div id="chat">
        <ol></ol>
        <textarea id="write"></textarea>
        <button id="send">Send</button>
        <button id="d">Send</button>
    </div>
    
    
</body>
    
</html>
<script>

$(document).ready(function(){
	var baseURL= "<?php echo site_url();?>"+'/';

	window.setInterval(function(){
  		$.ajax({
			url:baseURL+'Welcome/players_in',
			method:'GET',
		   	success:function(data)
		   	{
				var da = jQuery.parseJSON(data);
				$("tbody .listtr").remove();
				$("tbody .list_names").remove();
				for(var i = 0;i < da.length; i++)
				{
					$("tbody").append("<tr  class='listtr' >");
					$("tbody").append("<td class='list_names'>"+da[i].player+"</td>");
				}	   
			}
		});

	}, 500);

	window.setInterval(function(){
  		$.ajax({
			url:baseURL+'Welcome/ready',
			method:'GET',
		   	success:function(data)
		   	{
                console.log(data);
				if(data == 1)
				{
					$("body").append("<p id='game_starting'>Game starting!</p>")
					setInterval(function(){ 
						location.href = baseURL+'pandemic'; 
				}, 3000);
				}
                if(data == 2)
				{
                    if (document.getElementById("comecar")==null){
					$("body").append("<a id='comecar' href='jogo/comecar'>Comecar</a>")
                    }
				}
			}
		});

	}, 500);
    
    function show_messages(){
        $.ajax({
            type: "GET",
            url: baseURL + "Welcome/get_lobby_chat", 
            success:function(data){
                $("#chat ol li").remove();
                $("#chat ol").append(data);
            }
        });
    } 
    
    show_messages();
    var baseURL= "<?php echo site_url();?>"+'/';
    $(document).on("click", "#send", function(){
        var message = $("#write").val();
        $("#write").val('');
        $.ajax({
            type: "POST",
            url: baseURL + "Welcome/write_lobby_chat", 
            data: {message: message},
            success:function(data){
                show_messages();
            }
            });
        });
    window.setInterval(function(){
        show_messages();
    },500);

});

	

</script>