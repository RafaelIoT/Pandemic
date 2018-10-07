 <!DOCTYPE html>
<html>
<head>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
</head>
    
<style>
    
    #googleMap{
        width: 100%;
        height: 84%;
        position: absolute;
        overflow: hidden;
        margin: auto;
        left: 0;
        right: 0;
    }   
    
    #commands{
        width: 300px;
        position: absolute;
        height: 50px;
        border: 1px solid black;
        left: 0;
        z-index: 3;
        background: #424242;
        box-shadow: 2px 3px 9px 0px black;
        border-bottom-right-radius: 10px;
        color: white;
        text-align: center;
        font-size: 40px;
    }
    
    #bar{
            width: 79%;
    position: absolute;
    height: 50px;
    border: 1px solid black;
    right: 0;
    z-index: 3;
    background: #424242;
    box-shadow: 2px 3px 9px 0px black;
    color: white;
    text-align: center;
    font-size: 20px;
    }
    
    #turn{
        position: absolute;
        top: 10px;
        left: 23px;
    }
    
    #outbreak{
        position: absolute;
        top: 10px;
        left: 223px;
    }
    
    #irate{
        position: absolute;
        top: 10px;
        left: 423px;
    }
    
</style>    
<body>

    
    
<h1>My First Google Map</h1>
    
<button id="demo">Click me</button>
<button id="jjj">Click me</button>
<div id="bar">
    <div id="turn">Playing</div>
    <div id="outbreak">Outbreak</div>
    <div id="irate">Infection Rate</div>
    
</div>
<div id="commands">Play
    
    
    
</div>

<div id="googleMap"></div>
    
  
    
    
    
    
 <script>
          var circles = {};
        function initMap() {  
            $(document).ready(function(){
     var baseURL= "<?php echo site_url();?>"+'/';
     
      var citymap = {
        Algiers: {
	       center: {lat: 36.859, lng: 3.394},
            color: '#000000'
        },
        Atlanta: {
            center: {lat: 33.750, lng: -84.393},
            color: '#0000ff'
            },
        Baghdad: {
            center: {lat: 33.314, lng: 44.360},
            color: '#000000'
            },
        Bangkok: {
            center: {lat: 13.779, lng: 100.548},
            color: '#ff0000'
            },
        Beijing: {
            center: {lat: 40.044, lng: 116.480},
            color: '#ff0000'
            },
        Bogota: {
            center: {lat: 4.704, lng: -74.064},
            color: '#000000'
            },
        BuenosAries: {
            center: {lat: -34.605, lng: -58.378},
            color: '#ffff00'
            },
        Cairo: {
            center: {lat: 30.049, lng: 31.237},
            color: '#000000'
            },
        Chennai: {
            center: {lat: 13.082, lng: 80.270},
            color: '#000000'
            },
        Chicago: {
            center: {lat: 41.878, lng: -87.629},
            color: '#0000ff'
            },
        Delhi: {
            center: {lat: 28.645, lng: 77.219},
            color: '#000000'
            },
        Essen: {
            center: {lat: 51.454, lng: 7.017},
            color: '#0000ff'
            },
        HoChiMinhCity: {
            center: {lat: 10.811, lng: 106.637},
            color: '#ff0000'
            },
        HongKong: {
            center: {lat: 22.323, lng: 114.186},
            color: '#ff0000'
            },
        Istanbul: {
            center: {lat: 41.007, lng: 28.979},
            color: '#000000'
            },
        Jakarta: {
            center: {lat: -6.210, lng: 106.855},
            color: '#ff0000'
            },
        Johannesburg: {
            center: {lat: -26.206, lng: 28.061},
            color: '#ffff00'
            },
        Karachi: {
            center: {lat: 24.873, lng: 67.009},
            color: '#000000'
            },
        Khartoum: {
            center: {lat: 15.506, lng: 32.563},
            color: '#ffff00'
            },
        Kinshasa: {
            center: {lat: -4.445, lng: 15.275},
            color: '#ffff00'
            },
        Kolkata: {
            center: {lat: 22.568, lng: 88.381},
            color: '#000000'
            },
        Lagos: {
            center: {lat: 6.522, lng: 3.375},
            color: '#ffff00'
            },
        Lima: {
            center: {lat: -11.979, lng: -77.049},
            color: '#ffff00'
            },
        London: {
            center: {lat: 51.507, lng: -0.124},
            color: '#0000ff'
            },
        LosAngeles: {
            center: {lat: 34.047, lng: -118.240},
            color: '#ffff00'
            },
        Madrid: {
            center: {lat: 40.416, lng: -3.698},
            color: '#0000ff'
            },
        Manila: {
            center: {lat: 14.597, lng: 120.990},
            color: '#ff0000'
            },
        MexicoCity: {
            center: {lat: 19.429, lng: -99.124},
            color: '#ffff00'
            },
        Miami: {
            center: {lat: 25.760, lng: -80.192},
            color: '#ffff00'
            },
        Milan: {
            center: {lat: 45.462, lng: 9.188},
            color: '#0000ff'
            },
        Montreal: {
            center: {lat: 45.499, lng: -73.577},
            color: '#0000ff'
            },
        Moscow: {
            center: {lat: 55.763, lng: 37.615},
            color: '#ffff00'
            },
        Mumbai: {
            center: {lat: 19.073, lng: 72.874},
            color: '#000000'
            },
        NewYork: {
            center: {lat: 40.711, lng: -73.983},
            color: '#0000ff'
            },
        Osaka: {
            center: {lat: 34.670, lng: 135.496},
            color: '#ff0000'
            },
        Paris: {
            center: {lat: 48.855, lng: 2.352},
            color: '#0000ff'
            },
        Riyadh: {
            center: {lat: 24.731, lng: 46.671},
            color: '#000000'
            },
        SanFrancisco: {
            center: {lat: 37.774, lng: -122.415},
            color: '#0000ff'
            },
        Santiago: {
            center: {lat: -33.209, lng: -70.846},
            color: '#ffff00'
            },

        SaoPaulo: {
            center: {lat: -23.551, lng: -46.629},
            color: '#ffff00'
            },
        Seoul: {
            center: {lat: 37.548, lng: 126.989},
            color: '#ff0000'
            },
        Shanghai: {
            center: {lat: 31.350, lng: 121.487},
            color: '#ff0000'
            },
        StPetersburg: {
            center: {lat: 59.937, lng: 30.359},
            color: '#0000ff'
            },
        Sydney: {
            center: {lat: -33.874, lng: 151.203},
            color: '#ff0000'
            },
        Taipei: {
            center: {lat: 25.043, lng: 121.559},
            color: '#ff0000'
            },
        Tehran: {
            center: {lat: 35.696, lng: 51.385},
            color: '#000000'
            },
        Tokyo: {
            center: {lat: 35.737, lng: 139.728},
            color: '#ff0000'
            },
        Washington: {
            center: {lat: 38.904, lng: -77.026},
            color: '#0000ff'
            }
      };
     
     var map;


        // Create the map.
        map = new google.maps.Map(document.getElementById('googleMap'), {
          zoom: 2,
          center: {lat: 37.090, lng: -95.712},
          styles: [{"featureType":"all","elementType":"all","stylers":[{"visibility":"on"}]},{"featureType":"all","elementType":"labels","stylers":[{"visibility":"off"},{"saturation":"-100"}]},{"featureType":"all","elementType":"labels.text.fill","stylers":[{"saturation":36},{"color":"#000000"},{"lightness":40},{"visibility":"off"}]},{"featureType":"all","elementType":"labels.text.stroke","stylers":[{"visibility":"off"},{"color":"#000000"},{"lightness":16}]},{"featureType":"all","elementType":"labels.icon","stylers":[{"visibility":"off"}]},{"featureType":"administrative","elementType":"geometry.fill","stylers":[{"color":"#000000"},{"lightness":20}]},{"featureType":"administrative","elementType":"geometry.stroke","stylers":[{"color":"#000000"},{"lightness":17},{"weight":1.2}]},{"featureType":"landscape","elementType":"geometry","stylers":[{"color":"#000000"},{"lightness":20}]},{"featureType":"landscape","elementType":"geometry.fill","stylers":[{"color":"#4d6059"}]},{"featureType":"landscape","elementType":"geometry.stroke","stylers":[{"color":"#4d6059"}]},{"featureType":"landscape.natural","elementType":"geometry.fill","stylers":[{"color":"#4d6059"}]},{"featureType":"poi","elementType":"geometry","stylers":[{"lightness":21}]},{"featureType":"poi","elementType":"geometry.fill","stylers":[{"color":"#4d6059"}]},{"featureType":"poi","elementType":"geometry.stroke","stylers":[{"color":"#4d6059"}]},{"featureType":"road","elementType":"geometry","stylers":[{"visibility":"on"},{"color":"#7f8d89"}]},{"featureType":"road","elementType":"geometry.fill","stylers":[{"color":"#7f8d89"}]},{"featureType":"road.highway","elementType":"geometry.fill","stylers":[{"color":"#7f8d89"},{"lightness":17}]},{"featureType":"road.highway","elementType":"geometry.stroke","stylers":[{"color":"#7f8d89"},{"lightness":29},{"weight":0.2}]},{"featureType":"road.arterial","elementType":"geometry","stylers":[{"color":"#000000"},{"lightness":18}]},{"featureType":"road.arterial","elementType":"geometry.fill","stylers":[{"color":"#7f8d89"}]},{"featureType":"road.arterial","elementType":"geometry.stroke","stylers":[{"color":"#7f8d89"}]},{"featureType":"road.local","elementType":"geometry","stylers":[{"color":"#000000"},{"lightness":16}]},{"featureType":"road.local","elementType":"geometry.fill","stylers":[{"color":"#7f8d89"}]},{"featureType":"road.local","elementType":"geometry.stroke","stylers":[{"color":"#7f8d89"}]},{"featureType":"transit","elementType":"geometry","stylers":[{"color":"#000000"},{"lightness":19}]},{"featureType":"water","elementType":"all","stylers":[{"color":"#2b3638"},{"visibility":"on"}]},{"featureType":"water","elementType":"geometry","stylers":[{"color":"#2b3638"},{"lightness":17}]},{"featureType":"water","elementType":"geometry.fill","stylers":[{"color":"#24282b"}]},{"featureType":"water","elementType":"geometry.stroke","stylers":[{"color":"#24282b"}]},{"featureType":"water","elementType":"labels","stylers":[{"visibility":"off"}]},{"featureType":"water","elementType":"labels.text","stylers":[{"visibility":"off"}]},{"featureType":"water","elementType":"labels.text.fill","stylers":[{"visibility":"off"}]},{"featureType":"water","elementType":"labels.text.stroke","stylers":[{"visibility":"off"}]},{"featureType":"water","elementType":"labels.icon","stylers":[{"visibility":"off"}]}]
        });

        // Construct the circle for each value in citymap.
        // Note: We scale the area of the circle based on the population.
        for (var city in citymap) {
          // Add the circle for this city to the map.
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
          
       var flightPlanCoordinates = [
citymap.Montreal.center,citymap.NewYork.center,citymap.Washington.center,citymap.Montreal.center,citymap.Washington.center,citymap.Atlanta.center,citymap.Chicago.center,citymap.Montreal.center,citymap.NewYork.center,citymap.London.center,citymap.Madrid.center,citymap.NewYork.center,citymap.Madrid.center,citymap.Paris.center,citymap.Algiers.center,citymap.Paris.center,citymap.Essen.center,citymap.London.center,citymap.Paris.center,citymap.London.center,citymap.Madrid.center,citymap.Algiers.center,citymap.Paris.center,citymap.Milan.center,citymap.Essen.center,citymap.StPetersburg.center,citymap.Istanbul.center,citymap.Milan.center,citymap.Istanbul.center,citymap.Algiers.center,citymap.Cairo.center,citymap.Istanbul.center,citymap.Baghdad.center,citymap.Cairo.center,citymap.Riyadh.center,citymap.Baghdad.center,citymap.Tehran.center,citymap.Moscow.center,citymap.Istanbul.center,citymap.Moscow.center,citymap.StPetersburg.center,citymap.Moscow.center,citymap.Tehran.center,citymap.Karachi.center,citymap.Delhi.center,citymap.Tehran.center,citymap.Karachi.center,citymap.Riyadh.center,citymap.Karachi.center,citymap.Mumbai.center,citymap.Delhi.center,citymap.Kolkata.center,citymap.Delhi.center,citymap.Chennai.center,citymap.Mumbai.center,citymap.Chennai.center,citymap.Kolkata.center,citymap.HongKong.center,citymap.Bangkok.center,citymap.Kolkata.center,citymap.Bangkok.center,citymap.Chennai.center,citymap.Jakarta.center,citymap.HoChiMinhCity.center,citymap.Bangkok.center,citymap.Jakarta.center,citymap.Sydney.center,citymap.Manila.center,citymap.HoChiMinhCity.center,citymap.HongKong.center,citymap.Manila.center,citymap.Taipei.center,citymap.Shanghai.center,citymap.HongKong.center,citymap.Shanghai.center,citymap.Beijing.center,citymap.Seoul.center,citymap.Shanghai.center,citymap.Tokyo.center,citymap.Seoul.center,citymap.Tokyo.center,citymap.Osaka.center,citymap.Taipei.center,citymap.Tokyo.center,citymap.SanFrancisco.center,citymap.Chicago.center,citymap.SanFrancisco.center,citymap.Manila.center,citymap.Sydney.center,citymap.LosAngeles.center,citymap.MexicoCity.center,citymap.Chicago.center,citymap.SanFrancisco.center,citymap.LosAngeles.center,citymap.Chicago.center,citymap.MexicoCity.center,citymap.Miami.center,citymap.Washington.center,citymap.Atlanta.center,citymap.Miami.center,citymap.Bogota.center,citymap.MexicoCity.center,citymap.Lima.center,  citymap.Bogota.center,citymap.MexicoCity.center,citymap.Lima.center,citymap.Bogota.center,citymap.MexicoCity.center,citymap.Lima.center,citymap.Santiago.center,citymap.Lima.center,citymap.Bogota.center,citymap.BuenosAries.center,citymap.SaoPaulo.center, citymap.Bogota.center,citymap.Miami.center,citymap.Bogota.center,citymap.SaoPaulo.center,citymap.Madrid.center,citymap.SaoPaulo.center,citymap.Lagos.center,citymap.Kinshasa.center,citymap.Khartoum.center,citymap.Lagos.center,citymap.Khartoum.center,citymap.Cairo.center,citymap.Khartoum.center,citymap.Johannesburg.center    
        ];
          
        var flightPath = new google.maps.Polyline({
          path: flightPlanCoordinates,
          strokeColor: '#ffffff',
          strokeOpacity: 1.0,
          strokeWeight: 1
        });

        flightPath.setMap(map);
      
                
        
          
            
        
          var icons = {
        station:{
            icon: "http://appserver-01.alunos.di.fc.ul.pt/~asw011/etapa2/codeigniter/assets/img/station.png"
              },
          algiers: {
            icon: "http://appserver-01.alunos.di.fc.ul.pt/~asw011/etapa2/codeigniter/assets/img/cities/algiers.png"
          },
          atlanta: {
            icon: "http://appserver-01.alunos.di.fc.ul.pt/~asw011/etapa2/codeigniter/assets/img/cities/atlanta.png"
          },
          baghdad: {
            icon:  "http://appserver-01.alunos.di.fc.ul.pt/~asw011/etapa2/codeigniter/assets/img/cities/baghdad.png"
          }
        };
          
           var features = [
              {
                position: citymap.Algiers.center,
                type: 'algiers'
              }, {
                position: citymap.Atlanta.center,
                type: 'atlanta'
              }, {
                position: citymap.Baghdad.center,
                type: 'baghdad'
              }
            ]
           
           features.forEach(function(feature) {
              var marker = new google.maps.Marker({
                position: feature.position,
                icon: {url: icons[feature.type].icon, scaledSize: new google.maps.Size(50, 25)},
                map: map
              });
            });
          
          function add_station(city){
              var a = citymap[city].center;
              var a_lat = a.lat-1;
              var a_lng = a.lng;
              var station = new google.maps.Marker({
                position: new google.maps.LatLng(a_lat,a_lng),
                icon: {url: icons['station'].icon, scaledSize: new google.maps.Size(25, 25)},
                map: map
              });
          }
          
          
    
     add_station("LosAngeles");
     add_station("Atlanta");
          

     function set_circle(city, i_radius, cub){
            var newCircle = {
            strokeColor: citymap[city].color,
            strokeOpacity: 0.8,
            strokeWeight: 2,
            fillColor: citymap[city].color,
            fillOpacity: 0.25,
            map: map,
            center: citymap[city].center,
            radius: i_radius
          };
         
         var circle = new google.maps.Circle(newCircle);
         circles[city] = circle;
         alert(circles);
        }
                
      function set_radius(city,cub) {
        if(cub==0){
            set_circle(city,150000, cub);
            cub++;
        }else if(cub==1){
            set_circle(city,200000, cub);
            cub++;
        }else if(cub==2){
            set_circle(city,250000, cub);
            cub++;
        }

      }
            
        function a(){
            alert(String(circles["Atlanta"]));
        }          
            var cub = 0;

    $("#demo").click(function(){
        set_radius("Atlanta",cub);
    });
    $("#jjj").click(function(){
        a();
    });
    
    var click_play = 0;
    $("#commands").click(function(){
        if(click_play == 0){
            $("#commands").animate({"height":"83%"});
            click_play = 1;
            
            $.ajax({
			url:baseURL+'Welcome/show_moves',
			method:'GET',
		   	success:function(data){
		   		//alert(data);
                $("#commands #moveTo").remove();
                $("#commands br").remove();
			   	$("#commands").append(data);
		   	}
		});
            
            
        }else{
            $("#commands").animate({"height":"50px"});
            click_play = 0;
        }
    });


     
     
     window.setInterval(function(){
         

  		$.ajax({
			url:baseURL+'Welcome/get_turn',
			method:'GET',
		   	success:function(data)
		   	{
				var d = data.replace(/^\s|\s+$/gm,'')
				if(d == '<button id="play">Play</button>')
		   		{
			   		$("#commands").css("pointer-events","auto");
		   		}
		   		else
		   		{
                    $("#commands").css("pointer-events","none");
                    
		   		}

			}
		});
         
         
  		

	}, 500);
     
});
          
      }
     
    </script>
    
    <script async defer
    src="https://maps.googleapis.com/maps/api/js?key=AIzaSyB0zQOkmZpx5PhErdripUqTSte0gdmDbso&callback=initMap">
    </script>    
    
</body>
</html> 
