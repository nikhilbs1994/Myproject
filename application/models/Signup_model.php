<?php
/*
  @author Nikhil
  *@version 1.0
  *Class to do signup operation
*/
class Signup_model extends CI_Model{
	/**
	* 
	* function to add user
	* @param $data
	* @return $insert_id
	**/
	public function add_user($data){
		$table_name = "user";
		$this->load->database();
		if($this->db->insert($table_name,$data)){
			$insert_id = $this->db->insert_id();
    		return $insert_id;
    	}else{
    		return false;
    	}
	}
	/**
	* 
	* function to add user in user role table
	* @param $data
	* @return $insert_id
	**/
	public function add_user_role($data){
		$table_name ="user_role";
		$this->load->database();
		if($this->db->insert($table_name,$data)){
			$insert_id = $this->db->insert_id();
    		return $insert_id;
    	}else{
    		return false;
    	}
	}
}
?>