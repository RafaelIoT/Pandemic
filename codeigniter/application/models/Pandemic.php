


<?php 
   class Pandemic extends CI_Model {
	
      function __construct() { 
         parent::__construct(); 
      } 

      public $cities = array(
		'Algiers' => array('K','Cairo','Madrid','Paris','Istanbul'),
		'Atlanta' => array('B','Miami','Washington','Chicago'),
		'Baghdad' => array('K','Karachi','Riyadh','Istanbul','Cairo','Tehran'),
		'Bangkok' => array('R','Jakarta','Chennai','Kolkata','HoChiMinhCity','HongKong'),
		'Beijing' => array('R','Shanghai','Seoul'),
		'Bogota' => array('Y','MexicoCity','Lima','Miami','SaoPaulo', 'BuenosAires'),
		'BuenosAires' => array('Y','SaoPaulo','Bogota'),
		'Cairo' => array('K','Riyadh','Algiers','Baghdad','Istanbul','Khartoum'),
		'Chennai' => array('K','Jakarta','Bangkok','Mumbai','Delhi','Kolkata'),
		'Delhi' => array('K','Kolkata','Karachi','Tehran','Mumbai','Chennai'),
		'Chicago' => array('B','Atlanta','SanFrancisco','LosAngeles','MexicoCity','Montreal'),
		'Essen' => array('B','London','Paris','StPetersburg','Milan'),
		'HoChiMinhCity' => array('R','Manila','Jakarta','Bangkok','HongKong'),
		'HongKong' => array('R','HoChiMinhCity','Manila','Bangkok','Taipei','Shanghai','Kolkata'),
		'Istanbul' => array('K','Baghdad','Cairo','Algiers','Milan','StPetersburg','Moscow', 'Baghdad'),
		'Jakarta' => array('R','HoChiMinhCity','Bangkok','Sydney','Chennai'),
		'Johannesburg' => array('Y','Kinshasa','Khartoum'),
		'Karachi' => array('K','Delhi','Tehran','Baghdad','Riyadh','Mumbai'),
		'Khartoum' => array('Y','Kinshasa','Johannesburg','Cairo','Lagos'),
		'Kinshasa' => array('Y','Lagos','Khartoum','Johannesburg'),
		'Kolkata' => array('K','HongKong','Bangkok','Chennai','Delhi'),
		'Lagos' => array('Y','Kinshasa','Khartoum','SaoPaulo'),
		'Lima' => array('Y','Santiago','Bogota','MexicoCity'),
		'London' => array('B','Essen','Paris','Madrid','NewYork'),
		'LosAngeles' => array('Y','Chicago','SanFrancisco','MexicoCity','Sydney'),
		'Madrid' => array('B','SaoPaulo','Paris','London','Algiers','NewYork'),
		'Manila' => array('R','Sydney','Taipei','HongKong','HoChiMinhCity','SanFrancisco'),
		'MexicoCity' => array('Y','Miami','LosAngeles','Bogota','Lima','Chicago'),
		'Miami' => array('Y','Washington','Bogota','MexicoCity','Atlanta'),
		'Milan' => array('B','Paris','Essen','Istanbul',''),
		'Montreal' => array('B','Washington','Chicago','NewYork'),
		'Moscow' => array('K','StPetersburg','Tehran','Istanbul'),
		'Mumbai' => array('K','Chennai','Karachi','Delhi',''),
		'NewYork' => array('B','London','Madrid','Washington','Montreal'),
		'Osaka' => array('R','Tokyo','Taipei'),
		'Paris' => array('B','Madrid','Algiers','London','Essen','Milan'),
		'Riyadh' => array('K','Karachi','Baghdad','Cairo'),
		'SanFrancisco' => array('B','Chicago','Tokyo','LosAngeles','Manila'),
		'Santiago' => array('Y','Lima'),
		'SaoPaulo' => array('Y','Madrid','Lagos','BuenosAires','Bogota'),
		'Seoul' => array('R','Beijing','Shanghai','Tokyo'),
		'Shanghai' => array('R','Beijing','Taipei','Seoul','Tokyo','HongKong'),
		'StPetersburg' => array('B','Essen','Moscow','Istanbul'),
		'Sydney' => array('R','Manila','Jakarta','LosAngeles'),
		'Taipei' => array('R','Osaka','Manila','HongKong','Shanghai'),
		'Tehran' => array('K','Kolkata','Moscow','Karachi','Baghdad','Delhi'),
		'Tokyo' => array('R','Seoul','Osaka','Shanghai','SanFrancisco'),
		'Washington' => array('B','NewYork','Miami','Atlanta','Montreal')

		); 

      public function search_game($id){
      		$sql = "SELECT * FROM pandemic WHERE pandemic.id ='".$id."'";
      		$query = $this->db->query($sql);
      		return $query->result();
      }

      public function create_game($id, $name, $order){
      		$sql = "INSERT INTO pandemic(id,outbreak,rate,cured,plays,idiscart,pdiscart,started,winner,ended,stations,player_order) 
      			VALUES(".$id.",0,0,'','".$name."','','','".date('m/d/Y h:i:s a', time())."','','','','".$order."')";
      		$query = $this->db->query($sql);
      }

      public function insert_plays($name, $id){
      		$sql = "INSERT INTO plays(id,nick,cartas,city,turn) VALUES(".$id.",'".$name."','','Atlanta',0)";
      		$query = $this->db->query($sql);
      }

      public function get_all()
      {
	      	$sql = "SELECT * FROM game";
	      	$query = $this->db->query($sql);

	      	$result = $query->result_array();
	      	return $result;

      }

      public function get_playing()
      {
      		$sql = "SELECT * FROM pandemic";
      		$query = $this->db->query($sql);
      		$result = $query->result_array();
	      	return $result;
      }

      public function player_turn($game)
      {
      		$this->load->model("Game");
			$id = $this->Game->get_game_id($game);
      		$sql = "SELECT pandemic.plays from pandemic where pandemic.id = ".$id;
      		$query = $this->db->query($sql);
      		foreach ($query->result() as $key) {
      			$turn = $key->plays;
      		}
      		return $turn;
      }


      public function inf_in_discart($id)
      {
	      	$sql = "SELECT pandemic.idiscart FROM pandemic WHERE pandemic.id=".$id;
	      	$query = $this->db->query($sql);
	      	foreach ($query->result() as $key) 
	      	{
	      			$d = $key->idiscart;
	      	}
	      	$in_discart = explode(",", $d);
            $in_discart = array_filter($in_discart);
	      	return $in_discart;
      }

      public function pl_in_discart($id)
      {
	      	$sql = "SELECT pandemic.pdiscart FROM pandemic WHERE pandemic.id=".$id;
	      	$query = $this->db->query($sql);
	      	foreach ($query->result() as $key) 
	      	{
	      			$d = $key->pdiscart;
	      	}
	      	$in_discart = explode(",", $d);
            $in_discart = array_filter($in_discart);
	      	return $in_discart;
      }

      public function add_idiscart($id, $city)
      {
      		$in_discart = $this->inf_in_discart($id);	
      		array_push($in_discart, $city);
      		
      		$sql = "UPDATE pandemic SET pandemic.idiscart='".implode(",",$in_discart)."' WHERE pandemic.id=".$id;
      		$query = $this->db->query($sql);
      }
       
      public function reset_idiscard($id){
          $sql = "UPDATE pandemic SET pandemic.idiscart='' WHERE pandemic.id=".$id;
          $query = $this->db->query($sql);
      }

      public function add_pdiscart($id, $city)
      {
      		$in_discart = $this->pl_in_discart($id);	
      		array_push($in_discart, $city);
      		
      		$sql = "UPDATE pandemic SET pandemic.pdiscart='".implode(",",$in_discart)."' WHERE pandemic.id=".$id;
      		$query = $this->db->query($sql);
      }

      public function get_player_card($id, $nick)
      {
      		$sql = "SELECT plays.cartas FROM plays WHERE plays.id=".$id." AND plays.nick='".$nick."'";
	      	$query = $this->db->query($sql);
	      	foreach ($query->result() as $key) 
	      	{
	      			$d = $key->cartas;
	      	}
	      	$cartas = explode(",", $d);
          
	      	return $cartas;
      }

      public function get_cards($id)
     {
     		$sql = "SELECT plays.nick, plays.cartas FROM plays WHERE plays.id=".$id;
	      	$query = $this->db->query($sql);
	      	return $query->result_array();

     }

      public function give_cards($game, $name, $city)
      {
      		$cartas = $this->get_player_card($game, $name);
      		$cartas = implode(",", $cartas);
      		$cartas .= $city.',';

      		$sql = "UPDATE plays SET plays.cartas='".$cartas."' WHERE plays.id=".$game." AND plays.nick='".$name."'";
      		$query = $this->db->query($sql);
      		//echo "<script>alert(".$sql.");</script>";
      }


      public function city_table($id)
      {
      		$sql = "INSERT INTO cities(id) VALUES(".$id.")";
      		$query = $this->db->query($sql);
      }

       public function get_city_cubes($id){
           $sql = "SELECT * FROM cities WHERE id=".$id;
      	   $query = $this->db->query($sql);
      	   
           $result =  $query->row_array();
       }
       

      public function get_cubes($id)
      {
      	$sql = "SELECT * FROM cities WHERE id=".$id;
      	$query = $this->db->query($sql);
      	$result =  $query->row_array();
      	//return $result;
      	
      	$cites = array_keys($this->cities);

		$a = "";
		for ($i=1; $i <sizeof($result)-1 ; $i++) { 
			if(!$result[$cites[$i]])
			{
				$c=0;
			}
			else
			{
				$c = $result[$cites[$i]];
			}
			$b = $cites[$i];
			if($this->cities[$b][0] == "K"){
				$color = "black";
			}elseif($this->cities[$b][0] == "B"){
				$color = "blue";
			}elseif($this->cities[$b][0] == "R"){
				$color = "red";
			}elseif($this->cities[$b][0] == "Y"){
				$color = "#d1a000";
			}

			$a .= "<tr class='trc'><td class='cname' style='color:".$color."'>".$b."</td><td class='cubes'>".$c."</td></tr>";
			
		}

		return $a;
		
      }

      public function just_get_cubes($id)
      {
      	$sql = "SELECT * FROM cities WHERE id=".$id;
      	$query = $this->db->query($sql);
      	$result =  $query->row_array();
      	return $result;
      }

      public function add_station($id, $city)
      {
      	$stations = array_filter($this->get_stations($id));
      	$stations = implode(',', $stations);
      	$stations .= ",".$city;
      	$sql = "UPDATE pandemic SET pandemic.stations='".$stations."' WHERE pandemic.id=".$id;
      	$query = $this->db->query($sql);
      	return $sql;
      }

      public function get_stations($id)
      {
      	$sql = "SELECT pandemic.stations FROM pandemic WHERE id=".$id;
      	$result = $this->db->query($sql);
      	foreach ($result->result() as $key) 
		      	{
		      			$stations = $key->stations;
		      	}
		$stations = explode(",", $stations);
		$stations = array_filter($stations);

		return $stations;

      }

      public function add_cubes($id, $city,$cubes)
	  {
	  		
	  		$sql = "SELECT cities.".$city." FROM cities WHERE cities.id=".$id;
	  		$query = $this->db->query($sql);
            $over = false;
	  		if($query->num_rows()==0)
	  		{
	  			$c = 0;
	  		}
	  		else
	  		{
		  		foreach ($query->result() as $key) 
		      	{
		      			$c = $key->$city;
		      	}
	      	}
	      	if($c + $cubes > 3){
                
                //echo "<script>alert('out');</script>";
	      		$over = $this->increment_outbreak($id);
                
	      		/*
	      		if($c == 0){
					$this->add_cubes($id, $city, 3);
	      		}elseif($c == 1){
	      			$this->add_cubes($id, $city, 2);
	      		}elseif($c == 2){
	      			$this->add_cubes($id, $city, 1);
	      		}else{
	      			$this->add_cubes($id, $city, 0);
	      		}
                */
                
                $sql = "UPDATE cities SET cities.".$city."=3 WHERE cities.id=".$id;
	  			$query = $this->db->query($sql);
	      		$adjacent = $this->cities[$city];
                
	      		for($x = 1; $x<count($adjacent); $x++){
                    $sql = "SELECT cities.".$adjacent[$x]." FROM cities WHERE cities.id=".$id;
                    $query = $this->db->query($sql);
                    $over = false;
                    if($query->num_rows()==0)
                    {
                        $c = 0;
                    }
                    else
                    {
                        foreach ($query->result() as $key) 
                        {
                                $c = $key->$adjacent[$x];
                        }
                    }
                    if($c == 3){
                        $over = true;
                        return $over;
                    }
                    else{
	      			//echo "<script>alert('".$adjacent[$x]."');</script>";
	      			  $this->add_cubes($id, $adjacent[$x], 1);
                    }
	      		}
	      		
	      	}
	      	else
	      	{
	      		//echo "<script>alert('hhh');</script>";
	  			$sql = "UPDATE cities SET cities.".$city."=".($cubes+$c)." WHERE cities.id=".$id;
	  			$query = $this->db->query($sql);
	  		}
            return $over;
            
          
      }
       
      public function game_over($id,$won){
          $this->set_end_time($id,$won);
          
          
      }
    
       public function set_end_time($id,$won){
          $sql = "UPDATE pandemic SET ended='".date('m/d/Y h:i:s a', time())."' WHERE id=".$id;
          $sql2 = "UPDATE pandemic SET winner='".$won."' WHERE id=".$id;
	  	  $query = $this->db->query($sql);
	  	  $query = $this->db->query($sql2);
      }
    

      public function increment_outbreak($id)
      {
            $outbreak = $this->get_outbreak($id);
            $over = false;
            if(($outbreak+1) == 8){
                $over = true;
                return $over;
            }else{
      		    $sql = "UPDATE pandemic SET outbreak = outbreak+1 WHERE id=".$id;
      		    $query = $this->db->query($sql);
            }
            return $over;
      }
      public function get_outbreak($id)
      {
      		$sql = "SELECT pandemic.outbreak FROM pandemic where id=".$id;
      		$query = $this->db->query($sql);
      		foreach ($query->result() as $key) 
		      	{
		      			$out = $key->outbreak;
		      	}
		    return $out;
      }

      public function increment_rate($id)
      {
      		$sql = "UPDATE pandemic SET rate=rate+1 WHERE id=".$id;
      		$query = $this->db->query($sql);
      }
      public function get_rate($id)
      {
      		$sql = "SELECT pandemic.rate FROM pandemic where id=".$id;
      		$query = $this->db->query($sql);
      		foreach ($query->result() as $key) 
		      	{
		      			$out = $key->rate;
		      	}
		    return $out;
      }


      public function player_position($game){
      		$sql = "SELECT plays.nick, plays.city FROM plays WHERE plays.id =".$game;
      		$query = $this->db->query($sql);

      		$result = array();
      		foreach ($query->result() as $key) 
		      	{
		      		$adjacent = $this->cities[$key->city];
		      		array_shift($adjacent);
		      	
		      		$result[$key->nick] = array($key->city,$adjacent);

		      	}
		    return $result;
      }

      public function get_turn($id){
      		$sql = "SELECT pandemic.plays FROM pandemic WHERE id =".$id;
      		$query = $this->db->query($sql);
      		foreach ($query->result() as $key) 
		      	{
		      			$turn = $key->plays;
		      	}
		    return $turn;
      }


      public function get_adjacent($city)
      {
      		$city = str_replace(' ', '', $city);
      		$adj = $this->cities[$city];
      		return $adj;
      }

      public function get_current_city($id, $name)
      {
      	$sql = "SELECT plays.city FROM plays WHERE id=".$id." AND nick='".$name."'";
      	$result = $this->db->query($sql);
      	foreach ($result->result() as $key) 
      	{
      		$city = $key->city;
      	}
		return $city;
      }
       
       public function get_all_current_city($id)
      {
      	$sql = "SELECT plays.nick, plays.city FROM plays WHERE id=".$id;
      	$result = $this->db->query($sql);
		return $result->result();
      }


      public function move($id, $player, $city)
      {
      		$sql = "UPDATE plays SET plays.city='".$city."' WHERE id=".$id." AND nick='".$player."'";
      		$query = $this->db->query($sql);
      }

      public function remove_cube($city, $id)
      {
      		$cities = $this->just_get_cubes($id);
      		$cubes = $cities[$city];
            if($cubes-1>-1){
      		    $sql = "UPDATE cities SET ".$city."=".($cubes-1)." WHERE id=".$id;
      		    $query = $this->db->query($sql);
            }
      }
       
      public function remove_all_cubes($city, $id)
      {
            $sql = "UPDATE cities SET cities.".$city."=0 WHERE cities.id=".$id;
      		$query = $this->db->query($sql);
      }

      public function get_turns($id)
      {
      	$sql = "SELECT plays.nick FROM plays WHERE id=".$id;
      	$result = $this->db->query($sql);
      	$result = $result->result();
      	$players = array();
      	foreach ($result as $key) 
      	{
      		array_push($players, $key->nick);
      	}
      	return $players;
      }


      public function change_turn($id, $current)
      {
      		$turns = $this->get_turns($id);
      		$key = array_search($current, $turns);
      		$size = sizeof($turns);
      		
      		if(($key+1)==$size)
      		{
      			#next player is [0]
      			$sql = "UPDATE pandemic SET plays='".$turns[0]."' WHERE id=".$id;
      			$this->db->query($sql);
      		}
      		else
      		{
      			#next player is key+1
      			$sql = "UPDATE pandemic SET plays='".$turns[$key+1]."' WHERE id=".$id;
      			$this->db->query($sql);
      		}
			
			return $turns;
   	  }

   	  public function get_date($id)
   	  {
   	  		$sql = "SELECT pandemic.started FROM pandemic WHERE id=".$id;
	      	$result = $this->db->query($sql);
	      	$result = $result->result();
	      	foreach ($result as $key) 
	      	{
	      		$data = $key->started;
	      	}
	      	return $data;
   	  }

   	 public function remove_card($id, $player, $card)
   	 {
   	 	$sql = "SELECT plays.cartas FROM plays WHERE id=".$id." AND nick='".$player."'";
   	 	$result = $this->db->query($sql);
      	$result = $result->result();
      	foreach ($result as $key) 
      	{
      		$cartas = $key->cartas;
      	}
      	
      	$cartas = explode(",", $cartas);
      	$i = array_search($card, $cartas);
		unset($cartas[$i]);
		$cartas = array_filter(array_values($cartas));

		$sql = "UPDATE plays SET cartas='".(implode(",", $cartas).",")."' WHERE id=".$id." AND nick='".$player."'";
   	 	$this->db->query($sql);

    }

    public function add_cure($id, $color)
    {
    	$cured = $this->get_cures($id);
    	$cured .=$color.",";
    	$sql = "UPDATE pandemic SET cured='".$cured."' WHERE id=".$id;
    	$this->db->query($sql);
        
        $cures = $this->get_cures($id);
        $cured_array = explode(",",$cures);
        $cured_array = array_filter($cured_array);
        
        if(sizeof($cured_array) == 4){
            return "win";
            $this->set_end_time($id);
        }
        
        return "not";
    }

    public function get_cures($id)
    {
    	$sql = "SELECT pandemic.cured FROM pandemic WHERE id=".$id;
    	$result = $this->db->query($sql);
      	$result = $result->result();
      	foreach ($result as $key) 
      	{
      		$cured = $key->cured;
      	}
      	return $cured;
    }
       
       
    public function lobby_chat($id,$name,$message){
        $sql = "INSERT INTO lobby_chat(id,name,message) VALUES(".$id.",'".$name."','".$message."')";
        $result = $this->db->query($sql);
    }
       
    public function get_lobby_chat($id){
        $sql = "SELECT * FROM lobby_chat WHERE id=".$id;
        $result = $this->db->query($sql);
        $result = $result->result();
        $chat = '';
        $i = 0;
        foreach ($result as $key) 
      	{
            $i++;
      		$name = $key->name;
      		$message = $key->message;
      		$seq = $key->seq;
            $chat.="<li>".$name.": ".$message."</li>";
      	}
      	return $chat;
    }
       
    public function delete_game($id){
        $sql = "DELETE from game where id=".$id;
        $result = $this->db->query($sql);
    }
       
       
    public function increment_turn($id, $name){
        $sql = "UPDATE plays SET turn = turn+1 WHERE id=".$id." AND nick='".$name."'";
        $this->db->query($sql);
        
    }
    public function set_n_turn($id, $name){
        $sql = "UPDATE plays SET turn=0 WHERE id=".$id." AND nick='".$name."'";
        $this->db->query($sql);
        
    }
       
    public function get_turn_n($id, $name){
        $sql = "SELECT turn FROM plays WHERE id=".$id.". AND nick='".$name."'";
        $result = $this->db->query($sql);
        $result = $result->result();
        return $result[0];
    }

       
}

?> 

















