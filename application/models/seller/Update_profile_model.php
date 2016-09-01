<?php 
/**
 * 
 */
 class Update_profile_model extends CI_Model
 {
 	
 	function upd_profile($table_name,$data,$where)
 	{
		$this->load->database();
		$this->db->where($where);
		if($this->db->update($table_name,$data)){
		return true;
		}else{
		return false;
		}
		
 	}
 } 
?>