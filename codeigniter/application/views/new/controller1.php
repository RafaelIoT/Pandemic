<?php


public function start_game()
{
    
    $this->load->model("Model1");
    $this->load->model("Game");
    
    $id = $this->Game->get_game_id($this->session->userdata("gameName"));
    
    $players_in_lobby = $this->Model1->get_players_lobby($id);
    $players_in = array();
    foreach ($query->result_array() as $row)
    {
        array_push($players_in, $row['players']);
    }
    
    
}




?>