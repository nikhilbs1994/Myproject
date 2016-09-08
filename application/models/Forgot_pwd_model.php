<?php 
/*
  @author Nikhil
  *@version 1.0
  *Class to fogot password operation
*/
class Forgot_pwd_model extends CI_Model{
	/**
	* 
	* function to update new password
	* @param $pwd
	* @return boolean
	**/
 	function update_pwd($table_name,$pwd,$where)
 	{
 		$this->load->database();
 		$data = array('pwd' => $pwd );
 		$this->db->where($where);
		if($this->db->update($table_name,$data)){
			return true;
    	}else{
    		return false;
    	}
 	}
} 
?>