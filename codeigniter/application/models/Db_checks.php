<?php 
   class Db_checks extends CI_Model {
	
      function __construct() { 
         parent::__construct(); 
      } 
   
      public function insert($data) { 
         if ($this->db->insert("stud", $data)) { 
            return true; 
         } 
      } 
   
      public function delete($roll_no) { 
         if ($this->db->delete("stud", "roll_no = ".$roll_no)) { 
            return true; 
         } 
      } 
   
      public function update($data,$old_roll_no) { 
         $this->db->set($data); 
         $this->db->where("roll_no", $old_roll_no); 
         $this->db->update("stud", $data); 
      } 

      public function search($user, $email, $pass)
      {

         $this->db->select("*");
         $this->db->from("registo");
         if($user!= "" or $email!="" and $pass!="")
         {
            $where = "nick='".$user."' AND email='".$email."' AND pass='".sha1($pass)."'"; 
            $this->db->where($where);
            return $this->db->get()->row();
         }
      }
   } 
?> 