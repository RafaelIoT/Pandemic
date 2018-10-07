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
        	Welcome back
        </p>

        <div class="searching" id="waiting">Games waiting
				<button id="b1" type="submit">Search</button>
		</div> 
		
		<div class="searching" id="started">Games on
				<button id="b2" type="submit">Search</button>
			
		</div>
				<input id="i3" name="searching"  type="text">
				<button id="b3" type="submit">Search</button>
		<div class="searching" id="search">Search games
		
		</div>


    </div>
		
	<div id="show_results">
		<table>
			
		</table>
	</div>
    
    
</body>
    
</html>

<script>
	$(document).ready(function(){
		var baseURL= "<?php echo base_url();?>";
        
        var i1;
        var i2;
        var i3;
        
        function waiting(){
            $.ajax({
                    url:baseURL+'index.php/Welcome/get_games',
                    method:'GET',
                    success:function(data){
                        $("#show_results table").remove();
                        $(data).appendTo("#show_results ");

                    }
                });  
        }
        
        function on(){
            $.ajax({
				url:baseURL+'index.php/Welcome/get_on',
				method:'GET',
		   		success:function(data){
		   			$("#show_results table").remove();
			   		$(data).appendTo("#show_results");
		   		}
			});       
        }
        
        function one(){
            var name= $("#i3").val();
	 		if(!name){
	 			name = "estenaoexistedecerteza";
	 		}
			$.ajax({
				url:baseURL+'index.php/Welcome/get_game',
				method:'POST',
				data:{
					'name':name
				},
		   		success:function(data){
		   			$("#show_results table").remove();
		   			$(data).appendTo("#show_results");
		   			
		   		}
			}); 
        }

		$("#b1").click(function(){
            clearInterval(i2);
            clearInterval(i3);
            i2 = null;
            i3 = null;
            i1 = setInterval(waiting, 1000);
	 	});

		$("#b2").click(function(){
             clearInterval(i1);
             clearInterval(i3);
             i1 = null;
             i3 = null;
			 i2 = setInterval(on, 1000);
	 	});

	 	$("#b3").click(function(){
	 		 clearInterval(i2);
             clearInterval(i1);
             i1 = null;
             i2 = null;
             i3 = setInterval(one, 1000);     
	 	});






 	});	

</script>