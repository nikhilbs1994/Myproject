<?php 
/*
  @author Nikhil
  *@version 1.0
  *Class to login operation
*/
class Login_model extends MY_Controller{
	/**
	* 
	* function to check user is valid
	* @param $where
	* @return $row
	**/
	function login_check($where){
		$this->load->database();
		$table_name = 'user';
		$query = $this->db->get_where($table_name,$where);
		if ( $query->num_rows() > 0 ){
			$row = $query->row_array();
			return $row;
		}else{
			return false;
		}
	}
	/**
	* 
	* function to update new password
	* @param $pwd
	* @return boolean
	**/
	function update_pwd($pwd,$where){
		$this->load->database();
		$table_name = 'user';
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