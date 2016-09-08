<?php 
/*
  @author Nikhil
  *@version 1.0
  *Class to do profile operation
*/
class Update_profile_model extends CI_Model{
 	/**
	* 
	* function to update profile details
	* @param $data,$where
	* @return boleaan
	**/
 	function upd_profile($data,$where)
 	{
		$this->load->database();
		$this->db->where($where);
		$table_name = "user";
		if($this->db->update($table_name,$data)){
			return true;
		}else{
			return false;
		}	
 	}
 	/**
	* 
	* function to update user role
	* @param $data,$where
	* @return boleaan
	**/
 	function upd_user_role($data,$where)
 	{
		$this->load->database();
		$this->db->where($where);
		$table_name ="user_role";
		if($this->db->update($table_name,$data)){
			return true;
		}else{
			return false;
		}	
 	}
} 
?>