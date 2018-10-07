<?php

class Webservice extends CI_Controller {

	function __construct() { 
         parent::__construct(); 
         $this->load->helper("url");
         $this->load->database();
        $this->load->model('Game');
        $this->load->model("Pandemic");
    }
            
    public function remove_cube()
	{
        $uri = explode('/', $_SERVER['REQUEST_URI']);
        $username = $uri[6];
        $id = $uri[7];
        $vez = $this->get_playing();
        if($vez==$username){
        $city = $this->get_current_city($username,$id);
		$cities = $this->Pandemic->just_get_cubes($id);
		$city = str_replace(' ', '', $city);
		$canCure = $cities[$city];
		if($canCure == 1 or $canCure==2 or $canCure==3)
		{
            $city = $this->get_current_city($username,$id);
		  $this->Pandemic->remove_cube($city, $id);
		  echo $city;
		}
        else{
		echo 'cidade nao tem infeção';
        }
        }
        else{
            echo 'nao é a sua vez';
            }
	}
    
    public function show2(){

   
        $uri = explode('/', $_SERVER['REQUEST_URI']);
        $id = $uri[6];
        $username1= $uri[7];
        $username2= $uri[8];
        
        for($i=0;$i<2;$i++){
            $username = $uri[$i+7];
            echo $username;
		  $this->show($username,$id);
        }
		$stations = $this->Pandemic->get_stations($id);
		$stations = array_values($stations);
		$send = "";
		//for ($i=0; $i < sizeof($stations); $i++) 
		//{ 
		//	$send .= "<tr class='trrs'><td class='stations'>".$stations[$i]."</td><";
		//}
		echo var_dump(array_filter($stations));
        
        $dbhost = "appserver-01.alunos.di.fc.ul.pt";
        $dbuser = "asw011";
        $dbpass = "asw011";
        $dbname = "asw011";
        $conn = mysqli_connect($dbhost, $dbuser, $dbpass, $dbname);
        if (mysqli_connect_error()) {
         die("Database connection failed:".mysqli_connect_error());
        }

        $sql = "SELECT * FROM cities WHERE id=$id";
        $result=mysqli_query($conn, $sql) or die("Error: ".$que);
        $html = []; 
        foreach ($result as $row) {
                $html[] =  $row ;
        }
        
        print_r($html);
        }
    
    public function show3(){
        $uri = explode('/', $_SERVER['REQUEST_URI']);
        $id = $uri[6];
        $username1= $uri[7];
        $username2= $uri[8];
        
        for($i=0;$i<3;$i++){
            $username = $uri[$i+7];
            echo $username;
		  $this->show($username,$id);
        }
    }
    
    public function show4(){
        $uri = explode('/', $_SERVER['REQUEST_URI']);
        $id = $uri[6];
        $username1= $uri[7];
        $username2= $uri[8];
        
        for($i=0;$i<4;$i++){
            $username = $uri[$i+7];
            echo $username;
		  $this->show($username,$id);
        }
    }
    public function show($username,$id){
    echo "\n";
    $city = $this->get_current_city($username,$id);
		$citiescol = $this->Pandemic->cities;
		$adj = $this->Pandemic->get_adjacent($city);
		array_shift($adj);
        $adj = array_filter($adj);
		$show = "";
		for ($i=0; $i < sizeof($adj) ; $i++) {
			if($citiescol[$adj[$i]][0] == "K"){
				$color = "black";
			}elseif($citiescol[$adj[$i]][0] == "B"){
				$color = "blue";
			}elseif($citiescol[$adj[$i]][0] == "R"){
				$color = "red";
			}elseif($citiescol[$adj[$i]][0] == "Y"){
				$color = "#d1a000";
			}
			$show .= " ".$adj[$i];
		}
        $cidades = explode(" ", $show);
        for($p=0;$p<count($cidades);$p++){
            echo $cidades[$p];
            echo "\n";
        }
            echo "\n";

    }
            

         
      
    public function show_moves(){
        $uri = explode('/', $_SERVER['REQUEST_URI']);
        $username = $uri[6];
        $id = $uri[7];
        $cidade = $uri[8];
        
        $vez = $this->get_playing();
        if($vez==$username){
        
		$city = $this->get_current_city($username,$id);
		$citiescol = $this->Pandemic->cities;
		$adj = $this->Pandemic->get_adjacent($city);
		array_shift($adj);
        $adj = array_filter($adj);
		$show = "";
		for ($i=0; $i < sizeof($adj) ; $i++) {
			if($citiescol[$adj[$i]][0] == "K"){
				$color = "black";
			}elseif($citiescol[$adj[$i]][0] == "B"){
				$color = "blue";
			}elseif($citiescol[$adj[$i]][0] == "R"){
				$color = "red";
			}elseif($citiescol[$adj[$i]][0] == "Y"){
				$color = "#d1a000";
			}
			$show .= " ".$adj[$i];
		}
        $cidades = explode(" ", $show);
        
        if (in_array($cidade, $cidades)) { 
            $this->moveto($cidade);
            echo 'ACEITE';
        }
        else{
            echo "NAO ACEITE";
        }

        }
        else{
            echo 'Nao é a sua vez.';
        }

	}
        
    	public function get_current_city($user,$id)
	{
		$ccity =  $this->Pandemic->get_current_city($id, $user);
		return $ccity;
	}
    
    	public function moveto($city)
	{
        $uri = explode('/', $_SERVER['REQUEST_URI']);
        $username = $uri[6];
        $id = $uri[7];
        $cidade = $uri[8];
		$this->load->model("Game");
		$this->load->model("Pandemic");
		$this->Pandemic->move($id, $username, $cidade);
	}
    
    public function get_playing(){
        $uri = explode('/', $_SERVER['REQUEST_URI']);
        $username = $uri[6];
        $id = $uri[7];
        $this->load->model("Game");
		$this->load->model("Pandemic");
        
        $playing = $this->Pandemic->get_turn($id);
        return $playing;
    }
    
    public function create(){
        $uri = explode('/', $_SERVER['REQUEST_URI']);
        $username = $uri[6];
        $id = $uri[7];
		$cards = $this->Pandemic->get_cards($id);
		$current = $this->Pandemic->get_current_city($id, $username);
		//$cards = implode(",", $cards[0]["cartas"])
		
		for ($i=0; $i < sizeof($cards); $i++) 
		{ 
			if ($cards[$i]["nick"]==$username)
			{
				$cities = explode(",", $cards[$i]["cartas"]);
			}
		}

		if(in_array($current, $cities))
		{
		$current = $this->Pandemic->get_current_city($id, $username);
		$this->Pandemic->add_station($id, $current);
		$this->Pandemic->remove_card($id, $username, $current);
        echo 'ACEITE';
		}
        else{
                    echo 'NAO ACEITE';
        }
    }

    
        
}
    
        
?>