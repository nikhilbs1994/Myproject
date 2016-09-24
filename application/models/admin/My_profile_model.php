<?php 
/*
  @author Nikhil
  *@version 1.0
  *Class to do profile operation
*/
class My_profile_model extends CI_Model{
	/**
	* 
	* function to get profile details
	* @param $where
	* @return $row
	**/
	function view_profile($where){

		$this->load->database();
		$table_name = 'user';
		$query=$this->db->get_where($table_name,$where);
		if ( $query->num_rows() > 0 )
		{
    		$row = $query->row_array();
    		return $row;
		}else{
			return false;
		}
	}
}
 ?>