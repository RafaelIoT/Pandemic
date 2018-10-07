<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Welcome extends CI_Controller {

	function __construct() { 
         parent::__construct(); 
         $this->load->helper("url");
         $this->load->database();
        $this->load->model('Game');
         
      }
    
    public function rec(){
        $this->load->view('recuperacao');
    }

    public function map(){
        $this->load->view('map');
    }
    public function newmap(){
        $this->load->view('newmap');
    }
    
    public function rec1(){
        $this->Game->get_rec1();
        $this->load->view('recuperacao1');
    }
    
    public function rec2(){
        $this->Game->get_rec2();
    }
    
    public function aa(){
         $this->load->view('about');
    }
    
    public function do_upload()
        {
        $config['upload_path']          = './uploads/';
        $config['allowed_types']        = 'gif|jpg|png';
        $config['max_size']             = 100;
        $config['max_width']            = 1024;
        $config['max_height']           = 768;

        $this->load->library('upload', $config);

        if ( ! $this->upload->do_upload('userfile'))
        {
                $error = array('error' => $this->upload->display_errors());

                $this->load->view('upload_form', $error);
        }
        else
        {
                $data = array('upload_data' => $this->upload->data());

                $this->load->view('upload_success', $data);
        }
        }
     

	public function index()
	{		
		if($this->session->userdata("name"))
		{
			$this->session->sess_destroy();
            $this->headers();
		}
        $this->headers();
		$this->load->view('home');
	}
    
    public function register()
	{		
        $this->load->model("Game");
        //$this->Game->get_registo();
        $this->load->view('registo');

	}
    
    public function registo_check(){
        $this->load->model("Game");
        $this->Game->registo_check();
    }


	public function headers()
	{
		if(!$this->session->userdata("name")){
			echo "<a id='login' href='login'>Login</a><a id='register' href='register'>Register</a>";
		}
		else
		{
			echo "<a id='perfil' href='perfil'>Perfil</a><a id='logout' href='logout'>Logout</a>";
		}
	}
    
    public function logout(){
        $this->load->model("Game");
        $this->Game->get_logout();
        redirect('/', 'refresh');
    }
    
    

	public function about()
	{
		$this->headers();
		$this->load->view('about');
	}
	public function rules()
	{
		$this->headers();
		$this->load->view('rules');
	}

	public function admin()
	{
		echo '<form method="post" action="admin_page">		
			<p id="user_log">Username</p>
			<input id="u"  type="text" name="username" value="">
			<span class="error"></span>
			<br><br>
			
			<p id="pass_log">Password</p>
			<input id="p" type="password" name="password" value="">
			<br><br>

			<input type="submit" name="submit" value="Submit">  
		</form>';
	}

	public function admin_page()
	{


		$user = $this->input->post('username');
		$pass = $this->input->post('password');
		$this->load->model("Game");
		$result = $this->Game->search_admin($user, $pass);
		if($result == 1)
		{
			$this->session->set_userdata("admin",$user);
			$this->load->view('admin');
		}
		else
		{
			redirect('/login', 'refresh');
		}
	
	}

	public function get_games()
	{
		$this->load->model("Pandemic");
		$result = $this->Pandemic->get_all();
		$ids = array();
		for ($i=0; $i < sizeof($result); $i++) { 
			array_push($ids, $result[$i]["id"]);
		}

		$playing = $this->Pandemic->get_playing();
		$pids = array();

		for ($i=0; $i < sizeof($playing); $i++) 
		{ 
			array_push($pids, $playing[$i]["id"]);
		}

		for ($i=0; $i < sizeof($pids); $i++) 
		{ 
			$index = array_search($pids[$i], $ids);
			unset($ids[$index]);
		}
		for ($i=0; $i < sizeof($result); $i++) 
		{ 
			if (!in_array($result[$i]["id"], $ids)) 
			{
				unset($result[$i]);
			}
		}

		$str = "<table><thead><tr><th>Id</th><th>Name</th><th>Players</th><th>Description</th></tr></thead><tbody>";
		$result = array_values($result);
		for ($i=0; $i < sizeof($result); $i++) { 
			$str .= "<tr><td>".$result[$i]["id"]."</td>";
			$str .= "<td>".$result[$i]["name"]."</td>";
			$str .= "<td>".$result[$i]["players"]."</td>";
			$str .= "<td>".$result[$i]["descricao"]."</td>";
			$str.= "</tr>";
			
		}
		$str.="</tbody></table>";
		echo $str;

	}

	public function get_on()
	{
		$this->load->model("Pandemic");
		$result = $this->Pandemic->get_playing();
		$str = "<table><thead><tr><th>Id</th><th>outbreak</th><th>rate</th><th>plays</th><th>started</th><th>winner</th><th>ended</th><th>stations</th><th>players</th><th>Players pile</th><th>Infections pile</th></tr></thead><tbody>";
        
		for ($i=0; $i < sizeof($result); $i++) { 
			$str .= "<tr><td>".$result[$i]["id"]."</td>";
			$str .= "<td>".$result[$i]["outbreak"]."</td>";
			$str .= "<td>".$result[$i]["rate"]."</td>";
			$str .= "<td>".$result[$i]["plays"]."</td>";
			$str .= "<td>".$result[$i]["started"]."</td>";
			$str .= "<td>".$result[$i]["winner"]."</td>";
			$str .= "<td>".$result[$i]["ended"]."</td>";
			$str .= "<td>".$result[$i]["stations"]."</td>";
			$str .= "<td>".$result[$i]["player_order"]."</td>";
			$str .= "<td>".$result[$i]["idiscart"]."</td>";
			$str .= "<td>".$result[$i]["pdiscart"]."</td>";
			$str.= "</tr>";
		}
		$str.="</tbody></table>";
		echo $str;
	}


	public function get_game()
	{
		$search = $this->input->post('name');
		$this->load->model("Pandemic");
		$result = $this->Pandemic->get_all();

		$str = "<table><thead><tr><th>Id</th><th>Name</th><th>Players</th><th>Description</th></tr></thead><tbody>";

		for ($i=0; $i < sizeof($result); $i++)
		 { 
			$keys = array_keys($result[$i]);
			$values = array_values($result[$i]);
			$keys = implode(',', $keys);
			$values = implode(',', $values);
			if (strpos($keys, $search) !== false or strpos($values, $search) !== false) 
			{
			    $str .= "<tr><td>".$result[$i]["id"]."</td>";
				$str .= "<td>".$result[$i]["name"]."</td>";
				$str .= "<td>".$result[$i]["players"]."</td>";
				$str .= "<td>".$result[$i]["descricao"]."</td>";
				$str.= "</tr>";
			}
		}
		$str.="</tbody></table>";
		echo $str;		
	}


	public function login()
	{
		$this->headers();
            $this->load->view('login');
	}
    
    public function loginCheck(){
        $this->Game->get_check();
    }



	public function perfil()
	{
		if(!$this->session->userdata("name"))
		{
			$this->load->model("Db_checks");
			$user = $this->input->post('username');
			$email = $this->input->post('email');
			$pass = $this->input->post('password');

			$result=$this->Db_checks->search($user, $email, $pass);
			if($result){
				$this->session->set_userdata("name",$user);
                $this->headers();
				echo "<p id='player_name'>".$this->session->userdata("name")."</p>";
				$this->load->view("perfil");

			}else{
				$this->load->view("login");
			}
		}else{
			if(!$this->session->userdata("gameName"))
			{
				$this->load->view("perfil");
				echo "<p id='player_name'>".$this->session->userdata("name")."</p>";
                $this->headers();
			}
			else
			{
				redirect('/lobby/'.$this->session->userdata("gameName"), 'refresh');
			}
			
		}
	}

	public function gamesList()
	{
		$this->load->model("Game");
		$result = $this->Game->search();
		echo json_encode($result);

	}

	public function players_in()
	{
		$game = $this->session->userdata("gameName");
		$this->load->model("Game");
		$result = $this->Game->get_players($game);
		echo json_encode($result);
		
	}

	public function create_game()
	{
		$name = $this->input->post('name');
		$players = $this->input->post('players');
		$descricao = $this->input->post('descricao');
        $inicio = $this->input->post('inicio');
        if($inicio=='false'){
            $inicio=0;
        }
        else{
            $inicio=1;
        }
		$this->load->model("Game");
		$result = $this->Game->insert($name, $players, $descricao, $inicio);
        $_SESSION['admin'] = $this->session->userdata("name");
		echo $result;
	}
    public function comecar(){
        $result = $this->session->userdata("gameName");
        $sql = "UPDATE game SET admin=0 where name='$result'";
        $query = $this->db->query($sql);
        redirect('/perfil', 'refresh');
        
    }

	public function enter_lobby()
	{
		if(!$this->session->userdata("name"))
		{
			redirect('/login', 'refresh');
		}
		else
		{
			
			$this->load->model("Game");
			$result = $this->Game->get_game_id($this->uri->segment(2));
			if($result=="")
			{
				redirect('/perfil', 'refresh');
			}
			else
			{
				$player_in = $this->Game->search_player($this->session->userdata("name"));
				$playersin = $this->Game->get_players($this->uri->segment(2));
				if($player_in == 0)
				{
					$max_players = $this->Game->get_max_players($this->uri->segment(2));
					if(sizeof($playersin) < $max_players)
					{
						$this->session->set_userdata('gameName', $this->uri->segment(2));
						//$this->session->set_userdata('gameName', $this->uri->segment(2));
						$this->Game->insert_lobby($this->session->userdata("name"),$this->uri->segment(2));
						$this->load->view("lobby");
					}
					else
					{
						echo "<script>alert('Game full')</script>";
						redirect('/perfil', 'refresh');
					}
					
				}else{
					$this->session->set_userdata('gameName', $this->uri->segment(2));
					$this->load->view("lobby");
				}
				
			}
		}
	}
    
    public function admin_check(){
        $admin = $this->Game->get_admin($this->session->userdata("gameName"));
        if($admin==0){
            echo 1;
        }
        else{
            echo 0;
        }
    }



	public function ready(){
		$this->load->model("Game");
		$playersin = $this->Game->get_players($this->session->userdata("gameName"));
		$max_players = $this->Game->get_max_players($this->session->userdata("gameName"));
		if(sizeof($playersin) == $max_players)
		{
            $admin = $this->Game->get_admin($this->session->userdata("gameName"));
            if($admin==1){
                if($this->session->userdata("admin")=== $this->session->userdata("name")){
                        echo 2;
                }
                else{        
                echo 0;
            }
            }
			else{
                echo 1;}
		}
		else
		{
			echo 0;
		}

	}


	public function leave_lobby(){
		if(!$this->session->userdata("name")){
			redirect('/login', 'refresh');
		}
		else
		{
			if(!$this->session->userdata("gameName")) 
			{
				redirect('/perfil', 'refresh');
			}
			else
			{
				$this->session->unset_userdata("gameName");
				$this->load->model("Game");
				$this->Game->remove_from_lobby($this->session->userdata("name"));
				redirect('/perfil', 'refresh');
			}
		}
	}



	function load_game($game){
      	$this->load->model("Game");
      	$this->load->model("Pandemic");

      	$id = $this->Game->get_game_id($game);

      	$created = $this->Pandemic->search_game($id);
      	foreach ($created as $key) {
			echo $key->player;
		}
      	//echo "<script>alert(".$created.");</script>";
      	return $created;
      	
      }



	public function start()
	{

		//echo "starting";
		$this->load->model("Pandemic");
		$this->load->model("Game");

		$id = $this->Game->get_game_id($this->session->userdata("gameName"));

		$playersin = $this->Game->get_players($this->session->userdata("gameName"));
		//foreach ($playersin as $key) {
		//	echo $key->player;
		//}
		//echo "<br>";
        $order = "";
		$created = $this->Pandemic->search_game($id);
		
		$cities = $this->Pandemic->cities;
		if(sizeof($created) == 0)
		{
			foreach ($playersin as $key) 
			{
				$this->Pandemic->insert_plays($key->player,$id);
                $order .= $key->player.",";
			}

			$this->Pandemic->create_game($id,$this->session->userdata("name"),$order);

			$infect = array();

			for($x = 0; $x<9; $x++)
			{
				$c = array_rand($cities);

				$l = $this->Pandemic->inf_in_discart($id);
				if (in_array($c, $l)) 
				{
					$x--;
				}
				else
				{
					array_push($infect, $c);
					$this->Pandemic->add_idiscart($id,$c);
					$l = $this->Pandemic->inf_in_discart($id);
					//var_dump($l);
				}
			}
			$this->Pandemic->add_station($id, "Atlanta");
			$this->Pandemic->city_table($id);

			for($x = 0; $x<9; $x++)
			{
				if($x < 3){
					$this->Pandemic->add_cubes($id, $infect[$x], 1);
				}elseif($x>=3 and $x<6){
					$this->Pandemic->add_cubes($id, $infect[$x], 2);
				}else{
					$this->Pandemic->add_cubes($id, $infect[$x], 3);
				}
			}

			$max_players = $this->Game->get_max_players($this->session->userdata("gameName"));
			$city_cards = array();
			if ($max_players == 2) {
				$cards = 8;
			}elseif($max_players == 3){
				$cards = 9;
			}elseif($max_players == 4){
				$cards = 8;
			}

			for ($i=0; $i < $cards ; $i++) { 
				$c = array_rand($cities);
				$l = $this->Pandemic->pl_in_discart($id);
				if (in_array($c, $l)) 
				{
					$i--;
				}
				else
				{
					array_push($city_cards, $c);

					$this->Pandemic->add_pdiscart($id,$c);
					$l = $this->Pandemic->pl_in_discart($id);
					//var_dump($l);
				}
			}

			//echo "<script>alert('".var_dump($city_cards)."');</script>"; 
		
			foreach ($playersin as $key) 
				{
					for ($i=0; $i < $cards/$max_players; $i++) {
						$pop = array_pop($city_cards);
						//echo "<script>alert('".$key->player."');</script>"; 
						$this->Pandemic->give_cards($id, $key->player,$pop);
					}
				}

		}
		
		$turn = $this->Pandemic->player_turn($this->session->userdata("gameName"));
		//echo "<h3 id='turn'>".$turn."</h3>";
		//echo "<br>";
		$this->load->view("newmap");
	}



	public function get_positions()
	{
		$this->load->model("Pandemic");
		$this->load->model("Game");

		$id = $this->Game->get_game_id($this->session->userdata("gameName"));
		$result = $this->Pandemic->player_position($id);
		echo json_encode($result);
	}


	public function display_cities()
	{
		$this->load->model("Pandemic");
		$this->load->model("Game");

		$id = $this->Game->get_game_id($this->session->userdata("gameName"));
		$result = $this->Pandemic->get_cubes($id);
		

		echo $result;
	}

	public function get_cards()
	{
		$this->load->model("Pandemic");
		$this->load->model("Game");
		$id = $this->Game->get_game_id($this->session->userdata("gameName"));
		$result = $this->Pandemic->get_cards($id);
        $cities = $this->Pandemic->cities;
		$li = "";
		for ($i=0; $i < sizeof($result) ; $i++) { 
			$a = $result[$i]["nick"];
			$b = $result[$i]["cartas"];
            
			/*if($cities[$b][0] == "K"){
				$color = "black";
			}elseif($cities[$b][0] == "B"){
				$color = "blue";
			}elseif($cities[$b][0] == "R"){
				$color = "red";
			}elseif($cities[$b][0] == "Y"){
				$color = "#d1a000";
			}*/
			$li .= "<p class='cards'>".$a.":".$b."</p>";
		}
        $li .= '';
		

		echo $li;
	}
    
    
    public function get_cards_moves()
	{
		$this->load->model("Pandemic");
		$this->load->model("Game");
		$id = $this->Game->get_game_id($this->session->userdata("gameName"));
		$result = $this->Pandemic->get_cards($id);
        $cities = $this->Pandemic->cities;
        $show = '';
        
		for ($i=0; $i < sizeof($result) ; $i++) { 
			if($result[$i]["nick"] == $this->session->userdata("name")){
                $b = explode(',',$result[$i]["cartas"]);
                $b = array_values(array_filter($b));
                if(sizeof($b)!=0){
                    for($k = 0; $k < sizeof($b); $k++){
                        if($cities[$b[$k]][0] == "K"){
                            $color = "black";
                        }elseif($cities[$b[$k]][0] == "B"){
                            $color = "blue";
                        }elseif($cities[$b[$k]][0] == "R"){
                            $color = "red";
                        }elseif($cities[$b[$k]][0] == "Y"){
                            $color = "#d1a000";
                        }


                        $show .= "<button class='movetocard' style='color:".$color."'>".$b[$k]."</button>";
                    }
                }
                
            }
                
		}
				
		echo $show;
	}
    

	public function give_cards()
	{
		$this->load->model("Pandemic");
		$this->load->model("Game");

		$id = $this->Game->get_game_id($this->session->userdata("gameName"));

		$cities = $this->Pandemic->cities;
		$keys = array_keys($cities);
		$city = array_rand($keys);

		$discart = $this->Pandemic->get_player_card($id, $this->session->userdata("name"));
		array_pop($discart);
		if(sizeof($discart)<7)
		{
			if(!in_array($keys[$city], $discart))
			{
				$this->Pandemic->add_pdiscart($id, $city);
				$this->Pandemic->give_cards($id, $this->session->userdata("name"), $keys[$city]);
				return $keys[$city];
			}
			else
			{
				$this->give_cards();
			}
		}
		
	}


	public function get_current_city($user)
	{
		$this->load->model("Pandemic");
		$this->load->model("Game");
		$id = $this->Game->get_game_id($this->session->userdata("gameName"));
		$ccity =  $this->Pandemic->get_current_city($id, $user);
		return $ccity;
	}

	public function get_turn()
	{
		$this->load->model("Pandemic");
		$turn = $this->Pandemic->player_turn($this->session->userdata("gameName"));

		$turn = preg_replace('/\s+/', '', $turn);

		if($turn == $this->session->userdata("name"))
		{
			echo '<button id="play">Play</button>';
		}
		else
		{
			echo "<button id='wait'>Not your turn</button>";
		}
	}

	public function get_head_turn()
	{
		$this->load->model("Pandemic");
		$turn = $this->Pandemic->player_turn($this->session->userdata("gameName"));
		echo "<h3 id='turn'>".$turn."</h3>";
	}

	public function show_moves(){
		$this->load->model("Pandemic");
		$this->load->model("Game");
		$city = $this->get_current_city($this->session->userdata("name"));
		$citiescol = $this->Pandemic->cities;
		$adj = $this->Pandemic->get_adjacent($city);
		array_shift($adj);
        $adj = array_filter($adj);
		$show = "<div id='moveto'><h4>Move to:</h4>";
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
			$show .= "<button class='moveto' style='color:".$color."'>".$adj[$i]."</button>";
		}
		$show .= "</div><br>";
        
		$id = $this->Game->get_game_id($this->session->userdata("gameName"));
		$cities = $this->Pandemic->just_get_cubes($id);
		$city = str_replace(' ', '', $city);
		$canCure = $cities[$city];
		if($canCure == 1 or $canCure==2 or $canCure==3)
		{
			$show .= "<button id='cure'>Remove 1 cube</button>";
		}
		echo $show;		
	}


	public function after_action()
	{
		$this->load->model("Pandemic");
		$this->load->model("Game");
        
        $id = $this->Game->get_game_id($this->session->userdata("gameName"));

        $p_discard = $this->Pandemic->pl_in_discart($id);
        
        if(intval($this->size_player_discard())>46){
            $ccc = "GAME OVER NO MORE CARDS TO GIVE";
        }else{
            $this->give_cards();
            $this->give_cards();
        }
        
		$a = $this->change_turn();
		$rate = $this->get_rate();
		        
		$discart = $this->Pandemic->inf_in_discart($id);
        
		$cities = array_keys($this->Pandemic->cities);
        
		array_push($cities, "EPIDEMIC");
		array_push($cities, "EPIDEMIC");
		array_push($cities, "EPIDEMIC");
		array_push($cities, "EPIDEMIC");
        
        if(isset($ccc)){
            $ccc .= ',';
        }else{
            $ccc = "";
        }
        
		for ($i=0; $i < $rate ; $i++) 
		{
            $city_ind = array_rand($cities);
		    $city = $cities[$city_ind];
		    $city = preg_replace('/\s+/', '', $city);
            
            if($city ==  "EPIDEMIC"){
                $ccc .= "EPIDEMIC,";
                $card = $this->epidemic();
                $ccc.=$card;
                $i=$rate;
            }
            else
            {
                while(in_array($city, $discart))
                {
                    $city_ind = array_rand($cities);
                    $city = $cities[$city_ind];
                    $city = preg_replace('/\s+/', '', $city);
                }
                
                $cubes = $this->Pandemic->just_get_cubes($id);
                $all_cities = $this->Pandemic->cities;
                $citis = array_keys($all_cities);

                $b = 0;
                $k = 0;
                $y = 0;
                $r = 0;
                array_shift($cubes);
                
              
                foreach($citis as $cit){
                    if($all_cities[$cit][0] == "K"){
                        $k += $cubes[$cit];
                       $k++;
                    }elseif($all_cities[$cit][0] == "B"){
                       $b+= $cubes[$cit];
                    }elseif($all_cities[$cit][0] == "R"){
                       $r+= $cubes[$cit];
                    }elseif($all_cities[$cit][0] == "Y"){
                       $y+= $cubes[$cit];
                    }
                }


                if($b==24 and $all_cities[$city][0] == 'B'){
                    $ccc = "GAME OVER, NO MORE BLUE CUBES";
                } 
                elseif($k==24 and $all_cities[$city][0] == 'K'){
                    $ccc = "GAME OVER, NO MORE BLACK CUBES";
                } 
                elseif($y==24 and $all_cities[$city][0] == 'Y'){
                    $ccc = "GAME OVER, NO MORE YELLOW CUBES";
                } 
                elseif($r==24 and $all_cities[$city][0] == 'R'){
                    $ccc = "GAME OVER, NO MORE RED CUBES";
                }

                $this->Pandemic->add_idiscart($id, $city);
                $this->Pandemic->add_cubes($id, $city, 1);
                $ccc .= $city.",";
       
            }

		}
        echo $ccc;
	}
    
    public function jjj(){
         $this->load->model("Game");
		$this->load->model("Pandemic");
        
		$id = $this->Game->get_game_id($this->session->userdata("gameName"));
        $over = $this->Pandemic->add_cubes($id, "Miami", 1);
        if($over){
            $this->Pandemic->game_over($id,"game");
            echo "<h1 id='over'>GAME OVER</h1>";
        }
    }
    
    public function epidemic(){
        $this->load->model("Game");
		$this->load->model("Pandemic");
        
		$id = $this->Game->get_game_id($this->session->userdata("gameName"));
        
        $this->Pandemic->increment_rate($id);
        
        $cards = $this->Pandemic->inf_in_discart($id);
        
        $card = array_shift($cards);
               
        $this->Pandemic->add_cubes($id, $card, 3);

        $this->Pandemic->reset_idiscard($id);
        
        return $card;
    }


	public function moveto($city)
	{
		$this->load->model("Game");
		$this->load->model("Pandemic");
		$id = $this->Game->get_game_id($this->session->userdata("gameName"));
		$player = $this->session->userdata("name");
		$this->Pandemic->move($id, $this->session->userdata("name"), $city);
	}
    
    public function movetocard($city)
    {
        $this->load->model("Game");
		$this->load->model("Pandemic");
		$id = $this->Game->get_game_id($this->session->userdata("gameName"));
        $this->Pandemic->remove_card($id, $this->session->userdata("name"), $city);
        $this->moveto($city);
    }


	public function remove_cube()
	{
		$this->load->model("Game");
		$this->load->model("Pandemic");
		$id = $this->Game->get_game_id($this->session->userdata("gameName"));
		$city = $this->get_current_city($this->session->userdata("name"));
        
        $stations = $this->return_stations();
        
        
        if(in_array($city, $stations)){
            $this->Pandemic->remove_all_cubes($city, $id);
            echo $city;
        }
        else{
            $this->Pandemic->remove_cube($city, $id);
		    echo $city;
        }
	}

	public function change_turn()
	{
		$this->load->model("Game");
		$this->load->model("Pandemic");
		$id = $this->Game->get_game_id($this->session->userdata("gameName"));
		$turn = $this->Pandemic->player_turn($this->session->userdata("gameName"));
		$a = $this->Pandemic->change_turn($id, $turn);
		return $a;
	}


	public function get_outbreak()
	{
		$this->load->model("Pandemic");
		$this->load->model("Game");
		$id = $this->Game->get_game_id($this->session->userdata("gameName"));
        
		$outbreak = $this->Pandemic->get_outbreak($id);
		return $outbreak;
	}

	public function get_rate()
	{
		$this->load->model("Pandemic");
		$this->load->model("Game");
		$id = $this->Game->get_game_id($this->session->userdata("gameName"));
		$rate = $this->Pandemic->get_rate($id);
		if($rate < 3)
		{
			$rrate = 2;
		}
		elseif ($rate>2 and $rate<5) 
		{
			$rrate = 3;
		}
		else 
		{
			$rrate = 4;
		}
		return intval($rrate);
	}

	public function get_both()
	{
		$outbreak = $this->get_outbreak();
		$rate = $this -> get_rate();
		echo '<div id="outbreak">Outbreak:'.$outbreak.'</div><div id="irate">Infection Rate:'.$rate.'</div>';
	}

	public function get_date()
	{
		$this->load->model("Game");
		$this->load->model("Pandemic");
		$id = $this->Game->get_game_id($this->session->userdata("gameName"));
		$data = $this->Pandemic->get_date($id);
		echo "<p id='data'>Game started at:<br>".$data."</p>";
	}

	public function get_stations()
	{
		$this->load->model("Game");
		$this->load->model("Pandemic");
		$id = $this->Game->get_game_id($this->session->userdata("gameName"));
		$stations = $this->Pandemic->get_stations($id);
		$stations = array_values($stations);
		$send = "";
		//for ($i=0; $i < sizeof($stations); $i++) 
		//{ 
		//	$send .= "<tr class='trrs'><td class='stations'>".$stations[$i]."</td><";
		//}
		echo json_encode(array_filter($stations));

	}
    
    public function return_stations()
	{
		$this->load->model("Game");
		$this->load->model("Pandemic");
		$id = $this->Game->get_game_id($this->session->userdata("gameName"));
		$stations = $this->Pandemic->get_stations($id);
		$stations = array_values($stations);
		$send = "";
		//for ($i=0; $i < sizeof($stations); $i++) 
		//{ 
		//	$send .= "<tr class='trrs'><td class='stations'>".$stations[$i]."</td><";
		//}
		return array_filter($stations);

	}


	public function can_create_station()
	{
		$this->load->model("Game");
		$this->load->model("Pandemic");
		$id = $this->Game->get_game_id($this->session->userdata("gameName"));
		$cards = $this->Pandemic->get_cards($id);
		$current = $this->Pandemic->get_current_city($id, $this->session->userdata("name"));
		//$cards = implode(",", $cards[0]["cartas"])
		
		for ($i=0; $i < sizeof($cards); $i++) 
		{ 
			if ($cards[$i]["nick"]==$this->session->userdata("name"))
			{
				$cities = explode(",", $cards[$i]["cartas"]);
			}
		}

		if(in_array($current, $cities))
		{
			echo "<button id='create_station'>Create station</button>";
		}

	}

	public function create_station()
	{
		$this->load->model("Game");
		$this->load->model("Pandemic");
		$id = $this->Game->get_game_id($this->session->userdata("gameName"));
		$current = $this->Pandemic->get_current_city($id, $this->session->userdata("name"));
		$this->Pandemic->add_station($id, $current);
		$this->Pandemic->remove_card($id, $this->session->userdata("name"), $current);

	}

	public function get_cured()
	{
		$this->load->model("Game");
		$this->load->model("Pandemic");
		$id = $this->Game->get_game_id($this->session->userdata("gameName"));
		$cures = $this->Pandemic->get_cures($id);
		$cures = array_unique(explode(",", $cures));
		$cures = implode(",", $cures);
		$cures = str_replace("R","Red",$cures);
		$cures = str_replace("Y","Yellow",$cures);
		$cures = str_replace("B","Blue",$cures);
		$cures = str_replace("K","Black",$cures);

		echo $cures;
	}

	public function can_cure()
	{
		$this->load->model("Game");
		$this->load->model("Pandemic");
		$id = $this->Game->get_game_id($this->session->userdata("gameName"));

		$cities = $this->Pandemic->cities;
		$cards = $this->Pandemic->get_player_card($id, $this->session->userdata("name"));
		$cards = array_filter($cards);
		$colors = array();
		for ($i=0; $i < sizeof($cards) ; $i++) { 
			array_push($colors, $cities[$cards[$i]][0]);
			
		}
		$cure1 = 0;
		$cure2 = 0;
		$cure3 = 0;

		for ($i=0; $i < sizeof($colors) ; $i++) { 
			if ($colors[0] == $colors[$i]) {
				$cure1++;
			}
		}
		for ($i=0; $i < sizeof($colors) ; $i++) { 
			if ($colors[1] == $colors[$i]) {
				$cure2++;
			}
		}
		for ($i=0; $i < sizeof($colors) ; $i++) { 
			if ($colors[2] == $colors[$i]) {
				$cure3++;
			}
		}
		if($cure1 >= 5 or $cure2 >= 5 or $cure3 >= 5)
		{
			$can = 1; 
		}
		else
		{
			$can = 0;
		}
		echo $can;
	}


	public function cure_disease()
	{
		$this->load->model("Game");
		$this->load->model("Pandemic");
		$id = $this->Game->get_game_id($this->session->userdata("gameName"));

		$cities = $this->Pandemic->cities;
		$cards = $this->Pandemic->get_player_card($id, $this->session->userdata("name"));
		$cards = array_filter($cards);
		$colors = array();
		for ($i=0; $i < sizeof($cards) ; $i++) { 
			array_push($colors, $cities[$cards[$i]][0]);
			
		}
		$cure1 = 0;
		$cure2 = 0;
		$cure3 = 0;

		for ($i=0; $i < sizeof($colors) ; $i++) { 
			if ($colors[0] == $colors[$i]) {
				$cure1++;
			}
		}
		for ($i=0; $i < sizeof($colors) ; $i++) { 
			if ($colors[1] == $colors[$i]) {
				$cure2++;
			}
		}
		for ($i=0; $i < sizeof($colors) ; $i++) { 
			if ($colors[2] == $colors[$i]) {
				$cure3++;
			}
		}
		if($cure1>=5)
		{
			$cure = $colors[0];
		}
		elseif($cure2>=5)
		{
			$cure = $colors[1];
		}
		elseif($cure3>=5)
		{
			$cure = $colors[2];
		}

		$won = $this->Pandemic->add_cure($id, $cure);
        if($won == "win"){
            echo "win";
        }
		$k = 0;
		for ($i=0; $i < sizeof($cards); $i++) 
		{ 
			if($k<6 and $cities[$cards[$i]][0] == $cure)
			{
				$this->Pandemic->remove_card($id, $this->session->userdata("name"), $cards[$i]);
			}
		}
	}

    
    public function won(){
        $this->load->model("Game");
		$this->load->model("Pandemic");
        
        $id = $this->Game->get_game_id($this->session->userdata("gameName"));
        
        $won = k;
    }
    
    //AQUI ESTÃO NOVAS FUNÇÕES PARA O NEWMAP
    
    public function get_playing(){
        $this->load->model("Game");
		$this->load->model("Pandemic");
        
        $id = $this->Game->get_game_id($this->session->userdata("gameName"));
        $playing = $this->Pandemic->get_turn($id);
        echo $playing;
    }
    
    public function get_current(){
		echo $this->get_current_city($this->session->userdata("name"));
    }
    
    public function get_new_outbreak(){
        echo $this->get_outbreak();
    }
    
    public function get_new_rate(){
        echo $this->get_rate();
    }
    
    public function get_all_current_city(){
        $this->load->model("Game");
		$this->load->model("Pandemic");
        
        $id = $this->Game->get_game_id($this->session->userdata("gameName"));
        $playing = $this->Pandemic->get_all_current_city($id);
        echo json_encode($playing);
    }
    
    public function get_city_cubes(){
        $this->load->model("Game");
		$this->load->model("Pandemic");
        
		$id = $this->Game->get_game_id($this->session->userdata("gameName"));
        $cubes = $this->Pandemic->just_get_cubes($id);
        echo json_encode($cubes);
        
    }
    
    public function get_piles(){
        $this->load->model("Game");
		$this->load->model("Pandemic");
        
		$id = $this->Game->get_game_id($this->session->userdata("gameName"));
        $i = $this->Pandemic->inf_in_discart($id);
        $p = $this->Pandemic->pl_in_discart($id);
        
        echo sizeof($p);
    }
    
    public function size_player_discard(){
        $this->load->model("Game");
		$this->load->model("Pandemic");
        
		$id = $this->Game->get_game_id($this->session->userdata("gameName"));
        $i = $this->Pandemic->inf_in_discart($id);
        $p = $this->Pandemic->pl_in_discart($id);
        
        return sizeof($p);
    }
    
    
    
    
    public function write_lobby_chat(){
        $this->load->model("Game");
		$this->load->model("Pandemic");
        
		$id = $this->Game->get_game_id($this->session->userdata("gameName"));
        $name = $this->session->userdata("name");
        $message = $this->input->post('message');
        
        $this->Pandemic->lobby_chat($id,$name,$message);
        
    }
    
    public function get_lobby_chat(){
        $this->load->model("Game");
		$this->load->model("Pandemic");
        
		$id = $this->Game->get_game_id($this->session->userdata("gameName"));
        
        $result = $this->Pandemic->get_lobby_chat($id);
        echo $result;
    }
    
    
    public function leave(){
        $this->load->model("Game");
		$this->load->model("Pandemic");
        
		$id = $this->Game->get_game_id($this->session->userdata("gameName"));
        
        $this->Pandemic->game_over($id,"game");
        $this->session->unset_userdata("gameName");
        $this->Pandemic->delete_game($id);
        redirect('/perfil', 'refresh');
    }
    
    public function leave_win(){
        $this->load->model("Game");
		$this->load->model("Pandemic");
        
		$id = $this->Game->get_game_id($this->session->userdata("gameName"));
        
        $this->Pandemic->game_over($id,"players");
        $this->session->unset_userdata("gameName");
        $this->Pandemic->delete_game($id);
        redirect('/perfil', 'refresh');
        
    }
    
    public function increment_turn(){
        $this->load->model("Game");
		$this->load->model("Pandemic");
        
		$id = $this->Game->get_game_id($this->session->userdata("gameName"));
        
        $this->Pandemic->increment_turn($id, $this->session->userdata("name"));  
    }
    
    public function set_n_turn(){
        $this->load->model("Game");
		$this->load->model("Pandemic");
        
		$id = $this->Game->get_game_id($this->session->userdata("gameName"));
        
        $this->Pandemic->set_n_turn($id, $this->session->userdata("name"));  
    }
    
    public function get_turn_n(){
        $this->load->model("Game");
		$this->load->model("Pandemic");
        
		$id = $this->Game->get_game_id($this->session->userdata("gameName"));
        
        $n = $this->Pandemic->get_turn_n($id, $this->session->userdata("name"));
        
        echo json_encode($n);
        
        
    }

}

?>
