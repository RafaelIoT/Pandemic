<?php //NOVO MODELO

    //LOBBY
    public function get_players_lobby($id){
        $sql = "SELECT * FROM lobby WHERE id=".$id;
        $result = $this->db->query($sql);
        $result = $result->result_array();
        $players_in = array();
        foreach ($result as $row)
        {
            array_push($players_in, $row['players']);
        }
        
        return $players_in;
     }


    //PLAYS
     public function get_players_plays($id){
         $sql = "SELECT * FROM plays WHERE id=".$id;
         $result = $this->db->query($sql);
      	 $result = $result->result_array();
         return $result;
     }
       
     public function get_player_card($id, $player){
         $sql = "SELECT plays.cartas FROM plays WHERE id=".$id." AND nick='".$player."'";
         $result = $this->db->query($sql);
      	 $result = $result->result_array();
         return $result;
     }
       
     public function get_player_city($id, $player){
         $sql = "SELECT plays.city FROM plays WHERE id=".$id." AND nick='".$player."'";
         $result = $this->db->query($sql);
      	 $result = $result->result_array();
         return $result;
     }
       
     public function get_player_turn($id, $player){
         $sql = "SELECT plays.turn FROM plays WHERE id=".$id." AND nick='".$player."'";
         $result = $this->db->query($sql);
      	 $result = $result->result_array();
         return $result;
     }
       
     public function set_player_city($id, $player, $city){
         $sql = "UPDATE plays SET city='".$city."' WHERE id=".$id." AND nick='".$player."'";
         $this->db->query($sql);
     }
       
     public function set_player_cards($id, $player, $carta){
        $cartas = $this->get_player_card($id,$player);
        
     }
       
     public function set_player_turn($id, $player){
         
     }
       
       
       
       
       
       
       
       
     //PANDEMIC
     public function create_game($id)



     public function get_id($name){
         
     }
        

     public function get_outbreak($id){
        
     }
       
     public function get_infection_rate($id){
        
     }
       
     public function get_cured($id){
        
     }
       
     public function get_turn($id){
        
     }
       
     public function get_infection_dump($id){
        
     }
       
     public function get_player_dump($id){
        
     }
        
     public function get_starttime($id){
        
     }
       
     public function get_winner($id){
        
     }
       
     public function get_ended($id){
        
     }
       
     public function get_stations($id){
        
     }
       
    
       
     
     public function set_outbreak($id, $n){
        
     }
       
     public function set_infection_rate($id, $n){
        
     }
       
     public function set_cured($id, $n){
        
     }
       
     public function set_turn($id, $n){
        
     }
       
     public function set_infection_dump($id, $s){
        
     }
       
     public function set_player_dump($id, $s){
        
     }
       
     public function set_start($id, $h){
        
     }
     
     public function set_ended($id, $h){
        
     }
       
     public function set_winner($id, $p){
        
     }
       
     public function set_station($id, $s){
        
     }

?>
