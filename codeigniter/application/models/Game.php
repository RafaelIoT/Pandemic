
<?php 
   class Game extends CI_Model {
	
      function __construct() { 
         parent::__construct(); 
      }
       
    public function get_check(){
        $conn = $this->load->database();

        $query = "SELECT * FROM registo WHERE email=? OR nick=?";
            $result = $this->db->query($query, array(filter_input(INPUT_POST, 'email'), filter_input(INPUT_POST, 'username')));
            $rowcount = $result->num_rows();
        if ($rowcount > 0) {
            $query = $result->row_array();

            foreach ($result->result() as $row)
            {
                $nick = $row->nick;
                $email = $row->email;
                $pass = $row->pass;
            }
            if ($pass == sha1(filter_input(INPUT_POST, 'password'))){
                echo "ya";
                                $this->session->set_userdata("name",$nick);
                                $sql = "SELECT nick FROM registo WHERE email=?";
                                $query = $result->row_array();
                                redirect('perfil', 'refresh');
            }else{
                $_SESSION["loginErr"] = "Erro no login";
                redirect('login', 'refresh');
            }

        } else {
            $_SESSION["loginErr"] = "Erro no login";
            redirect('login', 'refresh');

        }
    }

    public function get_rec1(){
        $conn = $this->load->database();

        $email = filter_input(INPUT_POST, 'email');
        $seg = filter_input(INPUT_POST, 'seg');

        $sql=  "SELECT * FROM registo WHERE email='".$email."' and seg='".$seg."'";
        $result = $this->db->query($sql);

        if(empty($seg) && empty($email)){
            echo "<p id='dados'>Não preencheu os campos</p>";
        }
        else if (empty($email)) {
            echo "<p>preencha o email</p>";
        }
        else if (empty($seg)){
            echo "<p>preencha a palavra de segurança</p>";
        }

        else if($result->num_rows() > 0){

          if($result){
            echo '<p id="info">O seu email é '.$email.'</p>';
            echo '<div id="recup2">
                <form method="POST" action="recuperacao2" id="formm2">
                    <p id="newpass">nova password:</p><br>
                    <input type="password" name="pass" id="recuppass"><br>

                    <input type="submit" value="Submeter" id="btn2"/>
                </form>
            </div>';

          } else {
            echo '<p>Não foi possível gerar o endereço único</p>';

          }
        } else {
          echo '<p id="dados" >Dados errados.</p>';
        }
    }
    
    public function get_rec2(){
        $this->load->database();

        $pass = sha1(filter_input(INPUT_POST, 'pass'));
        $email = filter_input(INPUT_POST, 'email');

        $update ="UPDATE registo set pass='$pass' where email='$email'";

        $this->db->query($update);

        redirect("login","refresh");
    }
       
        
    public function get_logout(){
        if(isset($_SESSION['name'])){
            unset($_SESSION['name']);
            session_destroy();
            redirect("/home", "refresh");
        }
        if(isset($_SESSION['admin'])){
            unset($_SESSION['admin']);
            session_unset();
            session_destroy();
        }
        redirect("/home", "refresh");
        }
 
    public function get_Registo(){
    if(!isset($_SESSION["emailErr"])){
        $_SESSION["emailErr"] = "";
    }
    if(!isset($_SESSION["nickErr"])){
        $_SESSION["nickErr"] = "";
    }

    if(isset($_SESSION["miscErr"])){
            if( $_SESSION["miscErr"] == "0"){
                $_SESSION["miscErr"] = "1";
                echo '<h3 style="position: absolute;
                            top: 90px;
                            right: 28px;
                            color: black;
                            font-size: 22px;
                            font-family: "Courier New", Courier;
                            font-weight: bold;";>
                            Não são permitidos caracteres estranhos!<br>
                            Apenas letras ou números</h3>';
            }
    }
}
       
    public function registo_check(){
        ini_set('default_charset','UTF-8');
        ini_set('file_upload','On');
        $nome = strip_tags(filter_input(INPUT_POST, 'nome'));
        $apelido = strip_tags(filter_input(INPUT_POST, 'apelido'));
        $email = strip_tags(filter_input(INPUT_POST, 'email'));
        $sexo = strip_tags(filter_input(INPUT_POST, 'sexo'));
        $idade = strip_tags(filter_input(INPUT_POST, 'idade'));
        $pais = strip_tags(filter_input(INPUT_POST, 'pais'));
        $nick = strip_tags(filter_input(INPUT_POST, 'nick'));
        $pass = strip_tags(filter_input(INPUT_POST, 'pass'));
        $distrito = strip_tags(filter_input(INPUT_POST, 'distrito'));
        $concelho = strip_tags(filter_input(INPUT_POST, 'concelho'));
        $seg = strip_tags(filter_input(INPUT_POST, 'seg'));
        $img = strip_tags(filter_input(INPUT_POST, 'img'));


        if (!preg_match("/^[a-zA-Z0-9@.]*$/",$nome)) {
            $_SESSION["miscErr"] = "0";
            redirect('register', 'refresh');
            exit();
        }
        if (!preg_match("/^[a-zA-Z0-9@.]*$/",$apelido)) {
            $_SESSION["miscErr"] = "0";
            redirect('register', 'refresh');
            exit();
        }

        if (!preg_match("/^[a-zA-Z0-9@.]*$/",$email)) {
            $_SESSION["miscErr"] = "0";
            redirect('register', 'refresh');
            exit();
        }
        if (!preg_match("/^[a-zA-Z0-9@.]*$/",$nick)) {
            $_SESSION["miscErr"] = "0";
            redirect('register', 'refresh');
            exit();
        }
        if (!preg_match("/^[a-zA-Z0-9@.]*$/",$pass)) {
            $_SESSION["miscErr"] = "0";
            redirect('register', 'refresh');
            exit();
        }
        if (!preg_match("/^[a-zA-Z0-9@.]*$/",$seg)) {
            $_SESSION["miscErr"] = "0";
            redirect('register', 'refresh');
            exit();
        }


        $conn = $this->load->database();

        $exists_nick = "SELECT * FROM registo WHERE nick='".$nick."'";
        $exists_email = "SELECT * FROM registo WHERE email='".$email."'";

        $result_nick =  $this->db->query($exists_nick);
        $result_email =  $this->db->query($exists_email);

        $_SESSION["nickErr"] = "";
        $_SESSION["emailErr"] = "";

        if ($result_nick->num_rows() > 0){
                $_SESSION["nickErr"] = "Username já registado!";
                redirect('register', 'refresh');
        }

        if ($result_email->num_rows > 0){
                $_SESSION["emailErr"] = "Email já registado!";
                redirect('register', 'refresh');
        }

        $sql = "INSERT INTO registo  VALUES ";
        $sql .= "('$nome', '$apelido','$email','$sexo','$idade','$pais','$distrito','$concelho','$nick','".sha1($pass)."','$seg','$img')";


        if( $this->db->query($sql)){
            mysqli_close($conn);
            $_SESSION["registo"] = " Utilizador registado! ";
            $_SESSION["registo_count"] = "0";
            redirect('login', 'refresh');
            }
        else{
            $_SESSION["miscErr"] = "0";
            redirect("register",'refresh');
        }
        
        $this->get_Registo();


    }

      public function return_cities(){
      	return $this->$cities;
      }

   
      public function search()
      {

         $sql = "SELECT * FROM game";
         $query = $this->db->query($sql);
         return $query->result();
      }
       
       public function get_admin($nome){
           $sql = "SELECT admin FROM game where name='$nome'";
           $query = $this->db->query($sql);
           $row = $query->row_array();
           return $row["admin"];
       }
      
      public function insert($name, $players, $descr,$admin)
      {	    
                        
			$sql = "INSERT INTO game(name, players, descricao,admin) VALUES('".$name."','".$players."', '".$descr."','".$admin."')";
			$query = $this->db->query($sql);
			if($query)
			{
				return "<p id='create_success'>Game created!</p>" ;
			}
			else
			{
				return "<p id='create_insuccess'>Error!</p>";
			}

      }
      //função de apoio
      public function get_game_id($game){
      		$sql = "SELECT id FROM game WHERE game.name ='".$game."'";
      		$query = $this->db->query($sql)->result();
      		$gameid="";
      		foreach ($query as $row)
			{
			        $gameid=$row->id;
			}
      		return $gameid;
      	
      }

      public function get_players($game)
      {
			$gameid = $this->get_game_id($game);
      		$sql = "SELECT * FROM lobby WHERE lobby.gameid ='".$gameid."'";
      		$query = $this->db->query($sql);
      		return $query->result();
 		}

 	
 	  public function get_max_players($game)
 	  {
 	  		$gameid = $this->get_game_id($game);
 	  		$sql = "SELECT game.players FROM game WHERE game.id =".$gameid;
      		$query = $this->db->query($sql);

      		foreach ($query->result() as $key) {
      			$max = $key->players;
      		}
      		return $max;

 	  }

      public function insert_lobby($player, $game)
      {
      		$gameid = $this->get_game_id($game);
      		$sql = "INSERT INTO lobby(gameid, player) VALUES('".$gameid."','".$player."')";
      		$query = $this->db->query($sql);
      }


      public function search_player($player){
      		$sql = "SELECT * FROM lobby WHERE lobby.player ='".$player."'";
      		$query = $this->db->query($sql);
      		return $query->num_rows();
      }

      public function remove_from_lobby($player)
      {
      		$sql = "DELETE FROM lobby WHERE lobby.player ='".$player."'";
      		$query = $this->db->query($sql);
      }

      public function search_admin($name, $pass)
      {
         $sql = "SELECT * FROM admin WHERE username='".$name."' AND pass='".$pass."'";
         $result = $this->db->query($sql);
         return $result->num_rows();
      }


   } 
?> 