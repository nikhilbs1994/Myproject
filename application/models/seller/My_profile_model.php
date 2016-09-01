<?php 
/**
* 
*/
class My_profile_model extends CI_Model
{
	
	function view_profile($table_name,$where){

		$this->load->database();
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