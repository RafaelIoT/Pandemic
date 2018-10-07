 <!DOCTYPE html>
<html>
<head>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <link rel="stylesheet" href="<?php echo base_url();?>assets/css/style.css">
</head>
    
<style>
    
    #googleMap{
        width: 100%;
        height: 89%;
        position: absolute;
        overflow: hidden;
        margin: auto;
        left: 0;
        right: 0;
        top: 90px;
        min-height: 100vh;
    }   
    
    #commands,#commands_back{
        width: 350px;
        position: absolute;
        height: 50px;
        border: 1px solid black;
        left: 0;
        z-index: 3;
        box-shadow: 2px 3px 9px 0px black;
        border-bottom-right-radius: 10px;
        color: white;
        text-align: center;
        font-size: 40px;
        top: 90px;
        overflow: hidden;
    }
    #commands_back{
        background: #424242;
        opacity: 0.8;
    }
    
    
    #turn {
        position: absolute;
        top: 10px;
        left: 23px;
    }

    #turn, #outbreak, #irate {
        position: absolute;
        z-index: 6;
        color: yellow;
        font-size: 19px;
        font-weight: bold;
        border: none;
        margin-left: 34%;
    }
    #turn p, #outbreak p, #irate p{
        position: absolute;
        top: -18px;
    }
    
    #bar,#bar_back{
        width: 99%;
        position: absolute;
        height: 50px;
        border: 1px solid black;
        z-index: 3;
        box-shadow: 2px 3px 9px 0px black;
        color: white;
        text-align: center;
        font-size: 20px;
        top: 90px;
    }
    #bar_back{
        background: #424242;
        opacity: 0.8;
    }
    
    #outbreak{
        position: absolute;
        top: 10px;
        margin-left: 56%;
    }
    
    #irate{
        position: absolute;
        top: 10px;
        margin-left: 59%;
    }
    
    #playing_name{
        position: absolute;
        top: -30px;
        left: 130px;
    }
    #outbreak_val{
        position: absolute;
        top: -30px;
        left: 140px;
    }
    #irate_val{
        position: absolute;
        top: -30px;
        left: 210px;
    }
    
    #okplay{
        POSITION: ABSOLUTE;
        top: -51px;
        width: 100%;
    }
    
    #jjj{
        z-index: 10;
        position: absolute;
    }
    
    #over{
        POSITION: ABSOLUTE;
        top: 130px;
        color: red;
        left: 560px;
        width: 100%;
        font-size: 100px;
    }
    
    #moveto, #movetocard{
        position: absolute;
        z-index: 9;
        color: white;
        font-size: 25px;
        top: 40px;
        right: 10px;
        width: 130px;
    }
    
    #moveto button, #movetocard button{
        margin-top: 1px;
        margin-bottom: 10px;
        width: 130px;
    }
    
    #commands #cure{
        position: absolute;
        z-index: 9;
        top: 440px;
        left: 250px;
        color: black;
        font-size: 20px;
        width: 95px;
        height: 55px;
        border: 1px solid white;
    }

    
    #jogadas {top: 10pxleft: 250px;top: 10px;}
    
    #show_turn{
		height: 500px;
		position: absolute;
		width: 350px;
		margin: auto;
		left: 0;
		right: 0;
		top: 200px;
		z-index: -4;
		color: white;
        text-align: center;
        font-size: 25px;
	}
	
	#show_turn_back{
		height: 500px;
		position: absolute;
		width: 350px;
		margin: auto;
		left: 0;
		right: 0;
		top: 200px;
		z-index: -2;
		background: #424242;
		opacity: 0.8;
		box-shadow: 0px 0px 20px 0px black;
	}

    
    #players_cards{
        text-align: center;
        color: white;
        position: absolute;
        bottom: 0;
        height: 145px;
        background: #424242;
        z-index: 2;
        left: 0;
        width: 70px;
        transition: width 2s;
        overflow: hidden;
    }
    #movetocard h4{
        MARGIN-BOTTOM: 5px;
    }
    
    #players_cards:hover{
        width: 50%;
    }
	
    #showcardsp{
        position: absolute;
        top: 15px;
        left: 0px;
        width: 70px;
        text-shadow: 0px 0px 20px #FFFF00;
    }
    
    .cards{
        margin-left: 100px;
    }
    
    #movetocard{
        left: 10px;
    }
    
    #show_cured{
        height: 200px;
        width: 70px;
        background: #424242;
        z-index: 5;
        position: absolute;
        right: 0;
        top: 150px;
        border: 1px solid black;
        opacity: 0.8;
        border-radius: 54px;
    }
    #red,#blue,#black,#yellow{
        height: 40px;
        width: 40px;
        border: 1px solid black;
        box-shadow: 0px 0px 10px black;
        margin: auto;
        margin-top: 6px;
        border-radius: 50%;
    }
    
</style>    
<body>

    
    
<div id="header"> 
        <div id="logo">Pandemic</div>
    </div>
    
<button id="jjj">Click me</button>
<div id="bar_back"></div> 
<div id="bar">
    <div id="turn">Playing:</div>
    <div id="outbreak">Outbreak:</div>
    <div id="irate">Infection Rate:</div>
</div>
<div id="commands_back"></div>
<div id="commands"><h4 id="okplay">Play</h4>
    <div id="jogadas">0</div>
</div>


<div id="googleMap"></div>

<div id="show_turn"></div>
<div id="show_turn_back"></div>
  
<div id="show_cured"><p id="red"></p><p id="blue"></p><p id="black"></p><p id="yellow"></p></div>
<div id="players_cards"><p id="showcardsp">Show Cards</p></div>
    
<div id="chat_back_game"></div>
<div id="chat_game">
    <ol></ol>
    <textarea id="write_game"></textarea>
    <button id="send_game">Send</button>
</div>
    
    
</body>
    
 <script>
    var circles = {};
     
    var stations = {};
    
    var markers = {};
     
    var map;
     
    var cub = 0;
    
    var current= "Atlanta";
     
    var baseURL= "<?php echo site_url();?>"+'/';
    
    var infected_stack = {};
     

        //função que carrega o mapa
        function initMap() {  
            $(document).ready(function(){
     
            var citymap = {
                        Algiers: {center: {lat: 36.859, lng: 3.394},color: '#000000'},Atlanta: {center: {lat: 33.750, lng: -84.393},color: '#0000ff'},Baghdad: {center: {lat: 33.314, lng: 44.360},color: '#000000'},Bangkok: {center: {lat: 13.779, lng: 100.548},color: '#ff0000'},Beijing: {center: {lat: 40.044, lng: 116.480},color: '#ff0000'},Bogota: {center: {lat: 4.704, lng: -74.064},color: '#ffff00'},BuenosAires: {center: {lat: -34.605, lng: -58.378},color: '#ffff00'},Cairo: {center: {lat: 30.049, lng: 31.237},color: '#000000'},Chennai: {center: {lat: 13.082, lng: 80.270},color: '#000000'},Chicago: {center: {lat: 41.878, lng: -87.629},color: '#0000ff'},Delhi: {center: {lat: 28.645, lng: 77.219},color: '#000000'},Essen: {center: {lat: 51.454, lng: 7.017},color: '#0000ff'},HoChiMinhCity: {center: {lat: 10.811, lng: 106.637},color: '#ff0000'},HongKong: {center: {lat: 22.323, lng: 114.186},color: '#ff0000'},Istanbul: {center: {lat: 41.007, lng: 28.979},color: '#000000'},Jakarta: {center: {lat: -6.210, lng: 106.855},color: '#ff0000'},Johannesburg: {center: {lat: -26.206, lng: 28.061},color: '#ffff00'},Karachi: {center: {lat: 24.873, lng: 67.009},color: '#000000'},Khartoum: {center: {lat: 15.506, lng: 32.563},color: '#ffff00'},Kinshasa: {center: {lat: -4.445, lng: 15.275},color: '#ffff00'},Kolkata: {center: {lat: 22.568, lng: 88.381},color: '#000000'},Lagos: {center: {lat: 6.522, lng: 3.375},color: '#ffff00'},Lima: {center: {lat: -11.979, lng: -77.049},color: '#ffff00'},London: {center: {lat: 51.507, lng: -0.124},color: '#0000ff'},LosAngeles: {center: {lat: 34.047, lng: -118.240},color: '#ffff00'},Madrid: {center: {lat: 40.416, lng: -3.698},color: '#0000ff'},Manila: {center: {lat: 14.597, lng: 120.990},color: '#ff0000'},MexicoCity: {center: {lat: 19.429, lng: -99.124},color: '#ffff00'},Miami: {center: {lat: 25.760, lng: -80.192},color: '#ffff00'},Milan: {center: {lat: 45.462, lng: 9.188},color: '#0000ff'},Montreal: {center: {lat: 45.499, lng: -73.577},color: '#0000ff'},Moscow: {center: {lat: 55.763, lng: 37.615},color: '#000000'},Mumbai: {center: {lat: 19.073, lng: 72.874},color: '#000000'},NewYork: {center: {lat: 40.711, lng: -73.983},color: '#0000ff'},Osaka: {center: {lat: 34.670, lng: 135.496},color: '#ff0000'},Paris: {center: {lat: 48.855, lng: 2.352},color: '#0000ff'},Riyadh: {center: {lat: 24.731, lng: 46.671},color: '#000000'},SanFrancisco: {center: {lat: 37.774, lng: -122.415},color: '#0000ff'},Santiago: {center: {lat: -33.209, lng: -70.846},color: '#ffff00'},SaoPaulo: {center: {lat: -23.551, lng: -46.629},color: '#ffff00'},Seoul: {center: {lat: 37.548, lng: 126.989},color: '#ff0000'},Shanghai: {center: {lat: 31.350, lng: 121.487},color: '#ff0000'},StPetersburg: {center: {lat: 59.937, lng: 30.359},color: '#0000ff'},Sydney: {center: {lat: -33.874, lng: 151.203},color: '#ff0000'},Taipei: {center: {lat: 25.043, lng: 121.559},color: '#ff0000'},Tehran: {center: {lat: 35.696, lng: 51.385},color: '#000000'},Tokyo: {center: {lat: 35.737, lng: 139.728},color: '#ff0000'},Washington: {center: {lat: 38.904, lng: -77.026},color: '#0000ff'}
                };
            
            
            var flightPlanCoordinates = [   
                        citymap.Montreal.center,citymap.NewYork.center,citymap.Washington.center,citymap.Montreal.center,citymap.Washington.center,citymap.Atlanta.center,citymap.Chicago.center,citymap.Montreal.center,citymap.NewYork.center,citymap.London.center,citymap.Madrid.center,citymap.NewYork.center,citymap.Madrid.center,citymap.Paris.center,citymap.Algiers.center,citymap.Paris.center,citymap.Essen.center,citymap.London.center,citymap.Paris.center,citymap.London.center,citymap.Madrid.center,citymap.Algiers.center,citymap.Paris.center,citymap.Milan.center,citymap.Essen.center,citymap.StPetersburg.center,citymap.Istanbul.center,citymap.Milan.center,citymap.Istanbul.center,citymap.Algiers.center,citymap.Cairo.center,citymap.Istanbul.center,citymap.Baghdad.center,citymap.Cairo.center,citymap.Riyadh.center,citymap.Baghdad.center,citymap.Tehran.center,citymap.Moscow.center,citymap.Istanbul.center,citymap.Moscow.center,citymap.StPetersburg.center,citymap.Moscow.center,citymap.Tehran.center,citymap.Karachi.center,citymap.Delhi.center,citymap.Tehran.center,citymap.Karachi.center,citymap.Riyadh.center,citymap.Karachi.center,citymap.Mumbai.center,citymap.Delhi.center,citymap.Kolkata.center,citymap.Delhi.center,citymap.Chennai.center,citymap.Mumbai.center,citymap.Chennai.center,citymap.Kolkata.center,citymap.HongKong.center,citymap.Bangkok.center,citymap.Kolkata.center,citymap.Bangkok.center,citymap.Chennai.center,citymap.Jakarta.center,citymap.HoChiMinhCity.center,citymap.Bangkok.center,citymap.Jakarta.center,citymap.Sydney.center,citymap.Manila.center,citymap.HoChiMinhCity.center,citymap.HongKong.center,citymap.Manila.center,citymap.Taipei.center,citymap.Shanghai.center,citymap.HongKong.center,citymap.Shanghai.center,citymap.Beijing.center,citymap.Seoul.center,citymap.Shanghai.center,citymap.Tokyo.center,citymap.Seoul.center,citymap.Tokyo.center,citymap.Osaka.center,citymap.Taipei.center,citymap.Tokyo.center,citymap.SanFrancisco.center,citymap.Chicago.center,citymap.SanFrancisco.center,citymap.Manila.center,citymap.Sydney.center,citymap.LosAngeles.center,citymap.MexicoCity.center,citymap.Chicago.center,citymap.SanFrancisco.center,citymap.LosAngeles.center,citymap.Chicago.center,citymap.MexicoCity.center,citymap.Miami.center,citymap.Washington.center,citymap.Atlanta.center,citymap.Miami.center,citymap.Bogota.center,citymap.MexicoCity.center,citymap.Lima.center,  citymap.Bogota.center,citymap.MexicoCity.center,citymap.Lima.center,citymap.Bogota.center,citymap.MexicoCity.center,citymap.Lima.center,citymap.Santiago.center,citymap.Lima.center,citymap.Bogota.center,citymap.BuenosAires.center,citymap.SaoPaulo.center, citymap.Bogota.center,citymap.Miami.center,citymap.Bogota.center,citymap.SaoPaulo.center,citymap.Madrid.center,citymap.SaoPaulo.center,citymap.Lagos.center,citymap.Kinshasa.center,citymap.Khartoum.center,citymap.Lagos.center,citymap.Khartoum.center,citymap.Cairo.center,citymap.Khartoum.center,citymap.Johannesburg.center    
                ];
            

        // Create the map.
        map = new google.maps.Map(document.getElementById('googleMap'), {
          zoom: 2,
          center: {lat: 37.090, lng: -95.712},
          styles: [{"featureType":"all","elementType":"all","stylers":[{"visibility":"on"}]},{"featureType":"all","elementType":"labels","stylers":[{"visibility":"off"},{"saturation":"-100"}]},{"featureType":"all","elementType":"labels.text.fill","stylers":[{"saturation":36},{"color":"#000000"},{"lightness":40},{"visibility":"off"}]},{"featureType":"all","elementType":"labels.text.stroke","stylers":[{"visibility":"off"},{"color":"#000000"},{"lightness":16}]},{"featureType":"all","elementType":"labels.icon","stylers":[{"visibility":"off"}]},{"featureType":"administrative","elementType":"geometry.fill","stylers":[{"color":"#000000"},{"lightness":20}]},{"featureType":"administrative","elementType":"geometry.stroke","stylers":[{"color":"#000000"},{"lightness":17},{"weight":1.2}]},{"featureType":"landscape","elementType":"geometry","stylers":[{"color":"#000000"},{"lightness":20}]},{"featureType":"landscape","elementType":"geometry.fill","stylers":[{"color":"#4d6059"}]},{"featureType":"landscape","elementType":"geometry.stroke","stylers":[{"color":"#4d6059"}]},{"featureType":"landscape.natural","elementType":"geometry.fill","stylers":[{"color":"#4d6059"}]},{"featureType":"poi","elementType":"geometry","stylers":[{"lightness":21}]},{"featureType":"poi","elementType":"geometry.fill","stylers":[{"color":"#4d6059"}]},{"featureType":"poi","elementType":"geometry.stroke","stylers":[{"color":"#4d6059"}]},{"featureType":"road","elementType":"geometry","stylers":[{"visibility":"on"},{"color":"#7f8d89"}]},{"featureType":"road","elementType":"geometry.fill","stylers":[{"color":"#7f8d89"}]},{"featureType":"road.highway","elementType":"geometry.fill","stylers":[{"color":"#7f8d89"},{"lightness":17}]},{"featureType":"road.highway","elementType":"geometry.stroke","stylers":[{"color":"#7f8d89"},{"lightness":29},{"weight":0.2}]},{"featureType":"road.arterial","elementType":"geometry","stylers":[{"color":"#000000"},{"lightness":18}]},{"featureType":"road.arterial","elementType":"geometry.fill","stylers":[{"color":"#7f8d89"}]},{"featureType":"road.arterial","elementType":"geometry.stroke","stylers":[{"color":"#7f8d89"}]},{"featureType":"road.local","elementType":"geometry","stylers":[{"color":"#000000"},{"lightness":16}]},{"featureType":"road.local","elementType":"geometry.fill","stylers":[{"color":"#7f8d89"}]},{"featureType":"road.local","elementType":"geometry.stroke","stylers":[{"color":"#7f8d89"}]},{"featureType":"transit","elementType":"geometry","stylers":[{"color":"#000000"},{"lightness":19}]},{"featureType":"water","elementType":"all","stylers":[{"color":"#2b3638"},{"visibility":"on"}]},{"featureType":"water","elementType":"geometry","stylers":[{"color":"#2b3638"},{"lightness":17}]},{"featureType":"water","elementType":"geometry.fill","stylers":[{"color":"#24282b"}]},{"featureType":"water","elementType":"geometry.stroke","stylers":[{"color":"#24282b"}]},{"featureType":"water","elementType":"labels","stylers":[{"visibility":"off"}]},{"featureType":"water","elementType":"labels.text","stylers":[{"visibility":"off"}]},{"featureType":"water","elementType":"labels.text.fill","stylers":[{"visibility":"off"}]},{"featureType":"water","elementType":"labels.text.stroke","stylers":[{"visibility":"off"}]},{"featureType":"water","elementType":"labels.icon","stylers":[{"visibility":"off"}]}]
        });

         
                
            
        map.setCenter(citymap.Atlanta.center);
        map.setZoom(4.5);
        
        //adiciona os circulos de cada cidades
        for (var city in citymap) {
          var cityCircle = new google.maps.Circle({
            strokeColor: citymap[city].color,
            strokeOpacity: 1,
            strokeWeight: 2,
            fillColor: citymap[city].color,
            fillOpacity: 0.35,
            map: map,
            center: citymap[city].center,
            radius: 100000
          });
        }
        
        //mete na lista de circulos todos os circulos de doença de cada cidade
        for(var i=1;i<4;i++){
            for (var city in citymap) {
                if(i == 1){
                    var radius = 150000;
                }else if( i==2 ){
                    var radius = 200000;
                }else if( i==3 ){
                    var radius = 250000;
                }
              // 
                var cityCircle = {
                    strokeColor: citymap[city].color,
                    strokeOpacity: 1,
                    strokeWeight: 2,
                    fillColor: citymap[city].color,
                    fillOpacity: 0.20,
                    map: map,
                    center: citymap[city].center,
                    radius: radius
                 };
                 name = city+i;
                 circles[name] = new google.maps.Circle(cityCircle);
            }
        }
          
        // mete todos os cubos invisiveis
        for(circle in circles){
            circles[circle].setMap(null);
        } 
                
        function add_cube(city, cubes){
            if(cubes == 3){
                circles[city+1].setMap(map);
                circles[city+2].setMap(map);
                circles[city+3].setMap(map);
            }
            else if(cubes == 2){
                circles[city+1].setMap(map);
                circles[city+2].setMap(map);
                circles[city+3].setMap(null);
            }
            else if(cubes == 1){
                circles[city+1].setMap(map);
                circles[city+2].setMap(null);
                circles[city+3].setMap(null);
            }
            else if(cubes == 0){
				circles[city+1].setMap(null);
                circles[city+2].setMap(null);
                circles[city+3].setMap(null);
			}
            
        }
                
        function remove_cube(city){
            circles[city+1].setMap(null);
            circles[city+2].setMap(null);
            circles[city+3].setMap(null);   
        }
                

        // cria as ligações entre cidades
        var flightPath = new google.maps.Polyline({
          path: flightPlanCoordinates,
          strokeColor: '#ffffff',
          strokeOpacity: 1.0,
          strokeWeight: 1
        });
        //define as ligações no mapa
        flightPath.setMap(map);
      
                
        
        // lista de icones com nome das cidades
        var icons = {
          station:{
            icon: "http://appserver-01.alunos.di.fc.ul.pt/~asw011/etapa2/codeigniter/assets/img/station.png"
              }
        };
        
        function getDim(url){
			var img = new Image();
			img.onload = function(){
				var hw = [this.height,this.width];
				return hw;
			};
			img.src = url;
		};
             
        for (var name in citymap){
			var url = "http://appserver-01.alunos.di.fc.ul.pt/~asw011/etapa2/codeigniter/assets/img/cities/"+name.toLowerCase()+".png";
            icons[name] = {'icon' : url,
				hw:getDim(url)}
        }      
          
                
        var features = [
          {
            position: citymap.Algiers.center,
            type: 'Algiers'
          }, {
            position: citymap.Atlanta.center,
            type: 'Atlanta'
          }, {
            position: citymap.Baghdad.center,
            type: 'Baghdad'
          }
        ];
                
        for(var city in citymap){
            features.push(
                {
                    position: citymap[city].center,
                    type: city
                });
        };
         
        //código para adicionar imagem com nome da cidade ao mapa   
        features.forEach(function(feature) {
			//var h = icons[feature.type].hw[0];
			//var w =icons[feature.type].hw[0];
			var marker = new google.maps.Marker({
				position: feature.position,
				icon: {url: icons[feature.type].icon, scaledSize: new google.maps.Size(50, 25)},
				map: map
			});
        });
          
        
                
        for (var station in citymap){
            var a = citymap[station].center;
            var a_lat = a.lat-1;
            var a_lng = a.lng;
            var imgD = getDim(station["icon"]);
            console.log(imgD);
            console.log(station);
            var resource = {
            position: new google.maps.LatLng(a_lat,a_lng),
            icon: {url: icons['station'].icon, scaledSize: new google.maps.Size(30, 30)},
            map: map
          };
           stations[station] = new google.maps.Marker(resource);
           stations[station].setMap(null);
            
        }       
         
        
        function add_station(city){
            stations[city].setMap(map);
            
        }
                
        function remove_station(city){
            stations[station].setMap(null);
        }
                      
        function get_names(){
            $.ajax({
                url: 'http://appserver-01.alunos.di.fc.ul.pt/~asw011/etapa2/codeigniter/index.php/Welcome/players_in',
                method:'GET',
                success:function(data){
                    //alert(data);
                    var data = jQuery.parseJSON(data);
                    var players = [];
                    for(var i = 0; i < data.length; i++){
                        players.push(data[i]["player"]);
                    }
                    add_markers(players);
                    
                }
            });
        }
         
        function add_markers(players){
            
            for(var i = 0; i < players.length; i++){
                var a = citymap["Atlanta"].center;
                var a_lat = a.lat-Math.random()+Math.random();
                var a_lng = a.lng - Math.random()+Math.random();
                var marker ={
                    position: new google.maps.LatLng(a_lat,a_lng),
                    label: players[i],
                    map: map
                  };

                markers[players[i]] = new google.maps.Marker(marker);
            }
        }
                
        function move_marker(player, city){
            console.log('aaaaa'+citymap[city].center.lat);
            var a = citymap[city].center;
            var a_lat = a.lat-Math.random()+Math.random();
            var a_lng = a.lng - Math.random()+Math.random();
            markers[player].setPosition(new google.maps.LatLng(a_lat,a_lng));

        }
                
                
        function show_positions(){
            $.ajax({
                url:baseURL+'Welcome/get_all_current_city',
                method:'GET',
                success:function(data){
                    var data = jQuery.parseJSON(data);
                    var players = [];
                    for(var i = 0; i < data.length; i++){
                        players.push(data[i]["player"]);
                        move_marker(data[i]["nick"],data[i]["city"]);
                    }    
                }
            });
        }
                
        function setCenter(city){
            map.panTo(citymap[city].center);
            //map.setZoom(4.5);
        }
         
        function show_moves(){
            $.ajax({
                url:baseURL+'Welcome/show_moves',
                method:'GET',
                success:function(data){
                    //alert(data);
                    $("#commands #moveto").remove();
                    $("#commands br").remove();
                    $("#commands").append(data);
                }
            });
        } 
                
        function show_card(){
            $.ajax({
				url:baseURL+'Welcome/get_cards',
				method:'GET',
			   	success:function(data)
			   	{
					$("#cards_body .trc").remove();
					$("#cards_body .cpname").remove();		
					$("#cards_body .ccname").remove();
					$("#cards_body").append(data);	
                    console.log(data);
				}
			});
        }
                
        function get_cured(){
            $.ajax({
                url:baseURL+'Welcome/get_cured',
                method:'GET',
                success:function(data){
                    if (data.search("Red") != -1){
                        $('#red').css("background","red");
                    }
                    if (data.search("Blue") != -1){
                        $('#blue').css("background","blue");
                    }
                    if (data.search("Black") != -1){
                        $('#black').css("background","black");
                    }
                    if (data.search("Yellow") != -1){
                        $('#yellow').css("background","yellow");
                    }
                }
            });
        }
        
        function get_current(){
            $.ajax({
                url: 'http://appserver-01.alunos.di.fc.ul.pt/~asw011/etapa2/codeigniter/index.php/Welcome/get_current',
                method:'GET',
                success:function(data){
                    console.log(data);
                    current = data.replace(/\s/g,'');
                    var a = current;
                    var player = $("#playing_name").text();
					setCenter(a);
                }
            });
    
        }
                
                
        function show_playing(){
            $.ajax({
                url:baseURL+'Welcome/get_playing',
                method:'GET',
                success:function(data){
                    //alert(data);
                    $("#turn p").remove();
                    $("#turn").append("<p id='playing_name'>"+data.replace(/\s/g,'')+"</p>");
                    console.log("PLaying: "+data.replace(/\s/g,''));
                }
            });
        }
                
        function get_outbreak(){
            $.ajax({
                url:baseURL+'Welcome/get_new_outbreak',
                method:'GET',
                success:function(data){
                    $("#outbreak p").remove();
                    $("#outbreak").append("<p id='outbreak_val'>"+data.replace(/\s/g,'')+"</p>");
                    console.log("outbreak: "+data.replace(/\s/g,''));
                }
            });
        }
                
        function get_irate(){
            $.ajax({
                url:baseURL+'Welcome/get_new_rate',
                method:'GET',
                success:function(data){
                    $("#irate p").remove();
                    $("#irate").append("<p id='irate_val'>"+data.replace(/\s/g,'')+"</p>");
                    console.log(data.replace(/\s/g,''));
                }
            });
        }
          
        function get_stations(){
            $.ajax({
                url:baseURL+'Welcome/get_stations',
                method:'GET',
                success:function(data){
                    var data = jQuery.parseJSON(data);	
                    for(var i=0; i<data.length; i++){
                        add_station(data[i]);
                    }
                }
            });
        }
                
        function get_turn(){
            $.ajax({
                url:baseURL+'Welcome/get_turn',
                method:'GET',
                success:function(data)
                {
                    var d = data.replace(/^\s|\s+$/gm,'')
                    if(d == '<button id="play">Play</button>')
                    {
                        $("#commands").css("pointer-events","auto");
                        $("#commands").css("color","green");
                    }
                    else
                    {
                        $("#commands").css("pointer-events","none");
                        $("#commands").css("color","red");

                    }

                }
		  });
        }
                
        $("#jjj").click(function(){
            //setCenter(current);
            get_turn_n();
        })
                
        function can_cure(){
            $.ajax({
                url:baseURL+'Welcome/can_cure',
                method:'GET',
                success:function(data)
                {
					if(parseInt(data) == 1){
                         $("#commands").append("<button id='cure_disease'>Cure disease</button>");
                    }
                    
                }
              });
        }
                
        function get_piles(){
            $.ajax({
                url:baseURL+'Welcome/get_piles',
                method:'GET',
                success:function(data)
                {
                    if(parseInt(data)==48){
                        alert("NO MORE CARDS, YOU LOSE");
                    }
                    alert(data);
                }
              });
        }
                
                
        function get_cards(){
            $.ajax({
                url:baseURL+'Welcome/get_cards',
                method:'GET',
                success:function(data)
                {
                    $("#players_cards").append(data);
                }
            
            });
        }
        
        function jogadas4(){
            if(($("#jogadas").text())>=4){
               set_0();
               end_turn();
             }
        }
                
        
        function show_card(){
            $.ajax({
                url:baseURL+'Welcome/get_cards_moves',
                method:'GET',
                success:function(data)
                {
                    $("#commands #movetocard").remove();
                    $("#commands").append("<div id='movetocard'><h4>Move to card</h4></div>");
                    $("#commands #movetocard").append(data);
                }
            });
        } 
                
        function get_turn_n(){
            jogadas4();
            $.ajax({
                url:baseURL+'Welcome/get_turn_n',
                method:'GET',
                success:function(data)
                {
                    var data = jQuery.parseJSON(data);	
                    var n = data["turn"];
                    $("#jogadas").text(parseInt(n));
                }
            });
        }
                
        function set_0(){
            $.ajax({
                url:baseURL+'Welcome/set_n_turn',
                method:'GET',
                success:function(data)
                {
                    $("#jogadas").text(0);
                }
            });
        }
                
        function incre_turn(){
            $.ajax({
                url:baseURL+'Welcome/increment_turn',
                method:'GET',
                success:function(data)
                {
                    $("#jogadas").text(parseInt($("#jogadas").text())+1);
                }
            });
        }
                
                
        function cards_left(){
            $.ajax({
                url:baseURL+'Welcome/get_piles',
                method:'GET',
                success:function(data)
                {
                    var data = data.replace(/^\s|\s+$/gm,'')
                    if(parseInt(data)>=48){
                        end_game();
                    }
                }
            });
        }
                
        function end_game(){
            $("#show_turn h4").remove();
            $("#show_turn p").remove();
            $("#show_turn br").remove();
            $("#show_turn h3").remove();
            $("#show_turn button").remove();
            $("#show_turn").animate({"z-index":"4"})
            $("#show_turn_back").animate({"z-index":"3"})
            $("#show_turn").append("<h3>GAME OVER</h3>");
            $("#show_turn").append("<h3>NO MORE CARDS</h3>");
            $("#show_turn").append("<button id='leave'>BACK TO HOME</button>");
        }
                
        function win_game(){
            $("#show_turn h4").remove();
            $("#show_turn p").remove();
            $("#show_turn br").remove();
            $("#show_turn h3").remove();
            $("#show_turn button").remove();
            $("#show_turn").animate({"z-index":"4"})
            $("#show_turn_back").animate({"z-index":"3"})
            $("#show_turn").append("<h3>YOU WON</h3>");
            $("#show_turn").append("<h3>ALL DISEASES ARE CURED</h3>");
            $("#show_turn").append("<button id='leave_win'>BACK TO HOME</button>");
        }
                
                
        function can_create_station(){
            $.ajax({
                url:baseURL+'Welcome/can_create_station',
                method:'GET',
                success:function(data)
                {
                    $("#commands #create_station").remove();
                    $("#commands").append(data);
     
                }
            });
        }
              
                
        function get_city_cubes(){
            $.ajax({
                url:baseURL+'Welcome/get_city_cubes',
                method:'GET',
                success:function(data)
                {
                    var data = jQuery.parseJSON(data);
                    var equals = true;
                    var infected_now = []
                    var n = 0;
                    for(var cubes in data){
						if(data[cubes]>infected_stack[cubes]){
							equals = false;
							infected_now.push(cubes);
                            n = n + parseInt(data[cubes]);
							//alert(cubes);
						}
					}
                    
					if(equals == false){
                        //alert(n);
                        $("#show_turn h4").remove();
                        $("#show_turn p").remove();
                        $("#show_turn br").remove();
                        $("#show_turn h3").remove();
                        $("#show_turn").animate({"z-index":"4"})
                        $("#show_turn_back").animate({"z-index":"3"})
						
					    if(n == 1){
                            $("#show_turn").append("<h3>EPIDEMIC</h3>");
                        }
                        
                        $("#show_turn").append("<h4> infected:</h4>");
                        
						for(var i = 0; i<infected_now.length; i++){
							$("#show_turn").append("<p>"+infected_now[i]+"</p>");
						}
						
					}
                    infected_stack = data;	
                    for( var key in data)
                    {
                        if(data[key] != null){
                           add_cube(key, data[key]);
                        }
                        if(data[key] == null){
						   add_cube(key, 0);
						}
                    }
                }
              });
        }
            
        $("#show_turn").click(function(){
             $("#show_turn").animate({"z-index":"-2"})
             $("#show_turn_back").animate({"z-index":"-2"})
        })
                
        function end_turn(){
           $("#commands #moveto").remove();
		   $("#commands #moveto .moveto").remove();
           $("#commands #moveto button").remove();
           $("#commands #cure").remove();
           $("#jogadas").text(0);
           $("#okplay").click();
            $.ajax({
                url:baseURL+'Welcome/after_action',
                method:'GET',
                success:function(data)
                {
					var data = data.replace(/^\s|\s+$/gm,'')
					//alert(data);
                    
                    if(data.includes("GAME OVER")){
                        alert('GAME OVER');
                        end_game();
                    }
                    var infected = data.split(",");
                    $("#show_turn h4").remove();
                    $("#show_turn br").remove();
                    $("#show_turn h3").remove();
                    $("#show_turn p").remove();
                    $("#show_turn").animate({"z-index":"4"})
                    $("#show_turn_back").animate({"z-index":"3"})
                    if(infected[0] == "EPIDEMIC"){
						alert("EPIDEMIC");
						$("#show_turn").append("<h4>Cities infected:</h4>");
					
						for(var i = 1; i<infected.length; i++){
							$("#show_turn").append("<p>"+infected[i]+"</p>");
						}
					}
                    else if(infected[0].lenght > 20){
                        $("#show_turn").append("<h4>"+infected[0]+"</h4>");
                    }
					else {
						$("#show_turn").append("<h4>Cities infected:</h4>");
						
						for(var i = 0; i<infected.length; i++){
							$("#show_turn").append("<p>"+infected[i]+"</p>");
						}
					}
                },error: function(){
					alert(9);
				}
             });
             
        }
        
        $(document).on("click", "#cure_disease", function(){
            $("#commands #moveto").remove();
			$("#commands #moveto .moveto").remove();
			$("#commands #cure").remove();
			$("#commands #create_station").remove();
			$("#commands #cure_disease").remove();
			$.ajax({
                    url:baseURL+'Welcome/cure_disease',
                    method:'GET',
                    success:function(data){
                        data = data.replace(/\s/g,'');
                        if(data == "win"){
                            alert("YOU WON THE GAME!");
                            win_game();
                        }
                        show_moves();
                        show_card();
                    }
                });
            incre_turn();
            jogadas4();

        }) ;  
                       
                       
        $(document).on("click", "#commands #cure", function(){
			$("#commands #moveto").remove();
			$("#commands #moveto .moveto").remove();
			$("#commands #cure").remove();
			$("#commands #cure_disease").remove();
			$.ajax({
                    url:baseURL+'Welcome/remove_cube',
                    method:'GET',
                    success:function(data){
                        show_moves();
                        get_city_cubes();
                        can_create_station();
                    }
                });
            incre_turn();
            jogadas4();

        }) ;      
             
        var sc = 0;    
        $('#players_cards').hover(function(){
            $('#players_cards .cards').remove();
            get_cards();
        });

            
        $(document).on("click", ".moveto", function(){
			$("#commands #moveto").remove();
			$("#commands #moveto .moveto").remove();
			$("#commands #cure").remove();
			$("#commands #create_station").remove();
			$("#commands #cure_disease").remove(); 
			$.ajax({
				url:baseURL+'Welcome/moveto/'+$(this).text(),
				method:'GET',
				success:function(data){
					get_current();
					show_moves();
					get_city_cubes();
                    can_create_station();
                    can_cure();

				}
			});
            
            incre_turn();
            jogadas4(); 
             
        });
                
        
                
        
       $(document).on("click", "#create_station", function(){
            alert(1);
            $("#commands #create_station").remove();
            $.ajax({
				url:baseURL+'Welcome/create_station',
				method:'GET',
				success:function(data){
                    add_station(current);
				}
			});
            
            incre_turn();
            jogadas4();
        })
          
        
        $(document).on("click", "#leave_win", function(){
            $.ajax({
				url:baseURL+'Welcome/leave_win',
				method:'GET',
				success:function(data){
                    window.location.href=baseURL+'perfil';
				}
			});
            
        })
                
        $(document).on("click", "#leave", function(){
            $.ajax({
				url:baseURL+'Welcome/leave',
				method:'GET',
				success:function(data){
                    window.location.href=baseURL+'perfil';
				}
			});
            
        })
                
        $(document).on("click", "#desistir", function(){
            $.ajax({
				url:baseURL+'Welcome/leave',
				method:'GET',
				success:function(data){
                    window.location.href=baseURL+'perfil';
				}
			});
            
        })
                
                
        $(document).on("click", ".movetocard", function(){
			$("#commands #moveto").remove();
			$("#commands #moveto .moveto").remove();
            $("#commands #movetocard").remove();
			$("#commands #movetocard .movetocard").remove();
			$("#commands #cure").remove();
			$("#commands #create_station").remove();
			$("#commands #cure_disease").remove(); 
			$.ajax({
				url:baseURL+'Welcome/movetocard/'+$(this).text(),
				method:'GET',
				success:function(data){
					get_current();
					show_moves();
                    show_card();
					get_city_cubes();
                    can_create_station();
                    can_cure();
				}
			});
            
            incre_turn();
            jogadas4();
                
             
        });
                
                
                
                
        var click_play = 0;
        $("#okplay").click(function(){
            if(click_play == 0){
                $("#commands").animate({"height":"500px"});
                $("#commands_back").animate({"height":"500px"});
                click_play = 1;
                show_moves();
                show_card();
                can_create_station();
                can_cure();
                

            }else{
                $("#commands #moveto").remove();
                $("#commands #moveto .moveto").remove();
                $("#commands br").remove();
                $("#commands").animate({"height":"50px"});
                $("#commands_back").animate({"height":"50px"});
                click_play = 0;
            }
        });


    get_names();
    get_current();
                
                
    function show_messages(){
        $.ajax({
            type: "GET",
            url: baseURL + "Welcome/get_lobby_chat", 
            success:function(data){
                $("#chat_game ol li").remove();
                $("#chat_game ol").append(data);
            }
        });
    } 
    
    var baseURL= "<?php echo site_url();?>"+'/';
    $(document).on("click", "#send_chat", function(){
        var message = $("#write").val();
        $("#write_chat").val('');
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
        //get_piles();
        show_playing();
  		get_turn();
        get_outbreak();
        get_irate();
        show_positions();
        get_stations();
        get_city_cubes();
        get_cured();
        cards_left();
        get_turn_n();
        
	}, 500);
                
                
    
     

    });
}
          
      
     
</script>

<script async defer
src="https://maps.googleapis.com/maps/api/js?key=AIzaSyB0zQOkmZpx5PhErdripUqTSte0gdmDbso&callback=initMap">
</script>    
    
</body>
</html> 
