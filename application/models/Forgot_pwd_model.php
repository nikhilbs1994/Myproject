<?php 
/**
 * 
 */
 class Forgot_pwd_model extends CI_Model
 {
 	
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